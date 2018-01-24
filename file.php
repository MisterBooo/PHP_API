<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/24
 * Time: 下午4:20
 */


class File{

    private $_dir;
    const EXT = '.txt';
    /**
     * 构造函数
     * 非常适合在使用对象之前做一些初始化工作
     */
    public function __construct(){
        $this->_dir = dirname(__FILE__) . '/files/';
    }
    /**
     * @param $key
     * @param string $value
     * @param string $path
     */
    public function cacheData($key, $value='', $cacheTime = 0){

        $filename = $this->_dir  . $key . self::EXT;

        if ($value !== ''){//将value写入缓存
            if (is_null($value)) {
                return @unlink($filename);
            }

            $dir = dirname($filename);
            if(!is_dir($dir)) {
                mkdir($dir, 0777);
            }
            $cacheTime = sprintf('%011d',$cacheTime);
           return file_put_contents($filename,$cacheTime.json_encode($value));
        }

        if (!is_file($filename)){
            return FALSE;
        }
        $contents = file_get_contents($filename);
        $cacheTime = (int)substr($contents,0,11);
        $value = substr($contents, 11);
        if ($cacheTime != 0 && ($cacheTime + filemtime($filename) < time())){
            //缓存时间到期了，删除缓存
            unlink($filename);
            return FALSE;
        }

        return json_decode($value,true);


    }

}


?>

