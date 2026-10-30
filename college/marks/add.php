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


$sql = "SELECT MAX(id) AS highest_score FROM marks";
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
    <title>Marks Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-info">

  <?php  include("../nav.php");  ?>
  
    <div class="container py-5">
        <div class="row py-5 ">
            <div class="col-md-3"></div>
            <div class="col-6 bg-info-subtle py-5 px-5">
                <h1><u>Marks</u></h1>
                <a class="btn btn-success mb-3" href="http://localhost/projet/college/courses/table.php" role="button">See data</a>
                <form class="row g-3" action="create.php" method="post" >
  <div class="col-md-2">
    <label for="id" class="form-label">ID</label>
    <input type="text" class="form-control" readonly id="id" name="id" value="<?php echo $maxid ?>" >
  </div>
  <div class="col-12">
    <label for="student_id" class="form-label">STUDENT ID</label>
    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="enter your name" >
  </div>	
  <div class="col-12">
    <label for="exam_id" class="form-label">EXAM ID</label>
    <input type="text" class="form-control" id="exam_id" name="exam_id" placeholder="enter your name" >
  </div>	
  <div class="col-md-12"> 	
    <label for="marks_obtained" class="form-label">MARKS OBTAINED</label>
    <input type="text" class="form-control" id="marks_obtained" name="marks_obtained" placeholder="enter your mobile number">
  </div>
  <div class="col-12">
    <label for="max_marks" class="form-label">MAX MARKS</label>
    <input type="text" class="form-control" id="max_marks" name="max_marks" placeholder="enter your address" >
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