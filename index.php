<?php

$mycmd = "ffmpeg -version";

exec($mycmd.' 2>&1',$result,$status);
$success = $status == 0 ? true : false;
if ($success){
    echo "成功";
}else {
    echo "失败:";
    echo "<pre>";
    var_dump($result);
}