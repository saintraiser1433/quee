<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $ticketId = $_POST['ticketId'];
    $userId = $_POST['userId'];
    $sql = "SELECT
    DISTINCT a.ticket_no,a.ticket_id
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
    $row = $rs->fetch_assoc();
    if ($rs->num_rows > 0) {
        $sqlx = "UPDATE tickets set status = 0 where ticket_id=$ticketId";
        $conn->query($sqlx);
    } else {
        echo '1';
    }
}
