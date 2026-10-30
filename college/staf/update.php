<?php
include("../db.php");
// echo "Connected successfully";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $e_mail = $_POST['e_mail'];
    $designation_id = $_POST['designation_id'];
    $salary = $_POST['salary'];
    $date_of_joining = $_POST['date_of_joining'];

    // SELECT `id`, `name`, `mobile`, `e_mail`, `po`, `salary`, `date_of_joining` FROM `staf` WHERE 1

   
    // $sql = "UPDATE `my_table` SET `name`='".$name."',`mobile`='".$mobile."' WHERE id = ".$id;

    $sql = "UPDATE `staf` SET `name`='".$name."',`mobile`='".$mobile."',`e_mail`='".$e_mail."',`designation_id`='".$designation_id."',`salary`='".$salary."',`date_of_joining`='".$date_of_joining."' WHERE id = ".$id;


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
