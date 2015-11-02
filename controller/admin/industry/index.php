<?php

//namespace controller\admin\authentication;

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/industry.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/industry.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");

use model\Industry as Industry;
use model\Database as Database;

class IndustryController {

	private $database;
	private $connection;

	public function __construct() {

		$this->database = new Database();
		$this->connection = $this->database->get_connection();

		session_start();
		
	}

	public function delete() {

		$industry = $_GET["industry"];

		Industry::delete_industry($industry, $this->connection);

		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}

}

?>