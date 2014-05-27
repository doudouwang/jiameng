<?php
/**
 * Copyright (c) 2011 - Linktone
 * 
 * @author xin.du <xin.du@linktone.com>
 *
 */

class Pager{
	public function __construct($config=array()){
		$this->page = 1;
		$this->total_page = 1;
		$this->page_size = 10;
		$this->count = 10;
		$this->base_url = "";
		
		$this->pager_html = "<a href='#URL#'>#PAGE#</a>";
		$this->curr_html  = "<a href='javascript:void(0)' class='act'>#PAGE#</a>";

		if(!empty($config)){
			$this->parse_config($config);
		}
	}

	/**
	 *
	 * @param Array $config 配置
	 *
	 * page 	 Integer 	  当前页
	 * page_size 	 Integer 	  每页数量
	 * total_page  	 Integer	  总页数
	 * base_url	 String		  链接
	 * 
	 * count	 Integer	  显示多少页
	 * pager_html	 String		  页码 html
	 * curr_html     String		  当前页 html
	 *
	 */
	public function parse_config($config){
		foreach($config as $key=>$item){
			if(isset($this->$key)){
				$this->$key = $item;
			}
		}
	}

	public function make_url($i){
		$str = str_replace( array( "%23PAGE%23" , "#PAGE#" ), $i, $this->base_url );
		return $str;
	}

	public function gen(){
		if($this->total_page <= 1){
			return '';
		}

		$count = ceil( $this->count / 2 );
		$start = $this->page-$count<=0?1:$this->page-$count;
		$end = $this->page + $count > $this->total_page ? $this->total_page : $this->page + $count;

		$prev = $this->page > 1 ? $this->page -1 : 1;
		$next = $this->page < $this->total_page ? $this->page + 1 : $this->total_page;


		$html = "";

		$prev_url = $this->make_url($prev);
		$html .= str_replace(array("#URL#", "#PAGE#"), array($prev_url, "&lt;"), $this->pager_html);
		for( $i = $start; $i <= $end; $i++){
			$url = $this->make_url($i);

			if( $i == $this->page ){ //当前页
				$html .= str_replace(array("#URL#", "#PAGE#"), array($url, $i), $this->curr_html);
			}else{
				$html .= str_replace(array("#URL#", "#PAGE#"), array($url, $i), $this->pager_html);
			}
		}

		$next_url = $this->make_url($next);
		$html .= str_replace(array("#URL#", "#PAGE#"), array($url, "&gt;"), $this->pager_html);

		return $html;
		
	}

}