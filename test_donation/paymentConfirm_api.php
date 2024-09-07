<?php
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

if($order_status==="Success")
{
    $sqlUpdate = "UPDATE `payment` SET `payment_status`='1',`tracking_id`='$tracking_id',`order_status`='$order_status' WHERE `order_id`='$order_id'";
    mysqli_query($conn, $sqlUpdate);
    $url = 'https://atct.in/donation_now/index1.php?payment_status=1';
}
else if($order_status==="Aborted")
{
    $sqlUpdate = "UPDATE `payment` SET `tracking_id`='$tracking_id',`order_status`='$order_status' WHERE `order_id`='$order_id'";
    mysqli_query($conn, $sqlUpdate);
    $url = 'https://atct.in/donation_now/index1.php?payment_status=1';
}
else if($order_status==="Failure")
{
    $sqlUpdate = "UPDATE `payment` SET `tracking_id`='$tracking_id',`order_status`='$order_status' WHERE `order_id`='$order_id'";
    mysqli_query($conn, $sqlUpdate);
    $url = 'https://atct.in/donation_now/index1.php?payment_status=1';
}
else {
    $sqlUpdate = "UPDATE `payment` SET `tracking_id`='$tracking_id',`order_status`='$order_status' WHERE `order_id`='$order_id'";
    mysqli_query($conn, $sqlUpdate);
    $url = 'https://atct.in/donation_now/index1.php?payment_status=1';
}

header("Location: $url");
?>