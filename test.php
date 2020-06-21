<?php




// 获取目录列表
function getDirList(){
    // 获取文件列表
    $fileDir ='/Users/mrchen/Desktop/blogImages';

    // 获取所有文件名
    $fileLists = [];
    $handler = file_exists($fileDir) ? opendir($fileDir) : null;
    if ($handler){
        while (($filename = readdir($handler)) !== false) { //务必使用!==，防止目录下出现类似文件名“0”等情况
            if ($filename != "." && $filename != ".." && substr($filename,0,1) != "." && is_dir($fileDir . "/" . $filename)) {
                //获取文件修改日期
                $filetime = date('Y-m-d H:i:s', filemtime($fileDir . "/" . $filename));
                //文件修改时间作为健值
                if (array_key_exists($filetime,$fileLists)){
                    // 已经有相同时间上传的图片
                    $existsValue = $fileLists[$filetime];
                    if (is_array($existsValue)){
                        $existsValue[] = $filename;
                        $fileLists[$filetime] = $existsValue;
                    }else {
                        $fileLists[$filetime] = [$existsValue,$filename];
                    }
                }else {
                    // 没有改时间上传的图片
                    $fileLists[$filetime] = $filename;
                }
            }
        }
        closedir($handler);
    }

    // key按照时间排序
    ksort($fileLists);
    $data = [];
    foreach ($fileLists as $item) {
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
    return success($data);
}