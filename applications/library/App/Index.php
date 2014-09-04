<?php
/**
 * 首页内容
 * @author Keven.Zhong
 * @Version： 1.0 At 2014-04-15
 */

class App_Index {
    
    /**
     * mc获取数据
     * @param Data_Index_Config $data
     * @return Ambigous <NULL, multitype:, mixed, unknown>
     */
    public static function getConfig(Data_Index_Config $data){
        $rs = null;
        $mem = Core_Cache::factory('memcache');
        $key = $GLOBALS['config']['app']['preMemKey'] . ':' . __CLASS__ . ':' . __FUNCTION__ . ':' . md5($data->key);
        if($data->appCacheRead) {
            $rs = $mem->get($key);
        }
        if(is_null($rs)){
            $rs = Model_Config::getConfigValFromDb($data->key);
            $mem->set($key, $rs, App_Common::getCacheTime(600));
        }
        return $rs;
    }
    
    /**
     * redis获取数据
     * @param Data_Index_Config $data
     */
    public static function getConfigFromRedis(Data_Index_Config $data){
        $rs = null;
        $redis = Core_Cache::factory('redis');
        $key = $GLOBALS['config']['app']['preMemKey'] . ':' . __CLASS__ . ':' . __FUNCTION__ . ':' . md5($data->key);
        if($data->appCacheRead) {
            $rs = $redis->get($key);
        }
        if(is_null($rs)){
            $rs = Model_Config::getConfigValFromDb($data->key);
            $redis->set($key, $rs, App_Common::getCacheTime(600));
        }
        return $rs;
    }
    
    /**
     * 
     * @param unknown $parameter
     * @return Ambigous <NULL, mixed>
     */
    public static function getApiResult($parameter){
        $obj = Model_OneApi::getInstance();       
        $rs = $obj->getApi($parameter);
        return $rs;
    }
}