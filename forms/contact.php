<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Replace with your email address
    $to_email = 'sathyaprakasht7@gmail.com';

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Basic form validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo 'All fields are required.';
        exit;
    }

    // Compose email message
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Send email
    if (mail($to_email, $email_subject, $email_body, $headers)) {
        echo 'Message sent successfully.';
    } else {
        echo 'Error sending message. Please try again later.';
    }

} else {
    echo 'Invalid request method.';
}

?>
