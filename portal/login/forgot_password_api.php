<?php

date_default_timezone_set("Asia/Kolkata");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

Include("../includes/connection.php");

if(isset($_POST['email'])) {

    $email = $_POST['email'];
    // $new_password = $_POST['new_password'];

    $sqlValidate="SELECT * FROM `admin_login` WHERE user_name='$email'";
    $resValidate=mysqli_query($conn,$sqlValidate);
    if(mysqli_num_rows($resValidate) > 0)
    {
        $row = mysqli_fetch_array($resValidate);
        $pwd =  $row['password'];

//        $url = "https://atct.in/portal/login/forgot_pwd_email.php?pwd=$pwd&email=$email";
     $smtpUsername="noreply@gbtechcorp.com";
     $smtpPassword="ul64rO@51";

     $emailFrom="noreply@gbtechcorp.com";
     $emailFromName="Testing";

     $emailTo = $email;
     $emailToName = "test";
//        $smtpUsername="noreply@atct.in";
//        $smtpPassword="Ib98mt*17";
//        $emailFrom="noreply@atct.in";
//        $emailFromName="Forgot Password";

        $emails =$email;

        $mail = new PHPMailer;
        $mail->isSMTP();
//   $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "gbtechcorp.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->setFrom($emailFrom, $emailFromName);
        $mail->addAddress($emailTo, $emailToName);
//        $mail->Port = 587; // TLS only
//        $mail->SMTPSecure = 'tls'; // ssl is depracated
//        $mail->SMTPAuth = true;
//        $mail->Username = $smtpUsername;
//        $mail->Password = $smtpPassword;
//        $mail->setFrom($emailFrom, $emailFromName);
//        $mail->addAddress($email, $emails);
        $mail->Subject = 'ATCT- Forgot Password';
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

        $url =  "https://atct.in/portal/login/forgot_pwd_email.php?pwd=$pwd&email=$email";
        $url = str_replace(" ", "%20", $url);
        $mail->msgHTML(file_get_contents($url));

//        $urls = str_replace(" ", "%20", $url);
//        $mail->msgHTML(file_get_contents($urls));


        if (!$mail->send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
//             echo  "Message sent!";
        }
        $json_array['status'] = "success";
        $json_array['msg'] = "Password Sent To Your Email!!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }
    else
    {
        $json_array['status'] = "failure";
        $json_array['msg'] = "Email ID is Wrong !!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }



}

else
{

    $json_array['status'] = "failure";
    $json_array['msg'] = "Please Try Again Later !!!";
    $json_response = json_encode($json_array);
    echo $json_response;


}
function clean($data){
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

