<?php


//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/authentication/index.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/employer/index.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/industry/index.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/job_applicant/index.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/location/index.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/nationality/index.php");
//require_once($_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/position/index.php");

require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/authentication/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/employer/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/industry/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/job_applicant/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/location/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/nationality/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cs2102/controller/admin/position/index.php");

use controller\admin\authentication\AuthenticationController as AuthenticationController;
use controller\admin\authentication\EmployerController as EmployerController;
use controller\admin\authentication\IndustryController as IndustryController;
use controller\admin\authentication\JobApplicantController as JobApplicantController;
use controller\admin\authentication\LocationController as LocationController;
use controller\admin\authentication\NationalityController as NationalityController;
use controller\admin\authentication\PositionController as PositionController;

//$baseViewUrl = "http://experiment.thewhiteconcept.com/kenneth/cs2102_admin/view/admin/";
$baseViewUrl = "http://localhost/cs2102/view/admin/";

if(!empty($_SERVER["HTTP_REFERER"])) {
//echo $_SERVER['DOCUMENT_ROOT'] . "/kenneth/cs2102_admin/controller/admin/authentication/index.php";
	$requestUrl = $_SERVER["HTTP_REFERER"];
	$requestString = substr($requestUrl, strlen($baseViewUrl));

	$urlParams = explode("/", $requestString);

	$controllerName = str_replace(" ", "", ucwords(str_replace("_", " ", array_shift($urlParams)))) . "Controller";
	$actionName = strtolower($_GET["action"]);

	$controller = new $controllerName;
	$controller->$actionName();

	echo $controllerName;
	echo "<br />";
	echo $actionName;

}




/*$requestUrl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$requestString = substr($requestUrl, strlen($baseUrl));
echo $_SERVER["REQUEST_URI"];
$urlParams = explode('/', $requestString);
echo $requestUrl;
for($i = 0; $i < sizeof($urlParams); $i++) {

	echo $urlParams[$i] . " test";
	echo "<br />";

}

$controllerName = ucfirst(array_shift($urlParams)).'Controller';
$actionName = strtolower(array_shift($urlParams)).'Action';

echo $_GET["action"];
echo "<br />";
// Here you should probably gather the rest as params

// Call the action
/*$controller = new $controllerName;
$controller->$actionName();*/

/*echo $controllerName;
echo "<br />";
echo $actionName;*/
?>