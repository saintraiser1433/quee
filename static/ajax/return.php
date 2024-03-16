<?php
include '../../connection.php';

if (isset($_POST['assetcode'])) {
    $assetcode = $_POST['assetcode'];
    $borrow =  $_POST['borrow'];
    $expected = $_POST['expected'];
    $studentid = $_POST['studentid'];
    $date = date('Y-m-d h:i:s');
    $id = $_POST['id'];
    $sqlt = "INSERT INTO return_asset (student_id,asset_code,date_borrow,expected_return,return_date) values ('$studentid','$assetcode','$borrow','$expected','$date')";
    $conn->query($sqlt);
    $sqd = "DELETE FROM borrow where borrow_id='$id'";
    $conn->query($sqd);
}
