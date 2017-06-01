<?php
		require('session.php');
		if($_SESSION['access'] != "principal"){
			header('Location: 404.html');
		}
        
    
	if (isset($_POST['Sub228'])){
                            $Faculty_Select = $_POST['Faculty_Select'];
                            $Faculty_Select = stripslashes($Faculty_Select);
                            $Faculty_Select = $connection->real_escape_string($Faculty_Select);    
			    
							$sql1 = "SELECT * FROM `Year` Where `class_name` = '" . $_SESSION['actoadc'] ."' ";

							$query = $connection->query($sql1);
			            
							$result1 = $query->num_rows;
							
							if($result1 == 1){
								$row = $query->fetch_assoc();
								
								$Period = $row['Period'];
								$Department = $row['Department'];
								$Year = $row['Year'];
								$Semester = $row['Sem'];
								$Section = $row['Section'];
								
								$sql2 = "SELECT `Faculty_Email` FROM `Faculty_Class` Where `Class_Name` = '" . $_SESSION['actoadc'] ."' AND `Faculty_Email` = '" . $Faculty_Select . "'";
								
								$query2 = $connection->query($sql2);
			            
								$result2 = $query2->num_rows;
								
								if($result2 < 1){
									$sql3 = "INSERT INTO `Faculty_Class` (`Faculty_Email`, `Period`, `Year`, `Sem`,`Section`, `Department`, `Class_Name`) VALUES ('" . $Faculty_Select . "', '" . $Period . "',
												'" . $Year . "', '" . $Semester . "','" . $Section . "', '" . $Department . "', '" . $_SESSION['actoadc'] . "')";
								
									
									if($connection->query($sql3) === TRUE){
										$_SESSION['error'] = "Class has been assigned.";
										header('Location: hod.php');
									}
									else{
										$_SESSION['error'] = "Error: Class failed to assign.";
										header('Location: hod.php');
									}
								}
								else{
									$_SESSION['error'] = "Error: Class already assigned.";
									header('Location: hod.php');
								}
							}
							else{
								$_SESSION['error'] = "Error: Class not found.";
									header('Location: hod.php');
							}
                            
                    }   
	
	mysqli_close($connection);
?>