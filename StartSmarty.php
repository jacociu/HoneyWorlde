<?php

require_once('./Smarty/libs/Smarty.class.php');

class StartSmarty
{
    static function configuration(){
        $smarty=new Smarty();
        $smarty->template_dir= './Smarty/libs/templates';
        $smarty->compile_dir= './Smarty/libs/templates_c';
        $smarty->config_dir= './Smarty/libs/configs';
        $smarty->cache_dir= './Smarty/libs/cache';
        return $smarty;
    }
}

