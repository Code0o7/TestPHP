<?php

//$cmd = 'rclone copy  BetterZip-4.2.5.zip  GDSuite:/test/';

$cmd = 'cp ./BetterZip-4.2.5.zip  /root/test.zip';

// 执行命令
//putenv('DYLD_LIBRARY_PATH');
exec($cmd,$result,$status);
// 结果
if ($status == 0){
    // 成功
    echo "成功<br>";
    echo "<pre>";
    var_dump($result);
}else {
    // 失败
    echo "失败<br>";
    echo "<pre>";
    var_dump($result);
}