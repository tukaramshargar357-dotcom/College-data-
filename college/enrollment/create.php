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
$student_id = $_POST["student_id"] ?? '';
$class_id = $_POST["class_id"] ?? '';
$admission_date = $_POST["admission_date"] ?? '';

$sql = "INSERT INTO `enrollment`(`id`, `student_id`, `class_id`, `admission_date`) VALUES ($id,'". $student_id."','". $class_id."','". $admission_date."')";

//Execute and Check Query
if ($conn->query($sql) === TRUE) {
	// Redirect to a specific page
	header("Location: table.php");
	exit; // Stop further script execution
 } else {
 	echo "Record not created.";
  	echo "Error: " . $sql . "<br>" . $conn->error;
 }




?>