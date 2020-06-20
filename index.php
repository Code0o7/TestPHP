<?php

//$cmd = 'rclone copy  BetterZip-4.2.5.zip  GDSuite:/test/';

//$cmd = 'cp /www/wwwroot/test.yycode.top/BetterZip-4.2.5.zip  /root/test.zip';

$cmd = "ps aux | head";
// 执行命令
//putenv('DYLD_LIBRARY_PATH');
$re = exec($cmd,$result,$status);
// 结果
if ($status == 0){
    // 成功
    echo "成功<br>";
    echo "<pre>";
    var_dump($result);
    var_dump("结果:".$re);
}else {
    // 失败
    echo "失败<br>";
    echo "<pre>";
    var_dump($result);
    echo "结果:<br>";
    var_dump($re);
}