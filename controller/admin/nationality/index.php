<?php

//namespace controller\admin\authentication;

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/nationality.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/nationality.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");

use model\Nationality as Nationality;
use model\Database as Database;

class NationalityController {

	private $database;
	private $connection;

	public function __construct() {

		$this->database = new Database();
		$this->connection = $this->database->get_connection();

		session_start();
		
	}

	public function delete() {

		$nationality = $_GET["nationality"];

		Nationality::delete_nationality($nationality, $this->connection);

		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}

}

?>