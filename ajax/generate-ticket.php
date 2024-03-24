<?php

include '../drivers/connection.php';
include_once("../dist/libs/phpjasperxml/PHPJasperXML.inc.php");
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $servicetitle = $_POST['servicetitle'];
    $ticketNo = $_POST['ticketNo'];

    $PHPJasperXML = new PHPJasperXML();
    $PHPJasperXML->arrayParameter = array('ticket_no' => $ticketNo, 'service' => $servicetitle);
    $PHPJasperXML->load_xml_file("../static/report/ticket.jrxml");
    $PHPJasperXML->outpage("F", "../static/report/output/ticket.pdf");
}
