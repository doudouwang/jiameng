<?php
require_once('inc.php');
$mod = @$_GET['mod'];

$method = "ajax_$mod";

$APP = new App();

if(!method_exists($APP, $method)){
	show_404();
}

$APP->$method();

class App{
	public function ajax_project_info(){
		$id = isset($_GET['id'])?intval($_GET['id']):0;
		$this->project = new Project();
		$ret = $this->project->find($id);
		$this->_output($ret);
	}

	public function ajax_subcategories(){
		$id = isset($_GET['id'])?intval($_GET['id']):0;
		$this->category = new Category();
		$ret = $this->category->getSubcategories($id);
		$this->_output($ret);
	}

	public function _output($ret, $plain = FALSE){
		if($plain == FALSE){
			echo json_encode($ret);
			exit;
			die(is_browser()?
				"<pre>".DxJson::encode($ret)."</pre>":
				json_encode($ret));
			exit;
		}
		die(strval($plain));
	}

	public function _error($msg, $code){
		$ret = array(
			'error' => $msg,
			'errno' => $code
		);
		$this->_output($ret);
	}
}