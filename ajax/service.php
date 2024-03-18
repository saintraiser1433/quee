<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $action = @$_POST['action'];
    $servicetitle = @$_POST['servicetitle'];
    $servicedescription = @$_POST['servicedescription'];
    $servicestatus = @$_POST['servicestatus'];
    $photo = @$servicetitle . time();
    $serviceId = @$_POST['serviceId'];
    $uploadsDir = '../static/images/menu/';
    if (empty($_FILES) || !isset($_FILES['files'])) {
        $dir = "no-image.png"; // Set to NULL keyword
        $isImgUpdate = false;
    } else {
        $pth = $uploadsDir . $photo . ".png";
        $dir = $photo . ".png";
        move_uploaded_file($_FILES['files']['tmp_name'], $pth);
        $isImgUpdate = true;
    }
    if ($action == 'ADD') {
        $sql = "INSERT INTO services 
        (
            service_title,
            service_description,
            image
        ) 
        VALUES ('$servicetitle','$servicedescription','$dir')";
        $conn->query($sql);
    } else if ($action == 'UPDATE') {
        if ($isImgUpdate) {
            $sql = "UPDATE services SET 
            service_title = '$servicetitle',
            service_description = '$servicedescription',
            status = $servicestatus,
            image = '$dir'
            WHERE services_id=$serviceId";
        } else {
            $sql = "UPDATE services SET 
            service_title = '$servicetitle',
            service_description = '$servicedescription',
            status = $servicestatus
            WHERE services_id=$serviceId";
        }

        $conn->query($sql);
    } else if ($action == 'DELETE') {

        $sql = "DELETE from services where services_id=$serviceId";
        $sql = $conn->query($sql);
    }
} else if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $serviceIds = $_GET['serviceId'];
    $sql = "SELECT * FROM services WHERE services_id = $serviceIds";
    $rs = $conn->query($sql);
    $data = [];
    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = [
                'services_id' => $row['services_id'],
                'service_title' => $row['service_title'],
                'service_description' => $row['service_description'],
                'image' => $row['image'],
                'status' => $row['status'],
            ];
        }
    }
    echo json_encode($data);
}