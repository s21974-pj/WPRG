<?php

	function printComplexArray(&$array){
		
		foreach($array as $key => $val){
			if(is_array($val)){
				printComplexArray($val);
			}else{
				echo("$key => $val</br>");
			}				
		}
	}
	
	function myDbQuerySelect($query){
		$nextID = -1;
		$db_link = mysqli_connect("localhost", "@user", "@password");
		
		if(!$db_link){
			echo("Error occured while trying to connect to database...</br>");
			exit;
		}else{
			echo("Connected to database...</br>");
			
			if(!mysqli_select_db($db_link, "@database")){
				mysqli_close($db_link);
				echo("Error occured while trying to select database...</br>");
				exit;
			}else{
				$result = mysqli_query($db_link, $query);
				if(!$result){
					mysqli_close($db_link);
					echo("Error occured while trying to query database...</br>");
					exit;
				}else{

					//SELECT with mysqli_fetch_row
					
					echo("</br><strong>Result for using SELECT with mysql_fetch_row:</strong></br></br>"); 
					
					while($row = mysqli_fetch_row($result)){
						echo("<table><tr>");
						echo("<td>$row[0]</td>");
						echo("<td>$row[1]</td>");
						echo("<td>$row[2]</td>");
						echo("</tr></table>");
					}
					
					echo("</br><strong>--------------------------------------------------</strong></br>");
					
					//SELECT with mysqli_fetch_array
					
					$result = mysqli_query($db_link, $query);
					
					if(!$result){
						mysqli_close($db_link);
						echo("Error occured while trying to query database...</br>");
						exit;
					}else{
						
						echo("</br><strong>Result for using SELECT with mysql_fetch_array:</strong></br></br>"); 
								
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							printComplexArray($row);
						}
					}
					
					echo("</br><strong>--------------------------------------------------</strong></br>");
					
					//SELECT with mysqli_num_rows
					
					
					$result = mysqli_query($db_link, $query);
					
					if(!$result){
						mysqli_close($db_link);
						echo("Error occured while trying to query database...</br>");
						exit;
					}else{						
						$nextID = mysqli_num_rows($result);						
						echo("</br><strong>Result for using SELECT with mysql_num_rows:</strong></br></br>"); 
						echo("mysqli_num_rows = $nextID</br>");
					}
					
					echo("</br><strong>--------------------------------------------------</strong></br>");					
					
					if(!mysqli_close($db_link)){
						echo("Error occured while trying to close connection with database...</br>");
						exit;
					}else{
						echo("</br>Connection with database closed...</br>");
					}
				}
			}
		}
		
		return $nextID;
	}
	
	function myDbQuerySInsert($query){
		$db_link = mysqli_connect("localhost", "@user", "@password");
		
		if(!$db_link){
			echo("Error occured while trying to connect to database...</br>");
			exit;
		}else{
			echo("Connected to database...</br>");
			
			if(!mysqli_select_db($db_link, "@database")){
				mysqli_close($db_link);
				echo("Error occured while trying to select database...</br>");
				exit;
			}else{
				$result = mysqli_query($db_link, $query);
				if(!$result){
					mysqli_close($db_link);
					echo("Error occured while trying to insert query database...</br>");
					exit;
				}else{

					//INSERT INTO 
					
					$addedRows = mysqli_affected_rows($db_link);
					echo("Number of addded rows = ".$addedRows);
										
					echo("</br><strong>--------------------------------------------------</strong></br>");
					
					echo("</br><strong>Database after adding new record:</strong></br></br>"); 
					
					$result = mysqli_query($db_link, "SELECT * FROM users");
					
					while($row = mysqli_fetch_row($result)){
						echo("<table><tr>");
						echo("<td>$row[0]</td>");
						echo("<td>$row[1]</td>");
						echo("<td>$row[2]</td>");
						echo("</tr></table>");
					}
																				
					if(!mysqli_close($db_link)){
						echo("Error occured while trying to close connection with database...</br>");
						exit;
					}else{
						echo("</br>Connection with database closed...</br>");
					}
				}
			}
		}
	}
	
	$q = "SELECT * FROM users";	
	$newID = myDbQuerySelect($q);
	
	echo("</br><strong>_________________________________________________________________</strong></br></br>");
	
	if($newID == -1){
		echo("Error occured while trying to execute query to database. Could not add new record to database...</br>");
	}else{
		$date = date("Y-m-d");
		$q1 = "INSERT INTO users VALUES(";
		$q1 .= "$newID, 'Mark', '$date' )"; 
		
		myDbQuerySInsert($q1);
	}
?>