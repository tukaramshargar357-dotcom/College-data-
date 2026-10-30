<?php
  include '../db.php';

?> 

<?php
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET':
            $id = $_GET['id'] ?? 0; 

            if ($id > 0) {
                $sql = "SELECT * FROM `classes` WHERE id=".$id;
            }else{
                $sql = "SELECT * FROM `classes` ";
            }
            
            $result_data = $conn->query($sql);  

            // $sql = "SELECT * FROM `classes`";
            // $result_data = $conn->query($sql);

            $result_array = [];

            if ($result_data->num_rows > 0) {
                
                while ($row_data = $result_data->fetch_assoc()) {
                    $result_array[]= $row_data;      
                }
            }

            echo json_encode($result_array);

            break;

        case 'POST':
            $sql = "SELECT MAX(id) AS max_id FROM classes";
            $result = $conn->query($sql);  


            if ($result->num_rows > 0) {
            
                $row = $result->fetch_assoc();
                $max_id = $row["max_id"]+1;
                
            } else {
            $max_id=1;  
            }
            
            
            $id = $max_id;
            $class_name = $_POST["class_name"];
            $course_id = $_POST["course_id"];
            $year = $_POST["year"];

            

            $sql = "INSERT INTO `classes`(`id`, `class_name`, `course_id`, `year`) VALUES (" . $id.", '" . $class_name."', '" . $course_id."', '" . $year."')";

            if ($conn->query($sql) === TRUE) {
               $result_array= [
                    "status"  => true,
                    "message" => "Data Added successfully"
                ]; 
                
            } else {
                $result_array= [
                    "status"  => false,
                    "message" => "Data not added"
                ];
            }
            echo json_encode($result_array);
            break;
        

        case 'PUT':
            $input = json_decode(file_get_contents("php://input"), true);

            $id = $input["id"];
            $class_name = $input["class_name"];
            $course_id = $input["course_id"];
            $year = $input ["year"];
            
            
            $sql = "UPDATE `classes` SET `class_name`='".$class_name."',`course_id`='".$course_id."',`year`='".$year."'
            WHERE id = ".$id;
            
            if ($conn->query($sql) === TRUE) {
               $result_array= [
                    "status"  => true,
                    "message" => "Data Updated successfully"
                ]; 
                
            } else {
                $result_array= [
                    "status"  => false,
                    "message" => "Data not Updated"
                ];
            }
            echo json_encode($result_array);

            break;

        case 'DELETE':
            $id = $_GET["id"];
    
            $sql = "DELETE FROM `classes` WHERE id = ".$id;
        
            if ($conn->query($sql) === TRUE) {
               $result_array= [
                    "status"  => true,
                    "message" => "Data Deleted successfully"
                ]; 
                
            } else {
                $result_array= [
                    "status"  => false,
                    "message" => "Data Deleted added"
                ];
            }
            echo json_encode($result_array);
            break;
            
        default:
            # code...
            break;
    }

    
?>