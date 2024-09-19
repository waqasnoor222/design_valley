<?php
require 'vendor/autoload.php'; // Autoload Composer dependencies

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load environment variables (if using Dotenv)
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = $_POST['firstName'] ?? 'Not provided';
    $email = $_POST['cemail'] ?? 'Not provided';
    $countryCode = $_POST['countryCode'] ?? 'Not provided';
    $phone = $_POST['phone'] ?? 'Not provided';
    $budget = $_POST['budget'] ?? 'Not provided';
    $message = $_POST['message'] ?? 'Not provided';
    $packagePrice = $_POST['packagePrice'] ?? null;

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                             // Set mailer to use SMTP
        $mail->Host       = $_ENV['SMTP_HOST'];                      // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
        $mail->Username   = $_ENV['SMTP_USER'];                      // SMTP username
        $mail->Password   = $_ENV['SMTP_PASS'];                      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = $_ENV['SMTP_PORT'];      
        // $mail->SMTPDebug = 2;                // TCP port to connect to

        //Recipients
        $mail->setFrom(address: 'leads@americanlogoagency.com', name: 'American Logo Agency');
        $mail->addAddress(address: 'info@americanlogoagency.com');     // Add a recipient

        //Create the email body
        $emailBody = "
            <h1>New Form Submission</h1>
            <p><strong>Name:</strong> $firstName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> +$countryCode $phone</p>
            <p><strong>Budget:</strong> $budget</p>
            <p><strong>Message:</strong> $message</p>
        ";

         // Conditionally add the Package Price if provided
         if ($packagePrice) {
            $emailBody .= "<p><strong>Package Price:</strong> $packagePrice</p>";
        }

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'New Form Submission';
        $mail->Body    = $emailBody;

        // Create the plain-text alternative
        $altBody = "Name: $firstName\nEmail: $email\nPhone: +$countryCode $phone\nBudget: $budget\nMessage: $message";
        if ($packagePrice) {
            $altBody .= "\nPackage Price: $packagePrice";
        }
        $mail->AltBody = $altBody;

        $mail->send();
        echo json_encode([
            'status' => 'success',
            'message' => 'Form submitted successfully. Thank you!'
        ]);
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'There was an error sending your message. Please try again later. ' . $e->getMessage()
        ]);
    }
}
?>
