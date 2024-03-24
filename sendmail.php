<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Read form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Set recipient email
    $to = "ifilmahd@gmail.com"; // Replace with your email address

    // Set email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message:\n$message";

    // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $email_message, $headers)) {
        // Email sent successfully
        echo "Your message has been sent successfully!";
    } else {
        // Failed to send email
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Not a POST request, redirect or handle accordingly
    echo "Invalid request method.";
}
?>
