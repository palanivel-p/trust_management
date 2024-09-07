<?php
if(isset($_POST['children_id']))
{
    Include("../includes/connection.php");


    $children_id = $_POST['children_id'];
    $api_key = $_COOKIE['panel_api_key'];
    $role = $_COOKIE['role'];

    if($role == 'Super Admin'){
        $sqlValidateCookie = "SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";

    }
    elseif ($role == 'Admin'){
        $sqlValidateCookie = "SELECT * FROM `branch_profile` WHERE panel_api_key='$api_key'";

    }
    else {
        $sqlValidateCookie = "SELECT * FROM `staff_profile` WHERE panel_api_key='$api_key'";

    }

//    $sqlValidateCookie="SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";

    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0)
    {
        $sqlData="SELECT * FROM `children` WHERE children_id='$children_id'";
        $resData=mysqli_query($conn,$sqlData);
        if(mysqli_num_rows($resData) > 0)
        {
            $row = mysqli_fetch_array($resData);

            $json_array['status'] = 'success';
            $json_array['children_id'] = $row['children_id'];
            $json_array['children_type'] = $row['child_type'];
            $json_array['children_name'] = $row['name'];
            $json_array['amount'] = $row['amount'];
            $json_array['disease'] = $row['disease'];
            $json_array['hospital'] = $row['hospital'];
            $json_array['description'] = $row['description'];



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
