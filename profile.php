<?php
include ('../config.php');
session_start();
// $user=$_SESSION['user_name'];
$sql="select * from registration where username='".$_SESSION['user_name']."'";
$rs= mysqli_query($conn,$sql);

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
                        <a href="changepasssw.php"><i class="fa fa-qrcode fa-3x"></i>change password</a>
                    </li>
                    <li>
                        <a  class="active-menu"  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Edit Profile</a>
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
                     <h2>PROFIILE </h2>   
                        <h5>Welcome Admin , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
body {
    background-color: #e8f5ff;
    font-family: Arial;
    overflow: hidden;
}
.edit {
    position: absolute;
    color: #000000;
    right: 24%;
}
/* Main */
.main {
    margin-top: 2%;
    margin-left: 20%;
    margin-right: 20%;
    font-size: 28px;
    padding: 0 10px;
    width: 58%;
}
.main h2 {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
    margin-bottom: 10px;
}
.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    /* margin-bottom: 20px; */
    padding: 20px 0 20px 50px;
}
.main .card table {
    border: none;
    font-size: 16px;
    height: 270px;
    margin-left:auto; 
    margin-right:auto;
    width: 80%;   
}
.social-media {
    text-align: center;
    width: 90%;
}
.social-media span {
    margin: 0 10px;
}
.fa-facebook:hover {
    color: #4267b3 !important;
}
.fa-twitter:hover {
    color: #1da1f2 !important;
}
.fa-instagram:hover {
    color: #ce2b94 !important;
}
.fa-invision:hover {
    color: #f83263 !important;
}
.fa-github:hover {
    color: #161414 !important;
}
.fa-whatsapp:hover {
    color: #25d366 !important;
}
.fa-snapchat:hover {
    color: #fffb01 !important;
}
</style>
</head>
<body>
    <div>
        <a href="index.php">Back to Home</a>
    </div>

    <!-- Main -->
    <div class="main">
        <h1>Profile</h1>
            <div class="card">
            <div class="card-body">
                <a href="editprofile.php"><i class="fa fa-pen fa-xs edit"></i></a>
                <table>
                    <tbody>
                        <tr>
                            <td>User name</td>
                            <td>:</td>
                            <td>
                            <?php
                                                echo $_SESSION['user_name'];

                      ?>
                            </td>
                        </tr>
                        <tr>
                            <td>First name</td>
                            <td>:</td>
                            <?php 
                            while($row = mysqli_fetch_array($rs)) {
                            ?>
                            <td><?php echo $row['fname'];?></td>
                            
                        </tr>
                        <tr>
                            <td>last name</td>
                            <td>:</td>
                            <td><?php echo $row['lname'];?></td>
                            
                        </tr>
                        <tr>
                            <td>Adhar No</td>
                            <td>:</td>
                            <td><?php echo $row['aadharno'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $row['address'];?></td>
                        </tr>
                        <tr>
                            <td>phone number</td>
                            <td>:</td>
                            <td><?php echo $row['phonenumber'];?></td>
                        </tr>
                        <tr>
                            <td>gender</td>
                            <td>:</td>
                            <td><?php echo $row['gender'];?></td>
                        </tr>
                        <tr>
                            <td>city</td>
                            <td>:</td>
                            <td><?php echo $row['city'];?></td>  
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
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
