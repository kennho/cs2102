<!DOCTYPE html>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/location.php");

use model\Admin as Admin;
use model\Database as Database;
use model\Location as Location;

?>

<html>

	<head>
	</head>

	<body>
		<?php
			$database = new Database();
			$connection = $database->get_connection();

			$admin = Admin::get_admin("cxm1512@outlook.com", "dogssocute", $connection);

			if(is_null($admin)) {

				echo "invalid email or password";

			} else {

				echo $admin->get_email();
				echo "<br />";
				echo $admin->get_password();
				echo "<br />";

			}

			$locations = Location::get_all_location($connection);

			for($i = 0; $i < sizeof($locations); $i++) {

				echo $locations[$i]->get_name();
				echo "<br />";

			}

			Location::delete_location("West", $connection);

			Location::add_location("West", $connection);

			$locations = Location::get_all_location($connection);

			for($i = 0; $i < sizeof($locations); $i++) {

				echo $locations[$i]->get_name();
				echo "<br />";

			}

			$database->close_connection();

		?>
	</body>
</html>