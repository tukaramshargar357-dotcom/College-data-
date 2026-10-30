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


    $id = $_POST["id"] ?? 0;
    $dept_name = $_POST["dept_name"] ?? '';
   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `departments` SET `dept_name`='".$dept_name."' WHERE id = ".$id;


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
