<?php
    session_start(); 																							// Starting Session
		require('connection.php');

   $_SESSION['error'] = null;
	// Variable To Store Error Message
    if (isset($_POST['submit']))
    {
        if (empty($_POST['user_id']) || empty($_POST['pass']))
        {
            $error = "User id or Password is invalid";
        }
        else
        {
																																	// Define $username and $password
            $email=$_POST['user_id'];
            $password=$_POST['pass'];									
									
																																		// To protect MySQL injection for Security purpose
            $email = stripslashes($email);
            $password = stripslashes($password);
            $email = $connection->real_escape_string($email);
            $password = $connection->real_escape_string($password);
																																
																																	// SQL query to fetch information of registerd users and finds user match.
            $query = $connection->query("select * from members  where pass='$password' AND user_id='$email'");
            $rows = mysqli_num_rows($query);
            if ($rows == 1)
            {
                $_SESSION['login_user']=$email;		// Initializing Session
                $_SESSION['id'] = 1;
				$row = mysqli_fetch_assoc($query);

				if($row['access'] == "student"){	//validating access
					header("location: student.php");
				}
				else if($row['access'] == "principal"){
					header("location: hod.php");
				}
				else if($row['access'] == "faculty"){
					    header("location: faculty.php");	// Redirecting To Other Page
				}
				else{
					header("location: 404.php");
				}
            }
            else
            {
                
				$_SESSION['error'] = "Email or Password is invalid";
								header("Location: signin.php"); 	// Redirecting To Home Page
								
            }
        }
    }
		mysqli_close($connection); 														// Closing Connection

?>