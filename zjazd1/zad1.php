<?php

$fruits = array ("orange", "apple", "pineapple", "banana", "strawberry");

echo("Strings in array: ".'</br>');

foreach ($fruits as $key => $val){
	echo($val." ");
}

echo('</br>'.'</br>'."Strings backwards, if original string starts with 'p' there is also TRUE, if not FALSE");
	
foreach ($fruits as $key => $val){
	$backwards = "";
	$answer = "";
	
	$fruit = str_split($val);
	
	for ($i = 1; $i <= count($fruit); $i++){
		$backwards .= $fruit[count($fruit) - $i];
	}
	
	$answer .= $backwards;

	if ($fruit[0] == "p"){
		$answer .= " TRUE ";
	} else {
		$answer .= " FALSE ";
	}    
	
	echo('</br>'.$answer);
}

?>