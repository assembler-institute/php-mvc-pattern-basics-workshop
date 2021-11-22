<?php

require_once("./config/db.php");

function getDatabaseConnection()
{
	try {
		$db = new PDO(DB_CONFIG["DSN"], DB_CONFIG['USER'], DB_CONFIG['PASSWORD'], [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		]);

		return [
			"db" => $db,
			"errorCode" => null
		];
	} catch (Throwable $e) {
		return [
			"db" => null,
			"errorCode" => $e->getCode()
		];
	}
}
