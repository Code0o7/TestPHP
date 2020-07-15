<?php

$url = "https://c1.4861.net:2020/avid5ef16520fe75d/1500kb/hls/index.m3u8";

$content = getHttpsContent($url);
file_put_contents("/Users/mrchen/Desktop/data.json",$content);

// 获取https文件内容
function  getHttpsContent($url){
    //1. 初始化curl请求
    $ch = curl_init();
    //2. 设置请求的服务器地址
    curl_setopt($ch,CURLOPT_URL,$url);
    //3. 不管get、post，都跳过证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    // ps: 如果目标网页跳转，也跟着跳转
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5000000);

    //判断是直接将结果显示echo还是return
    //设置结果返回
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec($ch);
    // 处理重定向的请求
//    $redirectUrl = curl_getinfo($ch)["redirect_url"];
//    if ($redirectUrl){
//        // 请求被重定向了 继续请求重定向
//        $this -> url = $redirectUrl;
//        $result = $this -> send($data);
//    }

    //4. 关闭资源
    curl_close($ch);

    return $result;
}

