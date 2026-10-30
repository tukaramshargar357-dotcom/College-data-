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


        $id = $_GET['id'];
    
        $sql = "DELETE FROM `courses` WHERE id = ".$id;


        if ($conn->query($sql) === TRUE) {
            // echo "Record deleted successfully";
            // Redirect to a specific page
            header("Location: table.php");
            exit; // Stop further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


