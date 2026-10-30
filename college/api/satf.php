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

            $sql = "SELECT * FROM staf WHERE id = " . intval($id);

        } else {

            $sql = "SELECT * FROM staf";

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
        $sql = "SELECT MAX(id) AS max_id FROM staf";

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
        $e_mail = $_POST["e_mail"] ?? "";
        $designation_id = $_POST["designation_id"] ?? 0;
        $salary = $_POST["salary"] ?? 0;
        $date_of_joining = $_POST["date_of_joining"] ?? "";


        // Insert query
        $sql = "INSERT INTO staf
        (
            id,
            name,
            mobile,
            e_mail,
            designation_id,
            salary,
            date_of_joining
        )
        VALUES
        (
            '$id',
            '$name',
            '$mobile',
            '$e_mail',
            '$designation_id',
            '$salary',
            '$date_of_joining'
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
        $e_mail = $input["e_mail"] ?? "";
        $designation_id = $input["designation_id"] ?? 0;
        $salary = $input["salary"] ?? 0;
        $date_of_joining = $input["date_of_joining"] ?? "";


        // Update query
        $sql = "UPDATE staf SET

            name = '$name',
            mobile = '$mobile',
            e_mail = '$e_mail',
            designation_id = '$designation_id',
            salary = '$salary',
            date_of_joining = '$date_of_joining'

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


        $sql = "DELETE FROM staf WHERE id = " . intval($id);


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