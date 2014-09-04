<?php
/**
 * 首页
 * @author Keven.Zhong
 * @Version 1.0 At 2014-01-01
 */

require dirname(__FILE__).'/../init/init.php';

$dataConfig = new Data_Index_Config();
$dataConfig->key = 'version';
$versionConfig = App_Index::getConfig($dataConfig);
var_dump($versionConfig);
echo '<br><br>';
$versionConfig = App_Index::getConfigFromRedis($dataConfig);
var_dump($versionConfig);

$param = Array();
$content = App_Index::getApiResult($param);

//view
include $GLOBALS['config']['view']['basePath'].'/index.html';