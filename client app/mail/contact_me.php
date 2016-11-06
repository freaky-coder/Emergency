<?php
// Check for empty fields


if(empty($_POST['name']) || empty($_POST['phone']) 	||   empty($_POST['address']) ||   empty($_POST['emphone'])	)
   {
	echo "Inputs Missing. Please fill";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$address = strip_tags(htmlspecialchars($_POST['address']));
$emphone = strip_tags(htmlspecialchars($_POST['emphone']));

 /*$con = mysqli_connect('localhost','root','','server_db');
 if (!$con) {
     die('Could not connect: '. mysqli_error($con));
 }

 mysqli_select_db($con,"server_db");
 $sql="INSERT INTO NAMES VALUES($name,$phone,$address,$emphone)";
 mysqli_query($con, $sql);
*/
return true;
	
?>
