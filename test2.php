<?php

$path = "/Users/mrchen/Desktop/test2.txt";
file_put_contents($path,"");
for ($i = 0; $i < 10;$i++){
    $str = $i."  ";
    file_put_contents($path,$str,FILE_APPEND);
    sleep(5);
}
