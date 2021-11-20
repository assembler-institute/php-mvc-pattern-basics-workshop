<?php

require_once(MODELS . "/helpers/dbConnection.php");

function get()
{
	["db" => $db, "errCode" => $errCode] = getDatabaseConnection();

	if ($errCode) return ["errCode" => $errCode];

	try {
		$query = "SELECT 
			departments.dept_no,
			departments.dept_name,
			SUM(IF(dept_emp.emp_no IS NOT NULL, 1, 0)) AS total_employees,
			IF(dept_manager.emp_no IS NOT NULL, CONCAT(first_name, ' ', last_name), 'None') AS manager 
			FROM departments
			LEFT JOIN dept_emp 			ON departments.dept_no = dept_emp.dept_no
			LEFT JOIN dept_manager 	ON departments.dept_no = dept_manager.dept_no
			LEFT JOIN employees			ON dept_manager.emp_no = employees.emp_no
			WHERE CURRENT_DATE() 	BETWEEN dept_emp.from_date AND dept_emp.to_date
			AND CURRENT_DATE() 		BETWEEN dept_manager.from_date AND dept_manager.to_date
			GROUP BY departments.dept_no
			ORDER by CAST(departments.dept_no AS UNSIGNED)
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
		$query = "SELECT 
			departments.dept_no,
			departments.dept_name,
			SUM(IF(dept_emp.emp_no IS NOT NULL, 1, 0)) AS total_employees,
			IF(dept_manager.emp_no IS NOT NULL, CONCAT(first_name, ' ', last_name), 'None') AS manager 
			FROM departments
			LEFT JOIN dept_emp 			ON departments.dept_no = dept_emp.dept_no
			LEFT JOIN dept_manager 	ON departments.dept_no = dept_manager.dept_no
			LEFT JOIN employees			ON dept_manager.emp_no = employees.emp_no
			WHERE departments.dept_no = ?
			AND CURRENT_DATE() BETWEEN dept_emp.from_date AND dept_emp.to_date
			AND CURRENT_DATE() BETWEEN dept_manager.from_date AND dept_manager.to_date
			GROUP BY departments.dept_no
			ORDER by CAST(departments.dept_no AS UNSIGNED)
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
