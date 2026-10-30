<?php
include("../db.php");

$sql = "SELECT MAX(id) AS highest_score FROM staf";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // echo "The highest score is: " . $row['highest_score'];
} else {
    echo "No results found.";
}
$maxid = $row['highest_score'] + 1;


$designation_sql = "SELECT id, designation FROM designation ORDER BY designation ASC";
$designation_result = $conn->query($designation_sql);

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

                <h1><u>Staff Application</u></h1>
                <a class="btn btn-success mb-3" href="http://localhost/projet/college/staf/table.php" role="button">See data</a>
                <form class="row g-3" action="create.php" method="post" >
  <div class="col-md-2">
    <label for="id" class="form-label">ID</label>
    <input type="text" class="form-control" id="id" name="id" value="<?php echo $maxid ?>" >
  </div>

  <div class="col-12">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="enter your name" >
  </div>

  <div class="col-md-12">
    <label for="mobile_no" class="form-label">MOBILE</label>
    <input type="text" class="form-control" id="designation_id" name="mobile" placeholder="enter your mobile number" >
  </div>
  
  <div class="col-12">
    <label for="name" class="form-label">E MAIL</label>
    <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="enter your e_mail" >
  </div>

  <div class="col-12">
    <label for="designation_id" class="form-label">DESIGNATION</label>
    <select class="form-select" aria-label="Default select example" id="designation_id" name="designation_id">
      <option selected value="">--SELECT--</option>
      <?php
        if ($designation_result && $designation_result->num_rows > 0) {
            while ($designation_row = $designation_result->fetch_assoc()) {
        ?>
            <option value="<?= $designation_row['id'] ?>"><?= $designation_row['designation'] ?></option>
        <?php
            }
        }
        ?>
    </select>
  </div>
  
  <div class="col-12">
    <label for="name" class="form-label">SALARY</label>
    <input type="datez" class="form-control" id="name" name="salary" placeholder="enter your salery" >
  </div>
  
  <div class="col-12">
    <label for="date_of_joining" class="form-label">DATE OF JOINING</label>
    <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" placeholder="date_of_joining" >
  </div>
  
  
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary mb-3">submit</button>
  </div>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>