<?php
include '../assets1/db/db.php';
if(isset($_POST['eid']))

{
	$id=$_POST['eid'];
	$name=$_POST['ename'];
	$email=$_POST['eemail'];
	$gender=$_POST['egender'];
	$phone=$_POST['ephone'];

	//echo $id,$name,$email,$dob,$mname,$gender;

	$qy="UPDATE user set NAME='$name',EMAIL='$email',PHONE='$phone',GENDER='$gender' where ID='$id'";
	mysqli_query($con,$qy);
	echo 'updated successfully';









}




?>