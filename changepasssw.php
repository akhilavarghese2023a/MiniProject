﻿<?php
session_start();
?> 
<?php include("../config.php");
	$username=$_SESSION["user_name"];
	$sql=mysqli_query($conn,"SELECT * FROM registration where username='$username'");
	$display=mysqli_fetch_array($sql);
	$curentpwd=$display['password'];
?>
<?php
if(isset($_POST["btnsubmit"]))
{
	$capassword=$_POST['pd'];
  $cc=md5($capassword);
    $curentpwd;
	if($curentpwd==$cc)
	{
			$ccpassword=$_POST['npd'];
      $ccpass=md5($ccpassword);
			$sql=mysqli_query($conn,"UPDATE registration SET password='$ccpass' WHERE username='$username'");
			if($sql)
			{
					echo "<script>alert('Password Updated Succesfully!!Plase login again!!');window.location='../login/login.php'</script>";
			}
	}
	else
		echo "<script>alert('Please enter current password correctlty!!');window.location='changepasssw.php'</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">DREAM HOME</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php    echo $_SESSION['user_name'];

                      ?> &nbsp; <a href="../login/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      
                    <li>
                        <a  class="active-menu" href="changepasssw.php"><i class="fa fa-qrcode fa-3x"></i>change password</a>
                    </li>
                    <li>
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Edit Profile</a>
                    </li>
                      <li  >
                        <a  href="table.php"><i class="fa fa-table fa-3x"></i>Admin Aprroval</a>
                    </li>
              
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tabs & Panels </h2>   
                        <h5>Welcome Admin , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                                 
                 <form action="" class="form" method="POST">
        <h6>Old Password</h6>
        <div class="input-group">
          <input type="password" class="form-control" name="pd"  id="name">
        </div>
        <h6>New Password</h6>
        <div class="input-group">
            
           <input type="password" class="form-control" name="npd"  id="name">
         
        </div>
        <button type="submit" name="btnsubmit" class="btn btn-info">Submit</button>
      </form>
      <div>
</div>

                    <!-- /. ROW  -->

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
