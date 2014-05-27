<?php

function smarty_modifier_truncatex($string, $length = 80, $etc = '...')
{
    if ($length == 0)
        return '';
    $len = mb_strlen($string, "UTF-8");
    if($len >$length){
                return mb_substr($string, 0, $length, "UTF-8").$etc;
    }else{
                return $string;
    }
}

/* vim: set expandtab: */

?>
