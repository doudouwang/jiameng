<?php
class Project extends Core{
	public function __construct(){
		parent::__construct();
		$this->set_table(TABLE_PROJECT, 'project_id');
	}

	/**
	 * @param Integer $id  项目ID
	 * @return Array 
	 */
	public function getPics($id){
		$sql = "SELECT pic_id, pic_url FROM ".TABLE_PROJECT_PIC." 
			WHERE project_id = $id 
			ORDER BY seq DESC limit 0,4";
		$ret = $this->db()->getAll($sql);
		return $ret;
	}


	public function find($id, $select="P.*"){
		if(is_array($id)){
			$ids = implode(',', $id);
			if($ids == ''){
				return array();
			}
			$sql = "SELECT $select FROM ".TABLE_PROJECT." P
				LEFT JOIN ".TABLE_CATEGORY." C1
				ON P.cat_id = C1.cat_id
				LEFT JOIN ".TABLE_CATEGORY." C2
				ON C1.father_id = C2.cat_id
				WHERE project_id IN ($ids)";
			$ret = $this->db()->getAll($sql);
			$result = array();
			foreach($id as $v){
				foreach($ret as $w){
					if($w['project_id'] == $v){
						$result[] = $w;
						break;
					}
				}
			}
			return $result;
		}else{
			$sql = "SELECT $select FROM ".TABLE_PROJECT." P 
				LEFT JOIN ".TABLE_CATEGORY." C1
				ON P.cat_id = C1.cat_id
				LEFT JOIN ".TABLE_CATEGORY." C2
				ON C1.father_id = C2.cat_id
				WHERE project_id = '$id'";
			return $this->db()->fetch_first($sql);
		}
	}

}