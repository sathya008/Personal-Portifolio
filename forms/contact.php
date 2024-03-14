<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Set up email parameters
    $to = "sathyaprakasht7@gmail.com"; // Your Gmail address
    $subject = "Message from Portfolio Contact Form";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "There was a problem sending your message.";
    }
}
?>
