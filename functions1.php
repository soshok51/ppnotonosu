<?php
echo '<link rel="stylesheet" href="css.css"><h2>';
$data = 6;
function low_quantity($i){
	global $data;
	return $i - $data * 0.5;
}
function high_quantity($i){
	return $i * 0.5;
}
function medium_quantity($i){
	return 0;
}
function hello($x){
	global $data;
	if ($data < 7){
		return round(low_quantity($x));
	}
	if ($data > 40){
		return round(high_quantity($x));
	}
	if ($data = 10){
		return medium_quantity($x);
	}
}
function goodbye($x, $y){
	$unique = [];
	$count = 0;
	for ($i = $x; $i <= $y; $i++){
		if (!in_array(hello($i), $unique)){
			$unique[] = hello($i);
			$count++;
		}
	}
	return $count;
}
echo "количество уникальных решений от 1 до 15: " . goodbye(1, 15) . "<br>";
echo "от 3 до 55: " . goodbye(3, 55) . "<br>";
echo "от 9 до 43: " . goodbye(9, 43);
// при дейта меньше семи ответы будут 15/53/35, больше сорока - 8/27/18, при десяти и числах не попавших в диапазоны - 1/1/1.