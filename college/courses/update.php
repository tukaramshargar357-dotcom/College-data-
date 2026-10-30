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
    $course_name = $_POST["course_name"];
    $dept_id = $_POST["dept_id"];
    $duration = $_POST["duration"];
   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `courses` SET `course_name`='".$course_name."',`dept_id`='".$dept_id."',`duration`='".$duration."' WHERE id = ".$id;


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
