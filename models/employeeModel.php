<?php

require_once(MODELS . "/helpers/dbConnection.php");

function getEmployees()
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "SELECT employees.emp_no AS emp_no, first_name, last_name, gender, hire_date, salary, dept_name
			FROM employees
			LEFT JOIN salaries 		ON employees.emp_no = salaries.emp_no
			LEFT JOIN dept_emp 		ON employees.emp_no = dept_emp.emp_no
			LEFT JOIN departments USING (dept_no)
			WHERE salaries.to_date IS NULL
			AND dept_emp.to_date IS NULL
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
		$query = "SELECT employees.emp_no AS emp_no, first_name, last_name, gender, hire_date, salary, dept_no, dept_name
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
