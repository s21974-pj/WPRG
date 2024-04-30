<?php

	function factorialNR($number){
		
		$start = microtime(true);
		
		$factorial = 1;
		
		for($i = 1; $i <= $number; $i++){
			$factorial *= $i;
		}
		
		$time = microtime(true) - $start;
		return ['factorial' => $factorial, 'time' => $time];	
	}
	
	function factorialR($number){
		
		if($number == 0){
			
			return 1;
		}
		
		return $number * factorialR($number - 1);		
	}
	
	function validate(){				
		$number = $_GET['number'];
		
		if(!filter_var($number, FILTER_VALIDATE_INT)){
			
			return ("You did not put an integer number!");
			
		}elseif(filter_var($number, FILTER_VALIDATE_INT)){
			
			if((int)$number < 0){
				
				return ("You did not put a valid(positive) integer number!");
				
			}elseif((int)$number == 0){
				
				return("0! = 1");
						
			}else{
				
				$number = (int)$number;
				
				$factorialNRresult = factorialNR($number);
				
				$start = microtime(true);
				
				$factorialRresult = factorialR($number);
				
				$time = microtime(true) - $start;
				
				if($factorialNRresult['time'] < $time){
					
					echo("Execution time for non-recursive factorial calculation is better.</br>Non-recursive time: ".$factorialNRresult['time']."</br>Recursive time: ".$time."</br>Difference: ".$time - $factorialNRresult['time']);
					
				}else{
					
					echo("Execution time for recursive factorial calculation is better.</br>Non-recursive time: ".$factorialNRresult['time']."</br>Recursive time: ".$time."</br>Difference: ".$factorialNRresult['time'] - $time);
				}
				
				return;
				
			}
		}else{
			
			return ("Error!");
		}
		
	}
				
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		echo(validate());
				
	}else{
		echo("Ooops... Something went wrong.");
	}
			
?>