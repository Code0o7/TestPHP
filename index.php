<?php

$url = "https://c1.4861.net:2020/avid5ef16520fe75d/1500kb/hls/index.m3u8";

$content = getHttpsContent($url);
file_put_contents("log.txt",$content);
echo "获取内容长度:".strlen($content);

// 获取https文件内容
function  getHttpsContent($url){
    global $logPath;

    $stream_opts = [
        "ssl" => [
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ]
    ];

    $content = "";
    try {
        $content = file_get_contents($url,false, stream_context_create($stream_opts));
    }catch (Exception $exception){
        echo "捕获到获取内容错误:";
    }

    return $content;
}

