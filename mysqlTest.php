<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/24
 * Time: 上午9:59
 */
require_once './response.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123123';
$connect = mysqli_connect($dbhost,$dbuser,$dbpass);

if (!$connect){
    die('Could not connect: '.mysqli_error());
}

$sql = 'select * from testDatabase.cccc';

$result =  mysqli_query($connect,$sql);

$arrays = array();

while ($array = mysqli_fetch_assoc($result)){
    $arrays[] = $array;
}

if ($arrays){
    return Response::show(200,'成功',$arrays);
}else{
    return Response::show(400,'失败',$arrays);

}





?>