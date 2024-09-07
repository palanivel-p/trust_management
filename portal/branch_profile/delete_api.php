<?php
if(isset($_POST['branch_id']))
{
    Include("../includes/connection.php");


    $branch_id = $_POST['branch_id'];
    $api_key = $_COOKIE['panel_api_key'];


    $sqlValidateCookie="SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";
    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0) {
//        unlink($gallery_id.".jpg");
//        unlink($placement_id.".pdf");
        //@unlink($_SERVER["DOCUMENT_ROOT"]."/placements/pdf/".$team_id.".pdf");
//        @unlink($_SERVER["DOCUMENT_ROOT"]."../../gallery/gallery_img/".$gallery_id.".jpg");

        $sqlUpdate = "DELETE FROM `branch_profile` WHERE branch_id='$branch_id'";
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
