<?php

namespace model;

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/industry.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/position.php");

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/industry.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/position.php");

use model\Industry as Industry;
use model\Position as Position;

class JobOffer {
	
	private $creator;
	private $date;
	private $title;
	private $position;
	private $industry;
	private $requirement;
	private $years_of_experience;
	private $contact;
	private $description;

	public function __construct() {

	}


	public function get_creator() { return $this->creator; }
	public function get_date() { return $this->date; }
	public function get_title() { return $this->title; }
	public function get_position() { return $this->position; }
	public function get_industry() { return $this->industry; }
	public function get_requirement() { return $this->requirement; }
	public function get_years_of_experience() { return $this->years_of_experience; }
	public function get_contact() { return $this->contact; }
	public function get_description() { return $this->description; }

	public function set_creator($creator) { $this->creator = $creator; }
	public function set_date($date) { $this->date = $date; }
	public function set_title($title) { $this->title = $title; }

	public function set_position($position_name) { 

		$position = new Position();
		$position->set_name($position_name);

		$this->position = $position; 

	}

	public function set_industry($industry_name) { 

		$industry = new Industry();
		$industry->set_name($industry_name);

		$this->industry = $industry; 

	}

	public function set_requirement($requirement) { $this->requirement = $requirement; }
	public function set_years_of_experience($years_of_experience) { $this->years_of_experience = $years_of_experience; }
	public function set_contact($contact) { $this->contact = $contact; }
	public function set_description($description) { $this->description = $description; }

	public static function get_all_job_offer($connection) {

		$statement = $connection->prepare("SELECT * FROM joboffer");
		$statement->execute();

		$result = $statement->get_result();
		$job_offers = array();

		while($row = $result->fetch_assoc()) {

			$job_offer = new JobOffer();
			$job_offer->set_creator($row["creator"]);
			$job_offer->set_date($row["date"]);
			$job_offer->set_title($row["title"]);
			$job_offer->set_position($row["position"]);
			$job_offer->set_industry($row["industry"]);
			$job_offer->set_requirement($row["requirement"]);
			$job_offer->set_years_of_experience($row["yearsOfExp"]);
			$job_offer->set_contact($row["contact"]);
			$job_offer->set_description($row["description"]);

			array_push($job_offers, $job_offer);

		}

		return $job_offers;

	}

	public static function add_job_offer($job_offer, $connection) {

		$statement = $connection->prepare("INSERT INTO joboffer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$statement->bind_param(
			"ssssssiis", 
			$job_offer->get_creator(), 
			$job_offer->get_date(), 
			$job_offer->get_title(), 
			$job_offer->get_position()->get_name(), 
			$job_offer->get_industry()->get_name(), 
			$job_offer->get_requirement(), 
			$job_offer->get_years_of_experience(), 
			$job_offer->get_contact(), 
			$job_offer->get_description());

		$statement->execute();

	}

	public static function delete_job_offer($email, $date, $connection) {

		$statement = $connection->prepare("DELETE FROM jobapplicant WHERE creator = ? AND date = ?");

		$statement->bind_param("ss", $email, $date);
		$statement->execute();

	}

	public static function update_job_offer($job_offer, $connection) {

		$statement = $connection->prepare("UPDATE joboffer SET title = ?, position = ?, industry = ?, requirement = ?, yearsOfExp = ?, contact = ?, description = ? WHERE creator = ? AND date = ?");

		$statement->bind_param(
			"sssssissss", 
			$job_offer->get_title(), 
			$job_offer->get_position()->get_name(), 
			$job_offer->get_industry()->get_name(), 
			$job_offer->get_requirement(), 
			$job_offer->get_years_of_experience(), 
			$job_offer->get_contact(), 
			$job_offer->get_description(),
			$job_offer->get_creator(),
			$job_offer->get_date());

		$statement->execute();

	}

}

?>