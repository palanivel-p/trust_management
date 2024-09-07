<?php
Include("../includes/connection.php");

if(isset($_POST['email']) && isset($_POST['password'])) {

    $email = clean($_POST['email']);

    $password = clean($_POST['password']);

//    $salt = 'GB#$20deeSp%22';
//      $pw_hash = sha1($salt.$password);


    $remember = 0;

    $sqlValidate = "SELECT * FROM `admin_login` WHERE user_name='$email' AND password='$password'";
    $resValidate = mysqli_query($conn, $sqlValidate);
    if (mysqli_num_rows($resValidate) > 0) {
        if ($remember == 1) {
            $cookie_set = 120;
        } else {
            $cookie_set = 1;
        }
        $cookie_set = 120;

        $row = mysqli_fetch_array($resValidate);

        setcookie("panel_api_key", $row['panel_api_key'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
        //setcookie("user_id", $row['user_name'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
        setcookie("role", 'Super Admin', time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
         setcookie("staff_id", 'SA01', time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr

       $emp_id = 'SA01';
        $emp_role = $_COOKIE['role'];

        $info = urlencode("Log in" );
        file_get_contents($website . "/portal/includes/log.php?emp_id=$emp_id&info=$info");

        echo "{\"result\":\"success\"}";
    } else {

        $sqlValidateB = "SELECT * FROM `branch_profile` WHERE email='$email' AND password='$password' AND access_status=1";
        $resValidateB = mysqli_query($conn, $sqlValidateB);
        if (mysqli_num_rows($resValidateB) > 0) {
            if ($remember == 1) {
                $cookie_set = 120;
            } else {
                $cookie_set = 1;
            }
            $cookie_set = 120;

            $rowB = mysqli_fetch_array($resValidateB);

            setcookie("panel_api_key", $rowB['panel_api_key'], time() + (3600 *$cookie_set), "/"); // To set Login for 1 hr
            setcookie("user_id", $rowB['user_name'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
            setcookie("role", 'Admin', time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
            setcookie("branch", $rowB['branch_name'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
            setcookie("name", $rowB['incharge'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
            setcookie("staff_id", $rowB['branch_id'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
            setcookie("branch_id", $rowB['branch_id'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr

           $emp_id = $rowB['branch_id'];
            $emp_name = $rowB['incharge'];
            $emp_role = $_COOKIE['role'];
            $info = urlencode("Log in" );
            file_get_contents($website . "/portal/includes/log.php?emp_id=$emp_id&info=$info");

//            echo "{\"result\":\"success\"}";
            $json_array['result'] = "success";
//            $json_array['msg'] = "success";
            $json_response = json_encode($json_array);
            echo $json_response;
        } else {
            $sqlValidateS = "SELECT * FROM `staff_profile` WHERE email='$email' AND password='$password' AND access_status=1";
            $resValidateS = mysqli_query($conn, $sqlValidateS);
            if (mysqli_num_rows($resValidateS) > 0) {
                if ($remember == 1) {
                    $cookie_set = 120;
                } else {
                    $cookie_set = 1;
                }
                $cookie_set = 120;

                $rowS = mysqli_fetch_array($resValidateS);

                $branchId = $rowS['branch_name'];

                $sqlbranchName="SELECT * FROM `branch_profile` WHERE branch_id='$branchId'";
                $resultBranchName=mysqli_query($conn,$sqlbranchName);
                if(mysqli_num_rows($resultBranchName) > 0) {
                    $rowBranchName = mysqli_fetch_assoc($resultBranchName);

                    $branchName = $rowBranchName['branch_name'];

                }

                setcookie("panel_api_key", $rowS['panel_api_key'], time() + (3600 *$cookie_set), "/"); // To set Login for 1 hr
                setcookie("user_id", $rowS['user_name'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 h
                setcookie("role", 'Staff', time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
                setcookie("name", $rowS['staff_name'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
                setcookie("branch", $branchName, time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
                setcookie("staff_id", $rowS['staff_id'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr
                setcookie("branch_id", $rowS['branch_name'], time() + (3600 * $cookie_set), "/"); // To set Login for 1 hr


                $emp_id = $rowS['staff_id'];
                $emp_name = $rowS['staff_name'];
                $emp_role = $_COOKIE['role'];
                $info = urlencode("Log in" );
                file_get_contents($website . "/portal/includes/log.php?emp_id=$emp_id&info=$info");

//                echo "{\"result\":\"success\"}";
                $json_array['result'] = "success";
//            $json_array['msg'] = "success";
                $json_response = json_encode($json_array);
                echo $json_response;
            }
            else {
                $json_array['result'] = "failure";
                $json_array['msg'] = "Email or Password was wrong !!";
                $json_response = json_encode($json_array);
                echo $json_response;
                //echo "{\"result\":\"wrong\"}";
            }


        }
    }
}
else
{

    $json_array['result'] = "failure";
    $json_array['msg'] = "Email or Password was wrong !!";
    $json_response = json_encode($json_array);
    echo $json_response;
    //echo "{\"result\":\"wrong\"}";


}
function clean($data){
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

setcookie('username',$username,time()+60*60*24*365);
// 'Force' the cookie to exists
$_COOKIE['username'] = $username;