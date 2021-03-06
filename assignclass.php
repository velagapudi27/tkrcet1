<?php
		require('session.php');
		if($_SESSION['access'] != "principal"){
			header('Location: 404.html');
		}
        
        if (isset($_POST['Submit2']))
        {
        																	// Define $username and $password
			$Period = $_POST['Period_Select'];
			$Department = $_POST['Department_Select'];
			$Year = $_POST['Year_Select'];
			$Semester = $_POST['Semester_Select'];
            
            
																					// To protect MySQL injection for Security purpose
			$Period = stripslashes($Period);
			$Department = stripslashes($Department);
			$Year = stripslashes($Year);
			$Semester = stripslashes($Semester);
           
            
			$Period = $connection->real_escape_string($Period);
			$Department = $connection->real_escape_string($Department);
			$Year = $connection->real_escape_string($Year);
			$Semester = $connection->real_escape_string($Semester); 
            
			

			$sql = "SELECT * FROM `Year` WHERE `Period` = '" . $Period . "' AND `Year` = '" . $Year . "' AND `Department` = '" . $Department . "' AND `Sem` = '" . $Semester . "'";

			$query = $connection->query($sql);
			            
			$result = $query->num_rows;
            
        }
	if (isset($_POST['Sub24']))
                    {
                            $Class_Select = $_POST['Class_Select'];
                            $Class_Select = stripslashes($Class_Select);
                            $Class_Select = $connection->real_escape_string($Class_Select);    
			    
			$sql = "SELECT * FROM `faculty`";

			$query = $connection->query($sql);
			            
			$result = $query->num_rows;
                            
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

    <title>HOD MANAGEMENT </title>

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
              <a href="hod.php" class="site_title"><i class="fa fa-university"></i> <span>HOD</span></a>
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
                      <li><a href="hod.php">Dashboard</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> My Space <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="addclass.php">Create Class</a></li>
                      <li><a href="addstudent.php">Add Student to Class</a></li>
					  <li><a href="addfaculty.php">Add faculty</a></li>
                      <li><a href="generatereports.php">Generate Reports</a></li>
					  <li><a href="viewassign.php">View & Assign Classes</a></li>
                      
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
                    <h2> Assign faculty </h2>
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
                    if (isset($_POST['Submit2']))
                    {
				if (($result) >= 1)
				{
					echo '<form action="" method="POST">
					Select Class :	<select class="form-control" name="Class_Select" id="Class_Select">';
						
					while($row = $query->fetch_assoc())
					{
									
						echo '<option value="' . $row['class_name'] . '"> ' . $row['Period'] .'  - ' . $row['Year'] .' Year - ' . $row['Sem'] . ' Sem - ' . $row['Department'] . ' - ' . $row['Section'] . '</option>';
							
					}
					echo '</select>
													
					<br>
					<input type="submit" id="Sub24" name="Sub24" value="Assign Faculty" class="btn btn-success">
					</form>';
					
				}
				else {
				   
					echo '<h2 style="color:red;">No Class Found.</h2>';
                                
				}
                    }
                    if (isset($_POST['Sub24']))
                    {
                            
			    
                        if (($result) >= 1)
			{
								
				$_SESSION['actoadc'] = $Class_Select;			
				echo '<form action="assignedclass.php" method="POST">
				Select Faculty:	<select class="form-control" name="Faculty_Select" id="Faculty_Select">';
								
				while($row = $query->fetch_assoc())
				{
				
					echo '<option value="' . $row['email'] . '"> ' . $row['name'] .' - ' . $row['email'] . '</option>';
				
				}
				echo '</select>		
					<br>
				<input type="submit" id="Sub228" name="Sub228" value="Assign Faculty" class="btn btn-success">
				</form>';
			}
			else {
				echo '<h2 style="color:red;">No faculty added.</h2>';
                        }
                            
                    }    
?>



<br>




                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer>
          <div class="pull-right">
            Developed by <a href="http://pixeldesigners.in/">PixelDesigners</a>
          </div>
          <div class="clearfix"></div>
        </footer>

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