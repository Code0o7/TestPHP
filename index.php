<?php

$url = "https://d1.xia12345.com/dl2/videos/202004/vRzFAVjz/downloads/vRzFAVjz.mp4";

download($url,"movie.mp4",function ($pro){
//    file_put_contents("/Users/mrchen/Desktop/data.json","下载进度:".$pro);
    file_put_contents("log.txt","下载进度222:".$pro,FILE_APPEND);
});

echo "下载完成";

/**
 * 下载文件
 * @param $savePath             文件保存路径
 * @param $progressCallBack     下载进度更新回调
 */
function download($url,$savePath,$proCallBack){
    // 获取mp4文件的总大小
    $res = get_headers($url,true);
    $fileLength = $res['Content-Length'];

    echo "总大小:".$fileLength;
    $hostfile = fopen($url, 'r');
    $fh = fopen($savePath, 'w');

    $downloadedLength = 0;
    $lastPro = 0;
    while (!feof($hostfile)) {
        $output = fread($hostfile, 2048);
        fwrite($fh, $output);
        // 计算下载进度
        $downloadedLength += strlen($output);
        $pro = $downloadedLength / $fileLength * 100;
        if ($pro - $lastPro > 1 && $proCallBack){
            $lastPro = $pro;
            $proCallBack($pro);
//            echo "下载进度11:".$pro."<pre>";
        }
    }

    fclose($hostfile);
    fclose($fh);
}