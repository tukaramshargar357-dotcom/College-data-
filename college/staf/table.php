<?php
include("../db.php");

$sql = "SELECT s.*, d.designation 
        AS designation_name
        FROM staf s 
        LEFT JOIN designation d 
        ON s.designation_id = d.id
        ORDER BY s.id ASC";
$result = $conn->query($sql);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-primary bg-gradient">

  <?php  include("../nav.php");  ?>
    
    <div class="container py-5">
        <div class="row">
            <!-- <div class="col-3"></div> -->
            <div class="col-12 bg-primary-subtle p-4 rounded">
                <h3 class="text-secondary text-center">Staff Application Data</h3>

                <a class="btn btn-success mb-3" href="http://localhost/projet/college/staf/add.php" role="button">Add data</a>
                
                <!-- table starts -->
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">MOBILE</th>
                            <th scope="col">E MAIL</th>
                            <th scope="col">DESIGNATIONST</th>
                            <th scope="col">SALARY</th>
                            <th scope="col">DATE OF JOINING</th>
                            <th scope="col" width="220">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>


<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['mobile']) ?></td>
            <td><?= htmlspecialchars($row['e_mail']) ?></td>
            <td><?= htmlspecialchars($row['designation_name'] ?? 'Not Assigned') ?></td>
            <td><?= htmlspecialchars($row['salary']) ?></td>
            <td><?= htmlspecialchars($row['date_of_joining']) ?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                
                <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>

                <a class="btn btn-secondary btn-sm" href="single.php?id=<?= $row['id'] ?>">View</a>
            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8' class='text-danger'>No records found</td></tr>";
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
