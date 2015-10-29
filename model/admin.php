<?php

namespace model;

class Admin {
	private $email;
	private $password;

	public function __construct() {

	} 

	public function get_email() { return $this->email; }
	public function get_password() { return $this->password; }

	public function set_email($email) { $this->email = $email; }
	public function set_password($password) { $this->password = $password; }

	public static function get_admin($email, $password, $connection) {

		$statement = $connection->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
		
		$statement->bind_param("ss", $email, $password);
		$statement->execute();

		$result = $statement->get_result();
		$admin = new Admin();

		if($result->num_rows == 1) {

			$row = $result->fetch_assoc();
			$email = $row["email"];
			$password = $row["password"];

			$admin->set_email($email);
			$admin->set_password($password);

		} else {

			$admin = NULL;

		}
		
		return $admin;

	}

}
?>