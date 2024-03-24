<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $companyname = $_POST['companyname'];
    $marquee = $_POST['marquee'];
    $photo = $companyname . time();
    $uploadsDir = '../static/images/logo/';
    if (empty($_FILES) || !isset($_FILES['files'])) {
        $dir = "no-image.png"; // Set to NULL keyword
        $isImgUpdate = false;
    } else {
        $pth = $uploadsDir . $photo . ".png";
        $dir = $photo . ".png";
        $isImgUpdate = true;
    }
    $sqlSelect = "SELECT * FROM settings";
    $rsSelect = $conn->query($sqlSelect);
    if ($rsSelect->num_rows > 0) {
        if ($isImgUpdate) {
            $sql = "UPDATE settings SET company_name='$companyname',logo_path='$dir',marquee_text='$marquee'";
            $conn->query($sql);
            move_uploaded_file($_FILES['files']['tmp_name'], $pth);
        } else {
            $sql = "UPDATE settings SET company_name='$companyname',marquee_text='$marquee'";
            $conn->query($sql);
        }
    } else {
        $sql = "INSERT INTO settings 
        (
            company_name,
            logo_path,
            marquee_text
        ) 
        VALUES ('$companyname','$dir','$marquee')";
        $conn->query($sql);
        move_uploaded_file($_FILES['files']['tmp_name'], $pth);
    }
    $_SESSION['response']= "Success";
    $_SESSION['type']= "success";
    header("Location:client.php");
}
