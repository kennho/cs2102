<?php

//namespace controller\admin\authentication;

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/job_applicant.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/job_applicant.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");

use model\JobApplicant as JobApplicant;
use model\Database as Database;

class JobApplicantController {

	private $database;
	private $connection;

	public function __construct() {

		$this->database = new Database();
		$this->connection = $this->database->get_connection();

		session_start();
		
	}

	public function delete() {

		$email = $_GET["email"];

		JobApplicant::delete_job_applicant($email, $this->connection);

		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}

}

?>