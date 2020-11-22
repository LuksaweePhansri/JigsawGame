<?php
require_once 'vendor/autoload.php';

include_once('src/controllers/controller.php');
use luksaweeP\hw4\src\controllers\Controller as controller;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$controller = new Controller();
$controller->jigsawController();
