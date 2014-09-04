<?php
/**
 * 公用类
 * @author Keven.Zhong
 * @Version 1.0 At 2014-04-15
 */
class App_Common{
   
    /**
     * 返回缓存过期时间
     * 
     */
    public static function getCacheTime(
        $maxCacheTime = null, $minCacheTime = null){
         $config = $GLOBALS['config'];
         
         $maxCacheTime = $maxCacheTime
            ? $maxCacheTime : $config['app']['maxCacheTime'];
         $minCacheTime = $minCacheTime
            ? $minCacheTime : $config['app']['minCacheTime'];
         
         $requestTime = $_SERVER['REQUEST_TIME'];
         $result = $maxCacheTime - ($requestTime) % $maxCacheTime;
         return $result > $minCacheTime ? $result : $minCacheTime;
    }
    
    /**
     * 写日志
     * @param string $message
     * @param string $level
     */
    public static function addLog($message, $level){
        
    }

}