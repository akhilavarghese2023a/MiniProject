<?php

include("../config.php");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $lId=$_GET['id'];
  $result=mysqli_query($conn,"UPDATE tbl_leave SET lstatus='Approve' where lid=$lId ");
  
}
if($result)
{
echo "<script>alert('leave details has been accepted successfully. Thank you');window.location='viewleave.php';</script>";
}
?>
