<html>
<body>
<?php
// Check for empty fields

$name= $phone=$address=$emphone=" ";

$name = isset($_GET['name']) ? $_GET['name'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$emphone = isset($_GET['emphone']) ? $_GET['emphone'] : '';
	
/*$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$address = strip_tags(htmlspecialchars($_POST['address']));
$emphone = strip_tags(htmlspecialchars($_POST['emphone']));
*/
echo "$name";
echo "$phone";
echo "$address";
echo "$emphone";
/*if(empty($_POST['name'])|| empty($_POST['phone']) 	||   empty($_POST['address']) ||   empty($_POST['emphone'])	)
   {
	echo "Inputs Missing. Please fill";
	return false;
   }
   */
 $conn = mysqli_connect('127.0.0.1','root','','server_db');
 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else{
$sql1 = 'INSERT INTO `user`(`u_name`, `u_phone`, `u_address`, `u_emphone`) VALUES ("Ayush",9911111111 ,"Delhi" ,1313233)';
mysqli_query($conn, $sql1);
echo "New record created successfully";
/*
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql."<br>".mysqli_error($conn);
}
*/

}
mysqli_close($conn);
return true;
?>
</body>
</html>