<?php

ini_set('display_errors', 'off'); //开启或关闭PHP异常信息
date_default_timezone_set('Asia/Shanghai');
error_reporting(E_ALL); //异常级别设置

//系统设置不可替换的静态配置
define('FD_DS', DIRECTORY_SEPARATOR); //定制目录符合
define('SYS_ROOTDIR', dirname(dirname(__FILE__)) . FD_DS);

//autoload not init tips
if (!file_exists(SYS_ROOTDIR . '../vendor/autoload.php')) {
    echo "please run composer update. on project root to init.\n";
    exit;
}
//加载autoload
require_once(SYS_ROOTDIR . '../vendor/autoload.php');
