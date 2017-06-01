<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
		
   
		
    <title>Autentication</title>
<?php
  if (isset($_SESSION['error']))
	{
		?>
		<script language="javascript">
			alert("Email or Password is invalid");
		</script>
		<?php
	}
	
?>

<!--SCRIPT TO CHANGE UPPERCASE LETTERS TO LOWER CASE LETTERS IN SIGIN USERID-START-->
<script>  
	function forceLower(strInput) 
{
strInput.value=strInput.value.toLowerCase();
}
</script>
<!--SCRIPT TO CHANGE UPPERCASE LETTERS TO LOWER CASE LETTERS IN SIGIN USERID-END-->

<!--STYLE TO CHANGE UPPERCASE LETTERS TO LOWER CASE LETTERS IN SIGNIN USERID -START-->
<style> 
	#user_id {
    text-transform:lowercase;
}
</style>
<!--STYLE TO CHANGE UPPERCASE LETTERS TO LOWER CASE LETTERS IN SIGNIN USERID -END-->

  </head>

  <body>

    <div class="container">

      <form style="margin: auto; padding-top: 13%; width: auto; max-width: 400px;" action="login.php" method="POST">
        <h2 class="form-signin-heading" style="text-align: center" ><img src="images/tkrcet.jpg"></img><br><br>Welcome</h2>
        
        <input type="text" id="user_id" name="user_id" class="form-control"  placeholder="User ID" required autofocus onkeyup="return forceLower(this);"/>
				<br>
        
        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <input class="btn btn-lg btn-primary btn-block" id="submit" name="submit" value="Sign in" type="submit"></input>
      </form>

    </div> <!-- /container -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
  </body>
</html>
