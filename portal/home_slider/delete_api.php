<?php
if(isset($_POST['slider_id']))
{
    Include("../includes/connection.php");


    $slider_id = $_POST['slider_id'];
    $api_key = $_COOKIE['panel_api_key'];


    $sqlValidateCookie="SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";
    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0) {
        unlink($slider_id.".jpg");
//        unlink($placement_id.".pdf");
        //@unlink($_SERVER["DOCUMENT_ROOT"]."/placements/pdf/".$team_id.".pdf");
        @unlink($_SERVER["DOCUMENT_ROOT"]."slider_img/".$slider_id.".jpg");

        $sqlUpdate = "DELETE FROM `slider` WHERE slider_id='$slider_id'";
        mysqli_query($conn, $sqlUpdate);

        $emp_role = $_COOKIE['role'];
//        $info = urlencode("Deleted Gallery" );
//        file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");
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
