<?php
require_once(__DIR__ . "/Misc/document_access.php");

#Start session
session_start();
if(!isset($_SESSION["test"])){
	@$_SESSION["test"] = "hellow world";
}

#Database connection information.
#Has been tested and developed on MySQL
class Config{
	public static $host 	= "127.0.0.1";
	public static $database	= "travel_travel";
	public static $username	= "travel_hery";
	public static $password	= "hery@1234567890";
}

#Put 1 to enable show error or otherwise put 0.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#Put your website URL
define("PORTAL", "https://workspace.intelhost.com.my/workspace/Intelhost_Travel_V2/");




?>