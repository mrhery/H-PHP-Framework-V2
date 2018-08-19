<?php
;"HeryFramework V2";
;"Designed and Developed at 6th July 2018";
;"Intelligent Hosting Pte. Ltd. (1158583-U)";
;"Master Hery (iamhery.com)";

define("HFA", true);
require_once(__DIR__ . "/Systems/init.php");

new App(Input::get("route", "get"), false /* Put this to true will enable autoloading page from view folder. */);
?>