<?php

$path = "/www/wwwroot/res.yycode.ml/blogImages/";
$res = getDirInfoInDir($path);
//echo "<pre>";
//var_dump($res);

/**
 * 获取一个文件夹下所有文件名 (包括文件和文件夹)
 * @param $dirPath
 * @return array
 */
function getDirInfoInDir($dirPath){
    $handler = file_exists($dirPath) ? opendir($dirPath) : null;
    $files = [];
    if ($handler){
        while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
            // 判断是文件夹
            if ($filename != "." && $filename != ".." && is_dir($dirPath.$filename)) {
                // 获取文件夹创建时间
                $filetime = filectime($dirPath.$filename);
                if ($filetime !== false){
                    $filetime = date("Y-m-d H:i:s",$filetime);
                }

                echo "<pre>";
                var_dump($filetime);

                //文件修改时间作为健值
//                if (array_key_exists($filetime,$files)){
//                    // 已经有相同时间上传的图片
//                    $existsValue = $files[$filetime];
//                    if (is_array($existsValue)){
//                        $existsValue[] = $filename;
//                        $files[$filetime] = $existsValue;
//                    }else {
//                        $files[$filetime] = [$existsValue,$filename];
//                    }
//                }else {
//                    // 没有该时间上传的图片
//                    $files[$filetime] = $filename;
//                }
            }
        }
        closedir($handler);

        // key按照时间排序
        $data = [];
        ksort($files);
        foreach ($files as $item) {
            if (is_array($item)){
                foreach ($item as $newItem){
                    $data[] = $newItem;
                }
            }else {
                $data[] = $item;
            }
        }

        // 数组倒序
        $data = array_reverse($data);
    }

    return $files;
}
