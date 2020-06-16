<?php

//判断是否有文件上传
if (isset($_FILES['file'])) {
    // 返回值默认json
    header('Content-type: application/json');

    // 文件信息
    $fileInfo = $_FILES["file"];

    // 名字
    $name = $fileInfo["name"];
    // 类型
    $type = $fileInfo["type"];

    // 目标文件目录
    $target_path = "./dbback/".$name;

    //将文件从临时目录拷贝到指定目录
    if(move_uploaded_file($fileInfo['tmp_name'], $target_path)) {
        //上传成功,可进行进一步操作,将路径写入数据库等.
        echo "上传成功";
    }  else {
        // 上传失败
        echo "上传失败";
    }
}else {
    echo "上传发生错误";
}

