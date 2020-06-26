<?php

$cmd = 'gclone copy GSuiteTeam:{1UKB8f4tQaIfUhYFTvIFxbBaVt4dxTel3} '
exec($cmd,$result,$status);
$success = $status == 0 ? true : false;
return [
    "success"   =>  $success,
    "result"    =>  $result
];


