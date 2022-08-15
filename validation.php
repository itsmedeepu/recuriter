<?php
include 'assets/db/db.php';
require_once('function.php');
session_start();
$fname= $_POST['fname'];
$lname= $_POST['lname'];
//cocatenate the first name and lastname
$name = $fname.' '.$lname;
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['cpass'];
$gender=$_POST['gender'];
$captcha=$_POST['captcha'];
$address=$_POST['address'];
$prefix ='CAN';
 $middle=date('y');
 $last=rand(1000,9999);
 $canid = $prefix.$middle.$last;


$targetDir = "resume/".$name;
$fileName = basename($_FILES["resume"]["name"]);
$targetFilePath = $targetDir . $fileName;
$resumefinal=move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath);
if (empty($captcha) || $captcha !== $_SESSION['captcha']) {
    echo "1";
  } else {
  
  
    $q = "select * from user where EMAIL='$email' && PHONE='$phone'";
    $query = mysqli_query($con,$q);
    $num = mysqli_num_rows($query);
    if ($num == 1){
  
      echo "2";
    } else {
     $user_avatar=make_avatar(strtoupper($name[0]));
     $qy="INSERT INTO `user`(`NAME`, `EMAIL`, `PHONE`, `PASSWORD`, `AVTAR`, `RESUME`, `ADDRESS`, `GENDER`,`CANDIDATEID`) VALUES ('$name','$email','$phone','$pass','$user_avatar','$targetFilePath','$address','$gender','$canid')";
     mysqli_query($con,$qy);
  
     echo "registred";
  
   }
  
  
 }
  









?>