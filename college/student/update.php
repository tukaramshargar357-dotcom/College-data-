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
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `student` SET `name`='".$name."',`mobile`='".$mobile."',`address`='".$address."',`gender`='".$gender."',`dob`='".$dob."',`father_name`='".$father."',`mother_name`='".$mother."' WHERE id = ".$id;


    if ($conn->query($sql) === TRUE) {
        // echo "record updated successfully";
        // Redirect to a specific page
        header("Location: table.php");
        exit; // Stop further script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
