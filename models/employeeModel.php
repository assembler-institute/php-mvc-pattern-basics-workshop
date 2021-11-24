<?php

require_once(MODELS . "/helpers/dbConnection.php");

function getEmployees()
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "SELECT employees.emp_no AS emp_no, first_name, last_name, gender, hire_date, birth_date, salary, dept_name
			FROM employees
			LEFT JOIN salaries 		ON employees.emp_no = salaries.emp_no
			LEFT JOIN dept_emp 		ON employees.emp_no = dept_emp.emp_no
			LEFT JOIN departments USING (dept_no)
			WHERE (salaries.to_date IS NULL OR salaries.from_date IS NULL)
			AND 	(dept_emp.to_date IS NULL OR dept_emp.from_date IS NULL)
		;";

		$stmt = $db->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll();

		return [
			"data" => $data,
			"errorCode" => null,
		];
	} catch (Throwable $e) {
		return [
			"data" => null,
			"errorCode" => $e->getCode(),
		];
	}
}

function getEmployee($id)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "SELECT employees.emp_no AS emp_no, first_name, last_name, gender, hire_date, birth_date, salary, dept_no, dept_name
			FROM employees
			LEFT JOIN salaries 		ON employees.emp_no = salaries.emp_no
			LEFT JOIN dept_emp 		ON employees.emp_no = dept_emp.emp_no
			LEFT JOIN departments USING (dept_no)
			WHERE salaries.to_date IS NULL
			AND dept_emp.to_date IS NULL
			AND employees.emp_no = ?
		;";

		$stmt = $db->prepare($query);
		$stmt->execute([$id]);
		$data = $stmt->fetch();

		return [
			"data" => $data,
			"errorCode" => null,
		];
	} catch (Throwable $e) {
		return [
			"data" => null,
			"errorCode" => $e->getCode(),
		];
	}
}

function deleteEmployee($id)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "DELETE FROM employees WHERE emp_no = ?;";

		$stmt = $db->prepare($query);
		$stmt->execute([$id]);
		$data = $stmt->fetch();

		return [
			"data" => $data,
			"errorCode" => null,
		];
	} catch (Throwable $e) {
		return [
			"data" => null,
			"errorCode" => $e->getCode(),
		];
	}
}

function updateEmployee($request)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$db->beginTransaction();

		$query = "UPDATE employees SET first_name = :first_name, last_name = :last_name, gender = :gender, birth_date = :birth_date WHERE emp_no = :emp_no;";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":emp_no", 		$request["emp_no"]);
		$stmt->bindParam(":first_name", $request["first_name"]);
		$stmt->bindParam(":last_name", 	$request["last_name"]);
		$stmt->bindParam(":gender", 		$request["gender"]);
		$stmt->bindParam(":birth_date", $request["birth_date"]);
		$stmt->execute();

		// CHECK IF A EMPLOYEE SALARY REGISTER EXISTS

		$query = "SELECT emp_no FROM salaries WHERE emp_no = :emp_no";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":emp_no", $request["emp_no"]);
		$stmt->execute();
		$salaryExists = boolval($stmt->rowCount());

		// SET END DATE FOR CURRENT SALARY IF:
		// - IT EXISTS
		// - NEW SALARY IS DIFERENT

		if ($salaryExists) {
			$query = "UPDATE salaries SET to_date = CURRENT_DATE WHERE emp_no = :emp_no AND salary != :salary AND to_date IS NULL;";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":emp_no", $request["emp_no"]);
			$stmt->bindParam(":salary", $request["salary"]);
			$stmt->execute();
			$salaryUpdated = boolval($stmt->rowCount());
		} else {
			$salaryUpdated = false;
		}

		// INSERT NEW SALARY IF:
		// - THERE IS NOT ANY SALARY YET
		// - CURRENT SALARY END DATE HAS BEEN SET

		if ($salaryUpdated || !$salaryExists) {
			$query = "INSERT INTO salaries (emp_no, salary) VALUES (:emp_no, :salary);";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":emp_no", $request["emp_no"]);
			$stmt->bindParam(":salary", $request["salary"]);
			$stmt->execute();
		}

		// CHECK IF A EMPLOYEE DEPARTMENT REGISTER EXISTS

		$query = "SELECT emp_no FROM dept_emp WHERE emp_no = :emp_no";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":emp_no", $request["emp_no"]);
		$stmt->execute();
		$departmentExists = boolval($stmt->rowCount());

		// SET END DATE FOR CURRENT DEPARTMENT IF:
		// - IT EXISTS
		// - NEW DEPARTMENT IS DIFERENT

		if ($departmentExists) {
			$query = "UPDATE dept_emp SET to_date = CURRENT_DATE WHERE emp_no = :emp_no AND dept_no != :dept_no AND to_date IS NULL;";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":dept_no", $request["dept_no"]);
			$stmt->bindParam(":emp_no",  $request["emp_no"]);
			$stmt->execute();
			$departmentUpdated = boolval($stmt->rowCount());
		} else {
			$departmentUpdated = false;
		}

		// INSERT NEW DEPARTMENT IF:
		// - THERE IS NOT ANY DEPARTMENT YET
		// - CURRENT DEPARTMENT END DATE HAS BEEN SET

		if ($departmentUpdated || !$departmentExists) {
			$query = "INSERT INTO dept_emp (dept_no, emp_no) VALUES (:dept_no, :emp_no);";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":dept_no", $request["dept_no"]);
			$stmt->bindParam(":emp_no",  $request["emp_no"]);
			$stmt->execute();
		}

		$data = $db->commit();

		return [
			"data" => $data,
			"errorCode" => null,
		];
	} catch (Throwable $e) {
		$db->rollBack();

		return [
			"data" => null,
			"errorCode" => $e->getCode(),
		];
	}
}

function createEmployee($request)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$db->beginTransaction();

		$query = "INSERT INTO employees (first_name, last_name, birth_date, gender) VALUES (:first_name, :last_name, :birth_date, :gender)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":first_name", $request["first_name"]);
		$stmt->bindParam(":last_name", 	$request["last_name"]);
		$stmt->bindParam(":birth_date", $request["birth_date"]);
		$stmt->bindParam(":gender", 		$request["gender"]);
		$stmt->execute();

		// GET NEW EMPLOYEE ID

		$query = "SELECT MAX(emp_no) AS id FROM employees";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$id = $stmt->fetch()["id"];

		// SET SALARY IF EXISTS IN THE REQUEST

		if (isset($request["salary"]) && strlen($request["salary"])) {
			$query = "INSERT INTO salaries (emp_no, salary) VALUES (:emp_no, :salary);";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":emp_no", $id);
			$stmt->bindParam(":salary", $request["salary"]);
			$stmt->execute();
		}

		// SET DEPARTMENT IF EXISTS IN THE REQUEST

		if (isset($request["dept_no"]) && strlen($request["dept_no"])) {
			$query = "INSERT INTO dept_emp (emp_no, dept_no) VALUES (:emp_no, :dept_no);";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":emp_no", $id);
			$stmt->bindParam(":dept_no", $request["dept_no"]);
			$stmt->execute();
		}

		$data = $db->commit();

		return [
			"data" => $data,
			"errorCode" => null,
		];
	} catch (Throwable $e) {
		$db->rollBack();

		return [
			"data" => null,
			"errorCode" => $e->getCode(),
		];
	}
}
