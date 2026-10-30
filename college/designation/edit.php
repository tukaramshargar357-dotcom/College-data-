<?php

include("../db.php");
// echo "Connected successfully";


$user_id = 1;
$user_id = $_GET['id'];


$sql = "SELECT * FROM `designation` WHERE id=".$user_id;
$result_data = $conn->query($sql);
// print_r($result_data);
// echo "<br>";
// echo "<br>";
if ($result_data->num_rows > 0) {
  // Fetch the data as an associative array
  $row_data = $result_data->fetch_assoc();
//   print_r($row_data);
// echo "<br>";
// echo "<br>";
// SELECT `id`, `name`, `mobile`, `e_mail`, `designation`, `salary`, `date_of_joining` FROM `staf` WHERE 1

    $id = $row_data['id'];
    $designation = $row_data['designation'];


//   $firstname = $row['firstname'];
//   $lastname = $row['lastname'];
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Designation Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-info">

  <?php  include("../nav.php");  ?>
  
    <div class="container py-5">
        <div class="row py-5 ">
            <div class="col-md-3"></div>
            <div class="col-6 bg-info-subtle py-5 px-5">
                <h1><u>EDITING DATA</u></h1>
                <form class="row g-3" action="update.php" method="post" >
  <div class="col-md-2">
    <label for="id" class="form-label">ID</label>
    <input type="text" class="form-control" readonly id="id" name="id" value="<?php echo $id; ?>">
  </div>

  <div class="col-md-12">
    <label for="designation" class="form-label">DESIGNATION</label>
    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $designation; ?>">
  </div>
  
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary mb-3">submit</button>
    <a class="btn btn-success mb-3" href="http://localhost/projet/college/designation/table.php" role="button">Go back</a>
  </div>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>