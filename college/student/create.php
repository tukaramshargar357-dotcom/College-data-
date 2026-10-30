<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//taking data from html
// SELECT `id`, `name`, `mobile`, `address`, `gender`, `dob`, `father_name`, `mother_name` FROM `student` WHERE 1


$id = $_POST["id"] ?? 0;
$name = $_POST["name"] ?? '';
$mobile = $_POST["mobile"] ?? '';
$address = $_POST["address"] ?? '';
$gender = $_POST["gender"] ?? '';
$dob = $_POST["dob"] ?? '';
$father = $_POST["father"] ?? '';
$mother = $_POST["mother"] ?? '';

$sql = "INSERT INTO `student`(`id`, `name`, `mobile`, `address`, `gender`, `dob`, `father_name`, `mother_name`) VALUES ($id,'". $name."','". $mobile."','". $address."','". $gender."','". $dob."','". $father."','". $mother."')";

//Execute and Check Query
if ($conn->query($sql) === TRUE) {
 	echo "New record created successfully";
	// Redirect to a specific page
	header("Location: table.php");
	exit; // Stop further script execution
 } else {
 	echo "Record not created.";
  	echo "Error: " . $sql . "<br>" . $conn->error;
 }

?>