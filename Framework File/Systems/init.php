<?php
require_once(__DIR__ . "/Misc/document_access.php");

###################################################
###################DO NOT EDIT BELOW###############
###################################################
/*#*/ define("SYSTEM", __DIR__ . "/");	   		  #
/*#*/ define("VIEW", SYSTEM . "App/View/");		  #
/*#*/ define("PAGES", VIEW . "pages/");    		  #
/*#*/ define("ASSET", SYSTEM . "Assets/"); 		  #
/*#*/ define("UPLOAD", ASSET . "medias/"); 		  #
/*#*/ define("CLASSES", SYSTEM . "App/Classes/"); #
###################################################

#PHP Autoload
require_once(__DIR__ . "/Misc/autoload.php");

#Database Configuration
require_once(__DIR__ . "/config.php");

#Session
require_once(__DIR__ . "/Misc/session.php");

#Web Application
require_once(__DIR__ . "/App/App.php");
?>