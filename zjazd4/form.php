<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reservation form</title>
	<style>
	.inline-label {
		display: inline;
		margin-top: 10px;
	}
	
	fieldset {
		display: inline;
	}
	
	label {
		display: block;
		margin-top: 10px;
	}
	
	#submit {
		display: block;
		margin-top: 25px;
	}
	
	#logout {
		display: block;
		margin-right: auto;
	}
	
	#clear {
		display: block;
		margin-top: 50px;
		color: tomato;
	}
	</style>
</head>
<body>

	<form method="POST" action="logout.php">		
		<input type="submit" name="logout" id="logout" value="Logout">
	</form>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			if(isset($_POST['clear'])){
				foreach($_COOKIE as $key=>$val){
					setcookie($key, "", time() - 3600);
				}
				header("Location: index.php");
				exit;
			}
			
			if($_POST['quantity'] > 1 && !(isset($_POST['submit2']))){
					
				echo('<form method="POST" action="form.php">');
				
				$name1 = $_POST['name1'];
				$surname1 = $_POST['surname1'];
				$email1 = $_POST['email1'];
				$address = $_POST['address'];
				$cardname = $_POST['cardname'];
				$cardnumber = $_POST['cardnumber'];
				$cardCVV = $_POST['cardCVV'];
				$cardexpire = $_POST['cardexpire'];
				$checkin = $_POST['checkin'];
				$checkout = $_POST['checkout'];
				$quantity = $_POST['quantity'];
				for($i = 1; $i <= 3; $i++){
					if(isset($_POST["extras$i"])){
						$extras[$i] = $_POST["extras$i"];
					}
				}
				
				echo('<div style = "display: none">');
				echo('<input type = "text" id = "name1" name = "name1" value = "'.$name1.'">');
				echo('<input type = "text" id = "surname1" name = "surname1" value = "'.$surname1.'">');
				echo('<input type = "email" id = "email1" name = "email1" value = "'.$email1.'">');
				echo('<input type = "text" id = "address" name = "address" value = "'.$address.'">');
				echo('<input type = "text" id = "cardname" name = "cardname" value = "'.$cardname.'">');
				echo('<input type = "text" id = "cardnumber" name = "cardnumber" value = "'.$cardnumber.'">');
				echo('<input type = "text" id = "cardCVV" name = "cardCVV" value = "'.$cardCVV.'">');
				echo('<input type = "text" id = "cardexpire" name = "cardexpire" value = "'.$cardexpire.'">');
				echo('<input type = "date" id = "checkin" name = "checkin" value = "'.$checkin.'">');
				echo('<input type = "date" id = "checkout" name = "checkout" value = "'.$checkout.'">');
				echo('<input type = "number" id = "quantity" name = "quantity" value = "'.$quantity.'">');
				if(isset($_POST["extras1"])){
					echo('<input type = "text" id = "extras1" name = "extras1" value = "bed for child">');
				}
				if(isset($_POST["extras2"])){
					echo('<input type = "text" id = "extras2" name = "extras2" value = "air conditioning">');
				}
				if(isset($_POST["extras3"])){
					echo('<input type = "text" id = "extras3" name = "extras3" value = "ashtray">');
				}
				echo("</div>");
				
				echo("<h2>Some extra data for reservation is needed!</h2>");
				
				for($i = 2; $i <= $_POST['quantity']; $i++){					
					$namei = "name".$i;
					$surnamei = "surname".$i;
					$emaili = "email".$i;
					
					echo ("<fieldset>");
					echo ("<legend>Personalia <strong>$i</strong> Person</legend>");
					
					echo('<div><label for = "name'.$i.'">Name</label>');
					echo('<input type = "text" id = "name'.$i.'" name = "name'.$i.'" ');
					if(isset($_COOKIE[$namei])){
						echo("value=".$_COOKIE[$namei]);
					}					
					echo(' required></div>');
				
					echo('<div><label for = "surname'.$i.'">Surname</label>');
					echo('<input type = "text" id = "surname'.$i.'" name = "surname'.$i.'" ');
					if(isset($_COOKIE[$surnamei])){
						echo("value=".$_COOKIE[$surnamei]);
					}					
					echo(' required></div>');
					
					echo('<div><label for = "email'.$i.'">Email</label>');
					echo('<input type = "email" id = "email'.$i.'" name = "email'.$i.'" ');
					if(isset($_COOKIE[$emaili])){
						echo("value=".$_COOKIE[$emaili]);
					}					
					echo(' required></div>');
				
					echo ("</fieldset></br></br>");
				}
				
				echo('<input type="submit" name="submit2" id="submit" value="Submit"></form>');
				
				echo('<form method="POST" action="form.php"><input type="submit" name="clear" id="clear" value="Clear"></form>');
								
			}else{
				
				echo("<h2>Reservation summary</h2>");
				
				$name1 = $_POST['name1'];
				$surname1 = $_POST['surname1'];
				$email1 = $_POST['email1'];
				$address = $_POST['address'];
				$quantity = $_POST['quantity'];
				$cardname = $_POST['cardname'];
				$cardnumber = $_POST['cardnumber'];
				$checkin = $_POST['checkin'];
				$checkout = $_POST['checkout'];
				
				$diff = abs(strtotime($checkout) - strtotime($checkin));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				
				for($i = 1; $i <= 3; $i++){
					if(isset($_POST["extras$i"])){
						$extras[$i] = $_POST["extras$i"];
					}
				}
				
				for($i = 2; $i <= 4; $i++){
					if(isset($_POST["name$i"])){
						$name[$i] = $_POST["name$i"];
					}
					if(isset($_POST["surname$i"])){
						$surname[$i] = $_POST["surname$i"];
					}
					if(isset($_POST["email$i"])){
						$email[$i] = $_POST["email$i"];
					}
				}
				
				echo ("<fieldset>");
				echo ("<legend>Reservation for <strong>$name1 $surname1</strong></legend>");
				
				echo ("<p>Email:<strong> $email1</strong></p>");
				echo ("<p>Address:<strong> $address</strong></p>");
				
				if($quantity > 1){
					
					echo ("<fieldset>");
					echo ("<legend>Person:<strong> $quantity</strong></legend>");
					
					for($i = 2; $i <= $quantity; $i++){						
						echo ("<p>Name:<strong> $name[$i]</strong></p>");
						echo ("<p>Surname:<strong> $surname[$i]</strong></p>");
						echo ("<p>Email:<strong> $email[$i]</strong></p></br>");
					}
					
					echo ("</fieldset>");
					
				}else{
					echo ("<p>Person:<strong> $quantity</strong></p></br>");
				}
				
				echo ("<p>Name on card:<strong> $cardname</strong></p>");
				echo ("<p>Credit card number:<strong> $cardnumber</strong></p></br>");
				
				echo ("<p>Days:<strong> $days </strong></p>");
				echo ("<p>Check-in date:<strong> $checkin</strong></p>");
				echo ("<p>Check-out date:<strong> $checkout</strong></p></br>");
				
				echo ("<p>Extras:</p><ul>");
				
				for($i = 1; $i <= 3; $i++){
					if(isset($extras[$i])){
						echo ("<strong><li>$extras[$i]</li></strong>");
					}
				}
				
				echo ("</ul></br></fieldset>");
			}
		}else{
			echo ("Ooops... Something went wrong.");
		}
		
		foreach($_POST as $key => $val){
			setcookie($key, $val, time() + 3600);
		}
	?>
</body>
</html>