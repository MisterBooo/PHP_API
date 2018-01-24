<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/24
 * Time: 上午11:46
 */

class Db{
    static private $_instance;

    private function _construct(){

    }

    /**
     * 单例设计
     */
    static public function getInstance(){
         if (!(self::$_instance instanceof self)){
             self::$_instance = new self();
         }
        return self::$_instance;
    }

}



