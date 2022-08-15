<?php
include "../assets1/db/db.php";
if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$q="SELECT * FROM user where ID='$id'";
	$result=mysqli_query($con,$q);
	$row =mysqli_fetch_assoc($result);
	$data['id'] = $row['ID'];
	$data['name'] = $row['NAME'];
	$data['gender'] = $row['GENDER'];
	$data['email']=$row['EMAIL'];
	$data['phone']=$row['PHONE'];
	$data['address']=$row['ADDRESS'];
	$data['canid']=$row['CANDIDATEID'];
	$data['time']=$row['TIME'];
	$resume=$row['RESUME'];


	$img = $row['AVTAR'];
        // $data['name'] = $row['pro_name'];
        // $data['price'] = $row['pro_price'];

        // $img = $row['pro_img'];

	$data['img'] = "<img src='../".$img."' alt='' width='80px' height='80px' class='img-circle img-responsive'>";
	$data['resume']="<iframe src='../".$resume."' width='100%' height='800px' ></iframe>";
	echo json_encode($data);


	


}

?>
