<?php
//header("Location: ./welc/");
define("DS", DIRECTORY_SEPARATOR);
include("php/session.php");
include("standard.php");
include('profiles/ameeen/sidebar.php');
require_once("php" . DS . "config.php");
use alquds\core\autoload;
use alquds\core\mainController;
require_once("core" . DS . "autoload.php");
$rout = new mainController();
$rout->implement();
