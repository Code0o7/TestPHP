<?php

$url = 'https://drive.google.com/drive/folders/1UKB8f4tQaIfUhYFTvIFxbBaVt4dxTel3';

//1. 初始化curl请求
$ch = curl_init();
//2. 设置请求的服务器地址
curl_setopt($ch,CURLOPT_URL,$url);
//3. 不管get、post，都跳过证书验证
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
//设置结果返回
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
$returnCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
//4. 关闭资源
curl_close($ch);

echo $returnCode;
echo "<pre>";
var_dump($result);


