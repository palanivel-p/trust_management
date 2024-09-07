<?php
if(isset($_POST['event_id']))
{
    Include("../includes/connection.php");


    $event_id = $_POST['event_id'];
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
    if(mysqli_num_rows($resValidateCookie) > 0)
    {
        $sqlData="SELECT * FROM `event` WHERE event_id='$event_id'";
        $resData=mysqli_query($conn,$sqlData);
        if(mysqli_num_rows($resData) > 0)
        {
            $row = mysqli_fetch_array($resData);

            $staffT = $row['added_by'];
            $branchT =  $row['branch_name'];

            $sqlstaff = "SELECT * FROM `staff_profile` WHERE staff_id='$staffT'";
            $resultstaff = mysqli_query($conn, $sqlstaff);
            if (mysqli_num_rows($resultstaff) > 0) {
                $rowstaff = mysqli_fetch_assoc($resultstaff);

                $staff = $rowstaff['staff_name'];

            }
            else{

                $sqlbranchD = "SELECT * FROM `branch_profile` WHERE branch_id='$staffT'";
                $resultBranchD = mysqli_query($conn, $sqlbranchD);
                if (mysqli_num_rows($resultBranchD) > 0) {
                    $rowBranchD = mysqli_fetch_assoc($resultBranchD);

                    $staff = $rowBranchD['incharge'];

                }
            }
            $sqlbranch = "SELECT * FROM `branch_profile` WHERE branch_id='$branchT'";
            $resultBranch = mysqli_query($conn, $sqlbranch);
            if (mysqli_num_rows($resultBranch) > 0) {
                $rowBranch = mysqli_fetch_assoc($resultBranch);

                $branch = $rowBranch['branch_name'];

            }

            $json_array['status'] = 'success';
            $json_array['event_id'] = $row['event_id'];
            $json_array['event_name'] = $row['event_name'];
            $json_array['date'] = $row['date'];
            $json_array['time'] = $row['time'];
            $json_array['place'] = $row['place'];
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
