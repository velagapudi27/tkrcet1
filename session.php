<?php    
    session_start();                            // Starting Session
    require('connection.php');
                                         // Storing Session
    $user_check = $_SESSION['login_user'];
                                                // SQL Query To Fetch Complete Information Of User
    $ses_sql = $connection->query("select user_id, access from members where user_id='$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['user_id'];
    $_SESSION['access'] = $row['access'];
    if(!isset($_SESSION['error']))
    {
        $_SESSION['error'] = null;
    }
    
    if(!isset($login_session))
    {    
        header('Location: logout.php');          // Redirecting To Home Page
    }
    
?>