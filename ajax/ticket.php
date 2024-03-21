<?php
include '../drivers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $service = $_POST['service_id'];
    $ticketNumber = getTicketNumber($conn);
    $sql = "INSERT INTO tickets (ticket_no,service_id) values ('$ticketNumber',$service)";
    $conn->query($sql);
}

function getTicketNumber($conn)
{
    $currentDate = date('Y-m-d'); // Get the current date

    // Check if a ticket number exists for the current date
    $sql = "SELECT ticket_number FROM ticket_counter WHERE DATE(counter_date) = '$currentDate'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the ticket number for the current date
        $row = $result->fetch_assoc();
        $ticketNumber = $row['ticket_number'];
    } else {
        // If no ticket number exists for the current date, reset to "A001"
        $ticketNumber = 'A000';

        // Insert the new ticket number for the current date
        $sql = "INSERT INTO ticket_counter (ticket_number) VALUES ('$ticketNumber')";
        $conn->query($sql);
    }

    // Increment the ticket number for the next request
    $ticketNumber = incrementTicketNumber($ticketNumber);

    // Update the ticket number for the current date
    $sql = "UPDATE ticket_counter SET ticket_number = '$ticketNumber' WHERE DATE(counter_date) = '$currentDate'";
    $conn->query($sql);

    return $ticketNumber;
}

function incrementTicketNumber($ticketNumber)
{
    if ($ticketNumber == 'A999') {
        $ticketNumber = 'A001'; // Reset to "A001" if the ticket number reaches "A999"
    } else {
        $ticketNumber = 'A' . str_pad(substr($ticketNumber, 1) + 1, 3, '0', STR_PAD_LEFT); // Increment the ticket number
    }

    return $ticketNumber;
}
