<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/model/admin.php");

use model\Admin as Admin;
use model\Database as Database;

session_start();

echo $_SESSION["original_page"];

if(!empty($_SESSION["current_user"])) {

	header("Location: index.php");

}

?>

<html>
	<head>
	</head>

	<body>
		<form action="../../../controller/admin/index.php?action=login" method="post">
			<input name="email" type="text" />
			<input name="password" type="password" />
			<input type="submit" value="Submit" />
		</form>
	</body>
</html>