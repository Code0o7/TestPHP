<?php



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
