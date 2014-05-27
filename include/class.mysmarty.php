<?php
require(INCPATH."smarty/Smarty.class.php");
class Mysmarty extends Smarty{
	public function __construct(){
		$this->left_delimiter = "<{";
		$this->right_delimiter = "}>";
		$this->caching = 0 ;
		$this->template_dir = APPPATH."/views";
		$this->compile_dir = APPPATH."/temp/tplc";
		$this->cache_dir = APPPATH."/temp/cache";
	}
}
?>
