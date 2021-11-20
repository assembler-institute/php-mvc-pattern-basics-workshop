<?php

require_once(MODELS . "/helpers/dbConnection.php");

function get()
{
	["db" => $db, "errCode" => $errCode] = getDatabaseConnection();

	if ($errCode) return ["errCode" => $errCode];

	try {
		$query = "SELECT emp_no, first_name, last_name, gender, hire_date, salary, dept_name
			FROM employees
			LEFT JOIN salaries 		USING (emp_no)
			LEFT JOIN dept_emp 		USING (emp_no)
			LEFT JOIN departments USING (dept_no)
			WHERE CURRENT_DATE() BETWEEN salaries.from_date AND salaries.to_date
			AND CURRENT_DATE() BETWEEN dept_emp.from_date AND dept_emp.to_date
		;";

		$stmt = $db->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll();

		return [
			"data" => $data,
			"errCode" => null,
		];
	} catch (Throwable $e) {
		echo $e->getMessage();
		return [
			"data" => null,
			"errCode" => $e->getCode(),
		];
	}
}

function getById($id)
{
	["db" => $db, "errCode" => $errCode] = getDatabaseConnection();

	if ($errCode) return ["errCode" => $errCode];

	try {
		$query = "SELECT first_name, last_name, gender, hire_date, salary, dept_name
			FROM employees
			LEFT JOIN salaries 		USING (emp_no)
			LEFT JOIN dept_emp 		USING (emp_no)
			LEFT JOIN departments USING (dept_no)
			WHERE CURRENT_DATE() BETWEEN salaries.from_date AND salaries.to_date
			AND CURRENT_DATE() BETWEEN dept_emp.from_date AND dept_emp.to_date
			AND emp_no = ?
		;";

		$stmt = $db->prepare($query);
		$stmt->execute([$id]);
		$data = $stmt->fetchAll();

		return [
			"data" => $data,
			"errCode" => null,
		];
	} catch (Throwable $e) {
		echo $e->getMessage();
		return [
			"data" => null,
			"errCode" => $e->getCode(),
		];
	}
}
