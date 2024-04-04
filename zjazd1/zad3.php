<?php

//calculating given number of Fibonacci series in array and displaying odd numbers in new line with counting lines

$number = 16;
	
function Fibonacci($number){
	
	$fNumbers = [0, 1];
	
	for($i = 2; $i <= $number; $i++){
		$fNumbers[$i] = $fNumbers[$i - 1] + $fNumbers[$i - 2];
	}
	
	return $fNumbers;
}
	
	$arrFibonacci = Fibonacci($number);
	
	$oddArrFib = [1];
	
	foreach ($arrFibonacci as $key => $val){
		if($val % 2 != 0){
			array_push($oddArrFib, $val);
		}
	}
	
	echo("Fibbonaci (n = ".$number.") series, only odd numbers:");
	
	for($i = 1; $i < count($oddArrFib); $i++){
		echo('</br>'.($i).". ".$oddArrFib[$i]);
	}
			
?>