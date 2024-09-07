<?php


date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['sponcer_type']) && isset($_POST['budget'])) {
    Include("../includes/connection.php");

    $sponcer_type = $_POST['sponcer_type'];
    $budget = $_POST['budget'];
    $sponcer_for = $_POST['sponcer_for'];

    //$date = date('Y-m-d');


    //$job_descriptions =  str_replace("'", "", $job_description);

//    $added_by = $_COOKIE['user_id'];

    $api_key = $_COOKIE['panel_api_key'];
    $role = $_COOKIE['role'];



    //$sqlValidateCookie = "SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";

    if($role == 'Super Admin'){
        $sqlValidateCookie = "SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";

    }
    elseif ($role == 'Admin'){
        $sqlValidateCookie = "SELECT * FROM `branch_profile` WHERE panel_api_key='$api_key'";

    }
    else {
        $sqlValidateCookie = "SELECT * FROM `staff_profile` WHERE panel_api_key='$api_key'";

    }
    $resValidateCookie = mysqli_query($conn, $sqlValidateCookie);
    if (mysqli_num_rows($resValidateCookie) > 0) {

        $output = null;

        for ($loop = 0; $loop <= 14; $loop++) {
            for ($isRandomInRange = 0; $isRandomInRange === 0;) {
                $isRandomInRange = isRandomInRange(findRandom());
            }

            $output .= html_entity_decode('&#' . $isRandomInRange . ';');
        }

        $panel_api_key = $output;

        $sqlInsert = "INSERT INTO `tariff`(`tariff_id`,`sponcer_type`,`budget`,`sponcer_for`) 
                                            VALUES ('','$sponcer_type','$budget','$sponcer_for')";

        mysqli_query($conn, $sqlInsert);

        $ID=mysqli_insert_id($conn);

        if(strlen($ID)==1)
        {
            $ID='00'.$ID;

        }elseif(strlen($ID)==2)
        {
            $ID='0'.$ID;
        }

        $tariff_id="T".($ID);

        $sqlUpdate = "UPDATE tariff SET tariff_id = '$tariff_id' WHERE id ='$ID'";
        mysqli_query($conn, $sqlUpdate);
        //log
//        $info = urlencode("Added Game - " . $game_id);
//        file_get_contents($website . "portal/includes/log.php?api_key=$api_key&info=$info");
        $emp_id = $_COOKIE['staff_id'];
        $emp_role = $_COOKIE['role'];
//        $info = urlencode("Added Tariff" );
//        file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");

       
        //inserted successfully

        $json_array['status'] = "success";
        $json_array['msg'] = "Added successfully !!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }


    else {
        //Parameters missing

        $json_array['status'] = "failure";
        $json_array['msg'] = "Invalid Login !!!";
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

function isRandomInRange($mRandom) {
    if(($mRandom >=58 && $mRandom <= 64) ||
        (($mRandom >=91 && $mRandom <= 96))) {
        return 0;
    } else {
        return $mRandom;
    }
}

function findRandom() {
    $mRandom = rand(48, 122);
    return $mRandom;
}

?>
