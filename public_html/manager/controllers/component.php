<?php if(!defined('ADMINPATH')){die();}
define('COM_ERROR_CLASS_FILE_NOT_EXISTS', 100001);
define('COM_ERROR_CLASS_NOT_EXISTS', 100010);

class Component_controller extends Admin_controller {
	public function __construct(){
		parent::__construct();
		$this->component = new Component;
	}

	public function index(){
		$items = $this->component->get_items(1, 1000, '', 'cid ASC');
		$data = array(
			'items' => $items,
			'tpl' => 'component',
			'menu' => 'component',
		);
		$this->_display('main', $data);
	}

	public function add(){
		$data = array(
			'tpl' => 'component_edit',
			'menu' => 'component',
		);
		$this->_display('main', $data);
	}

	public function del(){
		$id = intval($_GET['id']);
		$ret = $this->component->delete($id);
		$this->_redirect('component', 'index');
	}

	public function edit(){
		$id = intval($_GET['id']);
		$info = $this->component->find($id);
		if($info == FALSE){
			show_404();
		}

		$ret['info'] = $info;
		$ret['param'] = $info['param'];

		$data = array(
			'com_data' => json_encode($ret),
			'tpl' => 'component_edit',
			'menu' => 'component',
		);
		
		$this->_display('main', $data);
	}

	public function preview(){
		$id = intval($_GET['id']);
		$info = $this->component->find($id);

		if($info == FALSE){
			show_404();
		}
		
		echo $info['html'];
	}

	public function save(){
		$type = @$_POST['type'];
		$class_file = ADMINPATH.'components/component_'.$type.'.php';

		if(!file_exists($class_file)){
			die('ERROR:'.COM_ERROR_CLASS_FILE_NOT_EXISTS);
		}

		include($class_file);

		if(!class_exists('Component_'.$type)){
			die('ERROR:'.COM_ERROR_CLASS_NOT_EXISTS);
		}

		$class_name=  "Component_".$type;
		$object = new $class_name;

		$ret = call_user_func(array($object, 'run'), @$_POST['param']);

		$newdata = array(
			'token' => $_POST['token'],
			'desc' => $_POST['desc'],
			'type' => $_POST['type'],
			'data' => serialize($ret['data']),
			'tpl' => $ret['param']['tpl'],
			'html' => $ret['html'],
			'param' => serialize($ret['param'])
		);

		if(isset($_POST['cid']) && $_POST['cid']!=''){//修改 
			$ok = $this->component->edit(intval($_POST['cid']), $newdata);
		}else{
			$ok = $this->component->add($newdata);
		}

		if($ok == TRUE){
			$this->_redirect('component', 'index');
		}

		$ret['error'] = isset($this->component->error)?$this->component->error:'系统繁忙，请稍候再试';

		//失败之后：

		$ret['info'] = array(
			'token'=> $_POST['token'],
			'desc'=> $_POST['desc'],
			'type'=> $_POST['type'],
		);

		$data = array(
			'com_data' => json_encode($ret),
			'menu' => 'component',
		);

		$this->_display('component_edit', $data);
	}
}

interface IComponent{
	public function run($param);
}









