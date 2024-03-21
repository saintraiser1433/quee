<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $action = @$_POST['action'];
    $userid = @$_POST['userId'];
    $fname = @$_POST['fname'];
    $lname = @$_POST['lname'];
    $uname = @$_POST['uname'];
    $pass = @$_POST['pass'];
    $counter = @$_POST['counter']; //returns id such as 3,1
    $service = isset($_POST['service']) ? $_POST['service'] : array();
    if ($action == 'ADD') {
        $sql = "INSERT INTO personnels (first_name,last_name,username,password,counter) VALUES ('$fname','$lname','$uname','$pass',$counter)";
        $conn->query($sql);
        $last_id = $conn->insert_id;
        foreach ($service as $service_id) {
            // Bind the parameters for the prepared statement
            $sqlt = "INSERT INTO assign_service (user_id,service_id) values ($last_id,$service_id)";
            $conn->query($sqlt);
        }
    } else if ($action == 'UPDATE') {
        $sql = "UPDATE personnels SET first_name='$fname',last_name='$lname',username='$uname',counter=$counter,password='$pass'
        where user_id = $userid";
        $conn->query($sql);
        $sqlt = "DELETE FROM assign_service where user_id=$userid";
        $conn->query($sqlt);
        foreach ($service as $service_id) {
            // Bind the parameters for the prepared statement
            $sqltx = "INSERT INTO assign_service (user_id,service_id) values ($userid,$service_id)";
            $conn->query($sqltx);
        }
    } else if ($action == 'DELETE') {
        $sql = "DELETE from personnels where user_id=$userid";
        $conn->query($sql);
        $sqlx = "DELETE from assign_service where user_id=$userid";
        $conn->query($sqlx);
    }
} else if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $userId = $_GET['userId'];
    $sql = "SELECT b.*, c.service_title, c.services_id 
            FROM assign_service a 
            RIGHT JOIN personnels b ON a.user_id=b.user_id
            LEFT JOIN services c ON a.service_id = c.services_id
            WHERE b.user_id = $userId";

    $rs = $conn->query($sql);
    $data = [];

    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            $userId = $row['user_id'];
            if (!isset($data[$userId])) {
                $data[$userId] = [
                    'user_id' => $row['user_id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'counter' => $row['counter'],
                    'services' => []
                ];
            }

            $data[$userId]['services_ids'][] = $row['services_id'];
        }
    }

    echo json_encode(array_values($data));
}
