<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (
        isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST['email']) && isset($_POST['number']) &&
        isset($_POST['location']) && isset($_POST['position']) &&
        isset($_POST['portfolio']) && isset($_POST['salary']) &&
        isset($_POST['message'])
    ) {
        // Sanitize input data
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
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
        $message_body .= "Number: $number\n";
        $message_body .= "Location: $location\n";
        $message_body .= "Position: $position\n";
        $message_body .= "Portfolio: $portfolio\n";
        $message_body .= "Salary: $salary\n\n";
        $message_body .= "Message:\n$message";

        // Send the email
        $success = mail($to, $subject, $message_body, $headers);

        // Display success or error message
        if ($success) {
            $message = "Your message has been sent successfully.";
        } else {
            $message = "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        $message = "Please fill out all the required fields.";
    }
} else {
    $message = "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- Add any CSS stylesheets or meta tags as needed -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>

<!-- Display the message -->
<div><?php echo $message; ?></div>

<!-- Add your form here -->
<form action="#" method="post" enctype="multipart/form-data">
    <!-- Your form fields -->
</form>

<!-- Add any JavaScript scripts as needed -->
<script>
    // Add your JavaScript code here
</script>

</body>
</html>
