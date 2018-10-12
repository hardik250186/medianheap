<?php
require "class.medianheap.php";
require "median_function.php";
$array = [];

for($i=0; $i<100000; $i++) {
     $array[] = mt_rand(1,100000) / mt_rand(1,10000);
}


$t = microtime(true);
echo array_median($array);
echo "<br><br>" . 'Sort Median: ' . (microtime(true) - $t) . ' seconds';

echo "<br><br>";

$t = microtime(true);
$list = new MedianHeap($array);
echo $list->getMedian();
echo "<br><br>" . 'Heap Median: '. (microtime(true) - $t) . ' seconds';
?>