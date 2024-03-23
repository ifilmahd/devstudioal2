<?php

// Define some constants
define("RECIPIENT_NAME", "DevStudioAl");
define("RECIPIENT_EMAIL", "ifilmahd@gmail.com"); //write your mail here

// Read the form values and sanitize input
$success = false;
$userName = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : "";
$senderEmail = isset($_POST['Email']) ? filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL) : "";
$senderPhone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_STRING) : "";
$userSubject = isset($_POST['subject']) ? filter_var($_POST['subject'], FILTER_SANITIZE_STRING) : "";
$message = isset($_POST['message']) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : "";

// Validate input
if ($userName && $senderEmail && $senderPhone && $userSubject && $message) {
    // Construct recipient and message body
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
    $headers = "From: " . $userName . " <" . $senderEmail . ">";
    $msgBody = "Email: " . $senderEmail . "\nPhone: " . $senderPhone . "\nSubject: " . $userSubject . "\nMessage: " . $message;

    // Send the email
    $success = mail($recipient, $userSubject, $msgBody, $headers);

    // Set Location After Successful Submission
    if ($success) {
        header('Location: contact.html?message=Successful');
        exit;
    } else {
        // Set Location After Unsuccessful Submission
        header('Location: 404.html?message=Failed');
        exit;
    }
} else {
    // Set Location if Required Fields are Empty
    header('Location: 404.html?message=MissingFields');
    exit;
}

?>
