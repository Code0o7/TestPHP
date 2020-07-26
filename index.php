<?php

$url = "http://cloudmount.yycode.ml/LTheater1/loveTheater/movies/5f1cad284a58a/index.m3u8";
$cmd = "ffmpeg -i https://XXXX/video.m3u8 -c copy  output.mp4";
$res = execShell($cmd);
if ($res["success"]){
    echo "转换成功";
}else {
    echo "转换失败";
    echo "<pre>";
    var_dump($res);
}

// 执行shell命令
function execShell($cmd){
    exec($cmd.' 2>&1',$result,$status);
    $success = $status == 0 ? true : false;
    return [
        "success"   =>  $success,
        "result"    =>  $result
    ];
}



