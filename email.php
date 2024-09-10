<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   

    // Retrieve the form data
    $firstName = $_POST['firstName'];
    $email = $_POST['cemail'];
    $countryCode = $_POST['countryCode'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $budget = $_POST['budget'];
    $message = $_POST['message'];

    // Construct the email content
    $to = 'info@americanlogoagency.com';
    $subject = 'New Form Submission';
    $body = "Name: $firstName\nEmail: $email\nPhone: +$countryCode $phone\nBudget: $budget\nMessage: $message";
    $headers = 'From: info@americanlogoagency.com' . "\r\n" .
               'Reply-To: info@americanlogoagency.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // echo json_encode(['success' => true, 'message' => 'Email sent successfully!']);
        // return 
        header('Location: index.php?success=1');

    } else {
        // echo json_encode(['success' => false, 'message' => 'Email sending failed.']);
        header('Location: index.php?error=1');

    }
    exit;
}
?>