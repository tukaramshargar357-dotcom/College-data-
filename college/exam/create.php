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
$exam_name = $_POST["exam_name"] ?? '';
$subject_id = $_POST["subject_id"] ?? '';
$exam_date = $_POST["exam_date"] ?? '';

$sql = "INSERT INTO `exam`(`id`, `exam_name`, `subject_id`, `exam_date`) VALUES ($id,'". $exam_name."','". $subject_id."','". $exam_date."')";

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