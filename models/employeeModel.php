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

		// Salary Update

		$query = "UPDATE salaries SET to_date = CURRENT_DATE WHERE emp_no = :emp_no AND salary != :salary AND to_date IS NULL;";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":emp_no", $request["emp_no"]);
		$stmt->bindParam(":salary", $request["salary"]);
		$stmt->execute();

		$query = "INSERT INTO salaries (emp_no, salary) VALUES (:emp_no, :salary);";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":emp_no", $request["emp_no"]);
		$stmt->bindParam(":salary", $request["salary"]);
		$stmt->execute();

		// Department Update

		$query = "UPDATE dept_emp SET to_date = CURRENT_DATE WHERE emp_no = :emp_no AND dept_no != :dept_no AND to_date IS NULL;";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":dept_no", $request["dept_no"]);
		$stmt->bindParam(":emp_no",  $request["emp_no"]);
		$stmt->execute();

		$query = "INSERT INTO dept_emp (dept_no, emp_no) VALUES (:dept_no, :emp_no);";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":dept_no", $request["dept_no"]);
		$stmt->bindParam(":emp_no",  $request["emp_no"]);
		$stmt->execute();


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
