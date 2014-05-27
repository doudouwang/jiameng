<?php

define('SEARCH_RESULT_INDEX', 0);

class Search extends Core{
	public $sphinx;
	public $query = '';
	public $sort_mode = '';
	public $sort_by = '';
	public $page = 1;
	public $page_size= 15;

	public function __construct(){
		parent::__construct();
		$this->initSphinx();
	}

	public function initSphinx(){
		$this->sphinx = null;
		$cfg = config_item('sphinx');
		$this->sphinx = new SphinxClient();
		$this->sphinx->SetServer($cfg['host'], $cfg['port']);
		$this->sphinx->SetArrayResult(TRUE);
		$this->sphinx->setMatchMode(SPH_MATCH_BOOLEAN);
		$this->sphinx->ResetFilters();
		$this->sphinx->ResetGroupBy();
		$this->project = new Project();
		$this->category = new Category();
	}

	public function getProjects($condition = array(), $sort= NULL){
		$this->_parseCondition($condition);
		$this->_parseSort($sort);
		//SEARCH_RESULT_INDEX
		$this->sphinx->SetLimits(($this->page-1)*$this->page_size, $this->page_size);
		$this->sphinx->SetSortMode($this->sort_mode, $this->sort_by);
		$this->sphinx->AddQuery($this->query, 'jiameng');
		$ret = $this->sphinx->RunQueries();
		return $this->_parseRet($ret);
	}

	public function _parseRet($ret){
		//处理返回结果
		if($ret[SEARCH_RESULT_INDEX]['error'] != ''){
			return $this->_error($ret[SEARCH_RESULT_INDEX]['error']);
		}

		if(!isset($ret[SEARCH_RESULT_INDEX]['matches'])){
			return array(
				'ret'=>array(),
				'count' => 0,
			);
		}

		$matches = $ret[SEARCH_RESULT_INDEX]['matches'];
		$count = $ret[SEARCH_RESULT_INDEX]['total_found'];

		$ids = array();

		foreach($matches as $match){
			$ids[] = $match['id'];
		}

		$ret = $this->project->find($ids, "P.project_id, P.name, P.invest, P.shops, 
				P.shop_require, P.product, P.original, 
				P.found, P.guarantee_fee, 
				C1.cat_id, C1.name as cat_name, 
				C2.cat_id as parent_id, C2.name as parent_name");
		return array(
			'ret'	=>$ret,
			'count' => $count
		);
	}

	public function _error($error){
		return array('error' => $error);
	}

	public function _parseCondition($condition){
		if(isset($condition['cat_id'])){
			$this->sphinx->SetFilter('cat_id', array($condition['cat_id']));
		}

		if(isset($condition['father_id'])){
			$this->sphinx->SetFilter('father_id', array($condition['father_id']));
		}

		if(isset($condition['query'])){
			$this->query = $condition['query'];
		}
	}

	public function _parseSort($sort){
		if($sort == NULL || $sort == ''){
			$sort = array(
				'mode' => 'DESC' ,
				'by' => 'id',
			);
		}
		$this->sort_mode = (isset($sort['mode']) && strtolower($sort['mode']) == 'desc')?SPH_SORT_ATTR_DESC:SPH_SORT_ATTR_ASC;

		$this->sort_by = isset($sort['by'])?$sort['by']:$sort['by'];
	}
	

	public function setLimits($page, $page_size) {
		$this->page = $page;
		$this->page_size = $page_size;
		return $this;
	}


}