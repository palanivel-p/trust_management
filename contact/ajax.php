<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$smtpUsername="noreply@atct.in";
$smtpPassword="Fql4g_in1";

$emailFrom="noreply@atct.in";
$emailFromName="Annai Trust";

$emailTo = "velumsd2109@gmail.com";
$emailToName = "Annai Trust";

if (isset($_POST['name']) && isset($_POST['email'])
&& isset($_POST['phone']) && isset($_POST['subject'])
&& isset($_POST['message']))

{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	Include ('../includes/connection.php');



    $sqlQuery = "SELECT * FROM contact WHERE email = '$email'";
    $result = mysqli_query($conn, $sqlQuery);

    if(mysqli_num_rows($result)==0){

        $sqlInsert = "INSERT INTO contact (`name`,`email`,`number`,`subject`,`message`) VALUES ('$name','$email','$number','$subject','$message')";
        mysqli_query ($conn, $sqlInsert);


        $mail = new PHPMailer;
			$mail->isSMTP();
//   $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
			$mail->Host = "smtp.zoho.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
			$mail->Port = 587; // TLS only
			$mail->SMTPSecure = 'tls'; // ssl is depracated
			$mail->SMTPAuth = true;
			$mail->Username = $smtpUsername;
			$mail->Password = $smtpPassword;
			$mail->setFrom($emailFrom, $emailFromName);

			$mail->addAddress($email, $emailToName);
			$mail->Subject = 'New Enquiry Details From Annai Trust website';
			// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
			$website="https://atct.in/";
			$url =  $website."contact/mail.php?name=$name&email=$email&number=$number&subject=$subject&message=$message";

			$url = str_replace(" ", "%20", $url);
			$mail->msgHTML(file_get_contents($url));


			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
//				echo "Message sent!";
			}

        //log
//        $info = urlencode("Added Game - " . $game_id);
//        file_get_contents($website . "portal/includes/log.php?api_key=$api_key&info=$info");

        //inserted successfully

        $json_array['status'] = "success";
        $json_array['msg'] = "Thank You For Contacting Us, Our Team Will Reach You Soon!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }


    else {
        //Parameters missing

        $json_array['status'] = "failure";
        $json_array['msg'] = "Already Registered";
        $json_response = json_encode($json_array);
        echo $json_response;
    }
}
else
{
    //Parameters missing

    $json_array['status'] = "failure";
    $json_array['msg'] = "Please try after sometime !!!";
    $json_response = json_encode($json_array);
    echo $json_response;
}



function clean($data) {
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}



?>
