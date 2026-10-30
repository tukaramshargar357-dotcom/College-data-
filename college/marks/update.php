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
// echo "Connected successfully";

    $id = $_POST["id"];
    $student_id = $_POST["student_id"];
    $exam_id = $_POST["exam_id"];
    $marks_obtained = $_POST["marks_obtained"];
    $max_marks = $_POST["max_marks"];
   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `marks` SET `student_id`='".$student_id."',`exam_id`='".$exam_id."',`marks_obtained`='".$marks_obtained."',`max_marks`='".$max_marks."' WHERE id = ".$id;


    if ($conn->query($sql) === TRUE) {
        // echo "record updated successfully";
        // Redirect to a specific page
        header("Location: table.php");
        exit; // Stop further script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    // echo "<pre>";
    // print_r($result_data);
    // echo "</pre>";


   
?>
