<?php
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST['pan'])) {
    $doner_name = $_POST['name'];
	$pan = $_POST['pan'];
    $mobile = $_POST['phone'];
	$address = $_POST['address'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $email = $_POST['email'];
    $donation_id = $_POST['donation_id'];
    $donation_type = $_POST['donation_type'];
    $date = date("Y-m-d H:i:s");

    include('Crypto.php');
    $merchant_id='3103728';
    $working_key='6D07E8D3FBA1904E9DE3E6854E46DEA5';
    $access_code='AVZR46LA99AL66RZLA';

//    $tid='1704454019879';
    $currency='INR';
    $language='EN';
    $cancel_url='https://atct.in/donation_now/index.php';
    $redirect_url='https://atct.in/donation_now/paymentConfirm_api.php';

	Include ('../includes/connection.php');

    // $sqlQuery = "SELECT * FROM payment";
    // $result = mysqli_query($conn, $sqlQuery);
    // if(mysqli_num_rows($result)){
   // mysqli_num_rows($result)


    $sqlValidateDonor = "SELECT * FROM `doner_profile` WHERE mobile='$mobile'";
    $resValidateDonor = mysqli_query($conn, $sqlValidateDonor);
    if (mysqli_num_rows($resValidateDonor) > 0) {
        $rowDonor = mysqli_fetch_array($resValidateDonor);

        $doneriD = $rowDonor['doner_id'];

    }
    else {
        $sqlInsertd = "INSERT INTO `doner_profile`(`doner_id`,`doner_name`,`mobile`,`address`,`pan`,`added_by`,`branch_id`) 
                                            VALUES ('','$doner_name','$mobile','$address','$pan','web','web')";

        mysqli_query($conn, $sqlInsertd);

        $ID=mysqli_insert_id($conn);

        if(strlen($ID)==1)
        {
            $ID='00'.$ID;

        }elseif(strlen($ID)==2)
        {
            $ID='0'.$ID;
        }

        $doneriD="D".($ID);

        $sqlUpdate = "UPDATE doner_profile SET doner_id = '$doneriD' WHERE id ='$ID'";
        mysqli_query($conn, $sqlUpdate);
    }

    $batch_idT = '';

    $sqlB = "SELECT * FROM batch_profile";
    $resultB = mysqli_query($conn, $sqlB);
    if (mysqli_num_rows($resultB)>0) {

        while($rowB = mysqli_fetch_assoc($resultB)) {

            $startTime = $rowB['start_time'];
            $endTime = $rowB['end_time'];
            $batch_id = $rowB['batch_id'];

            $current_time = date('G.i');
            $sunrise = date('G.i',strtotime($startTime));
            $end =date('G.i',strtotime($endTime));

            if($current_time > $sunrise && $current_time<$end){
                $batch_idT = $batch_id;
                break;
            }
            else{
                $batch_idT =$batch_id;

            }

        }
    }


   $sqlInsert = "INSERT INTO `transaction`(`pay_id`,`doner_name`,`doner_type`,`address`,`mobile`,`pan`,`amount`,`added_by`,`branch_name`,`date`,`doner_id`,`type`,`email`,`donation_id`,`donation_type`) 
                                            VALUES ('','$doner_name','NA','$address','$mobile','$pan','$amount','web','web','$date','$doneriD','$type','$email','$donation_id','$donation_type')";

    mysqli_query($conn, $sqlInsert);

    $ID=mysqli_insert_id($conn);

    if(strlen($ID)==1)
    {
        $ID='00'.$ID;

    }elseif(strlen($ID)==2)
    {
        $ID='0'.$ID;
    }

    $pay_id="R".($ID);

    $sqlUpdates = "UPDATE transaction SET pay_id = '$pay_id' WHERE id ='$ID'";
    mysqli_query($conn, $sqlUpdates);

    $order_id="ODTRUST".$mobile.($ID);
    $sqlUpdatess = "UPDATE transaction SET order_id = '$order_id' WHERE id ='$ID'";
    mysqli_query($conn, $sqlUpdatess);






//        $sqlInsert = "INSERT INTO payment (`order_id`,`name`,`pan`,`mobile`,`address`,`amount`) VALUES ('','$name','$pan','$phone','$address','$amount')";
//        mysqli_query($conn, $sqlInsert);
//        $ID=mysqli_insert_id($conn);
//        if(strlen($ID)==1)
//        {
//            $ID='00'.$ID;
//        }elseif(strlen($ID)==2)
//        {
//            $ID='0'.$ID;
//        }
//        $order_id="ODTRUST".$phone.($ID);
//        $sqlUpdate = "UPDATE payment SET order_id = '$order_id' WHERE id ='$ID'";
//        mysqli_query($conn, $sqlUpdate);

        //inserted successfully

        $merchant_data='';
//        $merchant_data.='tid='.$tid.'&order_id='.$order_id.'&currency='.$currency.'&language='.$language.'&merchant_id='.$merchant_id.'&amount='.$amount.'&redirect_url='.$redirect_url.'&cancel_url='.$cancel_url.'&firstName='.$name;
        $merchant_data.='order_id='.$order_id.'&currency='.$currency.'&language='.$language.'&merchant_id='.$merchant_id.'&amount='.$amount.'&redirect_url='.$redirect_url.'&cancel_url='.$cancel_url.'&firstName='.$doner_name;
//        $merchant_data.='tid='.$tid.'&order_id='.$order_id.'&currency='.$currency.'&language='.$language.'&merchant_id='.$merchant_id.'&amount='.$totAmount.'&redirect_url='.$redirect_url.'&cancel_url='.$cancel_url.'&firstName='.$fname;
        $encrypted_data = encrypt($merchant_data,$working_key);
        $json_array['status'] = "success";
        $json_array['msg'] = "Donate Now !!!";
        $json_array['encRequest'] = $encrypted_data;
        $json_array['access_code'] = $access_code;
        $json_response = json_encode($json_array);
        echo $json_response;
    // }


    // else {
    //     //Parameters missing

    //     $json_array['status'] = "failure";
    //     $json_array['msg'] = "Invalid Login !!!";
    //     $json_response = json_encode($json_array);
    //     echo $json_response;
    // }
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
