<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $userId = $_POST['userId'];
    $sql = "SELECT
    DISTINCT a.ticket_no,a.ticket_id,s.service_title
    FROM
        tickets a
    LEFT JOIN assign_service b ON
        a.service_id = b.service_id
    INNER JOIN services s ON
        a.service_id = s.services_id
    INNER JOIN personnels c ON
        b.user_id = c.user_id
    WHERE
        c.user_id = $userId and DATE(a.date)=DATE(now())
    AND a.status = 1
    ORDER BY a.ticket_no asc LIMIT 1";

    $rs = $conn->query($sql);
    $data = [];
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data = [
                'ticket_id' => $row['ticket_id'],
                'ticket_no' => $row['ticket_no'],
                'service_title' => $row['service_title']
            ];
        }
    }
    echo json_encode($data);
}
