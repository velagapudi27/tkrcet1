<?php
    require('session.php');
    																						// Starting Session
		if($_SESSION['access'] != "principal"){
			header('Location: 404.html');
		}

    $_SESSION['error'] = null;
                // Variable To Store Error Message
    if (isset($_POST['Sub44']))
    {
        																	// Define $username and $password
            $Student_Id = $_POST['Student_Id'];
            $Class_Select = $_POST['Class_Select'];									
			$Student_Name = $_POST['Student_Name'];
            
            
																			// To protect MySQL injection for Security purpose
            $Student_Id = stripslashes($Student_Id);
            $Class_Select = stripslashes($Class_Select);
            $Student_Name = stripslashes($Student_Name);
           
            
            $Student_Id = $connection->real_escape_string($Student_Id);
            $Class_Select = $connection->real_escape_string($Class_Select);
			$Student_Name = $connection->real_escape_string($Student_Name);
            
			
            
			$query1 = "SELECT `class_name` FROM `Year` WHERE `class_name` = '" . $Class_Select . "'";

			$Query11 = $connection->query($query1);
			            
			$rows = mysqli_num_rows($Query11);
            if ($rows == 1)
            {
                $row = mysqli_fetch_assoc($Query11);
    
                $query2 = "INSERT INTO `D_" . $row['class_name'] . "` (`Student_ID`, `Name`) VALUES ('" . $Student_Id . "', '" . $Student_Name . "')";
                $query4 = "INSERT INTO `Student_Details` (`Student_ID`, `Name`, `P`) VALUES ('" . $Student_Id . "', '" . $Student_Name . "', '" . $row['class_name'] . "')";
				$query5= "insert into `members` (user_id, pass, access) values ('$Student_Id', 1234, 'student')";
                if($connection->query($query2) === TRUE)
				{
					for($i=1; $i<=7; $i++){
						$connection->query("INSERT INTO `A_" . $row['class_name'] . "` (`Student_ID`, `Period`) VALUES ('" . $Student_Id . "', '" . $i . "')");
					}
					if($connection->query($query4) === TRUE){
						if($connection->query($query5) === TRUE){
							$_SESSION['error']= "Student added to class.";
							header("Location: hod.php");
						}
					}
				}
				else
				{
						$_SESSION['error']= "ERROR S_D: Could not add student to class.";
                        header("Location: hod.php"); 	
				}
                
            }
            else
            {  
                	$_SESSION['error']= "Class not found.";
                	header("Location: hod.php"); 	
                					
            }
    }
		mysqli_close($connection); 		
?>