<!DOCTYPE html>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/location.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/nationality.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/industry.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/position.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/employer.php");

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/authentication/index.php");

use model\Admin as Admin;
use model\Database as Database;
use model\Location as Location;
use model\Nationality as Nationality;
use model\Industry as Industry;
use model\Position as Position;
use model\Employer as Employer;

AuthenticationController::authenticate();

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

			echo "<br />";

			$nationalities = Nationality::get_all_nationality($connection);

			for($i = 0; $i < sizeof($nationalities); $i++) {

				echo $nationalities[$i]->get_name();
				echo "<br />";

			}

			echo "<br />";

			//Industry::add_industry("Banking", $connection);
			//Industry::update_industry("Banking", "Finance", $connection);
			//Industry::delete_industry("Finance", $connection);

			$industries = Industry::get_all_industry($connection);

			for($i = 0; $i < sizeof($industries); $i++) {

				echo $industries[$i]->get_name();
				echo "<br />";

			}

			echo "<br />";

			$positions = Position::get_all_position($connection);

			for($i = 0; $i < sizeof($positions); $i++) {

				echo $positions[$i]->get_name();
				echo "<br />";

			}

			echo "<br />";

			$rnd_employer = new Employer();
			$rnd_employer->set_email("kenneth.ho.cc@gmail.com");
			$rnd_employer->set_password("123456");
			$rnd_employer->set_address("nus");
			$rnd_employer->set_contact(12345677);
			$rnd_employer->set_industry("F&B");
			$rnd_employer->set_about("huh");
			$rnd_employer->set_company_name("some company");
			$rnd_employer->set_license_no("nj2i3n4");

			Employer::update_employer($rnd_employer, $connection);

			$employers = Employer::get_all_employer($connection);

			for($i = 0; $i < sizeof($employers); $i++) {

				$employer = $employers[$i];

				echo $employer->get_email();
				echo " " . $employer->get_industry()->get_name();
				echo "<br />";

			}

			$database->close_connection();

		?>
	</body>
</html>