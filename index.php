<?php

$cmd = 'gclone copy GDSuiteTeam:{1EnLOM8-Cvh9SkKIfft9Nq921PnX1JnHQ} GDSuiteTeam:test --drive-server-side-across-configs -P';
$cmd .= " >> /www/wwwroot/test.yycode.ml/test.txt 2>&1 &";
echo $cmd;
die;

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



