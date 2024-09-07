<?php

date_default_timezone_set("Asia/Kolkata");


if(isset($_POST['event_id']))
{
    Include("../includes/connection.php");

    $event_id = $_POST['event_id'];
    $old_pa_id = $_POST['old_pa_id'];
    $event_name = $_POST['event_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $place = $_POST['place'];

    $description = $_POST['description'];



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

        $sqlValidate = "SELECT * FROM `event` WHERE event_id='$event_id'";
//        $sqlValidate = "SELECT * FROM `event` WHERE event_id='$old_pa_id'";
        $resValidate = mysqli_query($conn, $sqlValidate);
        if (mysqli_num_rows($resValidate) > 0)  {
//        if (mysqli_num_rows($resValidate) > 0 || ($event_id==$old_pa_id))  {


            $sqlUpdate = "UPDATE `event` SET `event_id`='$event_id',`event_name`='$event_name',`date`='$date',`time`='$time',`place`='$place',`description`='$description' WHERE `event_id`='$event_id'";
            mysqli_query($conn, $sqlUpdate);

            $uploadDir = '../../event/event_img/';
            $new_image_name = $event_id.'.jpg';
            $maxSize =1000000;
            $uploadedFile = '';

            //inserted successfully

            if (!empty($_FILES["upload_image"]["tmp_name"])) {


                if(($_FILES['upload_image']['size']) <= $maxSize) {

                    $targetFilePath = $uploadDir . $new_image_name;
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    $allowTypes = array('jpg','jpeg');
                    if (in_array($fileType, $allowTypes)) {

                        if (!move_uploaded_file($_FILES["upload_image"]["tmp_name"], $targetFilePath)) {

                            //not uploaded
                            $json_array['status'] = "success";
                            $json_array['msg'] = "Updated Successfully, but Image not uploaded!!!";
                            $json_response = json_encode($json_array);
                            echo $json_response;
                        }
                        else{
                            $sqlUpdates = "UPDATE event SET image =1 WHERE event_id ='$event_id'";
                            mysqli_query($conn, $sqlUpdates);

                            $emp_id = $_COOKIE['staff_id'];
                            $emp_role = $_COOKIE['role'];
//                            $info = urlencode("Edited Event" );
//                            file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");


                            $json_array['status'] = "success";
                            $json_array['msg'] = "Updated Successfully !!!";
                            $json_response = json_encode($json_array);
                            echo $json_response;


                        }

                    }
                    else {
                        //allow type
                        $json_array['status'] = "success";
                        $json_array['msg'] = "Updated Successfully, but change Image type not uploaded!!!";
                        $json_response = json_encode($json_array);
                        echo $json_response;
                    }


                }
                else {
                    // max size
                    $json_array['status'] = "success";
                    $json_array['msg'] = "Updated Successfully, but change Image size not uploaded!!!";
                    $json_response = json_encode($json_array);
                    echo $json_response;
                }




            }
            else {
                //not upload
                $json_array['status'] = "success";
                $json_array['msg'] = "Updated Successfully, but Image not uploaded!!!";
                $json_response = json_encode($json_array);
                echo $json_response;
            }

        } else {


            $json_array['status'] = "failure";
            $json_array['msg'] = "Event ID Is Not Valid";
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
