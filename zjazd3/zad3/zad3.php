<?php

	function readDirectory($dir){
		
		if(strpos(getcwd(), "\\") !== FALSE) {
			$path = getcwd()."\\";
		}else{
			$path = getcwd()."\/";
		}
		
		$path = $path.$dir;
			
		if(file_exists($path)){
			
			if(is_dir($path)){

				if(!($fd = opendir($path))){
					exit("I can not open the following directory $file!");
				}
						
				echo("<fieldset><legend>$dir</legend>");
						
				while (($file = readdir($fd)) !== false){
							
					if(is_dir($file)){
						echo("<strong>$file</strong></br>");
					}else{
						echo("$file</br>");
					}
				}
						
				echo("</fieldset>");
						
				closedir($fd);
			}else{
				echo("You choose a file, not directory!");
			}
					
		}else{
			echo("Following file/directory <strong>$path</strong> does not exist!");
		}		
	}				
	
	
	
	function deleteDirectory($dir){
			
		if(strpos(getcwd(), "\\") !== FALSE) {
			$path = getcwd()."\\";
		}else{
			$path = getcwd()."\/";
		}
		
		$path = $path.$dir;
		
		if(file_exists($path)){
			
			if(is_dir($path)){

				if(!($fd = opendir($path))){
					exit("I can not open the following directory $file!");
				}
						
				$i = 0;
				while (($file = readdir($fd)) !== false){
							
					$filesArr[$i] = $file;
					
					$i++;
				}

				foreach($filesArr as $key => $val){
					if($val == "." || $val == ".."){
						unset($filesArr[$key]);
					}
				}
				
				if(!$filesArr){
					rmdir($path);
					echo("Directory <strong>$dir</strong> was deleted!");
				}else{
					echo("Directory <strong>$dir</strong> is not empty! It was not deleted!");
				}
				
				closedir($fd);
			}else{
				echo("You choose a file, not directory!");
			}
					
		}else{
			echo("Following file/directory <strong>$dir</strong> does not exist!");
		}		
	}				
	
	
	
	function createDirectory($dir){
			
		if(strpos(getcwd(), "\\") !== FALSE) {
			$path = getcwd()."\\";
		}else{
			$path = getcwd()."\/";
		}
		
		$path = $path.$dir;
		
		if(file_exists($path)){			
				echo("Directory <strong>$dir</strong> already exist!");
		}else{
			
			mkdir($path);
			echo("Directory <strong>$dir</strong> was created!");
		}		
	}
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "GET"){
				
		switch($_GET["action"]){
			
			case "read":
				readDirectory($_GET["dir"]);
				break;
			
			case "delete":
				deleteDirectory($_GET["dir"]);
				break;
			
			case "create":
				createDirectory($_GET["dir"]);
				break;
				
			default:
				echo("Ooops... Something went wrong. Please try again.");
				break;
		}
		
	}else{
		echo("Ooops... Something went wrong.");
	}
			
?>