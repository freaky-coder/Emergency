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

 $conn = mysqli_connect("localhost", "root", "","server_db");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO user(u_name,u_phone,u_address,u_emphone)
VALUES ($name, '$phone','$address',$emphone)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);
return true;
	
?>
