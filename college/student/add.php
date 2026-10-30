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


$sql = "SELECT MAX(id) AS highest_score FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // echo "The highest score is: " . $row['highest_score'];
} else {
    echo "No results found.";
}
$maxid = $row['highest_score'] + 1;
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
                <h1><u>Student Application</u></h1>

                <a class="btn btn-success mb-3" href="http://localhost/projet/college/student/table.php" role="button">See data</a>
                <form class="row g-3" action="create.php" method="post" >
  <div class="col-md-2">
    <label for="id" class="form-label">ID</label>
    <input type="text" class="form-control" readonly id="id" name="id" value="<?php echo $maxid ?>" >
  </div>
  <div class="col-12">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="enter your name" >
  </div>
  <div class="col-md-12">
    <label for="mobile_no" class="form-label">MOBILE NUMBER</label>
    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="enter your mobile number">
  </div>
  <div class="col-12">
    <label for="name" class="form-label">ADDRESS</label>
    <input type="text" class="form-control" id="name" name="address" placeholder="enter your address" >
  </div>
  <div class="col-12">
    <label for="gender" class="form-label">GENDER</label>
    <select class="form-select" aria-label="Default select example" id="gender" name="gender">
      <option selected value="">--SELECT--</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
  </div>
  <div class="col-12">
    <label for="dob" class="form-label">DATE OF BIRTH</label>
    <input type="date" class="form-control" id="dob" name="dob" placeholder="enter your date of birth" >
  </div>
  <div class="col-12">
    <label for="father" class="form-label">FATHER</label>
    <input type="text" class="form-control" id="father" name="father" placeholder="enter your father's name" >
  </div>
  <div class="col-12">
    <label for="name" class="form-label">MOTHER</label>
    <input type="text" class="form-control" id="name" name="mother" placeholder="enter your mother name" >
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