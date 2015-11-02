<?php

//namespace controller\admin\authentication;

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/position.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/position.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");

use model\Position as Position;
use model\Database as Database;

class PositionController {

	private $database;
	private $connection;

	public function __construct() {

		$this->database = new Database();
		$this->connection = $this->database->get_connection();

		session_start();
		
	}

	public function delete() {

		$position = $_GET["position"];

		Position::delete_position($position, $this->connection);

		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}

}

?>