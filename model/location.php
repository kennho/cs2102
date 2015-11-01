<?php

namespace model;

class Location {
	
	private $name;

	public function __construct() {

	}


	public function get_name() { return $this->name; }
	public function set_name($name) { $this->name = $name; }

	public static function get_all_location($connection) {

		$statement = $connection->prepare("SELECT * FROM location");
		$statement->execute();

		$result = $statement->get_result();
		$locations = array();

		while($row = $result->fetch_assoc()) {

			$location = new Location();
			$location->set_name($row["location"]);

			array_push($locations, $location);

		}

		return $locations;

	}

	public static function add_location($name, $connection) {

		$statement = $connection->prepare("INSERT INTO location VALUES (?)");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function delete_location($name, $connection) {

		$statement = $connection->prepare("DELETE FROM location WHERE location = ?");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function update_location($name, $new_name, $connection) {

		$statement = $connection->prepare("UPDATE location set location = ? WHERE location = ?");

		$statement->bind_param("ss", $new_name, $name);
		$statement->execute();

	}

}

?>