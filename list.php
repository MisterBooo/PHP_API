<?php
/**
 * Created by MisterBigbooo.
 * User: Zeno
 * Date: 2018/1/23
 * Time: 下午7:48
 */
require_once ('./response.php');
require_once ('./db.php');
require_once ('./file.php');


$file = new  File();
$data = $file->cacheData('index_cron_cache');
if ($data){
    return Response::show('200','首页数据获取成功',$data);
}else{
    return Response::show('400','首页数据获取失败',$data);
}

exit;

//先去查询缓存
$file = new File();

$page = isset($_GET['page'])? $_GET['page']:1;
$pageSize = isset($_GET['pageSize'])?$_GET['pageSize']:6;
if (!is_numeric($page)||!is_numeric($pageSize)) {
   return Response::show('401','数据不合法');
}
$offset = ($page - 1) * $pageSize;
$sql = "select * from cccc WHERE c = 2 limit ".$offset.",".$pageSize ;


$cache = new File();
$videos = array();
if (!$cache ->cacheData('index_mk_cache'.$page.'-'.$pageSize)){ //没缓存或者缓存过期了
    try{
        $connect = Db::getInstance()->connect();
    }catch (Exception $e){
        return Response::show('403','数据库连接失败');
    }
    $result = mysqli_query($connect,$sql);

    while ($video = mysqli_fetch_assoc($result)){
        $videos[] = $video;
    }
    if ($videos){
        $cache ->cacheData('index_mk_cache'.$page.'-'.$pageSize,$videos,120);
    }

}else{//直接读取缓存
    $videos = $cache ->cacheData('index_mk_cache'.$page.'-'.$pageSize);
}





if ($videos){
    return Response::show('200','首页数据获取成功',$videos);
}else{
    return Response::show('400','首页数据获取失败',$videos);

}

?>