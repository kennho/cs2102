<!DOCTYPE HTML>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/model/admin.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/authentication/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/authentication/index.php");

use model\Admin as Admin;

session_start();

AuthenticationController::authenticate();

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Management System</title>

		<!-- stylesheets -->
		<link href="../../stylesheet/reset.css" rel="stylesheet" type="text/css">
		<link href="../../stylesheet/icon.css" rel="stylesheet" type="text/css">
		<link href="../../stylesheet/default.css" rel="stylesheet" type="text/css">
		<link href="../../stylesheet/content.css" rel="stylesheet" type="text/css">

		<!-- javascript -->
		<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="../../javascript/default.js"></script>
		<script language="javascript" type="text/javascript">
			//$(document).ready(initContent);
			$(document).ready(initClick);
		</script>
	</head>

	<body>
		<div class="screenResolution">
			<!--include status_bar-->
			<?php include "shared/status_bar.php" ?>

			<main>
				<!--include sidebar-->
				<?php include "shared/sidebar.php" ?>

				<div id="content">
					<div class="actionBar">
						<h1>Dashboard</h1>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconMale"></i></span>
						<span class="text">Class</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconCalendar"></i></span>
						<span class="text">Check Schedule</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconPencil"></i></span>
						<span class="text">Booking</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconClipboard"></i></span>
						<span class="text">Invoice</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconDocuments"></i></span>
						<span class="text">Sales Report</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconCompany"></i></span>
						<span class="text">Manage Company</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconMoney"></i></span>
						<span class="text">Manage Payment</span>
					</div>

					<div class="tile">
						<span class="icon"><i aria-hidden="true" class="iconGears"></i></span>
						<span class="text">Settings</span>
					</div>
				</div><!-- end content -->
			</main>

			<div id="overlay">
			</div><!-- end overlay -->

			<div id="lightbox">
			</div><!-- end lightbox -->
		</div><!-- end screenResolution -->
	</body>
</html>