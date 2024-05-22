<?php
		
	if(session_status() != PHP_SESSION_ACTIVE){
		session_start();
     }
	
	if(!isset($_SESSION['user'])){
		echo("<h2>You do not have access to reservation form, because you are not logged in. Please login.</h2>");
		include("login.html");
		exit();
	}
?>
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel reservation</title>
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
	
	<form method="POST" action="form.php">		
		<h2>Hotel reservation form</h2>
		<?php 
			if(isset($_COOKIE['name1'])){
				$hi = $_COOKIE['name1'];
				echo("<h3>Welcome back, <strong>$hi</strong>!</h3></br>"); 
			}else{
				echo("<h3>Hello <strong>New customer</strong>!</h3></br>");
			}
		?>
		<fieldset>
			<legend>Personalia</legend>
				<div>
					<label for = "name1">Name</label>
					<input type = "text" id = "name1" name = "name1" value="<?php echo isset($_COOKIE['name1']) ? $_COOKIE['name1'] : ''; ?>" required>
				</div>
				
				<div>
					<label for = "surname1">Surname</label>
					<input type = "text" id = "surname1" name = "surname1" value="<?php echo isset($_COOKIE['surname1']) ? $_COOKIE['surname1'] : ''; ?>" required>
				</div>
				
				<div>
					<label for = "email1">Email</label>
					<input type = "email" id = "email1" name = "email1" value="<?php echo isset($_COOKIE['email1']) ? $_COOKIE['email1'] : ''; ?>" required>
				</div>
				
				<div>
					<label for = "address">Address</label>
					<input type = "text" id = "address" name = "address" value="<?php echo isset($_COOKIE['address']) ? $_COOKIE['address'] : ''; ?>" required>
				</div>
		</fieldset>
				
		<fieldset>
			<legend>Payment</legend>
				<div>
					<label for = "cardname">Name on card</label>
					<input type = "text" id = "cardname" name = "cardname" value="<?php echo isset($_COOKIE['cardname']) ? $_COOKIE['cardname'] : ''; ?>" required>
				</div>
		
				<div>
					<label for = "cardnumber">Credit card number</label>
					<input type = "text" id = "cardnumber" name = "cardnumber" pattern = "[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" title = "ex. 0000 1111 2222 3333" value="<?php echo isset($_COOKIE['cardnumber']) ? $_COOKIE['cardnumber'] : ''; ?>"required>
				</div>
		
				<div>
					<label for = "cardCVV">CVV</label>
					<input type = "text" id = "cardCVV" name = "cardCVV" pattern = "[0-9]{3}" title = "ex. 123" value="<?php echo isset($_COOKIE['cardCVV']) ? $_COOKIE['cardCVV'] : ''; ?>" required>
				</div>
				
				<div>
					<label for = "cardexpire">Expire date</label>
					<input type = "text" id = "cardexpire" name = "cardexpire" pattern = "[0-1][0-9]/2[4-9]" title = "ex. 12/26" value="<?php echo isset($_COOKIE['cardexpire']) ? $_COOKIE['cardexpire'] : ''; ?>" required>
				</div>				
		</fieldset>		
		
		<fieldset>
			<legend>Reservation details</legend>			
				<div>
					<label for = "checkin">Check-in date</label>
					<input type = "date" id = "checkin" name = "checkin" value="<?php echo isset($_COOKIE['checkin']) ? $_COOKIE['checkin'] : ''; ?>" required>
				</div>
		
				<div>
					<label for = "checkout">Check-out date</label>
					<input type = "date" id = "checkout" name = "checkout" value="<?php echo isset($_COOKIE['checkout']) ? $_COOKIE['checkout'] : ''; ?>"required>
				</div>
				
				<div>
					<label for = "quantity">How many people in this reservation?</label>
					<select id = "quantity" name="quantity">				
						<option value = "1" <?php if(isset($_COOKIE['quantity']) && $_COOKIE['quantity'] == '1') echo 'selected="selected"'; ?>>1</option>
						<option value = "2" <?php if(isset($_COOKIE['quantity']) && $_COOKIE['quantity'] == '2') echo 'selected="selected"'; ?>>2</option>
						<option value = "3" <?php if(isset($_COOKIE['quantity']) && $_COOKIE['quantity'] == '3') echo 'selected="selected"'; ?>>3</option>
						<option value = "4" <?php if(isset($_COOKIE['quantity']) && $_COOKIE['quantity'] == '4') echo 'selected="selected"'; ?>>4</option>
					</select>
				</div>				
		</fieldset>

		<fieldset>
			<legend>Extras</legend>				
				<div>
					<label for="extras1" class = "inline-label">I need extra bed for child</label>
					<input type="checkbox" id="extras1" name="extras1" value="bed for child" <?php if(isset($_COOKIE['extras1'])) echo "checked"; ?>>
				</div>
				<div>
					<label for="extras2" class = "inline-label">I want air conditioning</label>
					<input type="checkbox" id="extras2" name="extras2" value="air conditioning" <?php if(isset($_COOKIE['extras2'])) echo 'checked'; ?>>
				</div>
				<div>
					<label for="extras1" class = "inline-label">I need an ashtray</label>
					<input type="checkbox" id="extras3" name="extras3" value="ashtray" <?php if(isset($_COOKIE['extras3'])) echo 'checked'; ?>>
				</div>
		</fieldset>
		
		<input type="submit" name="submit" id="submit" value="Submit">
		
	</form>
	
	<form method="POST" action="form.php">		
		<input type="submit" name="clear" id="clear" value="Clear">
	</form>
	
</body>
</html>