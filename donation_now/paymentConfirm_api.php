<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/src/Exception.php';
require '../includes/src/PHPMailer.php';
require '../includes/src/SMTP.php';

Include("../includes/connection.php");
Include("Crypto.php");

    $workingKey='6D07E8D3FBA1904E9DE3E6854E46DEA5';       //Working Key should be provided here.
    $encResponse=$_POST["encResp"];          //This is the response sent by the CCAvenue Server
    $rcvdString=decrypt($encResponse,$workingKey);    //Crypto Decryption used as per the specified working key.
    $order_status="";
    $decryptValues=explode('&', $rcvdString);
    $dataSize=sizeof($decryptValues);
    echo "<center>";

    for($i = 0; $i < $dataSize; $i++)
    {
        $information=explode('=',$decryptValues[$i]);
        if($i==3)  $order_status=$information[1];
    }

    print_r($decryptValues);

    $order_id = $decryptValues[0];
    $order_id =   str_replace("order_id=","",$order_id);
    $tracking_id = $decryptValues[1];
    $tracking_id =   str_replace("tracking_id=","",$tracking_id);
    $pay_mode = $decryptValues[5];
$pay_mode =   str_replace("payment_mode=","",$pay_mode);

   $sqlvalidate = "SELECT * FROM `transaction` WHERE order_id = '$order_id'";
   $resValidate = mysqli_query($conn,$sqlvalidate);
   if(mysqli_num_rows($resValidate) > 0)
   {
       $row = mysqli_fetch_array($resValidate);
       $name = $row['doner_name'];
       $email = $row['email'];
       $amount = $row['amount'];
   }



if($order_status==="Success")
        {
            $sqlUpdate = "UPDATE `transaction` SET `payment_status`='1',`tracking_id`='$tracking_id',`order_status`='$order_status',`transaction_id`='$order_id',`verify`='2',`pay_mode`='$pay_mode' WHERE `order_id`='$order_id'";
            mysqli_query($conn, $sqlUpdate);

            emails($name,$amount,$email,$order_id,1);

            $url = 'https://atct.in/donation_now/index.php?payment_status=1&order_id='.$order_id;

        }
        else if($order_status==="Aborted")
        {
            $sqlUpdate = "UPDATE `transaction` SET `tracking_id`='$tracking_id',`order_status`='$order_status',`pay_mode`='$pay_mode' WHERE `order_id`='$order_id'";
            mysqli_query($conn, $sqlUpdate);
            emails($name,$amount,$email,$order_id,0);
            $url = 'https://atct.in/donation_now/index.php?payment_status=0&order_id='.$order_id;
        }
        else if($order_status==="Failure")
        {
            $sqlUpdate = "UPDATE `transaction` SET `tracking_id`='$tracking_id',`order_status`='$order_status',`pay_mode`='$pay_mode' WHERE `order_id`='$order_id'";
            mysqli_query($conn, $sqlUpdate);
            emails($name,$amount,$email,$order_id,0);
            $url = 'https://atct.in/donation_now/index.php?payment_status=0&order_id='.$order_id;
        }
        else {
            $sqlUpdate = "UPDATE `transaction` SET `tracking_id`='$tracking_id',`order_status`='$order_status',`pay_mode`='$pay_mode' WHERE `order_id`='$order_id'";
            mysqli_query($conn, $sqlUpdate);
            emails($name,$amount,$email,$order_id,0);
            $url = 'https://atct.in/donation_now/index.php?payment_status=0&order_id='.$order_id;
        }

        header("Location: $url");
function emailS($name,$amount,$email,$orderID,$paymentStatus){

    $url = "https://atct.in/donation_now/mail.php?name=$name&amount=$amount&order_id=$orderID&payment_status=$paymentStatus";


    $emails =$email;

//    $smtpUsername="noreply@bvipl.uk";
//    $smtpPassword="OZMCgu7iYY8W";
//    $emailFrom="noreply@bvipl.uk";

    $smtpUsername="noreply@atct.in";
    $smtpPassword="Fql4g_in1";
    $emailFrom="noreply@atct.in";
    $emailFromName="ATCT";



    $mail = new PHPMailer;
    $mail->isSMTP();
//   $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = "smtp.zoho.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
//    $mail->Host = "smtp.zoho.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is depracated
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->setFrom($emailFrom, $emailFromName);
    $mail->addAddress($emails, $emails);
    $mail->Subject = 'ATCT Payment Details';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

    $url = str_replace(" ", "%20", $url);
    $mail->msgHTML(file_get_contents($url));


    if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
//          echo "Message sent!";
    }
}

?>