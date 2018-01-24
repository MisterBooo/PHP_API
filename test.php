<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/24
 * Time: 下午4:28
 */
require_once ('./file.php');

$data = array(
    'id' => 1,
    'name' => 'name',
    'type' => array(1,2,3),
    'test' => array(1,23,33 => array(111,'aaa'))
);

$file = new File();

$file->_construct();

if ($file->cacheData('index_mk_cache',$data)){
    echo 'success';
}else{
    echo 'error';
}

if ($file->cacheData('index_mk_cache',null)){
    echo '删除缓存成功';
}else{
    echo 'error';
}



