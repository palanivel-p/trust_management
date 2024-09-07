<?php
Include("connection.php");
$role = $_COOKIE['role'];
$api_key = $_COOKIE['panel_api_key'];

if(isset($_POST['old_password']) && isset($_POST['new_password'])) {

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
//    $salt = 'GB#$20deeSp%22';
//      $pw_hash = sha1($salt.$password);
    $remember = 0;
   $sqlValidate = "SELECT * FROM `admin_login` WHERE password='$old_password'";
    $resValidate = mysqli_query($conn, $sqlValidate);
    if (mysqli_num_rows($resValidate) > 0) {
       $sqlUpdate = "UPDATE `admin_login` SET `password`='$new_password' WHERE `panel_api_key`='$api_key'";
        mysqli_query($conn, $sqlUpdate);


        $json_array['status'] = "success";
        $json_array['msg'] = "Added successfully !!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }

    else
    {
        $json_array['status'] = "failure";
        $json_array['msg'] = "Old Password Wrong !!!";
        $json_response = json_encode($json_array);
        echo $json_response;

    }
}
else
{
    $json_array['status'] = "failure";
    $json_array['msg'] = "parameter missing !!!";
    $json_response = json_encode($json_array);
    echo $json_response;

}
function clean($data){
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
