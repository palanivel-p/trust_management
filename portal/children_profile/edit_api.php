<?php

date_default_timezone_set("Asia/Kolkata");


if(isset($_POST['children_id']))
{
    Include("../includes/connection.php");

   $children_id = $_POST['children_id'];
//    $old_pa_id = $_POST['old_pa_id'];

    $children_name = clean($_POST['children_name']);
    $children_type = clean($_POST['children_type']);
    $amount = clean($_POST['amount']);
    $disease = clean($_POST['disease']);
    $hospital = clean($_POST['hospital']);
    $description = clean($_POST['description']);

    //$date = date('Y-m-d');

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
    if(mysqli_num_rows($resValidateCookie) > 0) {

        $sqlValidate = "SELECT * FROM `children` WHERE children_id='$children_id'";
        $resValidate = mysqli_query($conn, $sqlValidate);
        if (mysqli_num_rows($resValidate) > 0)  {


            $sqlUpdate = "UPDATE `children` SET `name`='$children_name',`child_type`='$children_type',`amount`='$amount',`description`='$description',`disease`='$disease',`hospital`='$hospital' WHERE `children_id`='$children_id'";
            mysqli_query($conn, $sqlUpdate);

            $uploadDir = '../../children_img/';
            $new_image_name = $children_id.'.jpg';

            $uploadDirPdf = '../../children_pdf/';
            $new_image_name_pdf = $children_id.'.pdf';


            $maxSize =1000000;

            $uploadedFile = '';
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
                            $sqlUpdates = "UPDATE children SET img =1 WHERE children_id ='$children_id'";
                            mysqli_query($conn, $sqlUpdates);

                            if (!empty($_FILES["upload_pdf"]["tmp_name"])) {

                                $targetFilePaths = $uploadDirPdf . $new_image_name_pdf;
                                $fileTypes = pathinfo($targetFilePaths, PATHINFO_EXTENSION);
                                $allowTypess = array('pdf');
                                if (in_array($fileTypes, $allowTypess)) {

                                    if (!move_uploaded_file($_FILES["upload_pdf"]["tmp_name"], $targetFilePaths)) {
                                        $json_array['status'] = "success";
                                        $json_array['msg'] = "Updated Successfully, but PDF not uploadedd!!!";
                                        $json_response = json_encode($json_array);
                                        echo $json_response;
                                    }
                                    else{
                                        $sqlUpdates = "UPDATE children SET pdf =1 WHERE children_id ='$children_id'";
                                        mysqli_query($conn, $sqlUpdates);


                                        $emp_id = $_COOKIE['staff_id'];
                                        $emp_role = $_COOKIE['role'];
//                                        $info = urlencode("Edited Children" );
//                                        file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");
                                        //inserted successfully

                                        $json_array['status'] = "success";
                                        $json_array['msg'] = "Updated successfully !!!";
                                        $json_response = json_encode($json_array);
                                        echo $json_response;
                                    }

                                }
                                else {
                                    $json_array['status'] = "success";
                                    $json_array['msg'] = "Updated Successfully, but PDF not uploadeddd!!!";
                                    $json_response = json_encode($json_array);
                                    echo $json_response;
                                }

                            }
                            else {
                                $json_array['status'] = "success";
                                $json_array['msg'] = "Updated Successfully, but PDF not uploadeddddd!!!";
                                $json_response = json_encode($json_array);
                                echo $json_response;
                            }


                        }

                    }
                    else {
                        //allow type
                        $json_array['status'] = "success";
                        $json_array['msg'] = "Updated Successfully, but Image not uploaded!!!";
                        $json_response = json_encode($json_array);
                        echo $json_response;
                    }


                }
                else {
                    // max size
                    $json_array['status'] = "success";
                    $json_array['msg'] = "Updated Successfully, but Image not uploaded!!!";
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
            $json_array['msg'] = "Children ID Is Not Valid";
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

function clean($data) {
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

?>
