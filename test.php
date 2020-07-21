<?php

$db_name_php = 'web_stack_db';
$sql = "SELECT * FROM information_schema.SCHEMATA where SCHEMA_NAME='".$db_name_php."'";
echo "sql:".$sql;
$link = new mysqli("localhost","root","199156");
if ($link->connect_error){
    echo "链接数据库失败";
}else {
    echo "链接数据库成功";
}
$result = $link -> query($sql);
if ($result){
    // 获取所有行数据 只要关联数组
    $res = $result -> fetch_all(MYSQLI_ASSOC);
    // 释放资源
    $result -> free();
    if ($res){
        echo "存在";
    }else {
        echo "不存在";
    }
    echo "<pre>";
    var_dump($res);
}else {
    // 查询失败
    echo "查询失败,错误如下:".$link -> error;
    $result -> free();
}
die;

$result = mysqli_query($link,$sql);
echo "<pre>";
var_dump($result);
if($result){
    echo "存在";
}else {
    echo "不存在";
}
die;
While($row = mysqli_fetch_assoc($result)){
    $data[] = $row['Database'];
}
unset($result, $row);
mysqli_close();

if (in_array(strtolower($db_name_php), $data))
    echo '[',$db_name_php,']数据库存在';
else
    echo '[',$db_name_php,']数据库不存在';
