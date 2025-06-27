<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = 'no-reply@sciencenewacademy.in';
    $subject = 'New Contact Message from Website';

    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    $body = "
        <strong>Name:</strong> {$name}<br>
        <strong>Email:</strong> {$email}<br>
        <strong>Phone:</strong> {$phone}<br><br>
        <strong>Message:</strong><br>{$message}
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Science Academy <contact@sciencenewacademy.in>\r\n";


    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo 'Mail sent';
    } else {
        http_response_code(500);
        echo 'Mail failed';
    }
}
