<?php
		
	if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(isset($_POST['submit'])){			
		
			if($_POST['username'] !== "John"){
				echo("<strong>Wrong username!</strong>");
				include("login.html");
			}elseif($_POST['password'] !== "secret"){
				echo("<strong>Wrong password!<strong>");
				include("login.html");
			}else{
				$_SESSION['user'] = $_POST['username'];
				include("index.php");
				exit();
			}
		}
		
		if(isset($_POST['logout'])){
			unset($_SESSION["user"]);
			session_destroy();
			echo("Session destroyed!");
			include("login.html");
		}
	}else{
		echo("Ooops... Something went wrong.");
	}

?>