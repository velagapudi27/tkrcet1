<?php
		require('session.php');
		if($_SESSION['access'] != "faculty"){
			header('Location: 404.html');
		}

		if(isset($_POST['S_A'])){
			$Class_Select = $_SESSION['Class_Select'];
			$Period_Select = $_SESSION['Period_Select'];
			$Date = $_SESSION['Date'];
			$Class_Select = stripslashes($Class_Select);
			$Period_Select = stripslashes($Period_Select);
			$Date = stripslashes($Date);
			
            
			$Class_Select = $connection->real_escape_string($Class_Select);
			$Period_Select = $connection->real_escape_string($Period_Select);
			$Date = $connection->real_escape_string($Date);
		
			$sql2 = "SELECT `Student_ID` FROM `A_" . $Class_Select . "` WHERE `Period` = '" . $Period_Select . "'";
			$query2 = $connection->query($sql2);
			$sql22 = "SELECT `Date` FROM `AC_" . $Class_Select . "` WHERE `Date` = '" . $Date . "'";
			$query22 = $connection->query($sql22);
			$result = $query22->num_rows;
			
				$i = 1;
				while($row = $query2->fetch_assoc())
				{
					$A = "P";
					if($_POST['cb' . $i]== $A){}
					else{$A = "A";}
					$sql3 = "UPDATE `A_" . $Class_Select . "` SET `" . $Date . "` = '" . $A . "'WHERE `A_" . $Class_Select . "`.Period = '" . $Period_Select . "' AND `A_" . $Class_Select . "`.Student_ID = '".$row['Student_ID']."'";
					$query3 = $connection->query($sql3);				
					$i = $i + 1;
				}
				if($result == 1){

					$sql4 = "UPDATE `AC_" . $Class_Select . "` SET `Period".$Period_Select."` = '".$_SESSION['login_user']."' WHERE `AC_" . $Class_Select . "`.Date = '" . $Date . "'";
					$query4 = $connection->query($sql4);
				}
				
				else{
					$sql5 = "INSERT INTO `AC_" . $Class_Select . "` (`Date`,`Period".$Period_Select."`) VALUES ('".$Date."','".$_SESSION['login_user']."')";
					$query5 = $connection->query($sql5);
				}

				$_SESSION['error']= "Attendence Saved.";
				header("Location: faculty.php"); 
						
		}
	mysqli_close($connection);
?>