<?php

die;
$content = $_GET["content"];
$content = base64_decode($content);
//$content = iconv('UTF-8','gbk',urldecode($content));
$content = urldecode($content);
echo $content;

//echo getlogo2("https://www.baidu.com");
function getlogo2($address){
    $url = $address."/favicon.ico";
    //1. 初始化curl请求
    $ch = curl_init();
    //2. 设置请求的服务器地址
    curl_setopt($ch,CURLOPT_URL,$url);
    //3. 不管get、post，都跳过证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    //设置结果返回
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    $file_content = curl_exec($ch);
    $returnCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    if($returnCode != 200 || $file_content === false){
        return false;
    }
    $imageInfo = getimagesize($url);
    $prefiex = 'data:' . $imageInfo['mime'] . ';base64,';
    $base64 = $prefiex.chunk_split(base64_encode($file_content));
    return $base64;
}

function getlogo1($address){
    $url ="http://tool.bitefu.net/ico/?url=".$address."&type=1";
    //1. 初始化curl请求
    $ch = curl_init();
    //2. 设置请求的服务器地址
    curl_setopt($ch,CURLOPT_URL,$url);
    //3. 不管get、post，都跳过证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    $result = curl_exec($ch);
    //4. 关闭资源
    curl_close($ch);
    return $result;
}

die;
$imageInfo = getimagesize($url);
$prefiex = 'data:' . $imageInfo['mime'] . ';base64,';
$base64_image_content = $prefiex.chunk_split(base64_encode($file_content));
echo $base64_image_content;
die;

if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
    $type = $result[2];
    $path = "iconfont/";
    if(!file_exists($path))
    {
        //检查是否有该文件夹，如果没有就创建，并给予最高权限
        mkdir($path, 0700);
    }
    $new_file = $path . time() . ".{$type}";
    if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
        echo '保存成功：', $new_file;
    } else {
        echo '保存失败';
    }
}