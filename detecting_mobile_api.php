<?php

date_default_timezone_set("Asia/Kolkata");



Include("portal/includes/connection.php");

if(isset($_POST['mobile'])&& isset($_POST['desktop'])) {

    $mobile = $_POST['mobile'];
    $desktop = $_POST['desktop'];
    $date = date('Y-m-d');
//    $date = date('2022-03-25');





    $sqlValidate = "SELECT * FROM `dashboard_data` WHERE date='$date'";
    $resValidate = mysqli_query($conn, $sqlValidate);
    if (mysqli_num_rows($resValidate) > 0) {


        $sqlD= "SELECT * FROM `dashboard_data` WHERE date='$date'";

        $resD = mysqli_query($conn, $sqlD);
        $rowD = mysqli_fetch_array($resD);
        $mobiles = $rowD['mobile'];
        $desktops = $rowD['desktop'];

        $num_mobile = (int)$mobiles;
        $num_desktop = (int)$desktops;

        if($mobile == 1) {
            $mobileU = $mobile + $num_mobile;

            $sqlUpdate = "UPDATE `dashboard_data` SET `mobile`='$mobileU' WHERE `date`='$date'";

        }
        elseif ($desktop == 1) {
            $desktopU = $desktop + $num_desktop;
            $sqlUpdate = "UPDATE `dashboard_data` SET `desktop`='$desktopU' WHERE `date`='$date'";

        }

        mysqli_query($conn, $sqlUpdate);

        $json_array['status'] = "success";
        $json_array['msg'] = "Updated  !!!";

        $json_response = json_encode($json_array);
        echo $json_response;

    }
    else {

        $sqlInsert = "INSERT INTO `dashboard_data`( `date`,`mobile`,`desktop`) 
                                            VALUES ('$date','$mobile','$desktop')";

        mysqli_query($conn, $sqlInsert);

        $json_array['status'] = "success";
        $json_array['msg'] = "Added New !!!";
//        $json_array['check'] =
        $json_response = json_encode($json_array);
        echo $json_response;
    }

}
else {
    $json_array['status'] = "failure";
    $json_array['msg'] = "Failure !!!";
    $json_response = json_encode($json_array);
    echo $json_response;

}


?>