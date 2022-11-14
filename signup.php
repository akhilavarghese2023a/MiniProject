<?php include ('../config.php');
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	$phonenumber=$_POST['phonenumber'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$city=$_POST['city'];
	$usertype=$_POST['usertype'];
	$aadharno=$_POST['aadharno'];
	// $files=$_FILES['image']['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	// $pass=md5($password);
	$cpassword=$_POST['cpassword'];

	
    $select="SELECT * from registration WHERE username='$username'";
	$result= mysqli_query($conn,$select);
	if(mysqli_num_rows($result)> 0 )
	{
		echo '<script type="text/javascript">';
   			echo ' alert("user alery exist")';
			echo '</script>';
		// 	echo '<button type="button" onclick="history.back();>Back</button>';
		// // $error[]='user already exist';
	}else{
		if ($password != $cpassword)
		{
			echo '<script type="text/javascript">';
   			echo ' alert("password does not match")';
			echo '</script>';

		}else
		{
			if($password != "")
			{
				$pass=md5($password);

		$sql="INSERT INTO registration(fname,lname, address, phonenumber, email, dob, gender, city,usertype,aadharno, username, password,status) VALUES ('$fname','$lname','$address','$phonenumber','$email','$dob','$gender','$city','$usertype','$aadharno','$username','$pass','pending')";
		$result=mysqli_query($conn,$sql);
		 if($result)
		 {
			// move_uploaded_file($_FILES['image']['name'],$files);
			echo '<script type="text/javascript">';
   			echo ' alert("Registration completed ")';
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

<!doctype html>
<html lang="en">
  <head>
	<style>
		#gender{
			size: 10px;
		}
	</style>
  	<title>Sign Up 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<!-- //For-Mobile-Apps -->

<!-- Custom-Stylesheet-Links -->
<!-- Bootstrap-CSS --> 		<link rel="stylesheet" href="css/bootstrap.min.css" 	type="text/css" media="all">
<!-- Index-Page-CSS --> 	<link rel="stylesheet" href="css/style.css" 		type="text/css" media="all">
<!-- Gallery-Popup-CSS --> 	<link rel="stylesheet" href="css/chocolat.css"		type="text/css" media="all">
<!-- //Custom-Stylesheet-Links -->

<!-- Web-Fonts -->
<!-- Body-Font -->	 <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' type='text/css'>
<!-- Logo-Font -->	 <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Bree+Serif'		   type='text/css'>
<!-- Link-Font -->	 <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway:400,500,600'	   type='text/css'>
<!-- //Web-Fonts -->
	
	<!-- Latest compiled and minified CSS
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
 jQuery library 
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
 Popper JS 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

 Latest compiled JavaScript 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
<script>
function Validstr1() 
      {
        var val = document.getElementById('name').value;
        if (!val.match(/^[A-Za-z ]*$/))
        {
          document.getElementById('msg').innerHTML="Only alphabets are allowed";
          document.getElementById('name').value = val;
          document.getElementById('name').style.color = "red";
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
	  //age
	  function datevalidate()
	{
		var dob=document.getElementById('dob').value;
		if(dob == "")
                    {
                        document.getElementById('dob').placeholder="** please fill the field";
                        document.getElementById('dob').style.border="1px solid red";
                        document.getElementById('dob').focus();
                        return false;
                    }
                    else if (!isDobValid(age)) 
                    {
                        alert("You must be 18 years old to register");
                        document.getElementById('dob').style.border = "1px solid red";
                        document.getElementById("dob").style.color = "red";
                        return false;
                    }
	}
	const isDobValid = (dob) => {
            // check age greater than 18
            var today = new Date();
            var birthDate = new Date(dob);
            var agee = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                agee--;
            }
            if (agee < 18) {
                return false;
            } else {
                return true;
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
				
	         <form name="myForm" method="POST" onsubmit="return datevalidate();">
			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-6 text-center mb-5">
							<h2 class="heading-section">Sign Up Form</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<div class="wrap d-md-flex">
								<div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg1.jpg);">
									<div class="text w-100">
										<h2 class="mb-4">Welcome to signup form</h2>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									</div>
						  </div>
								<div class="login-wrap p-4 p-md-5">
							  <h3 class="mb-3">Create an account</h3>
									<form action="#" class="signup-form" onclick="return validation()">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group d-flex align-items-center">
											  		<label class="label" for="name">First Name</label>
											  		<input type="text" class="form-control" name="fname" id="name" placeholder="First Name" autocomplete="off" onkeyup="return Validstr1()"
													 required pattern="[a-zA-Z]{3,30}"
													  oninvalid="setCustomValidity('input is incorrect !!')" 
                                                        oninput="setCustomValidity('')"
                                                             maxlength="30" onkeyup="return validation()">
										  		</div>
												</div>
										</div>
										<span id="msg" style="color:red;"> </span>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group d-flex align-items-center">
											  		<label class="label" for="name">Last Name</label>
											  		<input type="text" class="form-control" name="lname" id="lname" placeholder="Fast Name" autocomplete="off" onkeyup="return Validstr2()"
													 required pattern="[a-zA-Z]{3,30}"
													  oninvalid="setCustomValidity('input is incorrect !!')" 
                                                        oninput="setCustomValidity('')"
                                                             maxlength="30">
										  		</div>
												</div>
										</div>
										<span id="lmsg" style="color:red;"> </span>
										<!-- <div class="row">
											<span id="fullname" style="color:red;"> </span>
										</div> -->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">Address</label>
												  		<textarea class="form-control" placeholder="Address" rows="5" id="address" name="address" required
														  required pattern="[a-zA-Z]{3,30}"  
															oninvalid="setCustomValidity('fill address !!')" 
															oninput="setCustomValidity('')"
															maxlength="30"></textarea>
											  		</div>
												</div>
												<div class="row">
													<span id="adress1" style="color:red;"> </span>
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">Phone Number</label>
												  		<input type="tel" class="form-control" placeholder="Phone Number" min="10" maxlength="10" id="phonenumber" name="phonenumber" required onkeyup="return Validphone()"
														  pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
														oninvalid="setCustomValidity('fill phoneno !!')"  
															oninput="setCustomValidity('')"
															 maxlength="30"> 
											  		</div>
												</div>
												<span id="msg2" style="color:red;"></span>
												<!-- <div class="row">
													<span id="phoneno" style="color:red;"> </span>
												</div> -->
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="email">Email Address</label>
											  			<input class="form-control" type="email" name="email" placeholder="Enter your email" id="email"  required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return Validateemail()">
													</div> 
												</div>
												<span id="email1" style="color:red;"></span>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="name">Date of Birth</label>
											  			<input type="date" class="form-control" placeholder="Date" id="dob" name="dob" style="width:100%"  onkeyup="return datevalidate()" max="2000-01-01" required>
										  			</div>
												</div>
												<div class="row">
													<span id="date1" style="color:red;"> </span>
												</div>
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">Gender</label required> 
													  <input type="radio"  name="gender" value="male" id="gender" style="size:20%;" required="required"/>Male  &nbsp;  
													  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="gender" value="female" id="gender" required="required">Female    
												    </div>
                                                 </div>
											</div>
											<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
												  		<label class="label" for="name">City</label>
											  			<select name="city" class="form-control" id="city" required >
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
											  			<label class="label" for="website">User/Builder</label>
											  			<select name="usertype" class="form-control"  id="usertype" required>
														  <option value="" disabled selected>User Type</option>
															<option value="user">user</option>
															<option value="builder">builder</option>
                                                        </select>
                                                    </div>
                                                   </div>
												   <div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="aadhar">Aadhar card number</label>
											  			<input class="form-control" type="aadharno" name="aadharno" placeholder="Aadharno" id="aadharno" min="13" maxlength="13"  >
													</div> 
												</div>
												<!-- <div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="aadhar">Aadhar card image</label>
											  			<input type="file" input class="form-control" type="image" name="image" placeholder="image" id="image" required>
													</div> 
												</div> -->
												   
												<div class="col-md-12">
													<div class="form-group d-flex align-items-center">
											  			<label class="label" for="website">Username</label>
											  			<input class="form-control" type="email" name="username" placeholder="Enter your email" id="uname"  required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return Validateusername()">
										 			 </div>
													  <div class="row">
													  <span id="email2" style="color:red;"></span>
													</div>
													<div class="col-md-12">
														<div class="form-group d-flex align-items-center">
															<label class="label" for="password">Password</label>
									  						<input type="password" class="form-control" placeholder="Password Must be include A-Z ,a-z ,0-9 ,and special character" id="password" name="password" required
															  required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$" 
                                                              oninvalid="setCustomValidity('Password Must be include A-Z ,a-z ,0-9 ,and special character !!')" 
                                                                 oninput="setCustomValidity('')"
                                                                  maxlength="10">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group d-flex align-items-center">
															<label class="label" for="password">Conform Password</label>
									  						<input type="password" class="form-control" placeholder="CPassword" id="cpassword" name="cpassword" required
															  required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-10])(?=.*?[#?!@$%^&*-]).{8,20}$" 
																oninvalid="setCustomValidity('Password Must be include A-Z ,a-z ,0-9 ,and special character !!')" 
																oninput="setCustomValidity('')"
																maxlength="10">
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
														 	<input type="checkbox" checked required 
															oninvalid="setCustomValidity('please accept the terms and conditions!')" 
																oninput="setCustomValidity('')">
														    <span class="checkmark"></span>
														    </label>
													    </div>
														I'm already a member! <a href="../login/login.php">Sign In</a>
													</div>
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
		
	

	<!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->
  <!-- <script type="text/javascript"> -->

<!-- // 	function validation(){
// 		var user=document.getElementById('full_name').value;
// 		var address=document.getElementById('address').value;
// 		var phonenumber=document.getElementById('phonenumber').value;
// 		var mail=document.getElementById('mail').value;
// 		var date=document.getElementById('date').value;
// 		var username=document.getElementById('username').value;
// 		var pass=document.getElementById('pass').value;

// 		//if(user == "" && address == "" && phonenumber == "" && mail == "" && date =="" && username == "" && pass == ""){
// 			let x = document.forms["myForm"]["name"].value;
// 					if (x == "") {
// 						alert("Name must be filled out");
//     return false;
// 		if(address == ""){
// 			document.getElementById('address1').placeholder="** please fill the address";
// 			document.getElementById('address1').style.border="1px solid red";
// 			return false;
// 		}
// 		var phone_input = document.getElementById("phonenumber");

// 				phone_input.addEventListener('input', () => {
// 				phone_input.setCustomValidity('');
// 				phone_input.checkValidity();
// });

// phone_input.addEventListener('invalid', () => {
//   if(phone_input.value === '') {
//     phone_input.setCustomValidity('Enter phone number!');
//   } else {
//     phone_input.setCustomValidity('Enter phone number in this format: 123-456-7890');
//   }
// });
// 		}
// 		if(mail == ""){
// 			document.getElementById('mail').placeholder="** please fill the email";
// 			document.getElementById('mail').style.border="1px solid red";
// 			return false;
// 		}
// 		if(date ==""){
// 			document.getElementById('date').placeholder="** please fill the date";
// 			document.getElementById('date').style.border="1px solid red";
// 			return false;
// 		}
// 		if(username == ""){
// 			document.getElementById('username').placeholder="** please fill the username";
// 			document.getElementById('username').style.border="1px solid red";
// 			return false;
// 		}
// 		if(pass == ""){
// 			document.getElementById('pass').placeholder="** please fill the password";
// 			document.getElementById('pass').style.border="1px solid red";
// 			return false;
// 		}

// 	} -->
<!-- //   </script> -->

	</body>
</html>



