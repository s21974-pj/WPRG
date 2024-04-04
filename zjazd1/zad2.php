<?php

$startRange = 15; // start of the range
$endRange = 234;  // end of the range

function isPrimaryNew($number){
	
	if($number == 1)
		return FALSE;	
	
	for($i = 2; $i <= $number / 2; $i++){
		if($number % $i == 0){
			return FALSE;
		}
	}
	
	return TRUE;
}
	$answer = "List of primary numbers in range ".$startRange."-".$endRange." :";

	echo ($answer.'</br>');

for($i = $startRange; $i <= $endRange; $i++){
	
	if (isPrimaryNew($i)){
		echo($i.' ');
	}
}

?>