<?php

namespace model;

class Nationality {
	
	private $name;

	public function __construct() {

	}


	public function get_name() { return $this->name; }
	public function set_name($name) { $this->name = $name; }

	public static function get_all_nationality($connection) {

		$statement = $connection->prepare("SELECT * FROM nationality");
		$statement->execute();

		$result = $statement->get_result();
		$nationalities = array();

		while($row = $result->fetch_assoc()) {

			$nationality = new Nationality();
			$nationality->set_name($row["nationality"]);

			array_push($nationalities, $nationality);

		}

		return $nationalities;

	}

	public static function add_nationality($name, $connection) {

		$statement = $connection->prepare("INSERT INTO nationality VALUES (?)");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function delete_nationality($name, $connection) {

		$statement = $connection->prepare("DELETE FROM nationality WHERE nationality = ?");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function update_nationality($name, $new_name, $connection) {

		$statement = $connection->prepare("UPDATE nationality SET nationality = ? WHERE nationality = ?");

		$statement->bind_param("ss", $new_name, $name);
		$statement->execute();

	}

}

?>