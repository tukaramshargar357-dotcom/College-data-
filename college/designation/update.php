<?php
include("../db.php");
// echo "Connected successfully";
    $id = $_POST['id'];
    $designation = $_POST['designation'];
    // SELECT `id`, `name`, `mobile`, `e_mail`, `po`, `salary`, `date_of_joining` FROM `staf` WHERE 1

   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `designation` SET `designation`='".$designation."'WHERE id = ".$id;


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
