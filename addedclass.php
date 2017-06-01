<?php

	require('session.php');

    session_start(); 																							// Starting Session
		if($_SESSION['access'] != "principal"){
			header('Location: 404.html');
		}

    
                // Variable To Store Error Message
    if (isset($_POST['Sub3']))
    {
        																	// Define $username and $password
            $Period = $_POST['Period_Select'];
			$Department = $_POST['Department_Select'];
            $Year = $_POST['Year_Select'];
			$Semester = $_POST['Semester_Select'];
            $Section = $_POST['Section_Select'];
            
																					// To protect MySQL injection for Security purpose
            $Period = stripslashes($Period);
			$Department = stripslashes($Department);
            $Year = stripslashes($Year);
            $Semester = stripslashes($Semester);
            $Section = stripslashes($Section);
            
            $Period = $connection->real_escape_string($Period);
			$Department = $connection->real_escape_string($Department);
            $Year = $connection->real_escape_string($Year);
			$Semester = $connection->real_escape_string($Semester); 
            $Section = $connection->real_escape_string($Section);
			
			
            $temp =  $Period . "_" . $Year . "-" . $Semester . "_" . $Department . "-" . $Section;
			$query1 = "SELECT * FROM `Year` WHERE `class_name` = '" . $temp . "'";
			
			$query2 = "INSERT INTO `Year` (`class_name`, `Period`, `Year`, `Sem`,`Department`,`Section`)
						VALUES ('" . $temp . "','" . $Period . "','" . $Year . "','" . $Semester . "','" . $Department . "','" . $Section . "')";
						
            
			
			
			
			$Query11 = $connection->query($query1);
			            
			$rows = mysqli_num_rows($Query11);
            if ($rows == 0)
            {																				
                if($connection->query($query2) === TRUE)
				{
					
					$query4 = "CREATE TABLE `D_" . $temp . "` (`Student_ID` varchar(12) PRIMARY KEY,`Name` varchar(255) NOT NULL)";
					$query5 = "CREATE TABLE `A_" . $temp . "` (`Student_ID` varchar(12),`Period` smallint(10))";
					$query6 = "CREATE TABLE `AC_" . $temp . "` (`Date` varchar(12) PRIMARY KEY,`Period1` varchar(99),`Period2` varchar(99),`Period3` varchar(99),`Period4` varchar(99),`Period5` varchar(99),`Period6` varchar(99),`Period7` varchar(99) )";
					
						if($connection->query($query4) === TRUE)
						{
							if($connection->query($query5) === TRUE)
							{
								if($connection->query($query6) === TRUE)
								{
									$_SESSION['error'] = " Class created.";
									header("Location: hod.php");
								}
								else
								{
									$_SESSION['error']= "ERROR AC: Could not create class.";
									header("Location: hod.php"); 
								}
							}
							else
							{
								$_SESSION['error']= "ERROR C_T_D_A: Could not create class.";
								header("Location: hod.php"); 
							}
				
						}
						else
						{
								$_SESSION['error']= "ERROR C_T_D: Could not create class.";
								header("Location: hod.php"); 
						}
				}
				else
				{
						$_SESSION['error']= "ERROR C_P: Could not create class.";
						header("Location: hod.php"); 
				}
                
            }
            else
            {
                   
                	$_SESSION['error']= "Class already exists.";
                	header("Location: hod.php"); 	
                					
            }
    }
		mysqli_close($connection); 														// Closing Connection

?>