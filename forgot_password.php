<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include ('config.php');
if(isset($_POST['send_otp'])){
    $mail = $_POST['email'];
    $checkMail = "SELECT * FROM registration WHERE username='$mail'";
    $result = mysqli_query($conn,$checkMail);
    $rsltCheck = mysqli_num_rows($result);
    $fetch = mysqli_fetch_array($result);
    if($rsltCheck>0){
        $_SESSION['email'] = $fetch['email'];
        $email = $_SESSION['email'];
        $code = rand(999999, 111111);
        $insert_otp = "UPDATE `registration` SET `otp_code`='$code' WHERE `username`='$email'";
        $data_check = mysqli_query($conn, $insert_otp);
        if($data_check){
        //     $subject = "Password Reset Verification Code";
        //     $message = "Your verification code is $code";
        //     $sender = "From:alanshijo@ymail.com";
        //     if(mail($email, $subject, $message, $sender)){
        //         echo '<script> alert ("OTP sent successfully");</script>';
        //         echo'<script>window.location.href="enter-otp.php";</script>';
        //     }else{
        //         echo '<script> alert ("OTP sent failed");</script>';
        //         echo'<script>window.location.href="forgot.php";</script>';
        // }
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'akhilavarghese2023a@mca.ajce.in';                     //SMTP username
    $mail->Password   = 'Akhila@123';                               //SMTP password
    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;    
        //Recipients
        $mail->setFrom('akhilavarghese2023a@mca.ajce.in');
        $mail->addAddress($email);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password - OTP Verification';
        $body = "Need to reset your password? <br><br> Use your secret code! <br><br> <strong>$code</strong>";
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);
    
        //$mail->send();
        if($mail->send()){
            echo '<script> alert ("OTP sent successfully");</script>';
            echo'<script>window.location.href="otp.php";</script>';
        }else{
            echo '<script> alert ("OTP sent failed");</script>';
            echo'<script>window.location.href="forgot_password.php";</script>';
        }
        }
    }
    else{
        echo '<script> alert ("The user doesnot exist!");</script>';
	    echo'<script>window.location.href="forgot.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Login</title>
    <style>
        body{
            background-color: #DEDEDE;
            background-image:url('1.jpg');
            
        }
     .navbar {
        overflow: hidden;
        background-color: #333;
        position: absolute;
        width: 100%;
        left: 0px;
        top: 0px;
        }


        .navbar a {
        float: right;
        color: white;
        padding-top: 30px;
        margin-right: 50px;
        text-decoration: none;
        font-family: 'Itim';
        }
        .navbar a.left {
            float: left;
            padding: 0%;
            padding-left: 25px;
        }
        .navbar a:hover {
        color: rgb(185, 185, 185);
        }
        .ticket{
            position: absolute;
            width: 561px;
            height: 497px;
            left: 807px;
            top: 163px;
        }
        table{
            position: absolute;
            left: 550px;
            top: 200px;
        }
        table label{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 23px;
            line-height: 48px;
        }
        input:not([type=submit]){
            box-sizing: border-box;
            background: #D9D9D9;
            border: 2px solid #757070;
            border-radius: 9px;
            padding: 10px;
            width: 300px;
            height: 45px;
        }
        input[type="submit"] {
            position: absolute;
            background: #1E1E1E;
            top: 120px;
            height: 40px;
            width: 90px;
            border-radius: 20px;
            color: white;
            border: none;
            font-family: 'Poppins';
            /* font-weight: bold; */
            
        }
        input[type="submit"]:hover{
            background-color: #000000;
            cursor: pointer;
        }
        ::placeholder{
            font-family: 'Poppins';
            padding-left: 8px;
            font-weight: 700;
        }
        </style>
</head>
<body>
    <div class="navbar">
    </div>
    <form action="" method="POST">
    <table>
        <tr><td><label for="email">Reset password</label></td></tr>
        <tr><td><input type="email" name="email" placeholder="Enter your email here" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" title="Please enter a valid email address"></td></tr>
        <tr><td><input type="submit" name="send_otp" value="Send OTP"></td></tr>
        
    </table>
    </form>
</body>
</html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">