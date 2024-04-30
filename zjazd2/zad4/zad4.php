<?php

	function isPrimeNumber(){				
		$number = $_GET['number'];
		
		if(!filter_var($number, FILTER_VALIDATE_INT)){
			
			return ("You did not put an integer number!");
			
		}elseif(filter_var($number, FILTER_VALIDATE_INT)){
			
			if((int)$number <= 0){
				
				return ("You did not put a valid(positive) integer number!");
				
			}else{
				
				$number = (int)$number;
				
				if($number < 2){
					
					return ($number." is not a prime number!");
					
				}else{
					
					$i = 2;
					
					while($i < $number){
						
						if($number % $i == 0){
							
							return ($number." is not a prime number!</br>Checked in ".$i." iterations.");
						}
						
						$i++;
					}
					
					return ($number." is a prime number!</br>Found in ".$i." iterations.");
				}
			}
		}else{
			
			return ("Error!");
		}
		
	}
				
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		echo(isPrimeNumber());
				
	}else{
		echo("Ooops... Something went wrong.");
	}
			
?>