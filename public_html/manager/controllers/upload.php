<?php if(!defined('ADMINPATH')){die();}
class Upload_controller extends Admin_controller {
	public function index(){
		$upload_url = config_item('upload_url');
		$upload_path = config_item('upload_path');

		$this->uploader = new Upload();
		$this->uploader->set_inputname('file');
		$this->uploader->set_dirtype(2);
		$this->uploader->set_dir($upload_path);
		$ret = $this->uploader->up();
		if($ret == FALSE){
			$this->_error($this->uploader->error);
		}else{
			$this->_output(array(
				'url' => $upload_url.$ret['file'],
			));
		}
	}

	public function _error($msg){
		echo json_encode(array(
			'error' => $msg
		));
		exit;
	}

	public function _output($ret){
		echo json_encode($ret);
		exit;
	}
}