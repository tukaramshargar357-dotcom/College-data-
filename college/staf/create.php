<?php
include("../db.php");

//taking data from html
// SELECT `id`, `name`, `mobile`, `e_mail`, `designation_id`, `salary`, `date_of_joining` FROM `staf` WHERE 1

$id = $_POST["id"] ?? 0;
$name = $_POST["name"] ?? '';
$mobile = $_POST["mobile"] ?? '';
$e_mail = $_POST["e_mail"] ?? '';
$designation_id = $_POST["designation_id"] ?? '';
$salary = $_POST["salary"] ?? '';
$date_of_joining = $_POST["date_of_joining"] ?? '';


$sql =" INSERT INTO `staf`(`id`, `name`, `mobile`, `e_mail`, `designation_id`, `salary`, `date_of_joining`) VALUES ('$id','". $name."','". $mobile."','". $e_mail."','". $designation_id."','". $salary."','". $date_of_joining."')";

// echo $sql;
// echo $designation_id;
echo $sql;
//Execute and Check Query
if ($conn->query($sql) === TRUE) {
 	// echo "New record created successfully";
	// Redirect to a specific page
	header("Location: table.php");
	exit; // Stop further script execution
 } else {
 	echo "Record not created.";
  	echo "Error: " . $sql . "<br>" . $conn->error;
 }

?>
