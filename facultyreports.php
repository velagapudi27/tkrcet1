<?php
		require('session.php');
		if($_SESSION['access'] != "faculty"){
			header('Location: 404.html');
		}
		
		$user = $_SESSION["login_user"];	    
		$sql = "SELECT * FROM `Faculty_Class` WHERE `Faculty_Email` = '" . $user . "'";

		$query = $connection->query($sql);
		$i = 0;
		$CP1 = 1;$CP2 = 1;$CP3 = 1;$CP4 = 1;$CP5 = 1;$CP6 = 1;$CP7 = 1;
		
		$R1;$R2;$R3;$R4;$R5;$R6;$R7;
		$R1P;$R2P;$R3P;$R4P;$R5P;$R6P;$R7P;
			            
		$result = $query->num_rows;
		if(isset($_POST['Confirm'])){
					$_SESSION['Class_Select'] = $_POST['Class_Select'];
					$_SESSION['Date']= $_POST['Date'];
					$sql1 = "SELECT * FROM `AC_".$_SESSION['Class_Select']."` WHERE `Date` = '" . $_SESSION['Date'] . "'";
					$query1 = $connection->query($sql1);
			            
					$result1 = $query1->num_rows;
					if($result1 == 1)
					{
						$result11 = $query1->fetch_assoc();
						if($result11['Period1'] == $user)
						{
							$sql11 = "SELECT `Student_ID` , `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '1'";
							$R1 = $connection->query($sql11);
							 $R1P = 1;
							$CP1 = 0;
							$i = 1;
						}
						if($result11['Period2'] == $user)
						{
							$sql12 = "SELECT `Student_ID` ,  `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '2'";
							if (isset($R1))
							{
								$R2 = 	$connection->query($sql12);
								$R2P = 2;
							}
							else
							{
								$R1 = $connection->query($sql12);
								$R1P = 2;
							}
							
							$i++;
							$CP2 = 0;
						}
						if($result11['Period3'] == $user)
						{
							$sql13 = "SELECT `Student_ID` , `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '3'";
							if(isset($R2))
							{
								$R3 = $connection->query($sql13);
								$R3P = 3;
							}
							elseif(isset($R1))
							{
								$R2 = $connection->query($sql13);
								$R2P = 3;
							}
							else
							{
								$R1 = $connection->query($sql13);
								$R1P = 3;
							}
							
							$CP3 = 0;$i++;
						}
						if($result11['Period4'] == $user)
						{
							$sql14 = "SELECT `Student_ID` , `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '4'";
							if(isset($R3))
							{
								$R4 = $connection->query($sql14);
								$R4P = 4;
							}
							elseif(isset($R2))
							{
								$R3 = $connection->query($sql14);
								$R3P = 4;
							}
							elseif(isset($R1))
							{
								$R2 = $connection->query($sql14);
								$R2P = 4;
							}
							else
							{
								$R1 = $connection->query($sql14);
								$R1P = 4;
							}
						
							$CP4 = 0;$i++;
						}
						if($result11['Period5'] == $user)
						{
							$sql15 = "SELECT `Student_ID` , `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '5'";
							if(isset($R4))
							{
								$R5 = $connection->query($sql15);
								$R5P = 5;
							}
							elseif(isset($R3))
							{
								$R4 = $connection->query($sql15);
								$R4P = 5;		
							}
							elseif(isset($R2))
							{
								$R3 = $connection->query($sql15);
								$R3P = 5;
							}
							elseif(isset($R1))
							{
								$R2 = $connection->query($sql15);
								$R2P = 5;
							}
							else
							{
								$R1 = $connection->query($sql15);
								$R1P = 5;
							}
							
							$CP5 = 0;$i++;
						}
						if($result11['Period6'] == $user)
						{
							$sql16 = "SELECT `Student_ID` , `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '6'";
							if(isset($R5))
							{
								$R6 = $connection->query($sql16);
								$R6P = 6;
							}
							elseif(isset($R4))
							{
								$R5 = $connection->query($sql16);
								$R5P = 6;
							}
							elseif(isset($R3))
							{
								$R4 = $connection->query($sql16);
								$R4P = 6;
							}
							elseif(isset($R2))
							{
								$R3 = $connection->query($sql16);
								$R3P = 6;
							}
							elseif(isset($R1))
							{
								$R2 = $connection->query($sql16);
								$R2P = 6;
							}
							else
							{
								$R1 = $connection->query($sql16);
								$R1P = 6;
							}
							
							$CP6 = 0;$i++;
						}
						if($result11['Period7'] == $user)
						{
							$sql17 = "SELECT `Student_ID` , `".$_SESSION['Date']."` FROM `A_".$_SESSION['Class_Select']."` WHERE `Period` = '7'";
							if(isset($R6))
							{
								$R7 = $connection->query($sql17);
								$R7P = 7;
							}
							elseif(isset($R5))
							{
								$R6 = $connection->query($sql17);
								$R6P = 7;
							}
							elseif(isset($R4))
							{
								$R5 = $connection->query($sql17);
								$R5P = 7;
							}
							elseif(isset($R3))
							{
								$R4 = $connection->query($sql17);
								$R4P = 7;
							}
							elseif(isset($R2))
							{
								$R3 = $connection->query($sql17);
								$R3P = 7;
							}
							elseif(isset($R1))
							{
								$R2 = $connection->query($sql17);
								$R2P = 7;
							}
							else
							{
								$R1 = $connection->query($sql17);
								$R1P = 7;
							}
						
							$CP7 = 0;$i++;
						}
						
					}
					
					
				}
?>
    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Faculty MANAGEMENT </title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="./vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="faculty.php" class="site_title"><i class="fa fa-university"></i> <span>Faculty</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["login_user"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="faculty.php">Dashboard</a></li>
					  <li><a href="facultyreports.php">Generate Reports</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> My Space <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      
                      
					  </ul>
                  </li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION["login_user"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					<li><a href="changepassword.php"><i class="fa fa-sign-out pull-right"></i> Change Password </a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>TKRCET</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
					  
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if (isset($_SESSION['error'])) { echo '<h2 style="color:red;">' . $_SESSION['error']; $_SESSION['error']=null; } else { ?> <h4> Hello Faculty.  <?php } ?> </h4>
                    
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
		      <?php
			if($result >= 1){
				if(!isset($_POST['Confirm'])){
					echo '<form action="" method="POST">
					Select class to give attendance:	<select class="form-control" name="Class_Select" id="Class_Select">';
									
					while($row = $query->fetch_assoc())
					{
						echo '<option value="' . $row['Class_Name'] . '"> ' . $row['Period'] .'  - ' . $row['Year'] .' Year - ' . $row['Sem'] . ' Sem - ' . $row['Department'] . ' - ' . $row['Section'] . '</option>';	
					}
					echo '</select>		
						<br>' ?>
					Select Date (Pl. select date from drop down calender Only) :	<input class="form-control" type="date" name="Date" id="Date" value="<?php if(isset($_POST['Sub247'])){ echo $_POST['Date']; } ?>" required="true">
						
				   <?php	echo '
					<br>
					<input type="submit" id="Confirm" name="Confirm" value="GO" class="btn btn-success">
					<button class="btn btn-default" type="button"><a href="faculty.php">Go Back to dashboard!</a></button>
					</form>';
				}
				if(isset($_POST['Confirm']))
				{
					if($result1 == 1)
					{
						if($i == 1)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
							      <th>Student ID</th>
							      <th>Class '.$R1P.'</th>
						
							  </tr>
							</thead>
							  <tbody>';
	
							while($row = $R1->fetch_assoc())
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';
						}
						if($i == 2)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
							      <th>Student ID</th>
							      <th>Class '.$R1P.'</th>
								<th>Class '.$R2P.'</th>
							  </tr>
							</thead>
							  <tbody>';
	
							while( ($row = $R1->fetch_assoc()) && ($row2 = $R2->fetch_assoc()) )
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								echo '<td>'.$row2[$_SESSION['Date']].'</td>';
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';

						}
						if($i == 3)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
								<th>Student ID</th>
								<th>Class '.$R1P.'</th>
								<th>Class '.$R2P.'</th>
								<th>Class '.$R3P.'</th>
							  </tr>
							</thead>
							  <tbody>';
	
							while( ($row = $R1->fetch_assoc()) && ($row2 = $R2->fetch_assoc()) && ($row3 = $R3->fetch_assoc()) )
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								echo '<td>'.$row2[$_SESSION['Date']].'</td>';
								echo '<td>'.$row3[$_SESSION['Date']].'</td>';
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';
							
						}
						if($i == 4)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
								<th>Student ID</th>
								<th>Class '.$R1P.'</th>
								<th>Class '.$R2P.'</th>
								<th>Class '.$R3P.'</th>
								<th>Class '.$R4P.'</th>
							  </tr>
							</thead>
							  <tbody>';
	
							while(($row = $R1->fetch_assoc()) && ($row2 = $R2->fetch_assoc()) && ($row3 = $R3->fetch_assoc()) &&
							      ($row4 = $R4->fetch_assoc()) )
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								echo '<td>'.$row2[$_SESSION['Date']].'</td>';
								echo '<td>'.$row3[$_SESSION['Date']].'</td>';
								echo '<td>'.$row4[$_SESSION['Date']].'</td>';
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';
							
						}
						if($i == 5)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
								<th>Student ID</th>
								<th>Class '.$R1P.'</th>
								<th>Class '.$R2P.'</th>
								<th>Class '.$R3P.'</th>
								<th>Class '.$R4P.'</th>
								<th>Class '.$R5P.'</th>
							  </tr>
							</thead>
							  <tbody>';
	
							while( ($row = $R1->fetch_assoc()) && ($row2 = $R2->fetch_assoc()) && ($row3 = $R3->fetch_assoc()) &&
							      ($row4 = $R4->fetch_assoc()) && ($row5 = $R5->fetch_assoc()) )
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								echo '<td>'.$row2[$_SESSION['Date']].'</td>';
								echo '<td>'.$row3[$_SESSION['Date']].'</td>';
								echo '<td>'.$row4[$_SESSION['Date']].'</td>';
								echo '<td>'.$row5[$_SESSION['Date']].'</td>';
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';
														
						}
						if($i == 6)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
								<th>Student ID</th>
								<th>Class '.$R1P.'</th>
								<th>Class '.$R2P.'</th>
								<th>Class '.$R3P.'</th>
								<th>Class '.$R4P.'</th>
								<th>Class '.$R5P.'</th>
								<th>Class '.$R6P.'</th>
							  </tr>
							</thead>
							  <tbody>';
	
							while( ($row = $R1->fetch_assoc()) && ($row2 = $R2->fetch_assoc()) && ($row3 = $R3->fetch_assoc()) &&
							      ($row4 = $R4->fetch_assoc()) && ($row5 = $R5->fetch_assoc()) && ($row6 = $R6->fetch_assoc()) )
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								echo '<td>'.$row2[$_SESSION['Date']].'</td>';
								echo '<td>'.$row3[$_SESSION['Date']].'</td>';
								echo '<td>'.$row4[$_SESSION['Date']].'</td>';
								echo '<td>'.$row5[$_SESSION['Date']].'</td>';
								echo '<td>'.$row6[$_SESSION['Date']].'</td>';
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';
							
						}
						if($i == 7)
						{
							echo '<table class="table table-striped">
							<thead>
							  <tr>
								<th>Student ID</th>
								<th>Class '.$R1P.'</th>
								<th>Class '.$R2P.'</th>
								<th>Class '.$R3P.'</th>
								<th>Class '.$R4P.'</th>
								<th>Class '.$R5P.'</th>
								<th>Class '.$R6P.'</th>
								<th>Class '.$R7P.'</th>
							  </tr>
							</thead>
							  <tbody>';
	
							while( ($row = $R1->fetch_assoc()) && ($row2 = $R2->fetch_assoc()) && ($row3 = $R3->fetch_assoc()) &&
							      ($row4 = $R4->fetch_assoc()) && ($row5 = $R5->fetch_assoc()) && ($row6 = $R6->fetch_assoc()) &&
							      ($row7 = $R7->fetch_assoc()) )
							{
								echo '<tr>';
								echo '<td>'.$row['Student_ID'].'</td>';
								echo '<td>'.$row[$_SESSION['Date']].'</td>';
								echo '<td>'.$row2[$_SESSION['Date']].'</td>';
								echo '<td>'.$row3[$_SESSION['Date']].'</td>';
								echo '<td>'.$row4[$_SESSION['Date']].'</td>';
								echo '<td>'.$row5[$_SESSION['Date']].'</td>';
								echo '<td>'.$row6[$_SESSION['Date']].'</td>';
								echo '<td>'.$row7[$_SESSION['Date']].'</td>';
								echo '</tr>';
								
							}
							 echo '</tbody>
							</table>';
							
						}
					
					}
					else
					{
						 echo '<h2 style="color:red;">Attendence not found.</h2>';
					}
				
				}
				
			}
			else
			{
				 echo '<h2 style="color:red;">No classes assigned.</h2>';
			}
			?>
					  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Developed by <a href="http://pixeldesigners.in/">PixelDesigners</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
  </body>
</html>
<?php
	mysqli_close($connection);
?>
