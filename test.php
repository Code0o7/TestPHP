<?php

$arr = [["id"=>"2","sort"=>"4"],["id"=>"1","sort"=>"2"],["id"=>"4","sort"=>"1"],["id"=>"3","sort"=>"3"]];
$sort = [];
foreach ($arr as $item) {
    $sort[] = $item["sort"];
}
echo "<pre>";
echo "arr:";
var_dump($arr);
echo "sort:";
var_dump($sort);
array_multisort($sort, SORT_ASC, $arr);

echo "<pre>";
var_dump($arr);
