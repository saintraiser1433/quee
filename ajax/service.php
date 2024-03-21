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
        move_uploaded_file($_FILES['files']['tmp_name'], $pth);
    } else if ($action == 'UPDATE') {
        if ($isImgUpdate) {
            $sql = "UPDATE services SET 
            service_title = '$servicetitle',
            service_description = '$servicedescription',
            status = $servicestatus,
            image = '$dir'
            WHERE services_id=$serviceId";
            move_uploaded_file($_FILES['files']['tmp_name'], $pth);
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
    $serviceIds = @$_GET['serviceId'];
    $userId = @$_GET['userId'];
    $action = @$_GET['action'];
    if ($action == 'ADD') {
        $data = [];
        $sql = "SELECT services_id,service_title
                FROM
                    services
                WHERE
                    services_id NOT IN(
                    SELECT
                        service_id
                    FROM
                        assign_service
                ) AND
                STATUS = 1";
        $rs = $conn->query($sql);
        if ($rs) {
            while ($row = $rs->fetch_assoc()) {
                $data[] = [
                    'services_id' => $row['services_id'],
                    'service_title' => $row['service_title'],
                ];
            }
        }
        echo json_encode($data);
    } else if ($action == 'EDIT') {
        $data = [];
        $sql = "SELECT services_id,service_title
                FROM
                    services
                WHERE
                STATUS = 1";
        $rs = $conn->query($sql);
        if ($rs) {
            while ($row = $rs->fetch_assoc()) {
                $data[] = [
                    'services_id' => $row['services_id'],
                    'service_title' => $row['service_title'],
                ];
            }
        }
        echo json_encode($data);
    } else {

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
}
