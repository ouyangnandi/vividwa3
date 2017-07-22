<?php

require('class.phpmailer.php');

$location = isset($_POST['location']) ? $_POST['location'] : '';
$departureDate = isset($_POST['departureDate']) ? $_POST['departureDate'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : '';
$travelDays = isset($_POST['travelDays']) ? $_POST['travelDays'] : '';
$peopleNumber = isset($_POST['peopleNumber']) ? $_POST['peopleNumber'] : '';
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$status_type;

$mail = getEmailDefaultSettings();
$mail->AddAddress("ouyangnandi@hotmail.com", "nandy");
$mail->AddAddress("kevin@vividwa.com.au", "kevin");
$mail->AddAddress("ql@vividwa.com.au", "ql");
$mail->AddAddress("serene@vividwa.com.au", "serene");


$mail->Subject = 'New Order';
$mail->Body = 'The new order below is coming. Please contact the clien as soon as possible.' . "\n" .
        "Target Location: " . $location . "\n" .
        "Departure date:" . $departureDate . "\n" .
        "Travel Days:" . $travelDays . "\n" .
        "Number of People:" . $peopleNumber . "\n" .
        "Full Name: " . $fullName . "\n" .
        "Phone: " . $phone . "\n" .
        "Email: " . $email . "\n" .
        "Message: " . $message . "\n";


if ($mail->Send()) {
    echo json_encode(array('status' => '0'));
} else {
    echo json_encode(array('status' => '1', 'error' => $mail->ErrorInfo));
}
?>