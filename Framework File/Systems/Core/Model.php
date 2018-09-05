<?php
require_once(dirname(__DIR__) . "/Misc/document_access.php");

class Model{
	private $table = "";
	private $debu = false;
	
	public function __construct($table, $debug = false){
		$this->table = $table;
		$this->debug = $debug;
	}
	
	/*
	* Model->list(array $option)
	* ["column"]	: Column name, e.g: a_id, COUNT(a_date). Default value: *
	* ["table"]		: Table name, e.g: articles, articles a
	* ["where"]		: Column with data, e.g: a_id = 1, a_date = '29-Jun-2019'
	* ["group"]		: Column name, e.g: a_date
	* ["order"]
	* [""]
	*/
	
	public function list($setting = array()){
		$sql = "SELECT ";
		
		if(isset($setting["column"])){
			$sql .= $setting["column"] . " FROM ";
		}else{
			$sql .= "* FROM ";
		}
		
		if(empty($this->table)){
			if(isset($setting["table"]) AND !empty($setting["table"])){
				$sql .= $setting["table"];
			}else{
				return false;
			}
		}else{
			$sql .= $this->table;
		}
		
		if(isset($setting["where"]) AND !empty($setting["where"])){
			$sql .= " WHERE " . $setting["where"];
		}
		
		if(isset($setting["group"]) AND !empty($setting["group"])){
			$sql .= " GROUP BY " . $setting["group"];
		}
		
		if(isset($setting["order"]) AND !empty($setting["order"])){
			$sql .= " ORDER BY " . $setting["order"];
		}
		
		if(isset($setting["limit"]) AND !empty($setting["limit"])){
			$sql .= " LIMIT " . $setting["limit"];
		}
		
		if($this->debug){
			return $sql;
		}
		
		$x = DB::conn()->q($sql);
		
		return $x->results();
	}
	
	public function getBy($column, $data){
		if(is_array($column)){
			if(count($column) > 0){
				$i = 0;
				foreach($column as $col){
					if($i == 0){
						$sql .= " " . $col . " = ?";
					}else{
						$sql .= " AND " . $col . " = ?";
					}
					
					$i++;
				}
			}else{
				return false;
			}
		}else{
			$sql = "SELECT * FROM {$this->table} WHERE {$column} = ?";
		}
		
		if($this->debug){
			return $sql;
		}
		
		$x = DB::conn()->query($sql, array($data));
		
		return $x->results();
	}
	
	 
	public function insertInto($data){
		$x = DB::conn()->insert($this->table, $data);
		
		return $x;
	}
	
	public function updateBy($column, $data){
		$x = DB::conn()->update($this->table, $column, $data);
		
		return $x;
	}
	
	public function deleteBy($column, $data){
		$sql = "DELETE FROM {$this->table} WHERE";
		
		if(is_array($column)){
			if(count($column) > 0){
				$i = 0;
				foreach($column as $col){
					if($i == 0){
						$sql .= " " . $col . " = ?";
					}else{
						$sql .= " AND " . $col . " = ?";
					}
					
					$i++;
				}
			}else{
				return false;
			}
		}else{
			if(!empty($column)){
				$sql .= " " . $column . " = ?";
			}else{
				return false;
			}
		}
		
		if($this->debug){
			return $sql;
		}
		
		$x = DB::conn()->query($sql, $data);
		
		return $x;
	}
	
	public static function Load($model){
		$path = dirname(__DIR__) . "/App/Model/"  . $model . ".php";
		
		if(!file_exists($path)){
			$a = fopen($path, "a");
			fclose($a);
		}
		
		include_once($path);
	}
}




































?>