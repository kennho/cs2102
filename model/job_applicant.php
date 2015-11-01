<?php

namespace model;

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/industry.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/location.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/nationality.php");

use model\Industry as Industry;
use model\Location as Location;
use model\Nationality as Nationality;

class JobApplicant {
	
	private $email;
	private $password;
	private $first_name;
	private $last_name;
	private $industry;
	private $about;
	private $contact;
	private $nationality;
	private $birthday;
	private $location;

	public function __construct() {

	}


	public function get_email() { return $this->email; }
	public function get_password() { return $this->password; }
	public function get_first_name() { return $this->first_name; }
	public function get_last_name() { return $this->last_name; }
	public function get_industry() { return $this->industry; }
	public function get_about() { return $this->about; }
	public function get_contact() { return $this->contact; }
	public function get_nationality() { return $this->nationality; }
	public function get_birthday() { return $this->birthday; }
	public function get_location() { return $this->location; }

	public function set_email($email) { $this->email = $email; }
	public function set_password($password) { $this->password = $password; }
	public function set_first_name($first_name) { $this->first_name = $first_name; }
	public function set_last_name($last_name) { $this->last_name = $last_name; }

	public function set_industry($industry_name) { 

		$industry = new Industry();
		$industry->set_name($industry_name);

		$this->industry = $industry; 

	}

	public function set_about($about) { $this->about = $about; }
	public function set_contact($contact) { $this->contact = $contact; }

	public function set_nationality($nationality_name) { 

		$nationality = new Nationality();
		$nationality->set_name($nationality_name);

		$this->nationality = $nationality; 

	}

	public function set_birthday($birthday) { $this->birthday = $birthday; }

	public function set_location($location_name) { 

		$location = new Location();
		$location->set_name($location_name);

		$this->location = $location; 

	}

	public static function get_all_job_applicant($connection) {

		$statement = $connection->prepare("SELECT * FROM jobapplicant");
		$statement->execute();

		$result = $statement->get_result();
		$job_applicants = array();

		while($row = $result->fetch_assoc()) {

			$job_applicant = new JobApplicant();
			$job_applicant->set_email($row["email"]);
			$job_applicant->set_password($row["password"]);
			$job_applicant->set_first_name($row["first_name"]);
			$job_applicant->set_last_name($row["last_name"]);
			$job_applicant->set_industry($row["industry"]);
			$job_applicant->set_about($row["about_me"]);
			$job_applicant->set_contact($row["contact"]);
			$job_applicant->set_nationality($row["nationality"]);
			$job_applicant->set_birthday($row["birthday"]);
			$job_applicant->set_location($row["location"]);

			array_push($job_applicants, $job_applicant);

		}

		return $job_applicants;

	}

	public static function add_job_applicant($job_applicant, $connection) {

		$statement = $connection->prepare("INSERT INTO jobapplicant VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$statement->bind_param(
			"ssssssisss", 
			$job_applicant->get_email(), 
			$job_applicant->get_password(), 
			$job_applicant->get_first_name(), 
			$job_applicant->get_last_name(), 
			$job_applicant->get_industry()->get_name(), 
			$job_applicant->get_about(), 
			$job_applicant->get_contact(), 
			$job_applicant->get_nationality()->get_name(), 
			$job_applicant->get_birthday(),
			$job_applicant->get_location()->get_name());

		$statement->execute();

	}

	public static function delete_job_applicant($email, $connection) {

		$statement = $connection->prepare("DELETE FROM jobapplicant WHERE email = ?");

		$statement->bind_param("s", $email);
		$statement->execute();

	}

	public static function update_job_applicant($job_applicant, $connection) {

		$statement = $connection->prepare("UPDATE jobapplicant SET password = ?, first_name = ?, last_name = ?, industry = ?, about = ?, contact = ?, nationality = ?, birthday = ?, location = ? WHERE email = ?");

		$statement->bind_param(
			"sssssissss", 
			$job_applicant->get_password(), 
			$job_applicant->get_first_name(),
			$job_applicant->get_last_name(),
			$job_applicant->get_industry()->get_name(),
			$job_applicant->get_about(),
			$job_applicant->get_contact(),
			$job_applicant->get_nationality()->get_name(),
			$job_applicant->get_birthday(),
			$job_applicant->get_location()->get_name(),
			$job_applicant->get_email());

		$statement->execute();

	}

}

?>