<?php
include ('../config.php');
session_start();
// $user=$_SESSION['user_name'];
$sql="select * from contractor WHERE cusername='".$_SESSION['c_name']."'";
// echo $sql;
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
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.html">DREAM HOME </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <?php
                                                echo $_SESSION['c_name'];

                      ?><a href="../login/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-home fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
                    </li>
                    <li>
                        <a  href="changepasssw.php"><i class="fa fa-qrcode fa-3x"></i> change password</a>
                    </li>
                    <li  >
                        <a  href="workers.php"><i class="fa fa-bar-chart-o fa-3x"></i>Add Workers</a>
                    </li>	
                    
                    <li  >
                        <a    href="#"><i class="fa fa-user fa-3x"></i>Leave Update</a>\ <ul class="nav nav-second-level">
                        <li>
                                <a  class="active-menu" href="viewleave.php">Approve Leave</a>
                            </li>
                             <li>
                                <a href="lapproval.php">Pending</a>
                            </li>
                            <li>
                                <a href="lreject.php">reject</a>
                            </li>
                       
                        </ul>
                      </li>  	
					
			
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>LEAVE </h2>   
                        <h5>Welcome Contractor, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
   
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
       
 <div class="panel panel-default">
    <div class="panel-heading">
     Leave Approval
    </div>
    
    <div>
    
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
        
          <tr>
            <th data-breakpoints="xs">SLNO</th>
            <th>Name</th>
            <th>Todate</th>
            <th>FromDate</th>
            <th>Reason</th>
            <th>Approve</th>
            <th>Reject</th>
            
          
            
          </tr>
        </thead>
        <tbody>
          <tr data-expanded="true">
          <?php
include("../config.php");
?>
<?php
$s=1;
$cid=$_SESSION['cid'];

$sql=mysqli_query($conn,"SELECT l.*,r.* FROM tbl_leave l inner join  worker r on r.wid=l.wid  WHERE l.lstatus='pending'and l.cid=$cid");


   while($display=mysqli_fetch_array($sql))
   {
       $login=$display['lid'];
	echo "<tr>";
	echo"<td>".$s++."</td>";
    echo "<td>".$display["wname"]."</td>";
    echo "<td>".$display["todate"]."</td>";
    echo "<td>".$display["fromdate"]."</td>";
	echo "<td>".$display["reason"]."</td>";
    
	?>
     <td><button class="btn btn-primary" ><a href="approval.php?id=<?php echo $display['lid'];?>"style="color:white;">Approve</a></button> </td>
     <td><button class="btn btn-danger" ><a href="rejectl.php?id=<?php echo $display['lid'];?>"style="color:white;">Reject</a></button> </td>
    
   

	<?php
	echo "</tr>";
	
  }

echo "</table>";

?>

        </tbody>
      </table>
    </div>
  </div>

</div>


