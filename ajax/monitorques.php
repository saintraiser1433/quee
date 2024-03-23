<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $sql = "SELECT
    MIN(CASE WHEN counter = 1 THEN ticket_no END) AS 'cnt1',
    MIN(CASE WHEN counter = 2 THEN ticket_no END) AS 'cnt2',
    MIN(CASE WHEN counter = 3 THEN ticket_no END) AS 'cnt3',
    MIN(CASE WHEN counter = 4 THEN ticket_no END) AS 'cnt4',
    MIN(CASE WHEN counter = 5 THEN ticket_no END) AS 'cnt5',
    `date`
FROM
    TICKETS
WHERE DATE(date)=DATE(now()) and status = 1
    ORDER BY ticket_no ASC
LIMIT 1";

    $rs = $conn->query($sql);
    $data = [];
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data = [
                'cnt1' => $row['cnt1'],
                'cnt2' => $row['cnt2'],
                'cnt3' => $row['cnt3'],
                'cnt4' => $row['cnt4'],
                'cnt5' => $row['cnt5'],
            ];
        }
    }
    echo json_encode($data);
}
