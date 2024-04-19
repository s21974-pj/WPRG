<?php

//create array from given string using explode(), delete all punctuation marks using loop
//on every element of array
//do not use regex or other buildin php functions, use only for loop and if statement 


//basing on processed array, create associative array using foreach loop, where every even elements
//will be keys and elements after them will be values, print every pair in new line
$text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

$textArr = explode(" ", $text);

foreach($textArr as $key => $val){
	
	for($i = 0; $i < strlen($val); $i++){
		if($val[$i] == "," || $val[$i] == "."){
			unset($textArr[$key]);
		}
	}
}

$textArr = array_values($textArr);


$associativeArr = [];

$arrSize = count($textArr);

foreach($textArr as $key => $val){

	if(($key + 2) > $arrSize){
		break;		
	}else{	
		if($key % 2 == 0){
			$associativeArr[$val] = $textArr[$key + 1];
		}
	}
	
}

foreach($associativeArr as $key => $val){
	echo($key." => ".$val.'</br>');
}

?>