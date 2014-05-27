<?php

function smarty_modifier_encryptemail($string)
{
        $email = preg_replace("#[0-9a-z_]{2}@(.*)\.#isU", "**@**.", $string);
        return $email;
}

/* vim: set expandtab: */

?>
