<?php
   include ('../config.php');
   session_start();
     if(isset($_SESSION['user_name']))
     {
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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <style>
#builder {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #builder td, #builder th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

        #builder tr:hover {background-color: #ddd;}

        #builder th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
        }
        </style>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                DREAM HOME
                </a> 
               
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
                        <a  href="changepasssw.php"><i class="fa fa-qrcode fa-3x"></i>change password</a>
                    </li>
                    <li>
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Edit Profile</a>
                    </li>
                      <li  >
                        <a class="active-menu"  href="table.php"><i class="fa fa-table fa-3x"></i>Admin Aprroval</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>DREAM HOME</h2>   
                        <h5>Admin Approval. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Admin Approval
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <table id ="builder"  class="content-table">

                                            <tr>
                                                <th>Id</th>
                                                <th> f name</th>&nbsp;&nbsp;
                                                <th> l name</th>&nbsp;&nbsp;
                                                <th>address</th>&nbsp;&nbsp;
                                                <th>email</th>
                                                <th>usertype</th>
                                                <th>phone no</th>
                                                <th>username</th>
                                                <th>Approve /Delete</th>
                                            </tr>
                                            <?php 
                                            $query="SELECT * From registration WHERE Status = 'pending' ORDER BY id ASC";
                                            $result=mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                    
                                            ?>
                                    
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['fname'];?></td>
                                                <td><?php echo $row['lname'];?></td>
                                                <td><?php echo $row['address'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                               <td><?php echo  $row['usertype'];?></td>
                                                <td><?php echo $row['phonenumber'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                    
                                            <td>
                                            <form action ="" method="POST">
                                                <input type="hidden" name ="id" value="<?php echo $row['id'];?>"/>
                                                <input type="submit" name ="approved" value="approved" />
                                                <input type="submit" name ="delete" value="delete"/>
                                            </form>
                                            </td>
                                            </tr>
                                       
                                        <?php
                                        }
                                        ?>
                                         </table>
                                        </div>                                      
                                        <?php
                                            if(isset($_POST['approved']))
                                                {
                                                    $id=$_POST['id'];      
                                                    $select ="UPDATE registration SET status='approved' WHERE id='$id'";
                                                    $result=mysqli_query($conn,$select);
                                                    echo '<script type="text/javascript">';
                                                    echo 'window.location.href= "table.php";';
                                                    echo ' alert("Approved");';                                          
                                                    echo '</script>';
                                                    //return true;
                                                    //header("location:adminapproval.php");
                                                }
                                            if(isset($_POST['delete']))
                                            {
                                                $id=$_POST['id'];
                                                $select ="DELETE FROM  registration  WHERE id='$id'";
                                                $result=mysqli_query($conn,$select);
                                                        echo '<script type="text/javascript">';
                                                    echo 'window.location.href= "table.php";';
                                                        echo ' alert("deleted")';
                                                        echo '</script>';
                                            }
                                        ?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
            </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6">
                      <!--    Striped Rows Table  -->
                   
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
