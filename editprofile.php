<?php
include ('../config.php');
session_start();
if(isset($_POST['submit']))
{
	$fname=$_POST['cname'];
	$address=$_POST['caddress'];
	$phonenumber=$_POST['cphonenumber'];
	$email=$_POST['cemail'];
	$dob=$_POST['cdob'];
	$gender=$_POST['cgender'];
	$city=$_POST['ccity'];
	// $aadharno=$_POST['aadharno'];
    $sql = "UPDATE registration SET cname='$fname',caddress='$address',cphonenumber='$phonenumber',cemail='$email',cdob='$dob',
           ccity='$city' WHERE cusername='".$_SESSION['c_name']."'";

    if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully')
    window.location='../A_user/profile.php'</script>";
    } else {
    echo "Error updating record: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
	
      function Val()
     {
       if(Validstr1()===false || Validstr()===false || ValidateEmail()===false || Validphone()==false || Password()===false || Password1()===false)
        {
          return false;
        }
      }
	  
</script>




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
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
textarea, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
  </style>
<body>

    <!-- Main -->
    <div class="main">
        <h1>Profile</h1>
            <div class="card">
                <div class="card-body">
                    <form name="myForm" method="POST" onsubmit="return validation();">
                        <table>
                            <tbody>
                                <tr>
                                    <td>User name</td>
                                    <td>:</td>
                                    <td>
                                    <?php
                                        echo $_SESSION['c_name'];
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>First name</td>
                                    <td>:</td>                            
                                  
                                    
                                </tr>
                                <tr>
                                    <td> name</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" class="form-control" name="cname" id="cname" placeholder="Fast Name" autocomplete="off" onkeyup="return Validstr2()"
                                                            required pattern="[a-zA-Z]{3,30}"
                                                            oninvalid="setCustomValidity('input is incorrect !!')" 
                                                                oninput="setCustomValidity('')"
                                                                    maxlength="30">
                                    </td>
                                    
                                </tr>
                                <!-- <tr>
                                    <td>Adhar No</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" name="aadharno" placeholder="Aadharno" id="aadharno" min="13" maxlength="13"  >
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>
                                    <input  type="text" name="cemail" placeholder="Enter your email" id="email"  required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" onkeyup="return Validateemail()">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>:</td>
                                    <td>
                                    <input type="date" class="form-control" placeholder="Date" id="cdob" name="cdob"  required>                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>
                                    <textarea class="form-control" placeholder="Address" rows="5" id="caddress" name="caddress" required
                                                                required pattern="[a-zA-Z]{3,30}"  
                                                                    oninvalid="setCustomValidity('fill address !!')" 
                                                                    oninput="setCustomValidity('')"
                                                                    maxlength="30"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>phone number</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" class="form-control" placeholder="Phone Number" min="10" maxlength="10" id="cphonenumber" name="cphonenumber" required onkeyup="return Validphone()"
                                                                pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                                                oninvalid="setCustomValidity('fill phoneno !!')"  
                                                                    oninput="setCustomValidity('')"
                                                                    maxlength="30"> 
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>gender</td>
                                    <td>:</td>
                                    <td>
                                    <input type="radio"  name="gender" value="male" id="gender" style="size:20%;" required="required"/>Male  &nbsp;  
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="gender" value="female" id="gender" required="required">Female
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>city</td>
                                    <td>:</td>
                                    <td>
                                    <select name="ccity" class="form-control" id="city" required >
                                                                <option value="" disabled selected>Select your City</option>
                                                                    <option value="Alappuzha">Alappuzha</option>
                                                                    <option value="Cherthala">Cherthala</option>
                                                                    <option value="Kottayam">Kottayam</option>
                                                                    <option value="Kanjirapally">Kanjirapally</option>
                                                                    <option value="Kanjikuzhi">Kanjikuzhi</option>
                                                                    <option value="Kalavoor">Kalavoor</option>
                                                                    <option value="Kuttanad">Kuttanad</option>

                                                                </select>
                                    </td>  
                                </tr>
                                
                            </tbody>
                        </table>
                            <div >
                                <input type="submit" value="Update your account" id="btn" name="submit">
                            </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- End -->
</body>
</html>