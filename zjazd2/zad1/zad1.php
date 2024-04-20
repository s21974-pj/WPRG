<?php
	
	if($_POST["first"] == NULL || $_POST["second"] == NULL){
		echo("You did not select all numbers!");
	}else{
		switch ($_POST["list"]){
			case "add":
				echo("Result: ".$_POST["first"] + $_POST["second"]);
				break;
			case "substract":
				echo("Result: ".$_POST["first"] - $_POST["second"]);
				break;
			case "multiply":
				echo("Result: ".$_POST["first"] * $_POST["second"]);
				break;
			case "divide":
				if($_POST["second"] == 0){
					echo("You can not divide by zero!");
				}else{
					echo("Result: ".$_POST["first"] / $_POST["second"]);
				}
				break;
			default:
				echo("Error!");
	}
}

	
?>