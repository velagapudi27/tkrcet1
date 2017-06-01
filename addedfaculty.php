<?php
		require('session.php');
		
$f_name=$_POST['facultyname'];
$e_mail=$_POST['facultyemail'];

	    $f_name = stripslashes($f_name);
            $e_mail = stripslashes($e_mail);
            
            $f_name = $connection->real_escape_string($f_name);
            $e_mail = $connection->real_escape_string($e_mail);
			


$query="insert into faculty (name, email) values('$f_name', '$e_mail')";
$query2="insert into members (user_id, pass, access) values ('$e_mail', 1234, 'faculty')";

$result=mysqli_query($connection,$query) or die('Error in DatabaseConnection or user already existing');
$result2=mysqli_query($connection,$query2) or die('Error in DatabaseConnection or user already existing');

mysqli_close($connection);

header('Location: addfaculty.php');

?>
