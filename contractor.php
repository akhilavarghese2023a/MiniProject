<?php include ('../config.php');
  session_start();
if(isset($_POST['submit']))
{
	$cname=$_POST['cname'];
	$caddress=$_POST['caddress'];
	$cphonenumber=$_POST['cphonenumber'];
	$cdob=$_POST['cdob'];
	$cgender=$_POST['cgender'];
	$ccity=$_POST['ccity'];
	//$cfile=addcslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$cusername=$_POST['cusername'];
	$cpassword=$_POST['cpassword'];
	// $pass=md5($cpassword);
	$ccpassword=$_POST['ccpassword'];

	                                                    
    $select="SELECT * from contractor WHERE cusername='$cusername' && cpassword='$cpassword'";
	$result= mysqli_query($conn,$select);
	if(mysqli_num_rows($result)> 0 )
	{
		echo '<script type="text/javascript">';
   			echo ' alert("contractor alery exist")';
			echo '</script>';
		// $error[]='user already exist';
	}else{
		if ($cpassword != $ccpassword)
		{
			echo '<script type="text/javascript">';
   			echo ' alert("password does not match")';
			echo '</script>';

		}else   
		{
			if($cpassword != "")
			{
				
		$cpass=md5($cpassword);		
		$sql="INSERT INTO contractor(cname, caddress, cphonenumber,  cdob, cgender, ccity,cusertype,cusername, cpassword,status) VALUES ('$cname','$caddress','$cphonenumber','$cdob','$cgender','$ccity','contractor', '$cusername','$cpass','approved')";
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
   <script>
function Validstr1() 
      {
        var val = document.getElementById('cname').value;
        if (!val.match(/^[A-Za-z ]*$/))
        {
          document.getElementById('msg').innerHTML="Only alphabets are allowed";
          document.getElementById('cname').value = val;
          document.getElementById('cname').style.color = "red";
          return false;
          flag=1;
        }
        else
        {
          document.getElementById('msg').innerHTML=" ";
          document.getElementById('name').style.color = "green";
          //return true;
        }
      }
	  function Validstr2() 
      {
        var val = document.getElementById('lname').value;
        if (!val.match(/^[A-Za-z]*$/))
        {
          document.getElementById('lmsg').innerHTML="Only alphabets are allowed";
          document.getElementById('lname').value = val;
          document.getElementById('lname').style.color = "red";
          return false;
          flag=1;
        }
        else
        {
          document.getElementById('lmsg').innerHTML=" ";
          document.getElementById('lname').style.color = "green";
          //return true;
        }
      }
      //username                                       
      function Validstr() 
      {
        var val = document.getElementById('username').value;
        if (!val.match(/^[A-Za-z ]*$/))
        {
          document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
          document.getElementById('username').value = val;
          document.getElementById('username').style.color = "red";
          return false;
          flag=1;
        }
        if(val.length<4||val.length>10)
        {
          document.getElementById('msg1').innerHTML="Username between 4 to 10 characters";
          document.getElementById('username').value = val;
          document.getElementById('username').style.color = "red";
          return false;
          flag=1;
        }
        else
        {
          document.getElementById('msg1').innerHTML=" ";
          document.getElementById('username').style.color = "green";
          //return true;
        }
      }
      //email
      function Validateemail()
      {
        var email=document.getElementById('email').value;  
        var mailformat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
        if(email.length<3||email.length>40 && email!="")
        {
         document.getElementById('email1').innerHTML="Invalid Email";
         document.getElementById('email').value = email;
         document.getElementById('email').style.color = "red";
         return false;
        }
        if(!email.match(/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/))
        {  
         document.getElementById('email1').innerHTML="Please enter a valid email";  
         document.getElementById('email').value = email;
         document.getElementById('email').style.color = "red";
         return false;  
        }
        else
        {
         document.getElementById('email1').innerHTML=" ";
         document.getElementById('email').style.color = "green";
          // return true;
        }
      }
	  //Username
	  function Validateusername()
      {
        var email=document.getElementById('uname').value;  
        var mailformat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
        if(email.length<3||email.length>40 && email!="")
        {
         document.getElementById('email2').innerHTML="Invalid Email";
         document.getElementById('uname').value = email;
         document.getElementById('uname').style.color = "red";
         return false;
        }
        if(!email.match(/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/))
        {  
         document.getElementById('email2').innerHTML="Please enter a valid email";  
         document.getElementById('uname').value = email;
         document.getElementById('uname').style.color = "red";
         return false;  
        }
        else
        {
         document.getElementById('email2').innerHTML=" ";
         document.getElementById('uname').style.color = "green";
          // return true;
        }
      }
      //phone
     function Validphone() 
      {
        var val = document.getElementById('phonenumber').value;
        if (!val.match(/^[6789][0-9]{9}$/) && val!="")
       {
         document.getElementById('msg2').innerHTML="Only Numbers are allowed and must contain 10 number";
         document.getElementById('phonenumber').value = val;
          return false;
        }
        else
        {
         document.getElementById('msg2').innerHTML="";
          //   return true;
        }
      }
      //password
      function Password()
      {
        var pass=document.getElementById('password').value;
        consol.log(pass);
       //var patt= /^(?=.[0-9])(?=.[!@#$%^&])[A-Za-z0-9!@#$%^&]{7,15}$/;
       //var patt = /^[a-zA-Z0-9@#$%^&]{7,15}$/;
       var patt = /^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{7,15}$/;
       if(!pass.match(patt))
       {
          console.log(pass);
          document.getElementById('pass').innerHTML="Password must be 7 to 15 character with number and special character ";  
          document.getElementById('password').value = pass;
          document.getElementById('password').style.color = "red";
          return false;  
        }
        else
        {
          console.log(pass, "Green");
          document.getElementById('pass').innerHTML=" ";
          document.getElementById('password').style.color = "green";
         //return true;
        }
      }
      //confirmpassword
      function Password1()
      {
        var pass1=document.getElementById('password').value;
        var pass2=document.getElementById('password1').value;
       if(!pass1.match(pass2))
       {
         console.log(pass2);
         document.getElementById('pass2').innerHTML="Password must match";  
         document.getElementById('password1').value = pass;
         document.getElementById('password1').style.color = "red";
         return false;  
       }
       else
       {
          console.log(pass1, "Green");
          document.getElementById('pass1').innerHTML=" ";
         document.getElementById('password1').style.color = "green";
          //return true;
        }
      }
	//   const isDobValid = (dob) => {
    //         // check age greater than 18
    //         var today = new Date();
    //         var birthDate = new Date(dob);
    //         var age = today.getFullYear() - birthDate.getFullYear();
    //         var m = today.getMonth() - birthDate.getMonth();
    //         if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    //             age--;
    //         }
    //         if (age < 18) {
    //             return false;
    //         } else {
    //             return true;
    //         }
    //     }
	// 	 else if (!isDobValid(dob)) {
    //         document.getElementById('log-dob').textContent = "You must be 18 years old to register";
    //         document.getElementById('log-dob').style.border = "1px solid red";
    //         document.getElementById("log-dob").style.color = "red";

    //         return false;
    //     }
      function Val()
     {
       if(Validstr1()===false || Validstr()===false || ValidateEmail()===false || Validphone()==false || Password()===false || Password1()===false)
        {
          return false;
        }
      }
	  
</script>
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
font-size: 16px;">  <?php    echo $_SESSION['user_name'];

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
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Edit Profile</a>
                    </li>
                    <li  >
                        <a  href="changepasssw.php"><i class="fa fa-bar-chart-o fa-3x"></i> change password</a>
                    </li>	
                     
                    <li>
                        <a  class="active-menu" href="contractor.php"><i class="fa fa-qrcode fa-3x"></i>Add contractor</a>
                    </li>
                    
                    <li  >
                        <a    href="#"><i class="fa fa-user fa-3x"></i>Approve user</a> <ul class="nav nav-second-level">
                                <li>
                                <a  href="approve.php">Request</a>
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
                     <h2>ADD CONTRACTOR </h2>   
                        <h5>Welcome Builder , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <form name="myForm" method="POST" onsubmit="return validation();">
			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center mb-5">
						
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
							 
									<form action="#" class="signup-form" >
										<div class="row">
											<div class="col-md-12">
												<div class="form-group d-flex align-items-center">
											  		<label>Cotractor  Name</label>
											  		<input type="text" class="form-control" name="cname" id="cname" placeholder="Contractor Name" autocomplete="off" onkeyup="return Validstr1()"  required pattern="[a-zA-Z]{3,30}"
													  oninvalid="setCustomValidity('input is incorrect !!')" 
                                                        oninput="setCustomValidity('')"
                                                             maxlength="30" onkeyup="return validation()">	
										  		</div>
												</div>
										</div>
										<div class="row">
											<span id="fullname" style="color:red;"> </span>
										</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label >Contractor Address</label>
												  		<textarea class="form-control" placeholder=" Contractor Address" rows="5" id="caddress" name="caddress" required
														  required pattern="[a-zA-Z]{3,30}"  
															oninvalid="setCustomValidity('fill address !!')" 
															oninput="setCustomValidity('')" onkeyup="return Validstr2()"  required pattern="[a-zA-Z]{3,30}"  
															oninvalid="setCustomValidity('fill address !!')" 
															oninput="setCustomValidity('')"
															maxlength="30"></textarea></textarea>
											  		</div>
												</div>
												<div class="row">
													<span id="adress1" style="color:red;"> </span>
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label >Phone Number</label>
												  		<input type="text" class="form-control" placeholder="Phone Number" id="cphonenumber" name="cphonenumber"
                              required onkeyup="return Validphone()"
														  pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
														oninvalid="setCustomValidity('fill phoneno !!')"  
															oninput="setCustomValidity('')"
															 maxlength="10"> 
											  		</div>
												</div>
												<div class="row">
													<span id="phoneno" style="color:red;"> </span>
												</div>

												<div class="row">
													
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label >Date of Birth</label>
											  			<input type="date" class="form-control" placeholder="Date" id="cdob" name="cdob" style="width:100%"  max="2000-01-01" required>
										  			</div>
												</div>
												<div class="row">
													<span id="date1" style="color:red;"> </span>
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label >Gender &nbsp;&nbsp;&nbsp;&nbsp;</labe requiredl> 
													  <input type="radio"  name="cgender" value="male" id="cgender" style="size:20%;" required/>Male  &nbsp;  
													  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="cgender" value="female" id="cgender"required/>Female    
												    </div>
                                                 </div>
											</div>
											<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label >City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											  			<select name="ccity" class="form-control" id="ccity" required>
														  <option value="" disabled selected>-------------</option>
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
												<!-- <div class="col-md-12">
														<div class="form-group d-flex align-items-center">
														<label class="label" for="image">image &nbsp;&nbsp;&nbsp;</label>
									  					<input type="file" class="form-control" placeholder="Image" id="cfile" name="cfile">
														</div>
													</div> -->
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label >Username</label>
											  			<input type="text" class="form-control" placeholder="Username" id="cusername" name="cusername" required>
										 			 </div>
													  <div class="row">
														<span id="username1" style="color:red;"> </span>
													</div>
													<div class="col-md-12">
														<div class="form-group d-flex align-items-center">
															<label >Password &nbsp;&nbsp;&nbsp;</label>
									  						<input type="password" class="form-control" placeholder="Password" id="cpassword" name="cpassword" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group d-flex align-items-center">
															<label>Conform Password</label>
									  						<input type="password" class="form-control" placeholder="Conform Password" id="ccpassword" name="ccpassword" required>
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
