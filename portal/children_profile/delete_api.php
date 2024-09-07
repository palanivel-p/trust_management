<?php
if(isset($_POST['children_id']))
{
    Include("../includes/connection.php");


    $children_id = $_POST['children_id'];
    $api_key = $_COOKIE['panel_api_key'];


    $sqlValidateCookie="SELECT * FROM `admin_login` WHERE panel_api_key='$api_key'";
    $resValidateCookie=mysqli_query($conn,$sqlValidateCookie);
    if(mysqli_num_rows($resValidateCookie) > 0) {
        unlink($children_id.".jpg");
        unlink($children_id.".pdf");
        @unlink($_SERVER["DOCUMENT_ROOT"]."../children_pdf/".$children_id.".pdf");
        @unlink($_SERVER["DOCUMENT_ROOT"]."../children_img/".$children_id.".jpg");

        $sqlUpdate = "DELETE FROM `children` WHERE children_id='$children_id'";
        mysqli_query($conn, $sqlUpdate);

        $emp_role = $_COOKIE['role'];
        $info = urlencode("Deleted children" );
        file_get_contents($website . "portal/includes/log.php?emp_id=$emp_role&info=$info");
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
