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
     *
     */
    public function _construct(){
        $this->_dir = dirname(__FILE__) . '/files/';
    }
    /**
     * @param $key
     * @param string $value
     * @param string $path
     */
    public function cacheData($key, $value='', $path=''){

        $filename = $this->_dir  . $key . self::EXT;

        if ($value !== ''){//将value写入缓存
            if (is_null($value)) {
                return @unlink($filename);
            }

            $dir = dirname($filename);
            if(!is_dir($dir)) {
                mkdir($dir, 0777);
            }
           return file_put_contents($filename,json_encode($value));
        }

        if (!is_file($filename)){
            return FALSE;
        }else{
            return json_decode(file_get_contents($filename),true);
        }



    }

}

?>