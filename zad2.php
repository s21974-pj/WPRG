<?php

$startRange = 15; // start of the range
$endRange = 234;  // end of the range

function isPrimary($number){

	$divider = NULL;
	
	for($j = 2; $j <= $number; $j++){
		//echo("isPrimary loop number= $j, range= $number, j= $j".'</br>');
		if($number % $j == 0){			
			$divider = FALSE;
			//return FALSE;
		}else{
			//echo("isPrimary TRUE $number, $j".'</br>');
			$divider = TRUE;
			return TRUE;
		}
	}
	
	return FALSE;
	

	/*
	echo($divider);
	return $divider;
	*/
	
}

function isPrimaryNew($number){
	
	if($number == 1)
		return FALSE;
	
	
	for($i = 2; $i <= $number / 2; $i++){
		//echo("isPrimaryNew(".$number.")".$i.'</br>');
		if($number % $i == 0){
			return FALSE;
		}
	}
	
	return TRUE;
}
	$answer = "List of primary numbers in range ".$startRange."-".$endRange." :";

/*
for($i = $startRange; $i <= $endRange; $i++){
	if (isPrimaryNew($i)){
		$answer.= $i." ";
		//echo ($answer);
	}	
}
*/
	echo ($answer.'</br>');

for($i = $startRange; $i <= $endRange; $i++){	
	if (isPrimaryNew($i)){
		echo($i.' ');
	}
}

?>