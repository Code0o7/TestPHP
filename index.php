<?php

//$cmd = 'rclone copy  /www/wwwroot/test.yycode.top/BetterZip-4.2.5.zip  GDSuite:/test/';
//$cmd = 'rclone delete GSuite:/blogImages/Test/IMG_0689.JPG -vvv';
$cmd = 'rclone lsd GSuite:';

//$path = "./test";
//if (!file_exists($path)){
//    mkdir($path);
//    chmod($path,0700);
//}

//$cmd = 'sudo cp /www/wwwroot/test.yycode.top/BetterZip-4.2.5.zip /root/test.zip';

//$cmd = "ps aux | head";
// 执行命令
//putenv('DYLD_LIBRARY_PATH');
$re = exec($cmd,$result,$status);

//$re = shell_exec($cmd);
//echo "结果:";
//var_dump($re);
//die;

// 结果
if ($status == 0){
    // 成功
//    $data = [];
//    foreach ($result as $item) {
//        // 去掉首尾空格
//        $str = trim($item);
//        // 分割成数组
//        $array = explode(" ",$str);
//
//        $fileTime = "";
//        $fileName = "";
//        if (count($array) > 3){
//            $fileTime = $array[1]." ".$array[2];
//            $fileName = $array[3];
//        }
//        $data[$fileTime] = $fileName;
//    }


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