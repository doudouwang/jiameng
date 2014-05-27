<?php

class Core{
	protected static $db;
	protected $table_name;
	protected $table_id;

	public function __construct(){

	}

	public function set_table($name, $id = 'id'){
		$this->table_name = $name;
		$this->table_id = $id;
	}

	public static function db(){
		if(self::$db){
			return self::$db;
		}
		self::$db = new Mysql();
		$cfg = config_item('mysql'); 
		self::$db->connect($cfg['host'], $cfg['user'], $cfg['pass'], $cfg['name']);
		return self::$db;
	}

	public function find($id){
		$sql = "SELECT * FROM `$this->table_name` WHERE `$this->table_id` = '$id'";		
		return $this->db()->fetch_first($sql);
	}

	public function get_items($page, $page_size, $condition="", $orderby="", $select = "*"){
		$condition = $condition==''?'':" WHERE $condition";
		$sql = "SELECT $select 
			FROM $this->table_name ".$condition.
			($orderby!=''?" ORDER BY $orderby":"")."
			LIMIT ".($page_size*($page-1)).", $page_size";
		return $this->db()->getAll($sql);
	}

	public function add($data){
		return $this->db()->request($data, $this->table_name);
	}

	public function edit($id, $data){
		return $this->db()->request($data, $this->table_name, 'update', $this->table_id." = '$id'");
	}

	public function delete($id){
		$sql = "DELETE FROM $this->table_name WHERE $this->table_id = '$id'";
		return $this->db()->query($sql);
	}

	public function filter($data){
		return $data;
	}

}