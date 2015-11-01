<?php
$baseUrl = "http://localhost/cs2102/controller/";
$requestUrl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$requestString = substr($requestUrl, strlen($baseUrl));

$urlParams = explode('/', $requestString);
echo $requestString . " yo";
for($i = 0; $i < sizeof($urlParams); $i++) {

	echo $urlParams[$i] . " test";
	echo "<br />";

}

$controllerName = ucfirst(array_shift($urlParams)).'Controller';
$actionName = strtolower(array_shift($urlParams)).'Action';

// Here you should probably gather the rest as params

// Call the action
/*$controller = new $controllerName;
$controller->$actionName();*/

echo $controllerName;
echo "<br />";
echo $actionName;
?>