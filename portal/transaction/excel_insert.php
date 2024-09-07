<?php

Include("../includes/connection.php");

$added_byy = $_COOKIE['staff_id'];
$role = $_COOKIE['role'];
$file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;

function insert($checkSchool)
{
    $api_key = $_COOKIE['api_key'];
    $added_byy = $_COOKIE['staff_id'];
    global $role;

    $statusSucces = 0;
    if ($checkSchool == 0) {

        Include("../includes/connection.php");


        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

            //   print_r($filesop);
            // echo $role;

            if ($c >1) {
                $sNo = $filesop[0];
                $doner_id = $filesop[1];

                $date_time = $filesop[2];
                $doner_name = $filesop[3];
                $doner_type = $filesop[4];

                $dob = $filesop[5];
                $pan_no = $filesop[6];
                $mobile_no = $filesop[7];
                $amount = $filesop[8];
//            $pay_id = $filesop[9];
                $pay_mode = $filesop[9];
                $added_by = $filesop[10];
                $branch_name = $filesop[11];
                $batch_name = $filesop[12];
                $address = $filesop[13];
                $transaction_id = $filesop[14];
                $status = $filesop[15];
                $type = $filesop[16];
                $remark = $filesop[17];



                if($status == 'verified'){
                    $verfied_content = 1;
                }
                else if($status == 'confirmed'){
                    $verfied_content = 2;
                }
                else if($status == 'unverified'){
                    $verfied_content = 0;
                }




                if($role == 'Super Admin'){

                    $sqlValidate = "SELECT * FROM `transaction` WHERE doner_id='$doner_id'";
                    $resValidate = mysqli_query($conn, $sqlValidate);
                    if (mysqli_num_rows($resValidate) > 0) {


                        $sqlUpdate = "UPDATE `transaction` SET `verify`='$verfied_content',`type`='$type',`remark`='$remark' WHERE `doner_id`='$doner_id'";
                        mysqli_query($conn, $sqlUpdate);
                        $statusSucces = 1;

                    }
                    if($verfied_content == 1)
                    {

                        $sqlValidates = "SELECT * FROM `doner_profile` WHERE mobile='$mobile_no'";
                        $resValidates = mysqli_query($conn, $sqlValidates);
                        if (mysqli_num_rows($resValidates) > 0)
                        {

                            $sqlUpdates = "UPDATE `doner_profile` SET `verfied`='1' WHERE `mobile`='$mobile_no'";
                            mysqli_query($conn, $sqlUpdates);
                        }
                    }
                }
                if($role == 'Admin'){

                    $sqlValidate = "SELECT * FROM `transaction` WHERE doner_id='$doner_id'";
                    $resValidate = mysqli_query($conn, $sqlValidate);
                    if (mysqli_num_rows($resValidate) > 0) {


                        $sqlUpdate = "UPDATE `transaction` SET `date`='$date_time',`verify`='$verfied_content',`doner_name`='$doner_name',`doner_type`='$doner_type',`pan`='$pan_no',`mobile`='$mobile_no',`amount`='$amount',`pay_mode`='$pay_mode',`address`='$address',`transaction_id`='$transaction_id',`remark`='$remark' WHERE `doner_id`='$doner_id'";
                        mysqli_query($conn, $sqlUpdate);
                        $statusSucces = 1;

                    }
                    if($verfied_content == 2)
                    {

                        $sqlValidates = "SELECT * FROM `doner_profile` WHERE mobile='$mobile_no'";
                        $resValidates = mysqli_query($conn, $sqlValidates);
                        if (mysqli_num_rows($resValidates) > 0)
                        {

                            $sqlUpdates = "UPDATE `doner_profile` SET `verfied`='2' WHERE `mobile`='$mobile_no'";
                            mysqli_query($conn, $sqlUpdates);
                        }
                    }
                }

            }

            $c = $c + 1;
        }
    }


    if ($statusSucces == 1) {
        $json_array['status'] = "success";
        $json_array['msg'] = "Added successfully !!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    } elseif ($statusSucces == 0) {
        $json_array['status'] = "failure";
        $json_array['msg'] = "No New Records Added !!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }

}

insert(0);
?>