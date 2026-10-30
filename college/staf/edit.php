<?php

include("../db.php");
// echo "Connected successfully";


$user_id = 1;
$user_id = $_GET['id'];


$sql = "SELECT * FROM `staf` WHERE id=".$user_id;
$result_data = $conn->query($sql);
$designation_result = $conn->query("SELECT id, designation FROM designation ORDER BY designation ASC");

if ($result_data->num_rows > 0) {
  // Fetch the data as an associative array
  $row_data = $result_data->fetch_assoc();

    $id = $row_data['id'];
    $name = $row_data['name'];
    $mobile = $row_data['mobile'];
    $e_mail = $row_data['e_mail'];
    $designation_id = $row_data['designation_id'];
    $salary = $row_data['salary'];
    $date_of_joining = $row_data['date_of_joining'];

}

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
        <div class="row py-5 ">
            <div class="col-md-3"></div>
            <div class="col-6 bg-info-subtle py-5 px-5">
                <h1><u>EDITING DATA</u></h1>
                <form class="row g-3" action="update.php" method="post" >
  <div class="col-md-2">
    <label for="id" class="form-label">ID</label>
    <input type="text" class="form-control" readonly id="id" name="id" value="<?php echo $id; ?>">
  </div>

  <div class="col-12">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="enter name" value="<?php echo $name; ?>">
  </div>

  <div class="col-md-12">
    <label for="mobile" class="form-label">MOBILE</label>
    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
  </div>
  
  <div class="col-12">
    <label for="e_mail" class="form-label">E MAIL</label>
    <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="enter name" value="<?php echo $e_mail; ?>">
  </div>

  <div class="col-md-6">
                        <label for="designation_id" class="form-label">Designation</label>
                        <select class="form-select" id="designation_id" name="designation_id">
                            <option value="">-- Select Designation --</option>
<?php
if ($designation_result && $designation_result->num_rows > 0) {
    while ($designation_row = $designation_result->fetch_assoc()) {
?>
                            <option value="<?= $designation_row['id'] ?>" <?= ((string)$designation_id === (string)$designation_row['id']) ? 'selected' : '' ?>><?= htmlspecialchars($designation_row['designation']) ?></option>
<?php
    }
}
?>
                        </select>
                    </div>

  
  <div class="col-12">
    <label for="salary" class="form-label">SALARY</label>
    <input type="text" class="form-control" id="salary" name="salary" placeholder="enter name" value="<?php echo $salary; ?>">
  </div>
  
  <div class="col-12">
    <label for="date_of_joining" class="form-label">DATE OF JOINING</label>
    <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" placeholder="enter name" value="<?php echo $date_of_joining; ?>">
  </div>
  
  
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary mb-3">submit</button>
    <a class="btn btn-success mb-3" href="http://localhost/projet/college/staf/table.php" role="button">Go back</a>
  </div>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>