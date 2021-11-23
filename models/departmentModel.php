<?php

require_once(MODELS . "/helpers/dbConnection.php");

function getDepartments()
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "SELECT 
			departments.dept_no AS dept_no,
			departments.dept_name AS dept_name,
			SUM(
				IF(
					dept_emp.emp_no IS NOT NULL AND dept_emp.to_date IS NULL, 1, 0
				)
			) AS total_employees,
			IF(dept_manager.emp_no IS NOT NULL, CONCAT(first_name, ' ', last_name), 'None') AS manager_name,
			IF(dept_manager.emp_no IS NOT NULL, dept_manager.from_date, 'None') AS manager_date  
			FROM departments
			LEFT JOIN dept_emp 			ON departments.dept_no = dept_emp.dept_no
			LEFT JOIN dept_manager 	ON departments.dept_no = dept_manager.dept_no
			LEFT JOIN employees			ON dept_manager.emp_no = employees.emp_no
			WHERE dept_manager.to_date IS NULL
			GROUP BY departments.dept_no
			ORDER BY dept_no
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

function getDepartment($id)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "SELECT 
			departments.dept_no AS dept_no,
			departments.dept_name AS dept_name,
			dept_manager.emp_no AS manager_no,
			CONCAT(first_name, ' ', last_name) AS manager_name 
			FROM departments
			LEFT JOIN dept_manager 	ON departments.dept_no = dept_manager.dept_no
			LEFT JOIN employees			ON dept_manager.emp_no = employees.emp_no
			WHERE dept_manager.to_date IS NULL
			AND departments.dept_no = ?
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

function deleteDepartment($id)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$query = "DELETE FROM departments WHERE dept_no = ?;";

		$stmt = $db->prepare($query);
		$stmt->execute([$id]);
		$data = $stmt->rowCount();

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

function updateDepartment($request)
{
	["db" => $db, "errorCode" => $errorCode] = getDatabaseConnection();

	if ($errorCode) return ["errorCode" => $errorCode];

	try {
		$db->beginTransaction();

		$query = "UPDATE departments SET dept_name = :dept_name WHERE dept_no = :dept_no;";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":dept_no", 		$request["dept_no"]);
		$stmt->bindParam(":dept_name", 	$request["dept_name"]);
		$stmt->execute();

		$query = "UPDATE dept_manager SET to_date = CURRENT_DATE WHERE dept_no = :dept_no AND emp_no != :manager_no AND to_date IS NULL;";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":dept_no", 		$request["dept_no"]);
		$stmt->bindParam(":manager_no", $request["manager_no"]);
		$stmt->execute();

		$query = "INSERT INTO dept_manager (dept_no, emp_no) VALUES (:dept_no, :manager_no);";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":dept_no", 		$request["dept_no"]);
		$stmt->bindParam(":manager_no", $request["manager_no"]);
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
