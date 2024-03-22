<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $service = $_POST['service_id'];
    $counter = $_POST['counter'];
    $ticketNumber = getTicketNumber($conn, $counter);
   
    $sql = "INSERT INTO tickets (ticket_no,service_id,counter) values ('$ticketNumber',$service,$counter)";
    $conn->query($sql);
    echo $ticketNumber;
}

function getTicketNumber($conn, $counter)
{
    $currentDate = date('Y-m-d'); // Get the current date
    $letterCounter = '';

    // Check if a ticket number exists for the current date
    $sql = "SELECT ticket_number FROM ticket_counter WHERE DATE(counter_date) = '$currentDate' and counter=$counter";
    $result = $conn->query($sql);

    if ($counter == '1') {
        $letterCounter .= 'A';
    } else if ($counter == '2') {
        $letterCounter .= 'B';
    } else if ($counter == '3') {
        $letterCounter .= 'C';
    } else if ($counter == '4') {
        $letterCounter .= 'D';
    } else if ($counter == '5') {
        $letterCounter .= 'E';
    }

    if ($result->num_rows > 0) {
        // Fetch the ticket number for the current date
        $row = $result->fetch_assoc();
        $ticketNumber = $row['ticket_number'];
    } else {
        // If no ticket number exists for the current date, reset to "A001", "B001", etc.
        $ticketNumber = $letterCounter . '000';

        // Insert the new ticket number for the current date
        $sql = "INSERT INTO ticket_counter (ticket_number,counter) VALUES ('$ticketNumber',$counter)";
        $conn->query($sql);
    }

    // Increment the ticket number for the next request
    $ticketNumber = incrementTicketNumber($ticketNumber, $letterCounter);

    // Update the ticket number for the current date
    $sql = "UPDATE ticket_counter SET ticket_number = '$ticketNumber' WHERE DATE(counter_date) = '$currentDate' and counter=$counter";
    $conn->query($sql);

    return $ticketNumber;
}

function incrementTicketNumber($ticketNumber, $letterCounter)
{
    $letterCounters = array(
        'A' => 1,
        'B' => 1,
        'C' => 1,
        'D' => 1,
        'E' => 1
    );

    $letter = substr($ticketNumber, 0, 1);
    $number = intval(substr($ticketNumber, 1));

    $letterCounters[$letter] = $number;

    foreach ($letterCounters as $key => $value) {
        if ($key == $letterCounter) {
            if ($letterCounters[$key] == 999) {
                $letterCounters[$key] = 1;
            } else {
                $letterCounters[$key]++;
            }
            $ticketNumber = $key . str_pad($letterCounters[$key], 3, '0', STR_PAD_LEFT);
            break;
        }
    }

    return $ticketNumber;
}
