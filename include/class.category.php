<?php

class Category extends Core{
	public function __construct(){
		parent::__construct();
		$this->set_table(TABLE_CATEGORY, 'cat_id');
	}

	public function getSubcategories($pid, $order='seq DESC, cat_id ASC'){
		return $this->get_items(1, 1000, "father_id = $pid", $order, "cat_id, name, father_id");
	}

	public function getTopcategories($order='seq DESC, cat_id ASC'){
		return $this->get_items(1, 1000, "father_id = 0", $order, "cat_id, name, father_id");
	}

	public function getCatsGallery(){
		$ret = array();
		$cats = $this->getTopcategories();
		foreach($cats as $key => $cat){
			if($key > 11) continue;
			$cat_id = $cat['cat_id'];
			$sql = "SELECT P.project_id, P.name FROM ".TABLE_PROJECT." P
				LEFT JOIN ".TABLE_CATEGORY." C
				ON P.cat_id = C.cat_id WHERE 
				C.father_id = ".$cat_id."
				ORDER BY P.project_id
				LIMIT 20";
			$ret[$cat_id]['name'] = $cat['name'];
			$ret[$cat_id]['items'] = $this->db()->getAll($sql);	
		}
		return $ret;
	}

	public function getAllCategories($order='seq DESC, cat_id ASC', $select="cat_id, name, father_id"){
		$cats = $this->get_items(1,1000, "", $order, $select);
		$ret = array();
		foreach($cats as $cat){
			if($cat['father_id'] == 0){//一级分类
				$ret[$cat['cat_id']] = array(
				    'top' => $cat,
				);	
			}else{
				$ret[$cat['father_id']]['sub'][] = $cat;
			}
		}
		return $ret;
	}

	public function makeOptions($items){
		$ret = array();
		foreach($items as $item){
			$ret[$item['cat_id']] = $item['name'];
		}
		return $ret;
	}
}

