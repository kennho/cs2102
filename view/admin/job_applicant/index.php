<!DOCTYPE HTML>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/job_applicant.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/authentication/index.php");

use model\Admin as Admin;
use model\Database as Database;
use model\JobApplicant as JobApplicant;

session_start();

AuthenticationController::authenticate();

$database = new Database();
$connection = $database->get_connection();

$job_applicants = JobApplicant::get_all_job_applicant($connection);

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
						<h1>Job Applicant</h1>

						<div class="createButton button">
							+ Add Job Applicant
						</div>
					</header>

					<table>
						<tr>
							<th><input id="chkClass" type="checkbox"></th>
							<th>Email</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Industry</th>
							<th>About Me</th>
							<th>Contact</th>
							<th>Nationality</th>
							<th>Birthday</th>
							<th>Location</th>
							<th>Action</th>
						</tr>

						<?php

						for($i = 0; $i < sizeof($job_applicants); $i++) {

							$job_applicant = $job_applicants[$i];

							echo "<tr>";
								echo "<td><input type='checkbox'></td>";
								echo "<td>" . $job_applicant->get_email() . "</td>"; 
								echo "<td>" . $job_applicant->get_first_name() . "</td>"; 
								echo "<td>" . $job_applicant->get_last_name() . "</td>"; 
								echo "<td>" . $job_applicant->get_industry()->get_name() . "</td>"; 
								echo "<td>" . $job_applicant->get_about() . "</td>"; 
								echo "<td>" . $job_applicant->get_contact() . "</td>"; 
								echo "<td>" . $job_applicant->get_nationality()->get_name() . "</td>"; 
								echo "<td>" . $job_applicant->get_birthday() . "</td>"; 
								echo "<td>" . $job_applicant->get_location()->get_name() . "</td>"; 
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