<?php
require_once(__DIR__ . "/document_access.php");

spl_autoload_register(function($class){
	$ar = explode("\\", $class);
	
	if(count($ar) < 2){
		include_once(dirname(__DIR__) . "/Core/" . $ar[0] . ".php");
	}else{
		$path = dirname(__DIR__) . "/App";
		foreach($ar as $a){
			$path .= "/" . $a;
		}
		$path .= ".php";
		
		
		if(is_file($path)){
			include_once($path);
		}else{
			die("Fail loding class " . $class);
		}
	}
});

?>