<?php
include("../db.php");

$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT s.*, d.designation AS designation_name
        FROM staf s
        LEFT JOIN designation d ON s.designation_id = d.id
        WHERE s.id = $user_id";
$result_data = $conn->query($sql);

if ($result_data && $result_data->num_rows > 0) {
    $row_data = $result_data->fetch_assoc();

    $id = $row_data['id'];
    $name = $row_data['name'];
    $mobile = $row_data['mobile'];
    $e_mail = $row_data['e_mail'];
    $designation_name = $row_data['designation_name'] ?? 'Not Assigned';
    $salary = $row_data['salary'];
    $date_of_joining = $row_data['date_of_joining'];
} else {
    header("Location: table.php");
    exit;
}

$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-info">

  <?php  include("../nav.php");  ?>
  
    <div class="container py-5">
        <div class="row py-7 ">
            <div class="col-md-3"></div>
            <div class="col-6 bg-info-subtle py-5 px-5">
                <h1><u>VIEW DATA</u></h1>
                <form class="row g-4" action="update.php" method="post" >
  <div class="col-md-2">
    <label for="id" class="form-label">ID</label>
    <span>= <?php echo $id; ?></span>
  </div>

  <div class="col-12">
    <label for="name" class="form-label">NAME</label>
    <span>= <?php echo $name; ?></span>
  </div>

  <div class="col-md-12">
    <label for="mobile_no" class="form-label">MOBILE</label>
    <span>= <?php echo $mobile; ?></span>
  </div>
  
  <div class="col-12">
    <label for="name" class="form-label">E MAIL</label>
    <span>= <?php echo $e_mail; ?></span>
  </div>

  <div class="col-12">
    <label for="name" class="form-label">DESIGNATIONST</label>
    <span>= <?php echo $designation_name; ?></span>
  </div>
  
  <div class="col-12">
    <label for="name" class="form-label">SALARY</label>
    <span>= <?php echo $salary; ?></span>
  </div>
  
  <div class="col-12">
    <label for="name" class="form-label">DATE OF JOINING</label>
    <span>= <?php echo $date_of_joining; ?></span>
  </div>
  
  
 
  <div class="col-12">
    <a class="btn btn-success mb-3" href="http://localhost/projet/college/staf/table.php" role="button">Go back</a>
  </div>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>