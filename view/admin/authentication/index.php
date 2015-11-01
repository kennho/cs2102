<?php

session_start();

//echo $_SESSION["original_page"];

if(!empty($_SESSION["current_user"])) {

	header("Location: http://localhost/cs2102/view/admin/");
	//header("Location: http://experiment.thewhiteconcept.com/kenneth/cs2102_admin/view/admin/");

}

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
		<link href="../../../stylesheet/login.css" rel="stylesheet" type="text/css">

		<!-- javascript -->
		<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="../../../javascript/default.js"></script>
		<script language="javascript" type="text/javascript">
			//$(document).ready(initContent);
			//$(document).ready(initClick);
		</script>
	</head>

	<body>
		<header>
			<h1>Management System</h1>
			<br />
		</header>

		<form action="../../../controller/admin/index.php?action=login" method="post">
			<div id="loginForm">
				<div class="textboxPanel">
					<label for="email">Email</label><br />
					<input name="email" type="textbox">
				</div>

				<div class="textboxPanel">
					<label for="password">Password</label><br />
					<input name="password" type="password">
				</div>

				<input class="button floatRight" type="submit" value="Login" />
			</div>
		</form>

	</body>
</html>