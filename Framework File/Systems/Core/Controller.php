<?php
require_once(dirname(__DIR__) . "/Misc/document_access.php");

class Controller{
	public function __construct($action){
		if(isset($_POST["submit"])){
			if(Input::get("submit") == $_SESSION["IR"]){
				$this->Execute(Input::get("route"));
				F::NewReqKey();
			}else{
				echo "Request token expired. Please refresh and try again.";
			}
		}
	}
	
	public function Execute($route){
		$path = dirname(__DIR__) . "/App/Controller/" . $route . ".php";
		
		if(file_exists($path)){
			include_once($path);
		}else{
			echo "Form cannot be submit. There's an error at your form input.";
		}
	}
	
}
?>