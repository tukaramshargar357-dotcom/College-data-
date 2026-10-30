<?php
	include("../db.php");

$id = $_POST["id"] ?? 0;
$designation = $_POST["designation"] ?? '';

$sql = "INSERT INTO `designation`(`id`,  `designation`) VALUES ($id,'". $designation."')";

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