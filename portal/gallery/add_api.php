<?php


date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['gallery_type'])) {
    Include("../includes/connection.php");

    //$emp_id = clean($_POST['emp_id']);
    $gallery_type = clean($_POST['gallery_type']);

    //$designation = clean($_POST['job_name']);


    $date = date('Y-m-d');


    //$job_descriptions =  str_replace("'", "", $job_description);

//    $added_by = $_COOKIE['user_id'];

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

    $resValidateCookie = mysqli_query($conn, $sqlValidateCookie);
    if (mysqli_num_rows($resValidateCookie) > 0) {


        $sqlInsert = "INSERT INTO `gallery`(`gallery_id`,`gallery_type`) 
                                            VALUES ('','$gallery_type')";

        mysqli_query($conn, $sqlInsert);

        $ID=mysqli_insert_id($conn);

        if(strlen($ID)==1)
        {
            $ID='00'.$ID;

        }elseif(strlen($ID)==2)
        {
            $ID='0'.$ID;
        }

        $gallery_id="G".($ID);

        $sqlUpdate = "UPDATE gallery SET gallery_id = '$gallery_id' WHERE id ='$ID'";
        mysqli_query($conn, $sqlUpdate);

        //log
//        $info = urlencode("Added News Feed - ".$feed_id . "-" .$feed_title);
//        file_get_contents($website."includes/log.php?emp_id=$emp_id&info=$info");

        $uploadDir = '../../gallery/gallery_img/';
        $new_image_name = $gallery_id.'.jpg';

//        $uploadDirPdf = '../../placements/pdf/';
//        $new_image_name_pdf = $career_id.'.pdf';


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
                        $json_array['msg'] = "Added Successfully, but Image not uploaded!!!";
                        $json_response = json_encode($json_array);
                        echo $json_response;
                    }
                    else{
                        $sqlUpdates = "UPDATE gallery SET img =1 WHERE gallery_id ='$gallery_id'";
                        mysqli_query($conn, $sqlUpdates);

                        $emp_id = $_COOKIE['staff_id'];
                        $emp_role = $_COOKIE['role'];
//                        $info = urlencode("Added Gallery" );
//                        file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");


                        $json_array['status'] = "success";
                        $json_array['msg'] = "Added Successfully !!!";
                        $json_response = json_encode($json_array);
                        echo $json_response;


                    }

                }
                else {
                    //allow type
                    $json_array['status'] = "success";
                    $json_array['msg'] = "Added Successfully, but change Image type not uploaded!!!";
                    $json_response = json_encode($json_array);
                    echo $json_response;
                }


            }
            else {
                // max size
                $json_array['status'] = "success";
                $json_array['msg'] = "Added Successfully, but change Image size not uploaded!!!";
                $json_response = json_encode($json_array);
                echo $json_response;
            }




        }
        else {
            //not upload
            $json_array['status'] = "success";
            $json_array['msg'] = "Added Successfully, but Image not uploaded!!!";
            $json_response = json_encode($json_array);
            echo $json_response;
        }






    }


    else {
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
