<?php
include '../../connection.php';
$response = '';
$assetname = '';
$photo = '';

if (isset($_POST['myids'])) {
    $asset = $_POST['myids'];
    $sql = "SELECT * FROM asset where asset_code ='$asset'";
    $rs = $conn->query($sql);
    $row = $rs->fetch_assoc();
    if ($rs->num_rows > 0) {
        if ($row['status'] === '0') {
            $response .= '0';
            $assetname .= $row['asset_name'];
            $photo .= $row['photo'];
        } else {
            $response .= '1';
        }
    } else {
        $response .= '2';
    }
}

$data = array(
    'response' => $response,
    'assetname' => $assetname,
    'photo' => $photo,
);
echo json_encode($data);
