<?php
class Component extends Core{
	public function __construct(){
		parent::__construct();
		$this->set_table(TABLE_COMPONENT, 'cid');
	}

	public function getHTML($id){
		$row = $this->find($id);
		if($row == FALSE){
			return '';
		}
		return $row['html'];
	}

	public static function Show($token){
		$sql = "SELECT html FROM ".TABLE_COMPONENT." 
			WHERE token='$token'";
		return self::db()->getOne($sql);
	}


	public function add($data){
		$data = $this->filter($data);
		if($this->tokenExists($data['token'])){
			$this->error = 'ID 已经存在';
			return FALSE;
		}
		return parent::add($data);
	}

	public function edit($id, $data){
		$data = $this->filter($data);
		if($this->tokenExists($data['token'], $id)){
			$this->error = 'ID 已经存在';
			return FALSE;
		}
		return parent::edit($id, $data);
	}

	public function tokenExists($token, $cid=0){
		$sql = "SELECT COUNT(*) FROM $this->table_name WHERE token='$token' AND cid<>'$cid'";
		return self::db()->getOne($sql)>0?TRUE:FALSE;
	}

	public function filter($data){
		foreach($data as $key=>&$value){
			$value = mysql_escape_string($value);	
		}
		return $data;
	}

	public function get_items($page, $page_size, $condition="", $orderby="", $select = "*"){
		$args = func_get_args();
		$items = call_user_func_array(array('parent', 'get_items'), $args);
		foreach($items as $key => &$item){
			
		}
		return $items;
	}

	public function find($id){
		$info = parent::find($id);
		if($info == FALSE){
			return FALSE;
		}
		$info['param'] = unserialize($info['param']);
		return $info;
	}


}