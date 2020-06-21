<?php

//$cmd = 'rclone copy  /www/wwwroot/test.yycode.top/BetterZip-4.2.5.zip  GDSuite:/test/';
$cmd = 'rclone ls GDSuite:/blogImages/Hexo博客迁移以及多终端同步';

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
    $data = [];
    foreach ($result as $item) {
        $dirArr = explode("-1",$item);
        foreach ($dirArr as $key=>$dir) {
            // 去掉首尾空格
            $dir = trim($dir);
            // 去掉空字符串
            if (strlen($dir) == 0){
                unset($dirArr[$key]);
            }else {
                $dirArr[$key] = $dir;
            }
        }

        $dirKey = "";
        $dirValue = "";
        if (count($dirArr) > 1){
            $dirKey = $dirArr[1];
            $dirValue = $dirArr[2];
        }
        $data[] = [$dirKey=>$dirValue];
    }


    echo "成功<br>";
    echo "<pre>";
    var_dump($data);
    var_dump("结果:".$re);
}else {
    // 失败
    echo "失败<br>";
    echo "<pre>";
    var_dump($result);
    echo "结果:<br>";
    var_dump($re);
}