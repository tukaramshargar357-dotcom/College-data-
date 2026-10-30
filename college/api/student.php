<?php

include '../db.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    // =========================
    // GET
    // =========================
    case 'GET':

        $id = $_GET['id'] ?? 0;
        
        if ($id > 0) {

            $sql = "SELECT * FROM student WHERE id = " . intval($id);

        } else {

            $sql = "SELECT * FROM student";

        }

        $result_data = $conn->query($sql);

        $result_array = [];

        if ($result_data && $result_data->num_rows > 0) {

            while ($row_data = $result_data->fetch_assoc()) {

                $result_array[] = $row_data;

            }

        }

        echo json_encode($result_array);

        break;


    // =========================
    // POST
    // =========================
    case 'POST':

        // Get next ID
        $sql = "SELECT MAX(id) AS max_id FROM student";

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();

        $max_id = $row["max_id"];

        if ($max_id == null) {

            $id = 1;

        } else {

            $id = $max_id + 1;

        }


        // Get POST data
        $name = $_POST["name"] ?? "";
        $mobile = $_POST["mobile"] ?? "";
        $address = $_POST["address"] ?? "";
        $gender = $_POST["gender"] ?? "";
        $dob = $_POST["dob"] ?? "";
        $father_name = $_POST["father_name"] ?? "";
        $mother_name = $_POST["mother_name"] ?? "";


        // Insert query
        $sql = "INSERT INTO student
        (
            id,
            name,
            mobile,
            address,
            gender,
            dob,
            father_name,
            mother_name
        )
        VALUES
        (
            '$id',
            '$name',
            '$mobile',
            '$address',
            '$gender',
            '$dob',
            '$father_name',
            '$mother_name'
        )";


        if ($conn->query($sql) === TRUE) {

            $result_array = [
                "status" => true,
                "message" => "Data Added successfully",
                "id" => $id
            ];

        } else {

            $result_array = [
                "status" => false,
                "message" => "Data not added",
                "error" => $conn->error
            ];

        }

        echo json_encode($result_array);

        break;


    // =========================
    // PUT
    // =========================
    case 'PUT':

        // Get JSON data
        $input = json_decode(file_get_contents("php://input"), true);


        $id = $input["id"] ?? 0;
        $name = $input["name"] ?? "";
        $mobile = $input["mobile"] ?? "";
        $address = $input["address"] ?? "";
        $gender = $input["gender"] ?? "";
        $dob = $input["dob"] ?? "";
        $father_name = $input["father_name"] ?? "";
        $mother_name = $input["mother_name"] ?? "";


        // Update query
        $sql = "UPDATE student SET

            name = '$name',
            mobile = '$mobile',
            address = '$address',
            gender = '$gender',
            dob = '$dob',
            father_name = '$father_name',
            mother_name = '$mother_name'

            WHERE id = " . intval($id);


        if ($conn->query($sql) === TRUE) {

            $result_array = [
                "status" => true,
                "message" => "Data Updated successfully"
            ];

        } else {

            $result_array = [
                "status" => false,
                "message" => "Data not Updated",
                "error" => $conn->error
            ];

        }

        echo json_encode($result_array);

        break;


    // =========================
    // DELETE
    // =========================
    case 'DELETE':

        $id = $_GET["id"] ?? 0;


        $sql = "DELETE FROM student WHERE id = " . intval($id);


        if ($conn->query($sql) === TRUE) {

            $result_array = [
                "status" => true,
                "message" => "Data Deleted successfully"
            ];

        } else {

            $result_array = [
                "status" => false,
                "message" => "Data not Deleted",
                "error" => $conn->error
            ];

        }

        echo json_encode($result_array);

        break;


    // =========================
    // INVALID METHOD
    // =========================
    default:

        echo json_encode([
            "status" => false,
            "message" => "Invalid request method"
        ]);

        break;
}

?>