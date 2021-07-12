<?php

$res = fileContentOneByOne('gfwlist.action');
$content = array();
foreach ($res as $item){
    $item = str_replace("\n","",$item);
    $newItem = "forward-socks5 ".$item." 0.0.0.0:1086 .\n";
    file_put_contents('/Users/mrchen/Desktop/gfwlist.action',$newItem,FILE_APPEND);
}

//$res = fileContentOneByOne('/Users/mrchen/Desktop/gfwlist.action');
//echo "<pre>";
//var_dump($res);

function fileContentOneByOne($filePath){
    $file = @fopen($filePath,'r');
    $content = array();
    if(!$file){
        return 'file open fail';
    }else{
        $i = 0;
        while (!feof($file)){
            $content[$i] = mb_convert_encoding(fgets($file),"UTF-8","GBK,ASCII,ANSI,UTF-8");
            $i++ ;
        }
        fclose($file);
        $content = array_filter($content); //数组去空
    }

    return $content;
}