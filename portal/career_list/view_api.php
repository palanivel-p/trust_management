<?php
if(isset($_POST['career_id']))
{
    Include("../includes/connection.php");


    $career_id = $_POST['career_id'];
    $api_key = $_COOKIE['panel_api_key'];

    $sqlValidateCookie="SELECT * FROM `user_details` WHERE panel_api_key='$api_key'";

    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0)
    {
        $sqlData="SELECT * FROM `career` WHERE career_id='$career_id'";
        $resData=mysqli_query($conn,$sqlData);
        if(mysqli_num_rows($resData) > 0)
        {
            $row = mysqli_fetch_array($resData);

            $json_array['status'] = 'success';
            $json_array['career_id'] = $row['career_id'];
            $json_array['job_name'] = $row['job_name'];
            $json_array['job_title'] = $row['job_title'];
            $json_array['job_description'] = $row['description'];

            $json_response = json_encode($json_array);
            echo $json_response;
        }


    }
    else
    {
        //staff id already exist

        $json_array['status'] = "wrong";
        $json_array['msg'] = "Login Invalid";
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
