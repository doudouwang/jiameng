<?php if(!defined('ADMINPATH')){die();}
class Index_controller extends Admin_controller{
	public function index(){
		$data['sys_info'] = array(
			'网站首页' => "<a href='/' target='_blank'>打开</a>",
			'系统临时目录' => sys_get_temp_dir(),
			'网站当前环境' => $this->_getEnvironment(),
			'配置文件' => $this->_getConfigFile(),
			'网站路径' => APPPATH
		);
		$data['tpl'] = 'index';
		$this->_display('main', $data);	
	}

	public function info(){
	}

	public function _getConfigFile(){
		$file = INCPATH.'config.'.ENVIRONMENT.'.php';
		if(file_exists($file) && is_readable($file)){
			return INCPATH.'<span style="font-weight:bold">config.'.ENVIRONMENT.'.php</span>';
		}
		return INCPATH.'config.php';
	}

	public function _getEnvironment(){
		$color_array = array(
			'production' => 'green',
			'development' => 'olive',
			'testing' => '#cc3366',
		);
		$color = isset($color_array[ENVIRONMENT])?$color_array[ENVIRONMENT]:'red';
		return "<span style='color:$color'>".ENVIRONMENT."</span>";
	}
}