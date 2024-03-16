<?php
include '../../connection.php';
$response = '';
$assetname = '';
$photo = '';

if (isset($_POST['myids'])) {
    $asset = $_POST['myids'];
    $sql = "SELECT * FROM students where student_id ='$asset'";
    $rs = $conn->query($sql);
    if ($rs->num_rows > 0) {
        $response .= '0';
    } else {
        $response .= '1';
    }
}

$data = array(
    'response' => $response,

);
echo json_encode($data);
