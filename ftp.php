<?php

// 要上传的文件绝对路径
$path = "/Users/mrchen/Desktop/VirtualBox-6.1.6-137129-OSX.dmg"; //$argv[1];

// 链接ftp服务器
$FTP_HOST = "ftp.unaux.com";
$FTP_PORT = 21;
$FTP_USER = "unaux_25797367";
$FTP_PASS = "chenhuiyi199156";
$conn_id = @ftp_connect($FTP_HOST, $FTP_PORT);
if ($conn_id){
    // 链接ftp服务器成功 登录
    $login_id = @ftp_login($conn_id, $FTP_USER, $FTP_PASS);
    if ($login_id){
        // 登录成功
        echo "登录成功";
        @ftp_pasv($conn_id, 1); // 打开被动模拟
    }
}else {
    echo "ftp服务器不存在";
}