<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $action = @$_POST['action'];
    $clientdescription = @$_POST['clientdescription'];
    $clientstatus = @$_POST['clientstatus'];
    $clientId = @$_POST['clientId'];
    if ($action == 'ADD') {
        $sql = "INSERT INTO type_clients 
        (
            client_description
        ) 
        VALUES ('$clientdescription')";
        $conn->query($sql);
    } else if ($action == 'UPDATE') {
        $sql = "UPDATE type_clients SET 
        client_description = '$clientdescription',
        status = $clientstatus
        WHERE type_client_id=$clientId";
        $conn->query($sql);
    } else if ($action == 'DELETE') {
        $sql = "DELETE from type_clients where type_client_id=$clientId";
        $sql = $conn->query($sql);
    }
} else if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $clientId = $_GET['clientId'];
    $sql = "SELECT * FROM type_clients WHERE type_client_id = $clientId";
    $rs = $conn->query($sql);
    $data = [];
    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = [
                'client_id' => $row['type_client_id'],
                'client_description' => $row['client_description'],
                'status' => $row['status'],
            ];
        }
    }
    echo json_encode($data);
}
