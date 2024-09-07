<?php

date_default_timezone_set("Asia/Kolkata");


if(isset($_POST['career_id']))
{
    Include("../includes/connection.php");

    $career_id = $_POST['career_id'];
    $old_pa_id = $_POST['old_pa_id'];
    $job_name = $_POST['job_name'];
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];

    $date = date('Y-m-d');

    $api_key = $_COOKIE['panel_api_key'];


    $sqlValidateCookie="SELECT * FROM `user_details` WHERE panel_api_key='$api_key'";
    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0) {

        $sqlValidate = "SELECT * FROM `career` WHERE career_id='$old_pa_id'";
        $resValidate = mysqli_query($conn, $sqlValidate);
        if (mysqli_num_rows($resValidate) > 0 || ($career_id==$old_pa_id))  {


            $sqlUpdate = "UPDATE `career` SET `career_id`='$career_id',`job_name`='$job_name',`job_title`='$job_title',`career_date`='$date',`description`='$job_description' WHERE `career_id`='$old_pa_id'";
            mysqli_query($conn, $sqlUpdate);



            //inserted successfully

            $json_array['status'] = "success";
            $json_array['msg'] = "Updated successfully !!!";
            $json_response = json_encode($json_array);
            echo $json_response;


        } else {


            $json_array['status'] = "failure";
            $json_array['msg'] = "Career ID Is Not Valid";
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
