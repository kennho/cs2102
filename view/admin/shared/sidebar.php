<?php

$root_url = "http://" . $_SERVER["SERVER_NAME"] . "/cs2102/view/admin/";

?>

<nav id="sidebar">
	<div class="strip title clearfix">
		<span class="floatRight">Data</span>
	</div>

	<?php echo "<a href='" . $root_url . "industry'>" ?>
		<div id="industry" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconPresentation"></i></span>
			<span>Industry</span>
		</div>
	</a>

	<?php echo "<a href='" . $root_url . "location'>" ?>
		<div id="location" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconPencil"></i></span>
			<span>Location</span>
		</div>
	</a>

	<?php echo "<a href='" . $root_url . "nationality'>" ?>
		<div id="nationality" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconBargraph"></i></span>
			<span>Nationality</span>
		</div>
	</a>


	<?php echo "<a href='" . $root_url . "position'>" ?>
		<div id="position" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconTrainees"></i></span>
			<span>Position</span>
		</div>
	</a>

	<div class="strip title clearfix">
		<span class="floatRight">User</span>
	</div>


	<?php echo "<a href='" . $root_url . "employer'>" ?>
		<div id="employer" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconTrainer"></i></span>
			<span>Employer</span>
		</div>
	</a>


	<?php echo "<a href='" . $root_url . "job_applicant'>" ?>
		<div id="job_applicant" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconCompany"></i></span>
			<span>Job Applicant</span>
		</div>
	</a>

	<div class="strip title clearfix">
		<span class="floatRight">Content</span>
	</div>


	<?php echo "<a href='" . $root_url . "advertise'>" ?>
		<div id="advertise" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconMoney"></i></span>
			<span>Advertise</span>
		</div>
	</a>


	<?php echo "<a href='" . $root_url . "job_offer'>" ?>
		<div id="job_offer" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconClipboard"></i></span>
			<span>Job Offer</span>
		</div>
	</a>

	<div class="strip title clearfix">
		<span class="floatRight">Settings</span>
	</div>


	<?php echo "<a href='" . $root_url . "account'>" ?>
		<div id="account" class="strip">
			<span class="icon"><i aria-hidden="true" class="iconMale"></i></span>
			<span>Account</span>
		</div>
	</a>
</nav><!-- end sidebar -->