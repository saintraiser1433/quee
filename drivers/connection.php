<?php
session_start();

$conn = new mysqli("localhost", "root", "", "quee");

$sqlSettings = "SELECT * FROM settings";
$rsSettings = $conn->query($sqlSettings);
$companyNamex = "";
$companyLogox = "";
$marqueeText = "";
if ($rsSettings->num_rows > 0) {
    $rowSettings = $rsSettings->fetch_assoc();
    $companyNamex .= $rowSettings['company_name'];
    $companyLogox .= $rowSettings['logo_path'];
    $marqueeText .= $rowSettings['marquee_text'];
}
