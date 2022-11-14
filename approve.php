<?php
     session_start();
     include("../config.php");
     if(isset($_SESSION['user_name']))
     {
                                      // echo 'inside';                          
                            // echo '<a href="profile.php">'      
                                          // echo '<h2> welcome'.$_SESSION['username'].'</h2>';
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
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style>
        #approve {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #approve td, #approve th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

        #approve tr:hover {background-color: #ddd;}

        #approve th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
        }
    </style>
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
                <a class="navbar-brand" href="index.html">DREAM HOME </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <?php
                                                echo $_SESSION['user_name'];

                      ?> <a href="../login/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                
                    <li>
                        <a  href="changepasssw.php"><i class="fa fa-qrcode fa-3x"></i> change password</a>
                    </li>
                    </li>
                    <li>
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Edit Profile</a>
                    </li>
						   <li  >
                        <a  href="contractor.php"><i class="fa fa-bar-chart-o fa-3x"></i> Add Contractor</a>
                    </li>	
                   
                    <li  >
                        <a    href="#"><i class="fa fa-user fa-3x"></i>Approve user</a> <ul class="nav nav-second-level">
                                <li>
                                <a class="active-menu"  href="approve.php">Request</a>
                            </li>
                             <li>
                                <a href="reject.php">Approved</a>
                            </li>
                            <li>
                                <a href="pending.php">reject</a>
                            </li>
                       
                        </ul>
                      </li>  	     
                   			
					
					                   
                 
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>APPROVE REQUEST</h2>   
                        <h5>Welcome  Builder, Love to see you back</h5>
                    </div>
                <li class="nav-item">
                </li>
              </ul>
              <div>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <table id ="approve"  class="content-table">

                                            <tr>
                                                <th>Id</th>
                                                <th> Request User</th>&nbsp;&nbsp;
                                                <th>floor plan</th>
                                                <th> Approve</th>&nbsp;&nbsp;
                                                <th> Delete</th>&nbsp;&nbsp;
                                               
                                            </tr>
                                            <?php 
                                            $bid=$_SESSION['bid'];
                                            
                                            $query="SELECT * From request WHERE req_Status = 'request'and bid=$bid ORDER BY req_id ASC";
                                            $result=mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                    
                                            ?>
                                    
                                            <tr>
                                                <td><?php echo $row['req_id'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                               <td> <img src="<?php echo "../upload_image/".$row['image']; ?>" width="100px" height="100px" alt="image"></td>
                                                
                                               <td>
                                            <form action ="" method="POST">
                                                <input type="hidden" name ="id" value="<?php echo $row['bid'];?>"/>
                                                <input type="hidden" name ="idc" value="<?php echo $row['req_id'];?>"/>
                                                <input type="submit" name ="approved" value="approved" />
                                            </td>
                                                <td>
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
                                                    
                                                    $id=$_POST['idc'];     
                                                    $select ="UPDATE request SET req_status='approved' WHERE req_id='$id'";
                                                    $result=mysqli_query($conn,$select);
                                                    echo '<script type="text/javascript">';
                                                    echo 'window.location.href= "approve.php";';
                                                    echo ' alert("Approved");';                                          
                                                    echo '</script>';
                                                    //return true;
                                                    
                                                }
                                            if(isset($_POST['delete']))
                                            {
                                                 
                                                $id=$_POST['idc'];     
                                                $select ="UPDATE request SET req_status='delete' WHERE req_id='$id'";
                                                $result=mysqli_query($conn,$select);
                                                echo '<script type="text/javascript">';
                                                echo 'window.location.href= "approve.php";';
                                                echo ' alert("Delete Request");';                                          
                                                echo '</script>';
                                                //return true;
                                                
                                            }
                                        ?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
              </div>

                 <!-- / ROW  -->           
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
