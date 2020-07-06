<?php

$path = "/www/wwwroot/cloud.yycode.ml/cloudmount/GDSuite/我的数据/备份数据/db/web_stack_db/all/";
$cmd = "rclone delete ".$path;
exec($cmd.' 2>&1',$result,$status);
$success = $status == 0 ? true : false;
if ($success){
    echo "创建成功";
}else {
    echo "创建失败";
}



