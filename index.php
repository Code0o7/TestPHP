<?php

//echo "<pre>";
//var_dump(get_used_status);
get_used_status();

function get_used_status(){
    $fp = popen('top -b -n 2 | grep -E "(Cpu\(s\))|(KiB Mem)"',"r");//获取某一时刻系统cpu和内存使用情况
    $sys_info = explode("\n", $fp);
    $cpu_info = explode(",", $sys_info[2]);
    $cpu_usage = trim(trim($cpu_info[0], '%Cpu(s): '), 'us'); //百分比

    $mem_info = explode(",", $sys_info[3]); //内存占有量 数组
    $mem_total = trim(trim($mem_info[0], 'KiB Mem : '), ' total');
    $mem_used = trim(trim($mem_info[2], 'used'));
    $mem_usage = round(100 * intval($mem_used) /     intval($mem_total), 2); //百分比

    echo "<pre>";
    var_dump($cpu_usage);
    var_dump($mem_usage);
}



