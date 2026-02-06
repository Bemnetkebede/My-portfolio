<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Set the recipient email (your email)
    $recipient = "bemnet026@gmail.com";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if(mail($recipient, $subject, $email_content, $email_headers)) {
        echo "success"; // can be handled by JS to show the sent-message
    } else {
        echo "error";
    }

} else {
    // Not a POST request
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>

