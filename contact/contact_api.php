<?php

//mail

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$smtpUsername="noreply@bvipl.uk";
$smtpPassword="OZMCgu7iYY8W";

$emailFrom="noreply@bvipl.uk";
$emailFromName="annai trust";

$emailTo = "velumsd2109@gmail.com";
$emailToName = "annai trust";

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


	// // This is Google API url where we pass the API secret key to validate the user request.
	// $google_recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	// $recaptcha_secret_key = '6Ld3slsnAAAAABWlrQRsyKv08pUF9T3woK4To6Og'; // Add your generated Secret key
	// $set_recaptcha_response = $_POST['recaptcha_response'];
	// // Make the request and capture the response by making below request.
	// $get_recaptcha_response = file_get_contents($google_recaptcha_url . '?secret=' . $recaptcha_secret_key . '&response=' . $set_recaptcha_response);

	// $get_recaptcha_response = json_decode($get_recaptcha_response);
	// $success_msg="";
	// $err_msg="";
	// // Set the Google recaptcha spam score here and based the score, take your action
	// if ($get_recaptcha_response->success == true && $get_recaptcha_response->score >= 0.5 && $get_recaptcha_response->action == 'submit') {



		$sqlQuery = "SELECT * FROM contact WHERE email = '$email'";
		$result = mysqli_query($conn, $sqlQuery);

		if(mysqli_num_rows($result)==0){

			$sqlInsert = "INSERT INTO contact (`name`,`email`,`number`,`subject`,`message`) VALUES ('$name','$email','$number','$subject','$message')";
			mysqli_query ($conn, $sqlInsert);


			$mail = new PHPMailer;
			$mail->isSMTP();
//   $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
			$mail->Host = "mail.donatecrp.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
			$mail->Port = 587; // TLS only
			$mail->SMTPSecure = 'tls'; // ssl is depracated
			$mail->SMTPAuth = true;
			$mail->Username = $smtpUsername;
			$mail->Password = $smtpPassword;
			$mail->setFrom($emailFrom, $emailFromName);

			$mail->addAddress($emailTo, $emailToName);
			$mail->Subject = 'New Enquiry Details From annai trust website';


			//// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
			$website="https://donatecrp.in/";
			$url =  $website."contact/mail.php?name=$name&email=$email&number=$number&subject=$subject&message=$message";

			$url = str_replace(" ", "%20", $url);
			$mail->msgHTML(file_get_contents($url));


			if (!$mail->send()) {
				//echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				 //echo "Message sent!";
			}





			$json_array['status'] = "success";
			$json_array['msg'] = "Thank You For Contacting Us, Our Team Will Reach You Soon!!";
			$json_response = json_encode ($json_array);
			echo $json_response;
		}
		else
		{
			$json_array['status'] = "failure";
			$json_array['msg'] = "Already Registered";
			$json_response = json_encode ($json_array);
			echo $json_response;
		}


	// } else {

	// 	echo "{\"result\":\"failure\"}";
	// }



}

else

{

	//parameters missing

$json_array['status'] = "failure";
$json_array['msg'] = "failure";
$json_response = json_encode($json_array);
echo $json_response;


// isset($_GET['name'])&&isset($_GET['email'])&&isset($_GET['number'])&& isset($_GET['subject']) && isset($_GET['message'])
}
?>
<?php

// header('Access-Control-Allow-Origin *')
// date_default_timezone_set("Asia/Kolkata");

// if(isset($_GET['name'])){


//     $name = clean($_GET['name']);
//     $email = clean($_GET['email']);
//     $number = clean($_GET['number']);
//     $subject =clean($_GET['subject']);
//     $message =clean($_GET['message']);

//     Include("../portal/includes/connection.php");



//     echo $sqlValidateCookie = "SELECT * FROM `contact_use` WHERE email='$email'";
//     $resValidateCookie = mysqli_query($conn, $sqlValidateCookie);
//     if (mysqli_num_rows($resValidateCookie) == 0) {


//         $sqlInsert= "INSERT INTO `contact`(`name`,`email`,`number`,`subject`,`message`) VALUES ('$name','$email','$number','$subject','$message')";

//         mysqli_query($conn,$sqlInsert);


//      //inserted successfully

//         $json_array['status'] = "success";
//         $json_array['msg'] = "Added successfully !!!";
//         $json_response = json_encode($json_array);
//         echo $json_response;
//     }


//     else {
//         //Parameters missing

//         $json_array['status'] = "failure";
//         $json_array['msg'] = "Already Registered !!!";
//         $json_response = json_encode($json_array);
//         echo $json_response;
//     }
// }
// else
// {
//     //Parameters missing

//     $json_array['status'] = "failure";
//     $json_array['msg'] = "Please try after sometime !!!";
//     $json_response = json_encode($json_array);
//     echo $json_response;
// }



// function clean($data) {
//     return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
// }



?>
