<?php

$startTime = $this->getime();
for ($i=0;$i<100;$i++){
    print "<!--1234567890#########0#########0#########0#########0#########0#########0#########0#########012345-->";
}
$timea = $this->getime() - $startTime;

echo "耗时：".$timea."ms";