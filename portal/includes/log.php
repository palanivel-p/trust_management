
<?php

date_default_timezone_set("Asia/Kolkata");
Include("connection.php");

if(isset($_GET['emp_id']) && isset($_GET['info'])) {


    $date_time=date("Y-m-d H:i:s");
    $info = $_GET['info'];
    $emp_id = $_GET['emp_id'];

    $sqlInsert = "INSERT into log (emp_id,info,date_time) VALUES('$emp_id','$info','$date_time')";
    mysqli_query($conn, $sqlInsert);


    $last_threeMonths = date("Y-m-d 00:00:00 ", strtotime("-90 days"));


    $sqlLastThreeMonth ="SELECT * FROM `log` WHERE date_time <='$last_threeMonths'";
    $resLastThreeMonth=mysqli_query($conn,$sqlLastThreeMonth);
    if(mysqli_num_rows($resLastThreeMonth) > 0) {

        $sqlUpdate = "DELETE FROM `log` WHERE date_time<='$last_threeMonths'";
        mysqli_query($conn, $sqlUpdate);
        echo "{\"result\":\"success\"}";

    }



    echo "{\"result\":\"success\"}";

}
else
{
    echo "{\"result\":\"failure\"}";
}

?>

