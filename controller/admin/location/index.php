<?php

//namespace controller\admin\authentication;

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/location.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/location.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");

use model\Location as Location;
use model\Database as Database;

class LocationController {

	private $database;
	private $connection;

	public function __construct() {

		$this->database = new Database();
		$this->connection = $this->database->get_connection();

		session_start();
		
	}

	public function delete() {

		$location = $_GET["location"];

		Location::delete_location($location, $this->connection);

		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}

}

?>