<?php

$path = "我的数据/备份数据/db/web_stack_db/all";
$cmd = "rclone lsjson GDSuite:我的数据/备份数据/db/";
exec($cmd.' 2>&1',$result,$status);
$success = $status == 0 ? true : false;

if ($success){
    $fileList = $result;
    $fileList = implode("",$fileList);
    $fileList = json_decode($fileList,true);
    echo "<pre>";
    var_dump($fileList);
}



