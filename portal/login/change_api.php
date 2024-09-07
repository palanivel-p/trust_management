<?php
Include("../includes/connection.php");

if(isset($_POST['registered_email']) && isset($_POST['old_password']) && isset($_POST['new_password'])) {

    $registered_email = clean($_POST['registered_email']);
    $old_password = clean($_POST['old_password']);
    $new_password = clean($_POST['new_password']);
//    $salt = 'GB#$20deeSp%22';
//      $pw_hash = sha1($salt.$password);

    $remember = 0;
    $sqlValidate = "SELECT * FROM `admin_login` WHERE user_name='$registered_email' AND old_password='$old_password'";
    $resValidate = mysqli_query($conn, $sqlValidate);
    if (mysqli_num_rows($resValidate) > 0) {
        $sqlUpdate = "UPDATE `admin_login` SET `old_password`='$old_password' WHERE `user_name`='$registered_email'";
        mysqli_query($conn, $sqlUpdate);
        echo "{\"result\":\"successs\"}";

    }

}
else
{
//    $json_array['status'] = "failure";
//    $json_array['msg'] = "Please try after sometime !!!";
//    $json_response = json_encode($json_array);
//    echo $json_response;
    echo "{\"result\":\"failures\"}";

}
function clean($data){
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
