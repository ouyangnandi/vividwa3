<?php

require('class.phpmailer.php');

$email = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : '';
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$status_type;

$mail = getEmailDefaultSettings();
$mail->AddAddress("ouyangnandi@hotmail.com", "nandy");
$mail->AddAddress("kevin@vividwa.com.au", "kevin");
$mail->AddAddress("ql@vividwa.com.au", "ql");
$mail->AddAddress("serene@vividwa.com.au", "serene");

$mail->Subject = 'New Message';
$mail->Body = 'The new message below is coming. Please contact the clien as soon as possible.' . "\n" .
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