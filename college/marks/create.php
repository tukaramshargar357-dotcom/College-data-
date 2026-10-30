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
$exam_id = $_POST["exam_id"] ?? '';
$marks_obtained = $_POST["marks_obtained"] ?? '';
$max_marks = $_POST["max_marks"] ?? '';

$sql = "INSERT INTO `marks`(`id`, `student_id`, `exam_id`, `marks_obtained`, `max_marks`) VALUES ($id,'". $student_id."','". $exam_id."','". $marks_obtained."','". $max_marks."')";

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