<?php

namespace model;

class Database {
	
	private $db_host = "localhost";
	private $db_name = "joboffer_db";
	private $db_user = "root";
	private $db_password = "";

	private $connection;

	public function __construct() {

		$this->connection = new \mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

	}

	public function get_connection() { 

		return $this->connection; 

	}

	public function close_connection() { 

		return mysqli_close($this->connection); 

	}
}

?>