<?php

require_once('config/bootstrap.php');
DinklyDataConfig::setActiveConnection('content');
$institutes = InstituteCollection::getAll();
foreach ($institutes as $institute) {
	$address = $institute->getName().", VT";
	$result = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=" . urlencode($address) . "&sensor=false");
	error_log(print_r($result));
	break;
}

?>