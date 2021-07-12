<?php

$path = "/Users/mrchen/Desktop/种子";
$tys = ["mp4","avi","rmvb","wmv","mov","mkv","flv","ts","webm","iso"];
$r = fileFiles($path,$tys);

foreach ($r as $item) {
    $item = "'".$item."'";
    moveFile($item,"/Users/mrchen/Desktop/AV_Data_Capture-CLI");
}

//$fileP = "'"."/Users/mrchen/Desktop/种子/1pon 021120_001.mp4/1pon 021120_001.mp4"."'";
////$fileP = addslashes($fileP);
//$cmd = "mv ".$fileP." /Users/mrchen/Desktop/AV_Data_Capture-CLI";
//echo "cmd:".$cmd."<br>";
//exec($cmd,$result,$status);
//$success = $status == 0 ? true : false;
//if ($success){
//    echo "成功";
//}else {
//    echo "失败:";
//    var_dump($result);
//}

//rename("/Users/mrchen/Desktop/test.txt","/Users/mrchen/Desktop/test1");

//foreach ($r as $item) {
//    rename($item,)
//}

function moveFile($filePath,$desDirPath){
    $cmd = "mv ".$filePath." ".$desDirPath;
    exec($cmd);
}

function fileFiles($dirPath,$types){
    $fileLists = [];
    $handler = file_exists($dirPath) ? opendir($dirPath) : null;
    if ($handler){
        //务必使用!==，防止目录下出现类似文件名“0”等情况
        while (($filename = readdir($handler)) !== false) {
            if ($filename != "." && $filename != "..") {
                $fileFullPath = $dirPath."/$filename";

                if (is_file($fileFullPath)){
                    // 如果是文件 获取文件后缀
                    $extension = substr(strrchr($fileFullPath, '.'), 1);
                    // 判断是否是要找的文件类型
                    if (strlen($extension) > 0 && in_array($extension,$types)){
                        // 是要找的文件类型
                        $fileLists[] = $fileFullPath;
                    }
                }else {
                    // 如果是文件夹 递归查找
                    $res = fileFiles($fileFullPath,$types);
                    foreach ($res as $e){
                        $fileLists[] = $e;
                    }
                }
            }
        }
        closedir($handler);
    }

    return $fileLists;
}