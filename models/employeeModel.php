<?php
require_once("helper/dbConnection.php");


function get()
{
    $query = conn()->prepare("SELECT e.id, e.name, e.email, g.name as 'gender', e.city, e.age, e.phone_number
    FROM employees e
    INNER JOIN genders g ON e.gender_id = g.id
    ORDER BY e.id ASC;");

    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}


function getById($id){

  $query = conn()->prepare(
  "SELECT
  e.name, e.email, g.name as 'gender',
  e.city, e.age, e.phone_number
  FROM employees e
  INNER JOIN genders g ON e.gender_id = g.id
  WHERE e.id = $id
  ;");

  try {
      $query->execute();
      $employees = $query->fetchAll();
      return $employees;
  } catch (PDOException $e) {
      return [];
  }
}

function getHobbiesByEmployeeId($id) {
  $query = conn()->prepare(
    "SELECT h.name as 'hobbie'
    FROM hobbies h
    INNER JOIN employee_hobbies eh ON h.id = eh.hobbie_id
    WHERE employee_id = $id
    ;");

    try {
        $query->execute();
        $res = $query->fetchAll();
        $hobbies = [];

        foreach ($res as $key => $value) {
          $hobbies[$value['hobbie']] = $value['hobbie'];
        }

        return $hobbies;
    } catch (PDOException $e) {
        return [];
    }
}

function renderFormEmployee($employee, $hobbies) {

  # Call the JSON structure Form
  $html = '';
  $jsonUrl = './resources/formStructure.json';
  if (!file_exists($jsonUrl)) echo "json file doesnt exist: $jsonUrl";

  $data = file_get_contents($jsonUrl);
  if (!$data) echo "json data is unreadable";
  $data = json_decode($data, true); # 2 arg. allows to get the data as an Array
  $data = $data['types_form']; # Acces to the key in the Array

  $html .= '<form action="?controller=employee&action=proccesForm" method="post">';
  # Foreach object in $data we get the variables from the keys, every ITEM is the object in $data
  foreach ($data as $item) {

  $label = $item['name'];
  $labelInnerText = $item['innerText'];
  $tag = $item['tag'];
  $type = $item['type'];

  $arrayValue = [];

  if (!count($employee) > 0 || $item['name'] === 'hobbies' || $item['name'] === 'gender') {
    $arrayValue = $item['value'];
  }

  if (count($employee) > 0 && ($item['name'] !== 'hobbies' && $item['name'] !== 'gender') ) {
    $arrayValue = [$employee[$item['name']]];
  }

  # Here we iterate trough every element to build the divs
  $html .= "<div class='mb-3'>";

  $html .= "<label for='$label' class='form-label'>$labelInnerText</label>";
    # If our $tag is an select tag we render
    if ($tag === 'select') {
        # Sleect render
        $html .= "<select name='$label' id='$label'>";
        # Foreach item in $arrayValue we print option tag
        foreach ($arrayValue as $value) {
          $selected = isset($employee['gender']) && $employee['gender'] === $value ? "selected" : '';
          $html .= "<option $selected value='$value'>$value</option>";
        }

        $html .= '</select>';
    } else {
      # Check if $value its an array to do a foreach to print multiple inputs
      foreach ($arrayValue as $key => $value) {
        if ($type === 'checkbox') {
          $checked = isset($hobbies) && isset($hobbies[$value]) ? "checked" : '';
          $html .= "<label for='$label' class='form-label'>$value</label>";
          $html .= "<$tag type='$type' name='$label$key' $checked class='form-check-input' id='$label' value='$value' />";
        } else {
          $html .= "<$tag type='$type' name='$label' class='form-control' id='$label' value='$value' />";
        }
      }
    }

    $html .= '</div>';
  }

  $html .= '<input type="hidden" name="employeeId" value="'.$_GET['id'].'">';

  $valueButton = count($employee) > 0 ? 'Edit' : 'Create';
  $html .= '<input class="btn btn-primary" name="actionForm" type="submit" value="'.$valueButton.'">';



  $html .= '</form>';

  return $html;
}

function createEmployee($data) {

  $employeeName = filter_var($data['name'], FILTER_SANITIZE_SPECIAL_CHARS);
  $employeeCity = filter_var($data['city'], FILTER_SANITIZE_SPECIAL_CHARS);
  $employeeEmail = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
  $employeeGender = filter_var($data['gender'], FILTER_SANITIZE_SPECIAL_CHARS);
  $employeeAge = filter_var((int)$data['age'], FILTER_SANITIZE_NUMBER_INT);
  $employeePhoneNumber = filter_var((int)$data['phone_number'], FILTER_SANITIZE_NUMBER_INT);

  $query = conn()->prepare(
    "INSERT INTO employees
      (name, email, gender_id, age, phone_number, city)
      VALUES
      (
        '$employeeName',
        '$employeeEmail',
        (SELECT id FROM genders WHERE name = '$employeeGender'),
        $employeeAge,
        $employeePhoneNumber,
        '$employeeCity'
      )
    ;"
  );

  try {
      if ($query->execute()) {

        return true;
      }
      return false;
  } catch (PDOException $e) {
      return [];
  }

}

# this function fist adds the employee in the employees table and then update his hobbies
function addEmployee($data){

  // create employee
  $newEmployee = createEmployee($data);
  $employeeEmail = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

  //uppadte hobbies
  if($newEmployee){
    // get id from table, looking for unique email
    $employeeId = conn()->query("SELECT id FROM employees WHERE email = '$employeeEmail';")->fetchAll();
    $employeeId = $employeeId[0]['id'];

    $employeeHobbies = [];
    foreach($data as $key => $value) {
       if (str_contains($key, 'hobbie')) {
         array_push($employeeHobbies, filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
       }
    }

    return updateEmployeeHobbies($employeeId, $employeeHobbies);
  }
}

function editEmployee($data) {

   $employeeId = filter_var((int)$data['employeeId'], FILTER_SANITIZE_NUMBER_INT);
   $employeeName = filter_var($data['name'], FILTER_SANITIZE_SPECIAL_CHARS);
   $employeeCity = filter_var($data['city'], FILTER_SANITIZE_SPECIAL_CHARS);
   $employeeEmail = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
   $employeeGender = filter_var($data['gender'], FILTER_SANITIZE_SPECIAL_CHARS);
   $employeeAge = filter_var((int)$data['age'], FILTER_SANITIZE_NUMBER_INT);
   $employeePhoneNumber = filter_var((int)$data['phone_number'], FILTER_SANITIZE_NUMBER_INT);

   $employeeHobbies = [];
   foreach($data as $key => $value) {
      if (str_contains($key, 'hobbie')) {
        array_push($employeeHobbies, filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
      }
   }
  # Returns bool if you need to
  $updateHobbies = updateEmployeeHobbies($employeeId, $employeeHobbies);


  $query = conn()->prepare(
    "UPDATE employees
    SET
      name = '$employeeName',
      email = '$employeeEmail',
      gender_id = (SELECT id FROM genders WHERE name = '$employeeGender'),
      age = $employeeAge,
      phone_number = $employeePhoneNumber,
      city = '$employeeCity'
    WHERE id = $employeeId
    ;");

    try {
        if ($query->execute() && $updateHobbies) {
          return true;
        }
        return false;
    } catch (PDOException $e) {
        return [];
    }
}

function updateEmployeeHobbies($id, $hobbies) {

  $querys[] = conn()->prepare("DELETE FROM employee_hobbies WHERE employee_id = $id;");

  foreach ($hobbies as $hobbie) {
    $querys[] = conn()->prepare(
      "INSERT INTO employee_hobbies (employee_id, hobbie_id)
       VALUES ($id, (SELECT id FROM hobbies WHERE name = '$hobbie'))
    ;");
  }

    try {
        $results = [];
        foreach ($querys as $key => $query) {
          $results[$key] = $query->execute();
          if (!$results[$key]) return false;
        }
        return true;
    } catch (PDOException $e) {
        return [];
    }
}


function deleteEmployeeById($id){

  $query = conn()->prepare(
    "DELETE FROM employees
     WHERE id = '$id'
    ;"
  );

  try {
      if ($query->execute()) {
        return true;
      }
      return false;
  } catch (PDOException $e) {
      return [];
  }





}