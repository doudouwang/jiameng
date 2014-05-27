<?php
define('ENVIRONMENT', isset($_SERVER['ENVIRONMENT'])?$_SERVER['ENVIRONMENT']:'production');

switch(ENVIRONMENT){
	case 'testing':
	case 'development':
		error_reporting(E_ALL);
		break;
	case 'production':
		error_reporting(0);
		break;
}

define('APPPATH', str_replace('\\','/',dirname(__FILE__).'/'));
define('INCPATH',  APPPATH.'include/');

define('TABLE_CATEGORY', 'project_category');
define('TABLE_PROJECT' , 'project');
define('TABLE_PROJECT_PIC' , 'project_pic');
define('TABLE_PAGE', 'page');
define('TABLE_COMPONENT', 'component');

include_once(INCPATH.'func.inc.php');

load_config();


