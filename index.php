<?php

$cmd = 'php ./test.php 123 456';

exec($cmd,$result,$status);
$success = $status == 0 ? true : false;
if ($success){
    echo "成功";
    echo "<pre>";
    var_dump($result);
}else {
    echo "失败";
    echo "<pre>";
    var_dump($result);
}
die;

$path = "/Users/mrchen/Desktop/fileTransferPro.txt";
$content = file_get_contents($path);
$content = base64_encode($content);

echo json_encode(["code"=>200,"message"=>"","content"=>$content]);



