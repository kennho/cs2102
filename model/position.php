<?php

namespace model;

class Position {
	
	private $name;

	public function __construct() {

	}


	public function get_name() { return $this->name; }
	public function set_name($name) { $this->name = $name; }

	public static function get_all_position($connection) {

		$statement = $connection->prepare("SELECT * FROM position");
		$statement->execute();

		$result = $statement->get_result();
		$positions = array();

		while($row = $result->fetch_assoc()) {

			$position = new Position();
			$position->set_name($row["position"]);

			array_push($positions, $position);

		}

		return $positions;

	}

	public static function add_position($name, $connection) {

		$statement = $connection->prepare("INSERT INTO position VALUES (?)");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function delete_position($name, $connection) {

		$statement = $connection->prepare("DELETE FROM position WHERE position = ?");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function update_position($name, $new_name, $connection) {

		$statement = $connection->prepare("UPDATE position SET position = ? WHERE position = ?");

		$statement->bind_param("ss", $new_name, $name);
		$statement->execute();

	}

}

?>