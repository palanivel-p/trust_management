<?php
if(isset($_POST['event_id']))
{
    Include("../includes/connection.php");


    $event_id = $_POST['event_id'];
    $api_key = $_COOKIE['panel_api_key'];


    $sqlValidateCookie="SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";
    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0) {
        unlink($event_id.".jpg");
//        unlink($placement_id.".pdf");
        //@unlink($_SERVER["DOCUMENT_ROOT"]."/placements/pdf/".$team_id.".pdf");
        @unlink($_SERVER["DOCUMENT_ROOT"]."../../event/event_img/".$event_id.".jpg");

        $sqlUpdate = "DELETE FROM `event` WHERE event_id='$event_id'";
        mysqli_query($conn, $sqlUpdate);

        //deleted successfully

        $json_array['status'] = "success";
        $json_array['msg'] = "Deleted successfully !!!";
        $json_response = json_encode($json_array);
        echo $json_response;


    }
    else
    {
        //Parameters missing

        $json_array['status'] = "failure";
        $json_array['msg'] = "Please try after sometime!!!";
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
