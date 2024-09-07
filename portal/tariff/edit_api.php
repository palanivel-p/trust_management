<?php

date_default_timezone_set("Asia/Kolkata");


if(isset($_POST['tariff_id']))
{
    Include("../includes/connection.php");

    $tariff_id = $_POST['tariff_id'];
    $old_pa_id = $_POST['old_pa_id'];
    $sponcer_type = $_POST['sponcer_type'];
    $budget = $_POST['budget'];
    $sponcer_for = $_POST['sponcer_for'];

    //$date = date('Y-m-d');
    $api_key = $_COOKIE['panel_api_key'];
    $role = $_COOKIE['role'];
    // $sqlValidateCookie="SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";
    if($role == 'Super Admin'){
        $sqlValidateCookie = "SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";

    }
    elseif ($role == 'Admin'){
        $sqlValidateCookie = "SELECT * FROM `branch_profile` WHERE panel_api_key='$api_key'";

    }
    else {
        $sqlValidateCookie = "SELECT * FROM `staff_profile` WHERE panel_api_key='$api_key'";

    }
    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0) {

        $sqlValidate = "SELECT * FROM `tariff` WHERE tariff_id='$tariff_id'";
        $resValidate = mysqli_query($conn, $sqlValidate);
        if (mysqli_num_rows($resValidate) > 0)  {


            $sqlUpdate = "UPDATE `tariff` SET `tariff_id`='$tariff_id',`sponcer_type`='$sponcer_type',`budget`='$budget',`sponcer_for`='$sponcer_for' WHERE `tariff_id`='$tariff_id'";
            mysqli_query($conn, $sqlUpdate);

            $emp_id = $_COOKIE['staff_id'];
            $emp_role= $_COOKIE['role'];
//            $info = urlencode("Edited Tariff" );
//            file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");


            //inserted successfully

            $json_array['status'] = "success";
            $json_array['msg'] = "Updated successfully !!!";
            $json_response = json_encode($json_array);
            echo $json_response;


        } else {


            $json_array['status'] = "failure";
            $json_array['msg'] = "Tariff ID Is Not Valid";
            $json_response = json_encode($json_array);
            echo $json_response;
        }
    }
    else
    {
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

?>
