<?php

$totalMemory = memory_get_usage (true);
$phpMemory = memory_get_usage ();

echo "<pre>";
var_dump($totalMemory);
var_dump($phpMemory);