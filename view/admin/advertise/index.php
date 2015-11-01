<!DOCTYPE HTML>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/advertise.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/authentication/index.php");

//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/admin.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/database.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/advertise.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/authentication/index.php");

use model\Admin as Admin;
use model\Database as Database;
use model\Advertise as Advertise;

session_start();

AuthenticationController::authenticate();

$database = new Database();
$connection = $database->get_connection();

$advertises = Advertise::get_all_advertise($connection);

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
						<h1>Advertise</h1>

						<div class="createButton button">
							+ Add Advertise
						</div>
					</header>

					<table>
						<tr>
							<th><input id="chkClass" type="checkbox"></th>
							<th>Email</th>
							<th>Title</th>
							<th>Content</th>
							<th>Actions</th>
						</tr>

						<?php

						for($i = 0; $i < sizeof($advertises); $i++) {

							$advertise = $advertises[$i];

							echo "<tr>";
								echo "<td><input type='checkbox'></td>";
								echo "<td>" . $advertise->get_email() . "</td>"; 
								echo "<td>" . $advertise->get_title() . "</td>"; 
								echo "<td>" . $advertise->get_content() . "</td>"; 
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