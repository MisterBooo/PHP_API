<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/23
 * Time: 下午7:48
 */
require_once ('./response.php');
require_once ('./db.php');

$page = isset($_GET['page'])? $_GET['page']:1;
$pageSize = isset($_GET['pageSize'])?$_GET['pageSize']:6;
if (!is_numeric($page)||!is_numeric($pageSize)) {
   return Response::show('401','数据不合法');
}
$offset = ($page - 1) * $pageSize;
$sql = "select * from cccc WHERE c = 2 limit ".$offset.",".$pageSize ;

try{
    $connect = Db::getInstance()->connect();
}catch (Exception $e){
    return Response::show('403','数据库连接失败');
}



$result = mysqli_query($connect,$sql);

$videos = array();
while ($video = mysqli_fetch_assoc($result)){
    $videos[] = $video;
}
if ($videos){
    return Response::show('200','首页数据获取成功',$videos);
}else{
    return Response::show('400','首页数据获取失败',$videos);

}

?>