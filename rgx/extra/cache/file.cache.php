<?php
namespace re\rgx;
/**
 * 文件缓存驱动类
 * @copyright reginx.com
 * $Id: file.cache.php 5 2017-07-19 03:44:30Z reginx $
 */
class file_cache extends cache {
    
    /**
     * 键 前缀
     *
     * @var unknown_type
     */
    private $_pre = 'RGX_';
    
    /**
     * 缓存路径
     * @var [type]
     */
    private $_dir = CACHE_PATH;
    
    /**
     * 架构函数
     *
     * @param unknown_type $conf
     */
    public function __construct ($conf = array(), $extra = []) {
        $this->_pre = CFG('cache.pre') ?: 'RGX_';
        $this->_dir = $this->_dir . $extra['name'] . '_' . $extra['id'] . DS;
        if (!is_dir($this->_dir)) {
            misc::mkdir($this->_dir);
        }
    }
    
    /**
     * 获取缓存文件
     *
     * @param String $key
     * @return String
     */
    private function _getdatafile ($key) {
        $dir = $this->_getdir($key);
        if (!is_dir($this->_dir . $dir)) {
            misc::mkdir($this->_dir . $dir);
        }
        return $this->_dir . $dir . DS . $this->_getfilename($key);
    }
    
    /**
     * 获取Key对应的散列值作为文件名
     *
     * @param String $key
     * @return Integer
     */
    private function _getfilename ($key) {
        if (empty($key)) {
            throw new exception(LANG('invalid cache key'), exception::INVALID_NAME);
        }
        return sprintf('%X', crc32($key)) . '.php';
    }
    
    /**
     * 计算目录名
     *
     * @param unknown_type $key
     * @return unknown
     */
    private function _getdir ($key) {
        $dir = 'default';
        if (($pos = strpos($key, '@')) !== false) {
            $dir = substr($key, 0, $pos);
        }
        return sprintf('%08X', abs(crc32($dir)));
    }
    
    /**
     * 获取缓存统计
     *
     * @param unknown_type $path
     * @param unknown_type $ret
     */
    private function _getfilestat ($path = null , &$ret) {
        if(empty($ret)){
            $ret = array('nums' => 0, 'total' => 0);
        }
        if(empty($path)){
            $path = CACHE_PATH . '*';
        }else{
            $path = realpath($path) . '/*';
        }
        foreach (glob($path) as $v){
            if(is_file($v)){
                $ret['nums']++;
                $ret['total'] += filesize($v);
            }else{
                $this->_getfilestat($v , $ret);
            }
        }
    }
    
    /**
     * 统计
     */
    public function stat () {
        $ret   = $stat  = array();
        $stat  = $this->get('rex@filecachestat');
        if (RUN_MODE == 'debug' || empty($stat)) {
            $stat = array();
            $this->_getfilestat(null , $stat);
            // 十分钟更新一次
            $this->set('rex@filecachestat' , $stat , 600);
        }
        $ret[] = array(LANG('cache type'), 'File');
        $ret[] = array(LANG('cache directory') , core::relpath(realpath(CACHE_PATH)));
        $ret[] = array(LANG('cache entries') , $stat['nums']);
        $ret[] = array(LANG('cache size') , sprintf('%.2f K' , $stat['total']  / 1024));
        return $ret;
    }

    /**
     * 获取缓存
     *
     * @param String $key
     */
    public function get($key) {
        $this->count('r');
        $file = $this->_getdatafile($key);
        if(!is_file($file)){
            return null;
        }
        return include($file);
    }

    /**
     * 设置缓存
     *
     * @param String $key
     * @param Mixed $value
     * @param Integer $ttl
     */
    public function set ($key, $value, $ttl = 0) {
        $this->count('w');
        // 文件内容
        $data = "<?php" . PHP_EOL
              . "/**" . PHP_EOL
              . " *  created by RGX v" . RGX_VER
              . " file cache" . PHP_EOL
              . " *  @time " . date('Y-m-d H:i:s', REQUEST_TIME) . PHP_EOL
              . " */" . PHP_EOL;

        // 过期设置
        if ($ttl > 1) {
            $data .= PHP_EOL . 'if (' . (REQUEST_TIME + $ttl) . ' < REQUEST_TIME) return false;' . PHP_EOL;
        }
        $data .= "return " . var_export($value, true) . ";";

        return file_put_contents($this->_getdatafile($key), $data, LOCK_EX);
    }

    /**
     * 删除指定缓存
     *
     * @param String $key
     */
    public function del ($key) {
        $file = $this->_getdatafile($key);
        if (is_file($file)) {
            unlink($file);
        }
    }
    
    /**
     * 批量清除缓存
     */
    public function flush ($group = null) {
        if (empty($group)) {
            return misc::rmrf($this->_dir);
        }
        else {
            return misc::rmrf($this->_dir . $this->_getdir($group));
        }
    }
}