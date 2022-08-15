<?php
 include 'assets/db/db.php';
 session_start();
 $captcha = $_POST['captcha'];
//$token=$_POST['token'];
 $email = mysqli_escape_string($con, $_POST['email']);
 $pass = mysqli_escape_string($con,$_POST['pass']);

 if (empty($captcha) || $captcha !== $_SESSION['captcha']) {
  echo "1";
} else {

  $q = "select * from user where EMAIL='$email' && PASSWORD='$pass'";
  $query = mysqli_query($con,$q);
  $num = mysqli_num_rows($query);
  if ($num != 1){

    echo "2";
  } else {
   $row = mysqli_fetch_assoc($query);
   $_SESSION['email'] = $row['EMAIL'];
   $_SESSION['name'] = $row['NAME'];

   echo "registred";

 }


}


?>