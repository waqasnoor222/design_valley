<?php
header('Content-Type: application/json');

require 'vendor/autoload.php'; // Autoload Composer dependencies

use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;





if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// $recaptchaResponse = $_POST['g-recaptcha-response'];

// $secretKey = '6LeXXj4qAAAAAL-DnnKp9qZDlcDFDmDsYFUeJhxs';

//  // Make a request to the Google reCAPTCHA API to verify the response
//  $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
//  $response = file_get_contents($recaptchaUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
//  $responseKeys = json_decode($response, true);


// Configure the API client with your Brevo API key
$config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

// Create an instance of the API class
$apiInstance = new TransactionalEmailsApi(
    new Client(),
    $config
);

if (1==1) {
    // Retrieve form data
    $firstName = $_POST['firstName'] ?? 'Not provided';
    $email = $_POST['cemail'] ?? 'Not provided';
    $countryCode = $_POST['countryCode'] ?? 'Not provided';
    $phone = $_POST['phone'] ?? 'Not provided';
    $budget = $_POST['budget'] ?? 'Not provided';
    $message = $_POST['message'] ?? 'Not provided';
    $packagePrice = $_POST['packagePrice'] ?? 'Not provided'; // Ensure this matches your form field

    // Configure the Brevo API client
    $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
    $apiInstance = new TransactionalEmailsApi(new Client(), $config);

    // Set up the email details
    $sendSmtpEmail = new SendSmtpEmail([
        'subject' => 'New Form Submission',
        'sender' => ['email' => 'le',
        'to' => [['email' => 'info@americanlogoagency.com', 'name' => 'Recipient Name']],
        'htmlContent' => "
            <h1>New Form Submission</h1>
            <p><strong>Name:</strong> $firstName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> +$countryCode $phone</p>
            <p><strong>Budget:</strong> $budget</p>
            <p><strong>Message:</strong> $message</p>
            <p><strong>Package Price:</strong> $packagePrice</p>
        ",
        'textContent' => "Name: $firstName\nEmail: $email\nPhone: +$countryCode $phone\nBudget: $budget\nMessage: $message\nPackage Price: $packagePrice"
    ]);

    try {
        // Send the email
        $apiInstance->sendTransacEmail($sendSmtpEmail);
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
} else {
    // reCAPTCHA failed
    echo json_encode([
        'status' => 'error',
        'message' => 'reCAPTCHA verification failed. Please try again.'
    ]);
}

}


?>
message' => 'reCAPTCHA verification failed. Please try again.'
    ]);
}

}


?>>ry again.'
    ]);
}

}


?>