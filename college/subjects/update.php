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


    $id = $_POST['id'];
    $subject_name = $_POST["subject_name"];
    $course_id = $_POST["course_id"];
    $teacher_id = $_POST["teacher_id"];
   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `subjects` SET `subject_name`='".$subject_name."',`course_id`='".$course_id."',`teacher_id`='".$teacher_id."' WHERE id = ".$id;


    if ($conn->query($sql) === TRUE) {
        // echo "record updated successfully";
        // Redirect to a specific page
        header("Location: table.php");
        exit; // Stop further script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
