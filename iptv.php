<?php
header("Content-type: text/html; charset=utf-8");

$path = "/Users/mrchen/Desktop/a.txt";

$fileContents = fileContentOneByOne($path);
echo "<pre>";
$totalCount = 0;
$validCount = 0;

echo "共:".count($fileContents)."个";
for ($i = 0; $i < count($fileContents);$i++){
    addLog("正在分析第:".$i."个");
    $totalCount ++;
    $content = trim($fileContents[$i]);
    $arr = explode(",",$content);
    $name = $arr[0];
    $url = $arr[1];
    if (strlen($content) > 0 && strlen($url) > 0 && reachable($url)) {
//        echo $name. "\n";
        $validCount ++;
    }
}

echo "共:".$totalCount."\n";
echo "有效:".$validCount."\n";


function addLog($log){
    $logPath = "/Users/mrchen/Desktop/log.txt";
    file_put_contents($logPath,$log."\n");
}

/**
 * 逐行读取文件
 * @param $txtfile 文件路径
 * @return array|string 结果
 */
function fileContentOneByOne($filePath){
    $file = @fopen($filePath,'r');
    $content = array();
    if(!$file){
        return 'file open fail';
    }else{
        $i = 0;
        while (!feof($file)){
//            $content[$i] = mb_convert_encoding(fgets($file),"UTF-8","GBK,ASCII,ANSI,UTF-8");
            $content[$i] = mb_convert_encoding(fgets($file),"UTF-8");
            $i++ ;
        }
        fclose($file);
        $content = array_filter($content); //数组去空
    }

    return $content;
}




function reachable($url){
    $ch = curl_init();
    $timeout = 10;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_HEADER, 1);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $contents = curl_exec($ch);

    if (preg_match("/404/", $contents)) {
        return false;
    }else {
        return true;
    }
}