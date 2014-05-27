<?php
class DxJson{
	public static function encode($in, $indent=0, $from_array = false){
		$out = '';
		foreach($in as $key=>$value){
			$out .= str_repeat("    ", $indent + 1);
			$out .= '"'.self::escape((string)$key).'" :  ';
			if(is_object($value) || is_array($value)){
				$out .= "\n";
				$out .= self::encode($value, $indent + 1);
			}elseif (is_bool($value)){
				$out .= $value ? 'true' : 'false';
			}elseif (is_null($value)){
				$out .= 'null';
			}elseif (is_string($value)){
				$out .= '"'. self::escape($value). '"';
			}else{
				$out .= $value;
			}
			$out .= ",\n";
		}
		if (!empty($out)) {
			$out = substr($out, 0, -2);
		}
		$out = str_repeat("    ", $indent) . "{\n" . $out;
		$out .= "\n" . str_repeat("    ", $indent) . "}";

		return $out;
	}
	public static function escape($str){
		return preg_replace("!([\b\t\n\r\f\"\\'])!", "\\\\\\1", $str);
	}
}
