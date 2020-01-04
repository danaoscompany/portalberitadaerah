<?php
include 'db.php';
$email = $_POST["email"];
$answer = $_POST["answer"];
$to      = $email;
$subject = 'Jawaban dari pertanyaan Anda';
$message = $answer;
$headers = 'From: portalberitadaerah@gmail.com' . "\r\n" .
    'Reply-To: portalberitadaerah@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);