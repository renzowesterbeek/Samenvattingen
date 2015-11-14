<?php
session_start();

// Error reporting
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

// Loads Google API
require_once('Google/autoload.php');
require_once('classes/DB.php');
require_once('classes/GoogleAuth.php');
?>
