<?php
if (isset($_POST['pan'])) {
    $name = $_POST['name'];
    $pan = $_POST['pan'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];

    include('Crypto.php');
    $merchant_id='3103728';
    $working_key='6D07E8D3FBA1904E9DE3E6854E46DEA5';
    $access_code='AVZR46LA99AL66RZLA';

//    $tid='1704454019879';
    $currency='INR';
    $language='EN';
    $cancel_url='https://atct.in/donation_now/index1.php';
    $redirect_url='https://atct.in/donation_now/paymentConfirm_api.php';

    Include ('../includes/connection.php');

    // $sqlQuery = "SELECT * FROM payment";
    // $result = mysqli_query($conn, $sqlQuery);
    // if(mysqli_num_rows($result)){
    // mysqli_num_rows($result)

    $sqlInsert = "INSERT INTO payment (`order_id`,`name`,`pan`,`mobile`,`address`,`amount`) VALUES ('','$name','$pan','$phone','$address','$amount')";
    mysqli_query($conn, $sqlInsert);
    $ID=mysqli_insert_id($conn);
    if(strlen($ID)==1)
    {
        $ID='00'.$ID;
    }elseif(strlen($ID)==2)
    {
        $ID='0'.$ID;
    }
    $order_id="ODTRUST".$phone.($ID);
    $sqlUpdate = "UPDATE payment SET order_id = '$order_id' WHERE id ='$ID'";
    mysqli_query($conn, $sqlUpdate);
    //inserted successfully

    $merchant_data='';
//        $merchant_data.='tid='.$tid.'&order_id='.$order_id.'&currency='.$currency.'&language='.$language.'&merchant_id='.$merchant_id.'&amount='.$amount.'&redirect_url='.$redirect_url.'&cancel_url='.$cancel_url.'&firstName='.$name;
    $merchant_data.='order_id='.$order_id.'&currency='.$currency.'&language='.$language.'&merchant_id='.$merchant_id.'&amount='.$amount.'&redirect_url='.$redirect_url.'&cancel_url='.$cancel_url.'&firstName='.$name;
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
