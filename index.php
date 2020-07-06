<?php

$path = "我的数据/备份数据/db/";
$cmd = "rclone moveto ./test GDSuite:".$path;
exec($cmd.' 2>&1',$result,$status);
$success = $status == 0 ? true : false;

if ($success){
   echo "成功";
}else {
    echo "失败";
}



