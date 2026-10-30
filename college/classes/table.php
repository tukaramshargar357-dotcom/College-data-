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
?> 

<?php

    // $sql_select_all = "SELECT * FROM `student`"; // Use backticks for table names
    // $result_data = $conn->query($sql_select_all);

    // echo "<pre>";
    // print_r($result_data);
    // echo "</pre>";

    

    
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-primary bg-gradient">

  <?php  include("../nav.php");  ?>
    
    <div class="container py-5">
        <div class="row">
            <!-- <div class="col-3"></div> -->
            <div class="col-12 bg-primary-subtle p-4 rounded">
                <h3 class="text-secondary text-center">Class Application Data</h3>

                
                <a class="btn btn-success mb-3" href="http://localhost/projet/college/classes/add.php" role="button">Add data</a>
                
                <!-- table starts -->
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">CLASS NAME</th>
                            <th scope="col">COURSE ID</th>
                            <th scope="col">YEAR</th>
                            <th scope="col" width="220">ACTION</th>
                            
                        </tr>
                    </thead>
                    <tbody>

<?php
    $sql = "SELECT * FROM classes ORDER BY id ASC";
        $dbresult = $conn->query($sql);
    
    
    if ($dbresult->num_rows > 0) {
        
        while ($row_data = $dbresult->fetch_assoc()) {

            echo '<tr>';    

            foreach ($row_data as $value) {
                echo '<td>' . $value . '</td>';
                
            }
            echo "<td >
                <a class='btn btn-primary btn-sm' role='button' href='http://localhost/projet/college/classes/edit.php?id=" .$row_data['id']. "'>Edit</a>

                <a class='btn btn-danger btn-sm' role='button' href='http://localhost/projet/college/classes/delete.php?id=" .$row_data['id']. "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                
                <a class='btn btn-secondary btn-sm' role='button' href='http://localhost/projet/college/classes/single.php?id=" .$row_data['id']. "'>View</a>
            </td>";


            echo '</tr>';   
        }
    }
?>
                        
                    </tbody>
                </table>
                <!-- table ends -->

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
