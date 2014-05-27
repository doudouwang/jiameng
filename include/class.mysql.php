<?php
/*
 * @author duxin <duxins@gmail.com>
 * @created on Feb 20, 2011 12:22:32 AM
 *
 */

class Mysql {
	var $version = '';
	var $querynum = 0;
	var $link = null;
    var $charset = "UTF8";
	var $params = array();

	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $halt = TRUE, $dbcharset2 = '') {
		$this->params = func_get_args();
		$func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect';
		if(!$this->link = @$func($dbhost, $dbuser, $dbpw, 1)) {
			$halt && $this->halt('Can not connect to MySQL server');
		} else {
			if($this->version() > '4.1') {
				$serverset = 'character_set_connection='.$this->charset.', character_set_results='.$this->charset.', character_set_client=binary' ;
				$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
				$serverset && mysql_query("SET $serverset", $this->link);
			}
			$dbname && @mysql_select_db($dbname, $this->link);
		}
	}

	function reconnect(){
		 call_user_func_array(array($this, 'connect'), $this->params);
	}

	function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function fetch_first($sql) {
		return $this->fetch_array($this->query($sql));
	}

	function result_first($sql) {
		return $this->result($this->query($sql), 0);
	}

	function query($sql, $type = '') {
		if(defined('DEBUG') && DEBUG) {
			echo $sql,"<br/>";
		}

		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
			'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->link))) {
			if(in_array($this->errno(), array(2006, 2013)) && substr($type, 0, 5) != 'RETRY') {
				$this->close();
				$this->reconnect();
				$this->query($sql, 'RETRY'.$type);
			} elseif($type != 'SILENT' && substr($type, 5) != 'SILENT') {
				$this->halt('MySQL Query Error', $sql);
			}
		}

		$this->querynum++;
		return $query;
	}

	function affected_rows() {
		return mysql_affected_rows($this->link);
	}

	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}

	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}

	function result($query, $row = 0) {
		$query = @mysql_result($query, $row);
		return $query;
	}

	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	function getAll($sql)
    {
        $res = $this->query($sql);
        if ($res !== false)
        {
            $arr = array();
            while ($row = mysql_fetch_assoc($res))
            {
                $arr[] = $row;
            }

            return $arr;
        }
        else
        {
            return false;
        }
    }

    function version() {
		if(empty($this->version)) {
			$this->version = mysql_get_server_info($this->link);
		}
		return $this->version;
    }

    function close() {
		return mysql_close($this->link);
    }

    function fetchRow($query) {
        return mysql_fetch_assoc($query);
    }

    function halt($message = '', $sql = '') {
		//file_put_contents(ROOT_PATH.'/temp/logs/'.date("Y-m-d").".log","date:".date('Y-m-d H:i:s')."\n".$sql."\n".$message.mysql_error()."\n\n",FILE_APPEND);
		echo "SQL:".$sql."\n".$message.mysql_error()."\n";
    }

    function getOne($sql, $limited = false) {
        if ($limited == true) {
            $sql = trim($sql . ' LIMIT 1');
        }

        $res = $this->query($sql);
        if ($res !== false) {
            $row = mysql_fetch_row($res);

            if ($row !== false) {
                return $row[0];
            }
            else {
                return '';
            }
        }
        else {
            return false;
        }
    }

	function request($array, $table,$method='insert',$condition='') {
		if($method=='insert') {
			$sql1 = $sql2 ='';
			foreach ($array as $k=>$v) {
				$sql1 .= "`$k`,";
				$sql2 .= "'$v',";
			}
			$sql = "INSERT INTO `$table` (".trim($sql1,',').") VALUES(".trim($sql2,',').")";
                      
			return $this->query($sql);
		}elseif($method=='update') {
			$sql1 = $sql2 ='';
			foreach ($array as $k=>$v) {
				$sql1 .= "`$k`='$v',";
			}

			$sql = "UPDATE `$table` SET ".trim($sql1,',').($condition!=''?" WHERE $condition":'');
                       
                        
			return $this->query($sql);
		}
	}

	function requestex($newdata, $table_name, $condition=NULL){
		if($condition===NULL){
			//插入数据
			foreach ($newdata as $k=>$v){
				$field_sql .= "'$k',";
				$value_sql .= "'$v',";
			}
			$sql = "INSERT INTO `$table_name` (".trim($field_sql, ',').") VALUES(".trim($value_sql, ',').")";
			die($sql);
			return $this->query($sql);
		}else{
			//修改
			if(is_array($condition)){
				$condition = $this->build_condition($condition);
			}
			$condition = $condition==NULL?"":$condition;

			foreach ($newdata as $k=>$v){
				$sql .= "'$k'='$v',";
			}

			die(__LINE__);
			$sql = "UPDATE `$table_name` SET ".trim($sql, ',').($condition!=''?" WHERE $condition":"");
			die($sql);
			return $this->query($sql);
		}
	}

	function smart_query($table, $options){
		$condition = isset($options['condition']) ? $options['condition'] : null;
		$one = isset($options['one']) ? $options['one'] : false;
		$offset = isset($options['offset']) ? abs(intval($options['offset'])) : 0;
		if ( $one ) {
			$size = 1;
		} else {
			$size = isset($options['size']) ? abs(intval($options['size'])) : null;
		}
		$select = isset($options['select']) ? $options['select'] : '*';
		$order = isset($options['order']) ? $options['order'] : null;

		$condition = $this->build_condition( $condition );
		$condition = (null==$condition) ? null : "WHERE $condition";

		$limitation = $size ? "LIMIT $offset,$size" : null;

		$sql = "SELECT {$select} FROM `$table` $condition $order $limitation";
		return $this->getAll($sql);
	}

	public function build_condition($condition=array(), $logic='AND')
	{
		if ( is_string( $condition ) || is_null($condition) )
			return $condition;

		$logic = strtoupper( $logic );
		$content = null;

		foreach ( $condition as $k => $v ) {
			$v_str = null;
			$v_connect = '=';

			if ( is_numeric($k) ) {
				$content .= $logic . ' (' . $this->build_condition( $v, $logic ) . ')';
				continue;
			}

			$maybe_logic = strtoupper($k);
			if ( in_array($maybe_logic, array('AND','OR'))) {
				$content .= $logic . ' (' . $this->build_condition( $v, $maybe_logic ) . ')';
				continue;
			}

			if ( is_numeric($v) ) {
				$v_str = $v;
			} else if ( is_null($v) ) {
				$v_connect = ' IS ';
				$v_str = ' NULL';
			} else if ( is_array($v) ) {
				if ( isset($v[0]) ) {
					$v_str = null;
					foreach($v AS $one) {
						if (is_numeric($one)) {
							$v_str .= ','.$one;
						} else {
							$v_str .= ',\''.$this->EscapeString($one).'\'';
						}
					}
					$v_str = '(' . trim($v_str, ',') .')';
					$v_connect = 'IN';
				} else if ( empty($v) ) {
					$v_str = $k;
					$v_connect = '<>';
				} else {
					$v_connect = array_shift(array_keys($v));
					$v_s = array_shift(array_values($v));
					$v_str = "'".$this->EscapeString($v_s)."'";
					$v_str = is_numeric($v_s) ? $v_s : $v_str ;
				}
			} else {
				$v_str = "'".$this->EscapeString($v)."'";
			}
			$content .= " $logic `$k` $v_connect $v_str ";
		}
		$content = preg_replace( '/^\s*'.$logic.'\s*/', '', $content );
		$content = preg_replace( '/\s*'.$logic.'\s*$/', '', $content );
		$content = trim($content);
		return $content;
	}
	public function EscapeString( $string ) {
		return @mysql_real_escape_string( $string);
	}

	public function toggle_field($table, $field, $condition){
		$sql = "SELECT $field from $table WHERE $condition";
		$f = $this->getOne($sql);
		if($f == 0){
			$newdata = array(
			    "$field"=>1,
			);
		}else{
			$newdata = array(
			    "$field"=>0,
			);
		}
		return $this->request($newdata, $table, 'update', $condition);
	}
}

?>