<?php

class Page extends Core{
	public function __construct(){
		$this->set_table(TABLE_PAGE);
	}

	public function exists($url){
		$sql = "SELECT COUNT(*) 
			FROM ".TABLE_PAGE;
		return $this->db()->getOne($sql)>0?TRUE:FALSE;
	}


	
}