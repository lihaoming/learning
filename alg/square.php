<?php

function find_largest_square($l_all, $i)
{
	$base = $l_all[$i];
	$width = 1;
	$length = count($l_all);
	$left_index = $i;
	$right_index = $i + 1;
	while($left_index > 0  and $l_all[$left_index - 1] > $l_all[$i]) {
		$width = $width + 1;
		$left_index = $left_index - 1;
	}
	while ($right_index < $length and $l_all[$right_index] > $l_all[$i]) {
		$width = $width + 1;
		$right_index = $right_index + 1;
	}
	return $base * $width;
}



$list_all = array(1,2,3,0,20,3,10,5,6,9);
$largest_square = 0;
$leng_list = count($list_all);
if ($leng_list == 0) {
	echo 0;
}
if ($leng_list == 1) {
	echo $list_all[0];
}
for ($i = 0; $i < $leng_list; $i++) { 
	$sub_square = find_largest_square($list_all, $i);
	if ($sub_square > $largest_square){
		$largest_square = $sub_square;
	}
}
echo $largest_square;
