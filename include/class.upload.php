<?php
class Upload extends Core{
	public function __construct(){
		$this->init();
	}

	public function init(){
		$this->upext = "txt,rar,zip,jpg,jpeg,gif,png,swf,wmv,avi,wma,mp3,mid,flv,mpg,mpeg,mp4";
		$this->maxsize = 2097152; //默认2mb
		$this->inputname = "filedata";
		$this->dir_type =1;
		$this->file_name ='';
		$this->exclude_ext = true; //文件名是否包括扩展名
		$this->rror = "";
	}

	/**
	 * @param String $str 上传文件保存目录
	 * @return $this
	 */
	public function set_dir($dir){
		$this->dir = $dir;
		return $this;
	}


	/**
	 * 设置上传目录类型
	 *
	 * 1. 年/月/日
	 * 2. 年/月
	 * 3. 年
	 * 4. 空
	 *
	 *
	 * @param Integer $type 
	 * @return Upload
	 */
	public function set_dirtype($type=1){
		$this->dir_type = $type;
		return $this;
	}

	/**
	 * 设置文件名
	 * @param String $filename 文件名
	 * @param Boolean $exclude_extension 覆盖扩展名
	 * @return Upload
	 */
	public function set_filename($filename, $exclude_extension=true){
		$this->file_name = $filename;
		$this->exclude_ext = $exclude_extension?true:false;
		return $this;
	}


	/**
	 * 根据 dir_type 获取 子目录
	 * 
	 * @return String 子目录
	 */
	public function get_subdir(){
		if($this->dir_type==1) return date("Y/m/d/");
		if($this->dir_type==2) return date("Y/m/");
		if($this->dir_type==3) return date("Y/");
		if($this->dir_type==4) {
			$this->dir = self::add_slash($this->dir);
			return '';
		};
	}

	public static function add_slash($dir){
		if(preg_match("#/$#", $dir)){
			return $dir;
		}else{
			return $dir."/";
		}
	}



	/**
	 * 设置允许上传的文件扩展名
	 *
	 * @param String $str 允许上传的文件扩展名
	 * @return Upload
	 */
	public function set_upext($str='jpg,jpeg,gif,png'){
		$this->upext = $str;
		return $this;
	}

	/**
	 * 设置允许上传的文件大小
	 *
	 * @param Integer $size
	 * @param String $unit 单位，默认 k。 可以取值：m,k,b
	 * @return Upload
	 */
	public function set_maxsize($size, $unit='k`'){
		if($unit=='k'){
			$this->maxsize = 1024*$size;
		}elseif($unit=='m'){
			$this->maxsize = 1024*1025*$size;
		}else{
			$this->maxsize = $size;
		}
		return $this;
	}

	/**
	 * 设置文件域名称
	 *
	 * @param String $inputname
	 * @return Upload
	 */
	public function set_inputname($inputname){
		$this->inputname = $inputname;
		return $this;
	}

	/**
	 * 上传主函数
	 */
	public function up(){
		$this->error = "";
		if(isset($_SERVER['HTTP_CONTENT_DISPOSITION'])){
			$this->html5_upload();
		}
		$upfile=@$_FILES[$this->inputname];
		if(!isset($upfile)){
			$this->error = "文件域name错误";
			$this->error_no = -10;
			return false;
		}elseif(!empty($upfile['error'])){
			$this->judge_error($upfile['error']);
			return false;
		}elseif(empty($upfile['tmp_name']) || $upfile['tmp_name']=='none'){
			$this->error = "无文件上传";
			$this->error_no = 0;
			return false;
		}else{
			$temp_path = $upfile['tmp_name'];
			$file_info = pathinfo($upfile['name']);

			if($this->file_name!='' && $this->exclude_ext==true){
				$extension = $file_info['extension'];
			}elseif($this->file_name !=''){
				$file_info = pathinfo($this->file_name);
				$extension = $file_info['extension'];
				$this->file_name = preg_replace("#\.$extension$#",'',$this->file_name);
			}else{
				$extension = $file_info['extension'];
				$this->file_name = preg_replace("#\.$extension$#",'',$this->file_name);
			}

			if(preg_match('#'.str_replace(',','|',$this->upext).'#i',$extension)){
				$ret = array();
				$bytes = filesize($temp_path);
				if($bytes > $this->maxsize){
					$this->error = "请不要上传大小超过".self::formatBytes($this->maxsize).'的文件';
					$this->error_no = -1;
					return false;
				}

				if($this->file_name!=''){
					$filename = $this->file_name.'.'.$extension;
				}else{
					$filename = date("YmdHis").mt_rand(1000,9999).'.'.$extension;
				}

				$target_dir = $this->dir.$this->get_subdir();

				$target = $target_dir.$filename;

				$target_dir = self::add_slash(dirname($target));

				if(!is_dir($target_dir)){
					@mkdir($target_dir,0777,true);
					@fclose(fopen($target_dir.'index.htm','w'));
				}

				rename($upfile['tmp_name'], $target);
				@chmod($target, 0755);
				$target = preg_replace("#^\.\./#","/", $target);
				$ret = array(
				    'target'=> $target,
				    'file' => $this->get_subdir().$filename,
				);
				return $ret;
			}else{
				$this->error = "上传文件不合法";
				$this->error_no = -7;
				return false;
			}
		}
	}

	/**
	 * 判断错误代码
	 *
	 * @param Integer $err_no
	 */
	public function judge_error($err_no){
		switch($err_no){
				case '1':
				case '2':
					$this->error = "文件太大";
					$this->error_no = -1;
					break;
				case '3':
					$this->error = "文件上传不完整";
					$this->error_no = -2;
					break;
				case '4':
					$this->error = "无文件上传";
					$this->error_no = -3;
					break;
				case '6':
					$this->error = "缺少临时文件夹";
					$this->error_no = -4;
					break;
				case '7':
					$this->error = "写文件失败";
					$this->error_no = -5;
					break;
				case '8':
					$this->error = "上传被其他扩展终端";
					$this->error_no = -6;
					break;
				default:
					$this->error = "未知错误";
					$this->error_no = -999;
		}
	}

	/**
	 * HTML5 上传函数
	 */
	public function html5_upload(){
		if(preg_match('/attachment;\s+name="(.+?)";\s+filename="(.+?)"/i',$_SERVER['HTTP_CONTENT_DISPOSITION'],$info))
		{
			$temp_name = ini_get("upload_tmp_dir").'\\'.date("YmdHis").mt_rand(1000,9999).'.tmp';
			file_put_contents($temp_name, file_get_contents("php://input"));
			$size = filesize($temp_name);
			$_FILES[$info[1]] = array('name'=>$info[2], 'tmp_name'=>$temp_name, 'size'=>$size, 'type'=>'', 'error'=>0);
		}
	}

	public static function output($path,$eid=0, $method='js'){
		switch($method){
			case 'js':
				echo "<script type='text/javascript'>window.opener.document.getElementById('$eid').value='$path';\nwindow.close();</script>";
				break;
		}
	}

	/**
	 * 文件大小单位转换
	 *
	 * @param Integer $bytes 字节
	 * @return string
	 */
	public static function formatBytes($bytes) {
		if($bytes >= 1073741824) {
			$bytes = round($bytes / 1073741824 * 100) / 100 . 'GB';
		} elseif($bytes >= 1048576) {
			$bytes = round($bytes / 1048576 * 100) / 100 . 'MB';
		} elseif($bytes >= 1024) {
			$bytes = round($bytes / 1024 * 100) / 100 . 'KB';
		} else {
			$bytes = $bytes . 'Bytes';
		}
		return $bytes;
	}
}