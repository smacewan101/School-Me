<?php

ini_set('display_errors', 1);

$_SERVER['APPLICATION_ROOT'] = dirname(__FILE__) . '/../';
require_once $_SERVER['APPLICATION_ROOT'] . 'vendor/autoload.php';
require_once $_SERVER['APPLICATION_ROOT'] . '/classes/core/autoload.php';

define('MAPS_API_KEY', 'AIzaSyBcVlLagISioihq2hXQJschtj1vgtaT8S8');
$Dinkly = new Dinkly();