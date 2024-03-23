<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $clientId = $_POST['clientId'];
    $sql = "SELECT
    c.first_name,
    c.last_name,
    c.sex,
    c.age,
    c.address,
    f.service_title,
    c.type_client_id,
    DATE(c.date_application) AS dates
FROM
    personnels a
LEFT JOIN tickets b ON
    a.counter = b.counter
LEFT JOIN clients c ON
    c.ticket_id = b.ticket_id
LEFT JOIN services d ON
    d.services_id = b.service_id
LEFT JOIN services f ON
    f.services_id = d.services_id
WHERE
    c.client_id = $clientId";

    $rs = $conn->query($sql);
    $data = [];
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data = [
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'sex' => $row['sex'],
                'age' => $row['age'],
                'address' => $row['address'],
                'dates' => $row['dates'],
                'service_title' => $row['service_title'],
                'type_client_id' => $row['type_client_id']

            ];
        }
    }
    echo json_encode($data);
}
