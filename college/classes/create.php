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
$class_name = $_POST["class_name"] ?? '';
$course_id = $_POST["course_id"] ?? '';
$year = $_POST["year"] ?? '';

$sql = "INSERT INTO `classes`(`id`, `class_name`, `course_id`, `year`) VALUES ($id,'". $class_name."','". $course_id."','". $year."')";

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