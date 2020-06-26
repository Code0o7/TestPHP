<?php

$cmd = 'gclone copy GSuiteTeam:{1UKB8f4tQaIfUhYFTvIFxbBaVt4dxTel3} GSuiteTeam:test --drive-server-side-across-configs -P';

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



