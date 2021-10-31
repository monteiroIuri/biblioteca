<?php
session_start();
ob_start();

define('47b6t8', true);

require './vendor/autoload.php';

use Core\ConfigController as Home;

$url = new Home();
$url->carregar();
