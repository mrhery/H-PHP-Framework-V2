<?php
require_once(__DIR__ . "/Misc/document_access.php");

#Database connection information.
#Has been tested and developed on MySQL
class Config{
	public static $host 	= "127.0.0.1";
	public static $database	= "db_name";
	public static $username	= "db_user";
	public static $password	= "db_password";
}

#Put 1 to enable show error or otherwise put 0.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#Put your website URL
define("PORTAL", "https://web-dir-here.com/");


######################################
##########DO NOT EDIT BELOW###########
######################################
define("SYSTEM", __DIR__ . "/");	 #
define("VIEW", SYSTEM . "App/View/");#
define("PAGES", VIEW . "pages/");    #
define("ASSET", SYSTEM . "Assets/"); #
define("UPLOAD", ASSET . "medias/"); #
######################################
?>