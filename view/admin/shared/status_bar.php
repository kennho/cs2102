<?php

$root_url = "http://" . $_SERVER["SERVER_NAME"] . "/cs2102/view/admin/";
$current_user = $_SESSION["current_user"];

?>

<header id="statusBar" class="clearfix">	
	<?php echo "<a href='" . $root_url . "'>" ?>
		<div class="strip">
			<span class="icon"><i aria-hidden="true" class="iconFemale"></i></span>
			<span>Management System</span>
		</div>
	</a>

	<div class="strip floatRight">
		<span class="icon"><i aria-hidden="true" class="iconFemale"></i></span>
		<span>

			<?php echo $current_user->get_email() ?>

		</span>
	</div>
</header>