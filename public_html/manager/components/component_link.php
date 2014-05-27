<?php if(!defined('ADMINPATH')){die();}

class Component_link implements IComponent{
	public function run($param = array('links'=>'', 'tpl'=>'')){
		$links = $param['links'];
		$tpl = $param['tpl']==''?$this->_defaultTpl():$param['tpl'];
		$ret = array();

		$ret['param'] = $param;
		$ret['param']['tpl'] = $tpl;

		$ret['data'] = $this->parseLinks($links);
		$ret['html'] = $this->parseHTML($ret['data'], $tpl);

		return $ret;
	}	

	public function parseLinks($links){
		$links = preg_split("#-{4,}#", $links);
		$ret = array();
		foreach($links as $key => $link){
			$link = $this->_parseLink($link);
			if(count($link) == 0){
				continue;
			}
			$ret[$key] = $link;
		}
		return $ret;
	}

	public function parseHTML($links, $tpl=''){
		$tpl = $tpl == ""? $this->_defaultTpl():$tpl;
		$this->smarty = new Mysmarty();
		$this->smarty->assign('links', $links);
		$this->smarty->assign('tpl_string', $tpl);
		$output = $this->smarty->fetch("admin/component_parser.tpl");
		return $output;
	}

	public function _defaultTpl(){
		$tpl ='<{foreach from=$links item=item}>
<a href=\'<{$item.url}>\' title=\'<{$item.title}>\'><{$item.text}></a><br/>
<{/foreach}>';
		return $tpl;
	}

	public function _parseLink($link){
		$link = explode("\n", $link);
		$ret = array();
		foreach($link as $line){
			if($line == ''){
				continue;
			}
			$statement = explode(":=", $line,2);
			if(count($statement) !==2 ){
				continue;
			}
			$ret[$statement[0]] = trim($statement[1]);
		}
		return $ret;
	}
}
