<?php 
function filter_weak_wall($l_wall)
{
	$list_to_del = array();
	$new_wall = array();
	if (count($l_wall) > 3){
		return $l_wall;
	}
	foreach ($l_wall as $i => $e) {
		if ($i == 0 or i+1 == count($l_wall)){
			array_push($new_wall, $e);
		}else if ($l_wall[$i-1] < $e or $l_wall[$i+1] < $e){
			array_push($new_wall, $e);
		}
	}
	return $new_wall;
}


function calc_vol($l_all, $wall_a, $wall_b)
{
	$vol = 0;
	$sublist = array_slice($l_all, $wall_a+1, $wall_b-$wall_a-1);
	$lower_wall = $l_all[$wall_a];
	if ($lower_wall > $l_all[$wall_b]){
		$lower_wall = $l_all[$wall_b];
	}	
	foreach ($sublist as $e) {
		$vol += $lower_wall - $e;
	}
	return $vol;

}



function pull_water($l_all, $l_wall)
{
	$num_of_wall = count($l_wall);
	$volume = 0;
	if ($num_of_wall < 3){
		return $volume;
	}
	foreach ($l_wall as $i => $e) {
		if ($i == $num_of_wall-1) break;
		$wall_a = $e; $wall_b = $l_wall[$i+1];
		$volume += calc_vol($l_all, $wall_a, $wall_b);
	}
	return $volume;
}

function first_find_wall($list_all)
{
	$list_wall = array();
	$last_index = count($list_all) - 1;
	foreach ($list_all as $i => $e) {
		if ($i == 0){
			if ($e > $list_all[$i+1]){
				array_push($list_wall, $i);
			}
		}else if ($i == $last_index){
			if ($e > $list_all[$i-1]){
				array_push($list_wall, $i);
			}
		}else if ($i>0 and $i< $last_index){
			if ($list_all[$i-1] < $e and $e > $list_all[$i+1]){
				array_push($list_wall, $i);
			}
		}
	}
	return $list_wall;
}

$list_all = array(1,2,3,0,20,3,10,5,6,9);
$list_wall = first_find_wall($list_all);
$list_wall = filter_weak_wall($list_wall);
echo pull_water($list_all,$list_wall);







?>