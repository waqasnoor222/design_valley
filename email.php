<?php
require 'vendor/autoload.php'; // Autoload Composer dependencies

use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Configure the API client with your Brevo API key
$config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

// Create an instance of the API class
$apiInstance = new TransactionalEmailsApi(
    new Client(),
    $config
);

$firstName = $_POST['firstName'] ?? 'Not provided';
$email = $_POST['cemail'] ?? 'Not provided';
$countryCode = $_POST['countryCode'] ?? 'Not provided';
$phone = $_POST['phone'] ?? 'Not provided';
$budget = $_POST['budget'] ?? 'Not provided';
$message = $_POST['message'] ?? 'Not provided';

// Set up the email details
 // Set up the email details
 $sendSmtpEmail = new SendSmtpEmail([
    'subject' => 'New Form Submission',
    'sender' => ['email' => 'leads@americanlogoagency.com', 'name' => 'Your Name'],
    'to' => [['email' => 'info@americanlogoagency.com', 'name' => 'Recipient Name']],
    'htmlContent' => "
        <h1>New Form Submission</h1>
        <p><strong>Name:</strong> $firstName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> +$countryCode $phone</p>
        <p><strong>Budget:</strong> $budget</p>
        <p><strong>Message:</strong> $message</p>
    ",
    'textContent' => "Name: $firstName\nEmail: $email\nPhone: +$countryCode $phone\nBudget: $budget\nMessage: $message"
]);

try {
    // Send the email
    $response = $apiInstance->sendTransacEmail($sendSmtpEmail);
    header('Location: index.php?success=1');
        exit;
    } catch (Exception $e) {
        header('Location: index.php?error=1&message=' . urlencode($mail->ErrorInfo));
        exit;
    }
}
?>
