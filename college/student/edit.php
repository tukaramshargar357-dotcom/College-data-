<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// print_r($conn);
// echo "<br>";
// echo "<br>";


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


$user_id = 1;
$user_id = $_GET['id'];


$sql = "SELECT * FROM `student` WHERE id=".$user_id;
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


    $id = $row_data['id'];
    $name = $row_data['name'];
    $mobile = $row_data['mobile'];
    $address = $row_data['address'];
    $gender = $row_data['gender'];
    $dob = $row_data['dob'];
    $father = $row_data['father_name'];
    $mother = $row_data['mother_name'];


//   $firstname = $row['firstname'];
//   $lastname = $row['lastname'];
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Application</title>
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
    <label for="mobile_no" class="form-label">MOBILE NUMBER</label>
    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
  </div>
  <div class="col-12">
    <label for="name" class="form-label">ADDRESS</label>
    <input type="text" class="form-control" id="name" name="address" placeholder="enter name" value="<?php echo $address; ?>">
  </div>
  <div class="col-12">
    <label for="name" class="form-label">GENDER</label>
    <select class="form-select" aria-label="Default select example" id="gender" name="gender" value="<?php echo $gender; ?>">
      <option selected value=""><?php echo $gender; ?></option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
  </div>
  <div class="col-12">
    <label for="name" class="form-label">DATE OF BIRTH</label>
    <input type="date" class="form-control" id="name" name="dob" placeholder="enter name" value="<?php echo $dob; ?>">
  </div>
  <div class="col-12">
    <label for="name" class="form-label">FATHER</label>
    <input type="text" class="form-control" id="name" name="father" placeholder="enter name" value="<?php echo $father; ?>">
  </div>
  <div class="col-12">
    <label for="name" class="form-label">MOTHER</label>
    <input type="text" class="form-control" id="name" name="mother" placeholder="enter name" value="<?php echo $mother; ?>">
  </div>
  
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary mb-3">submit</button>
    <a class="btn btn-success mb-3" href="http://localhost/projet/college/student/table.php" role="button">Go back</a>
  </div>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>