<?php

$startTime = getime();
for ($i=0;$i<100;$i++){
    print "<!--1234567890#########0#########0#########0#########0#########0#########0#########0#########012345-->";
}
$timea = getime() - $startTime;

echo "耗时：".$timea."ms";

function getime(){
    $t = gettimeofday();
    return (float)($t['sec'] + $t['usec']/1000000);
}