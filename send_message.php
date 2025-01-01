<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email
    $to = "shradhaahirve@gmail.com";

    // Email subject and body
    $email_subject = "New Contact Form Message: $subject";
    $email_body = "You have received a new message from your website.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'index.html'; // Reload to the main page
              </script>";
    } else {
        echo "<script>
                alert('Failed to send the message. Please try again.');
                window.location.href = 'index.html';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request method.');
            window.location.href = 'index.html';
          </script>";
}
?>
