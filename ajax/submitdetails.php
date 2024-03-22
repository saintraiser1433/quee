<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $ticketId = $_POST['ticketId'];
    $userId = $_POST['userId'];
   
}
