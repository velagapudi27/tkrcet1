<?php

	require('session.php');

																					
		

    $_SESSION['error'] = null;
                // Variable To Store Error Message
    if (isset($_POST['Sub3']))
    {
        																	// Define $username and $password
            $Pass = $_POST['password_change'];
			
            
																					// To protect MySQL injection for Security purpose
            $Pass = stripslashes($Pass);
			
            
            $Pass = $connection->real_escape_string($Pass);
			
			
			
            //$temp =  $Year . "-" . $Semester . "_" . $Department . "-" . $Section;
			//$query1 = "SELECT * FROM `" . $Period . "` WHERE `class_name` = '" . $temp . "'";
			
			//$query2 = "INSERT INTO `" . $Period . "` (`class_name`, `class_id`, `department`, `year`, `sem`, `Section`)
				//		VALUES ('" . $temp . "', NULL,'" . $Department . "','" . $Year . "','" . $Semester . "','" . $Section . "'  )";
						
            //$query3 = "SELECT `class_id` FROM `" . $Period . "` WHERE `class_name` = '" . $temp . "'";
			
			
			$sql = "UPDATE `members` SET `pass` = '".$Pass."' WHERE `members`.`user_id` = '".$_SESSION ['login_user']."' ";
			
			
			
			$connection->query($sql);
			            
			
    }
		mysqli_close($connection); 	
													// Closing Connection
	header ('location: logout.php');

?>