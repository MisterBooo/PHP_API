<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/24
 * Time: 上午11:46
 */

class Db{
    static private $_instance;
    static private $_connectSource;
    private $_dbConfig = array(
        'host'=>'localhost',
        'user'=>'root',
        'password'=>'123123',
        'database'=>'testDatabase'
    );


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

    public function connect(){
        if (!self::$_connectSource) {
            //连接数据库
            self::$_connectSource = mysqli_connect($this->_dbConfig['host'], $this->_dbConfig['user'], $this->_dbConfig['password']);
            if (!self::$_connectSource){
                die('mysql connect error '.mysqli_error());
            }
            //选择数据库
            mysqli_select_db(self::$_connectSource,$this->_dbConfig['database']);
        }
       return self::$_connectSource;
    }

}
$connect = Db::getInstance()->connect();
$sql = 'select * from cccc';
//查询数据库
$result = mysqli_query($connect,$sql);
echo mysqli_num_rows($result);





