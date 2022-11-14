<?php include ('../config.php');
session_start();
$cid=$_SESSION['cid'];
if(isset($_POST['submit']))
{
	$cid=$_SESSION['cid'];
	$wname=$_POST['wname'];
	$waddress=$_POST['waddress'];
	$wphonenumber=$_POST['wphonenumber'];
	$wdob=$_POST['wdob'];
	$wgender=$_POST['wgender'];
	$wcity=$_POST['wcity'];
    $workertype=$_POST['workertype'];
	//$cfile=addcslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$wusername=$_POST['wusername'];
	$wpassword=$_POST['wpassword'];
	// $pass=md5($wpassword);
	$wcpassword=$_POST['wcpassword'];
                               
    $select="SELECT * from worker WHERE wusername='$wusername' ";
	$result= mysqli_query($conn,$select);
	if(mysqli_num_rows($result)> 0 )
	{
		echo '<script type="text/javascript">';
   			echo ' alert("contractor alery exist")';
			echo '</script>';
		// $error[]='user already exist';
	}else{
		if ($wpassword != $wcpassword)
		{
			echo '<script type="text/javascript">';
   			echo ' alert("password does not match")';
			echo '</script>';

		}else   
		{
			if($wpassword != "")
			{
				$pass=md5($wpassword);
		$sql="INSERT INTO worker(cid,wname, waddress, wphonenumber,  wdob, wgender, wcity,workertype,wusertype,wusername, wpassword, status) VALUES ('$cid','$wname','$waddress','$wphonenumber','$wdob','$wgender','$wcity','$workertype','worker', '$wusername','$pass','approved')";
		$result=mysqli_query($conn,$sql);
		 if($result)
		 {
			echo '<script type="text/javascript">';
   			echo ' alert("Inserted to the Database Sucessfully")';
			echo '</script>';
		 }
		 else{
			echo ' alert("failed")';
		 }
		}
		
	}

	
};

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
                <a class="navbar-brand" href="index.html"> DREAM HOME</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php
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
                        <a   href="index.php"><i class="fa fa-home fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="profile.php"><i class="fa fa-user fa-3x"></i>Profile</a>
                    </li>
                    <li>
                        <a  href="changepasssw.php"><i class="fa fa-qrcode fa-3x"></i> change password</a>
                    </li>
                    </li>
					 <li >
                        <a class="active-menu" href="workers.php"><i class="fa fa-bar-chart-o fa-3x"></i>Add Workers</a>
                    </li>	
                    
                    <li  >
                        <a    href="#"><i class="fa fa-user fa-3x"></i>Leave Update</a>\ <ul class="nav nav-second-level">
                        <li>
                                <a  href="viewleave.php">Approve Leave</a>
                            </li>
                             <li>
                                <a href="lapproval.php">Pending</a>
                            </li>
                            <li>
                                <a href="lreject.php">reject</a>
                            </li>
                      
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ADD Workers </h2>   
                        <h5>Welcome Contractor , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
				 <form method="POST">
			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center mb-5">
							<h4 class="heading-section">WORKERS REGISTRATION </h4>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<div class="wrap d-md-flex">
								<div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg1.jpg);">
									<div class="text w-100">
									
									</div>
						  </div>
								<div class="login-wrap p-4 p-md-5">
									<form action="#" class="signup-form" onclick="return validation()">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group d-flex align-items-center">
											  		<label class="label" for="name">Worker  Name</label>
											  		<input type="text" class="form-control" name="wname" id="wname" placeholder="worker Name" autocomplete="off" required>	
										  		</div>
												</div>
										</div>
										<div class="row">
											<span id="fullname" style="color:red;"> </span>
										</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">Worker Address</label>
												  		<textarea class="form-control" placeholder=" Worker Address" rows="5" id="waddress" name="waddress" required
														  required pattern="[a-zA-Z]{3,30}"  
															oninvalid="setCustomValidity('fill address !!')" 
															oninput="setCustomValidity('')"></textarea>
											  		</div>
												</div>
												<div class="row">
													<span id="adress1" style="color:red;"> </span>
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">Phone Number</label>
												  		<input type="text" class="form-control" placeholder="Phone Number" id="wphonenumber" name="wphonenumber"
														  pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
														oninvalid="setCustomValidity('fill phoneno !!')"  
															oninput="setCustomValidity('')"
															 maxlength="30"> 
											  		</div>
												</div>
												<div class="row">
													<span id="phoneno" style="color:red;"> </span>
												</div>

												<div class="row">
													
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="name">Date of Birth</label>
											  			<input type="date" class="form-control" placeholder="Date" id="wdob" name="wdob" style="width:100%" required>
										  			</div>
												</div>
												<div class="row">
													<span id="date1" style="color:red;"> </span>
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center"><label>Gender<label>
												  		<label class="label" for="name">Gender &nbsp;&nbsp;&nbsp;&nbsp;</label> 
													  <input type="radio"  name="wgender" value="male" id="wgender" style="size:20%;" required/>Male  &nbsp;  
													  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="wgender" value="female" id="wgender"required/>Female    
												    </div>
                                                 </div>
											</div>
											<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											  			<select name="wcity" class="form-control" id="wcity" required>
														  <option value="" disabled selected>Select your City</option>
															<option value="Alappuzha">Alappuzha</option>
															<option value="Cherthala">Cherthala</option>
															<option value="Kottayam">Kottayam</option>
															<option value="Kanjirapally">Kanjirapally</option>
															<option value="Kanjikuzhi">Kanjikuzhi</option>
															<option value="Kalavoor">Kalavoor</option>
															<option value="Kuttanad">Kuttanad</option>

											  			</select>
										 			 </div>
												</div>
                                                <div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">Worker Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											  			<select name="workertype" class="form-control" id="workertype" required>
														  <option value="" disabled selected>Select workers type</option>
															<option value="Plumber">Plumber</option>
															<option value="Electtrician">Electrician</option>
															<option value="Painter">Painter</option>
															<option value="Decorator">Decorator</option>
															<option value="Labourer"> Labourer</option>

											  			</select>
										 			 </div>
												</div>
												<!-- <div class="col-md-12">
														<div class="form-group d-flex align-items-center">
														<label class="label" for="image">image &nbsp;&nbsp;&nbsp;</label>
									  					<input type="file" class="form-control" placeholder="Image" id="cfile" name="cfile">
														</div>
													</div> -->
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="website">Username</label>
											  			<input type="text" class="form-control" placeholder="Username" id="wusername" name="wusername" required>
										 			 </div>
													  <div class="row">
														<span id="username1" style="color:red;"> </span>
													</div>
													<div class="col-md-12">
														<div class="form-group d-flex align-items-center">
															<label class="label" for="password">Password &nbsp;&nbsp;&nbsp;</label>
									  						<input type="password" class="form-control" placeholder="Password" id="wpassword" name="wpassword" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group d-flex align-items-center">
															<label class="label" for="password">Conform Password</label>
									  						<input type="password" class="form-control" placeholder="Conform Password" id="wcpassword" name="wcpassword" required>
														</div>
													</div>
												
													<div class="row">
														<span id="pass1" style="color:red;"> </span>
													</div>
											
												</div>
												<div class="col-md-12 my-4">
													<div class="form-group">
														<div class="w-100">
															<label class="checkbox-wrap checkbox-primary">I agree all statements in terms of service
														 	<input type="checkbox" checked>
														    <span class="checkmark"></span>
    </label>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" class="btn btn-secondary submit p-3" value="Create an account" id="btn" name="submit">
													</div>
												</div>
                                                  </div>
											</div>
										</div>
										<a href="../">Back to Home</a>
									</form>	
						  
						</div>
						<a href="../">Back to Home</a>
					  </div>
						</div>
					</div>
				</div>
			</section>
</form>
		
						  
						</div>
						
					  </div>
						</div>
					</div>
				</div>
			</section>
</form>
                                 
           
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
