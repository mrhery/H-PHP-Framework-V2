<?php
require_once(dirname(dirname(dirname(__DIR__))) . "/Misc/document_access.php");

$name = Input::get("name");
$detail = Input::get("detail");

$m = new Model("test");

$b = $m->insertInto(array("t_name" => $name, "t_detail" => $detail));
 
if($b){
	echo "Success";
}
?>