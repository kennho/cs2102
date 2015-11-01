<!DOCTYPE HTML>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/job_offer.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/authentication/index.php");

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/admin.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/job_offer.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/authentication/index.php");

use model\Admin as Admin;
use model\Database as Database;
use model\JobOffer as JobOffer;

session_start();

AuthenticationController::authenticate();

$database = new Database();
$connection = $database->get_connection();

$job_offers = JobOffer::get_all_job_offer($connection);

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Management System</title>

		<!-- stylesheets -->
		<link href="../../../stylesheet/reset.css" rel="stylesheet" type="text/css">
		<link href="../../../stylesheet/icon.css" rel="stylesheet" type="text/css">
		<link href="../../../stylesheet/default.css" rel="stylesheet" type="text/css">
		<link href="../../../stylesheet/content.css" rel="stylesheet" type="text/css">

		<!-- javascript -->
		<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="../../../javascript/default.js"></script>
		<script language="javascript" type="text/javascript">
			//$(document).ready(initContent);
			$(document).ready(initClick);
		</script>
	</head>

	<body>
		<div class="screenResolution">
			<!--include status_bar-->
			<?php include "../shared/status_bar.php" ?>

			<main>
				<!--include sidebar-->
				<?php include "../shared/sidebar.php" ?>

				<div id="content">

					<header class="clearfix">
						<h1>Job Offer</h1>

						<div class="createButton button">
							+ Add Job Offer
						</div>
					</header>

					<table>
						<tr>
							<th><input id="chkClass" type="checkbox"></th>
							<th>Creator</th>
							<th>Date</th>
							<th>Title</th>
							<th>Position</th>
							<th>Industry</th>
							<th>Requirement</th>
							<th>Years of Experience</th>
							<th>Contact</th>
							<th>Description</th>
							<th>Action</th>
						</tr>

						<?php

						for($i = 0; $i < sizeof($job_offers); $i++) {

							$job_offer = $job_offers[$i];

							echo "<tr>";
								echo "<td><input type='checkbox'></td>";
								echo "<td>" . $job_offer->get_creator() . "</td>"; 
								echo "<td>" . $job_offer->get_date() . "</td>"; 
								echo "<td>" . $job_offer->get_title() . "</td>"; 
								echo "<td>" . $job_offer->get_position()->get_name() . "</td>"; 
								echo "<td>" . $job_offer->get_industry()->get_name() . "</td>"; 
								echo "<td>" . $job_offer->get_requirement() . "</td>"; 
								echo "<td>" . $job_offer->get_years_of_experience() . "</td>"; 
								echo "<td>" . $job_offer->get_contact() . "</td>"; 
								echo "<td>" . $job_offer->get_description() . "</td>"; 
								echo "<td>";
									echo "<span class='icon'><i aria-hidden='true' class='iconPencil'></i></span>";
									echo "<span class='icon'><i aria-hidden='true' class='iconDelete'></i></span>";
								echo "</td>";
							echo "</tr>";

						}

						?>
					</table>

				</div><!-- end content -->
			</main>

			<div id="overlay">
			</div><!-- end overlay -->

			<div id="lightbox">
			</div><!-- end lightbox -->
		</div><!-- end screenResolution -->
	</body>
</html>