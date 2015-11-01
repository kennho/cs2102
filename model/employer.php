<?php

namespace model;

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/industry.php");

use model\Industry as Industry;

class Employer {
	
	private $email;
	private $password;
	private $address;
	private $contact;
	private $industry;
	private $about;
	private $company_name;
	private $license_no;
	private $logo;

	public function __construct() {

	}


	public function get_email() { return $this->email; }
	public function get_password() { return $this->password; }
	public function get_address() { return $this->address; }
	public function get_contact() { return $this->contact; }
	public function get_industry() { return $this->industry; }
	public function get_about() { return $this->about; }
	public function get_company_name() { return $this->company_name; }
	public function get_license_no() { return $this->license_no; }
	public function get_logo() { return $this->logo; }

	public function set_email($email) { $this->email = $email; }
	public function set_password($password) { $this->password = $password; }
	public function set_address($address) { $this->address = $address; }
	public function set_contact($contact) { $this->contact = $contact; }

	public function set_industry($industry_name) { 

		$industry = new Industry();
		$industry->set_name($industry_name);

		$this->industry = $industry; 

	}

	public function set_about($about) { $this->about = $about; }
	public function set_company_name($company_name) { $this->company_name = $company_name; }
	public function set_license_no($license_no) { $this->license_no = $license_no; }
	public function set_logo($logo) { $this->logo = $logo; }

	public static function get_all_employer($connection) {

		$statement = $connection->prepare("SELECT * FROM employer");
		$statement->execute();

		$result = $statement->get_result();
		$employers = array();

		while($row = $result->fetch_assoc()) {

			$employer = new Employer();
			$employer->set_email($row["email"]);
			$employer->set_password($row["password"]);
			$employer->set_address($row["address"]);
			$employer->set_contact($row["contact"]);
			$employer->set_industry($row["industry"]);
			$employer->set_about($row["about"]);
			$employer->set_company_name($row["company_name"]);
			$employer->set_license_no($row["licence_no"]);
			$employer->set_logo($row["logo"]);

			array_push($employers, $employer);

		}

		return $employers;

	}

	public static function add_employer($employer, $connection) {

		$statement = $connection->prepare("INSERT INTO employer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$statement->bind_param(
			"sssisssss", 
			$employer->get_email(), 
			$employer->get_password(), 
			$employer->get_address(), 
			$employer->get_contact(), 
			$employer->get_industry()->get_name(), 
			$employer->get_about(), 
			$employer->get_company_name(), 
			$employer->get_license_no(), 
			$employer->get_logo());

		$statement->execute();

	}

	public static function delete_employer($email, $connection) {

		$statement = $connection->prepare("DELETE FROM employer WHERE email = ?");

		$statement->bind_param("s", $email);
		$statement->execute();

	}

	public static function update_employer($employer, $connection) {

		$statement = $connection->prepare("UPDATE employer SET password = ?, address = ?, contact = ?, industry = ?, about = ?, company_name = ?, licence_no = ?, logo = ? WHERE email = ?");

		$statement->bind_param(
			"ssissssss", 
			$employer->get_password(), 
			$employer->get_address(),
			$employer->get_contact(),
			$employer->get_industry()->get_name(),
			$employer->get_about(),
			$employer->get_company_name(),
			$employer->get_license_no(),
			$employer->get_logo(),
			$employer->get_email());

		$statement->execute();

	}

}

?>