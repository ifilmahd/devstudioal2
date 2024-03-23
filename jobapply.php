<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (
        isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST['email']) && isset($_POST['subject']) &&
        isset($_POST['location']) && isset($_POST['position']) &&
        isset($_POST['portfolio']) && isset($_POST['salary']) &&
        isset($_POST['message'])
    ) {
        // Sanitize input data
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
        $position = filter_var($_POST['position'], FILTER_SANITIZE_STRING);
        $portfolio = filter_var($_POST['portfolio'], FILTER_SANITIZE_STRING);
        $salary = filter_var($_POST['salary'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // Compose the email message
        $to = "ifilmahd@gmail.com"; // Replace with your email address
        $headers = "From: $first_name $last_name <$email>";
        $message_body = "Name: $first_name $last_name\n";
        $message_body .= "Email: $email\n";
        $message_body .= "Subject: $subject\n";
        $message_body .= "Location: $location\n";
        $message_body .= "Position: $position\n";
        $message_body .= "Portfolio: $portfolio\n";
        $message_body .= "Salary: $salary\n\n";
        $message_body .= "Message:\n$message";

        // Send the email
        $success = mail($to, $subject, $message_body, $headers);

        if ($success) {
            header("Location: success.html"); // Redirect to a success page
            exit;
        } else {
            header("Location: error.html"); // Redirect to an error page
            exit;
        }
    } else {
        header("Location: error.html"); // Redirect to an error page if form fields are not set or empty
        exit;
    }
} else {
    header("Location: error.html"); // Redirect to an error page if request method is not POST
    exit;
}
?>
