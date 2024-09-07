<?php


date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['event_name'])) {
    Include("../includes/connection.php");

    //$emp_id = clean($_POST['emp_id']);
    $event_name = clean($_POST['event_name']);
    $place = clean($_POST['place']);
    $date = clean($_POST['date']);
    $time = clean($_POST['time']);
    $description = clean($_POST['description']);

    //$designation = clean($_POST['job_name']);

    //$date = date('Y-m-d');

    //$job_descriptions =  str_replace("'", "", $job_description);

//    $added_by = $_COOKIE['user_id'];

    $api_key = $_COOKIE['panel_api_key'];



    $sqlValidateCookie = "SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";
    $resValidateCookie = mysqli_query($conn, $sqlValidateCookie);
    if (mysqli_num_rows($resValidateCookie) > 0) {


        $sqlInsert = "INSERT INTO `event`(`event_id`,`event_name`,`place`,`date`,`time`,`description`) 
                                            VALUES ('','$event_name','$place','$date','$time','$description')";

        mysqli_query($conn, $sqlInsert);

        $ID=mysqli_insert_id($conn);

        if(strlen($ID)==1)
        {
            $ID='00'.$ID;

        }elseif(strlen($ID)==2)
        {
            $ID='0'.$ID;
        }

        $event_id="E".($ID);

        $sqlUpdate = "UPDATE event SET event_id = '$event_id' WHERE id ='$ID'";
        mysqli_query($conn, $sqlUpdate);


        $uploadDir = '../../event/event_img/';
        $new_image_name = $event_id.'.jpg';

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
                        $sqlUpdates = "UPDATE event SET img =1 WHERE event_id ='$event_id'";
                        mysqli_query($conn, $sqlUpdates);

                        $emp_id = $_COOKIE['staff_id'];
                        $emp_role = $_COOKIE['role'];
//                        $info = urlencode("Added Event" );
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
