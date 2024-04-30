<?php	
	
	function dayOfweek(){				
		$birthdate = $_GET['birthdate'];
		
		return date('l', strtotime($birthdate));				
	}
	
	function years(){
		$birthdate = new DateTime($_GET['birthdate']);
		$now = new DateTime(date("Y-m-d"));	
		
		return ($now->diff($birthdate))->format('%y years');	
	}
	
	function daysToBirthday(){
		$birthdate = new DateTime($_GET['birthdate']);
		
		$birthdateMonth = $birthdate->format('m');
		$birthdateDay = $birthdate->format('d');

		$now = new DateTime(date("Y-m-d"));	
		$nowMonth = $now->format('m');
		$nowDay = $now->format('d');
		$nowYear = $now->format('Y');
		
		if($birthdateMonth == $nowMonth && $birthdateDay == $nowDay){
			
			return "Today is your birthday! Happy birthday!";
			
		}else{
			
			$birthdayTemp = date_create($birthdate->format($nowYear."-m-d"));

			if((($now->diff($birthdayTemp))->format('%r%a')) < 0){
				
				$birthdayTemp = date_create($birthdate->format(($nowYear + 1)."-m-d"));
			}
			
			return ($now->diff($birthdayTemp))->format('Your next birthday will be in %r%a days.</br></br>');			
		}
	
	}
			
	if($_SERVER["REQUEST_METHOD"] == "GET"){
				
		echo("You were born in ".dayOfweek().'.</br></br>');
		echo("You were born ".years().' ago.</br></br>');
		echo(daysToBirthday());
				
	}else{
		echo ("Ooops... Something went wrong.");
	}
			
?>