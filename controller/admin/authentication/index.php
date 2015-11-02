<?php

//namespace controller\admin\authentication;

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/admin.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");

use model\Admin as Admin;
use model\Database as Database;

class AuthenticationController {

	private $database;
	private $connection;

	public function __construct() {

		$this->database = new Database();
		$this->connection = $this->database->get_connection();

		session_start();
		
	}

	public function login() {

		$email = $_POST["email"];
		$password = $_POST["password"];

		$user = Admin::get_admin($email, $password, $this->connection);

		if(empty($user)) {

			header("Location: ../../view/admin/authentication/index.php");

		} else {

			$_SESSION["current_user"] = $user;
			header("Location: " . $_SESSION["original_page"]);

		}

	}

	public function logout() {



	}

	public static function authenticate() {

		if(empty($_SESSION["current_user"])) {
			
			$_SESSION["original_page"] = $_SERVER["REQUEST_URI"];
			//header("Location: " . "http://" . $_SERVER["SERVER_NAME"] . "/kenneth/cs2102_admin/view/admin/authentication/index.php");
			header("Location: " . "http://" . $_SERVER["SERVER_NAME"] . "/cs2102/view/admin/authentication/index.php");

		} 

	}

}

?>