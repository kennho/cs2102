<?php

namespace model;

class Advertise {
	
	private $email;
	private $title;
	private $content;

	public function __construct() {

	}


	public function get_email() { return $this->email; }
	public function get_title() { return $this->title; }
	public function get_content() { return $this->content; }

	public function set_email($email) { $this->email = $email; }
	public function set_title($title) { $this->title = $title; }
	public function set_content($content) { $this->content = $content; }

	public static function get_all_advertise($connection) {

		$statement = $connection->prepare("SELECT * FROM advertise");
		$statement->execute();

		$result = $statement->get_result();
		$advertises = array();

		while($row = $result->fetch_assoc()) {

			$advertise = new Advertise();
			$advertise->set_email($row["email"]);
			$advertise->set_title($row["title"]);
			$advertise->set_content($row["content"]);

			array_push($advertises, $advertise);

		}

		return $advertises;

	}

	public static function add_advertise($advertise, $connection) {

		$statement = $connection->prepare("INSERT INTO advertise VALUES (?, ?, ?)");

		$statement->bind_param(
			"sss", 
			$advertise->get_email(),
			$advertise->get_title(),
			$advertise->get_content());

		$statement->execute();

	}

	public static function delete_advertise($email, $title, $content, $connection) {

		$statement = $connection->prepare("DELETE FROM advertise WHERE email = ? AND title = ? AND content = ?");

		$statement->bind_param("sss", $email, $title, $content);
		$statement->execute();

	}

	public static function update_advertise($advertise, $new_advertise, $connection) {

		$statement = $connection->prepare("UPDATE advertise SET email = ?, title = ?, content = ? WHERE email = ? AND title = ? AND content = ?");

		$statement->bind_param(
			"ssssss", 
			$new_advertise->get_email(),
			$new_advertise->get_title(),
			$new_advertise->get_content(),
			$advertise->get_email(),
			$advertise->get_title(),
			$advertise->get_content());

		$statement->execute();

	}

}

?>