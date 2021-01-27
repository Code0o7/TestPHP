<?php

$path = "/www/wwwroot/res.yycode.ml/blogImages";
$res = getFilesInDir($path);
var_dump($res);

/**
 * 获取一个文件夹下所有文件名 (包括文件和文件夹)
 * @param $dir
 * @return array
 */
function getFilesInDir($dir){
    $handler = file_exists($dir) ? opendir($dir) : null;
    $files = [];
    if ($handler){
        while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
            if ($filename != "." && $filename != "..") {
                $files[] = $filename;
            }
        }
        closedir($handler);
    }

    return $files;
}
