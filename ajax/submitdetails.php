<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $ticketId = $_POST['ticketId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $typeclient = $_POST['typeclient'];

    $sql = "INSERT INTO clients (first_name,last_name,sex,age,address,ticket_id,type_client_id) values ('$fname','$lname','$sex',$age,'$address',$ticketId,$typeclient) ";
    $conn->query($sql);
}
