<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//$smtpUsername="noreply@bvipl.uk";
//$smtpPassword="OZMCgu7iYY8W";
//
//$emailFrom="noreply@bvipl.uk";

$smtpUsername="noreply@atct.in";
$smtpPassword="Fql4g_in1";

$emailFrom="noreply@atct.in";
$emailFromName="Annai Trust";

$emailTo = "velumsd2109@gmail.com";
$emailToName = "Annai Trust";

    Include ('../includes/connection.php');

        $name = "test";
        $email = "test";
        $number = "test";
        $subject = "test";
        $message = "test";


        $mail = new PHPMailer;
        $mail->isSMTP();
//   $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.zoho.in";
//        $mail->Host = "mail.bvipl.uk";

        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->setFrom($emailFrom, $emailFromName);

        $mail->addAddress($emailTo, $emailToName);
        $mail->Subject = 'New Enquiry Details From Annai Trust website';
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $website="https://atct.in/";
        $url =  $website."donation_now/mail.php?name=$name&email=$email&number=$number&subject=$subject&message=$message";

        $url = str_replace(" ", "%20", $url);
        $mail->msgHTML(file_get_contents($url));


        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        ?>