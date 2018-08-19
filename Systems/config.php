<?php
require_once(__DIR__ . "/Misc/document_access.php");

#Database connection information.
#Has been tested and developed on MySQL
class Config{
	public static $host 	= "127.0.0.1";
	public static $database	= "workspac_bizdir";
	public static $username	= "workspac_hery";
	public static $password	= "hery@1234567890";
}

#Put 1 to enable show error or otherwise put 0.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#Put your website URL
define("PORTAL", "https://workspace.intelhost.com.my/workspace/Hery_Framework_2/");


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