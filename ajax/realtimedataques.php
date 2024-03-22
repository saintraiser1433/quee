<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $userId = $_POST['userId'];
    $sql = "SELECT
     a.ticket_no
    FROM
        tickets a
    LEFT JOIN assign_service b ON
        a.service_id = b.service_id
    INNER JOIN personnels c ON
        b.user_id = c.user_id
    WHERE
        c.user_id = $userId and DATE(a.date)=DATE(now())
    AND a.status = 1
    ORDER BY a.ticket_no asc";

    $rs = $conn->query($sql);
    $response = array();
    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            $response[] = $row;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
