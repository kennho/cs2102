<?php

namespace model;

class Industry {
	
	private $name;

	public function __construct() {

	}


	public function get_name() { return $this->name; }
	public function set_name($name) { $this->name = $name; }

	public static function get_all_industry($connection) {

		$statement = $connection->prepare("SELECT * FROM industry");
		$statement->execute();

		$result = $statement->get_result();
		$industries = array();

		while($row = $result->fetch_assoc()) {

			$industry = new Industry();
			$industry->set_name($row["industry"]);

			array_push($industries, $industry);

		}

		return $industries;

	}

	public static function add_industry($name, $connection) {

		$statement = $connection->prepare("INSERT INTO industry VALUES (?)");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function delete_industry($name, $connection) {

		$statement = $connection->prepare("DELETE FROM industry WHERE industry = ?");

		$statement->bind_param("s", $name);
		$statement->execute();

	}

	public static function update_industry($name, $new_name, $connection) {

		$statement = $connection->prepare("UPDATE industry SET industry = ? WHERE industry = ?");

		$statement->bind_param("ss", $new_name, $name);
		$statement->execute();

	}

}

?>