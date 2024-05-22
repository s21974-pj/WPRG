<?php
		
	if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
			unset($_SESSION["user"]);
			session_destroy();
			echo("You have been logged out!");
			include("login.html");
		
	}else{
		echo("Ooops... Something went wrong.");
	}

?>