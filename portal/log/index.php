<?php Include("../includes/connection.php");

error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$page= $_GET['page_no'];
//$search= $_GET['search'];
if($page=='')
    $page=1;

$pageSql= $page-1;
$start=$pageSql*10;
$end = $start;

if($pageSql == 0) {
    $end = 10;
}

$from = $_GET['from_date'];
$to = $_GET['to_date'];
//$staff = $_GET['staff'];

if($from=='')
{
    $from= date("Y-m-01\T00:00");
}

if($to=='')
{
    $to= date("Y-m-d\TH:i");
}



$from_date =date('Y-m-d H:i:00', strtotime($from));

$to_date =date('Y-m-d H:i:00', strtotime($to));


$dateCondition = date('m');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Log</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicn.png">
    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/chartist/css/chartist.min.css">

    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .error {
        color:red;
    }
    .responsiveFilter {
        display:flex;
        justify-content: space-around;
    }

    @media only screen and (max-width: 650px) {
        .responsiveFilter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: column;
        }

    }
</style>
<body>

<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<div id="main-wrapper">


    <?php
    $header_name='Log';

    Include ('../includes/header.php') ?>


    <div class="content-body">
        <div class="page-titles" style="margin-left: 21px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Log</a></li>

            </ol>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="responsiveFilter">
                        <form method="get" class="form-inline">


                            <div class="form-group mx-sm-3 mb-2">
                                <label style="margin-right: 14px;color: black;"><strong>From</strong></label>
                                <input type="datetime-local" class="form-control" name="from_date" id="from_date" style="border-radius:20px;color:black;border:1px solid black;">

                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label style="margin-right: 14px;color: black;"><strong>To</strong></label>
                                <input type="datetime-local" class="form-control" name="to_date" id="to_date" style="border-radius:20px;color:black;border:1px solid black;">

                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <?php

                      $sql = "SELECT * FROM log WHERE MONTH(date_time) ='$dateCondition' AND  date_time BETWEEN '$from_date' AND '$to_date' ORDER BY date_time DESC, id LIMIT $start,10";

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)>0) {
                            ?>


                            <table class="table table-responsive-md" style="text-align: center;">
                                <thead>
                                <tr>
                                    <th class="width80"><strong>#</strong></th>
                                    <th><strong>Emp ID</strong></th>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Info</strong></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sNo = $start;
                                while($row = mysqli_fetch_assoc($result)) {

                                    $sNo++;

                                    $date = $row['date_time'];
                                    $dates = date('d-F-Y h:i:s a', strtotime($date));
//                                    $dates = date('d-F-Y', strtotime($date));

                                    $staffName =  $row['emp_id'];
                                    if($staffName ==  'Csm6M8X4KrBWUIl'){
                                        $staffName ='Super Admin';
                                    }

                                    ?>

                                    <tr>
                                        <td><strong><?php echo $sNo;?></strong></td>

                                        <td><?php  echo $staffName;?> </td>
                                        <td><?php echo $dates?></td>

                                        <td> <?php echo strtoupper($row['info'])?> </td>
                                    </tr>
                                <?php   }

                                ?>


                                </tbody>
                            </table>
                            <div class="col-12 pl-3" style="display: flex;justify-content: center;">
                                <nav>
                                    <ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg">

                                        <?php

                                        $prevPage=abs($page-1);
                                        if ($prevPage > 0) {
                                            ?>
                                            <li class="page-item page-indicator">
                                                <a class="page-link" href="?page_no=<?php echo 1 ?>&from_date=<?php echo $from ?>&to_date=<?php echo $to ?>">
                                                <i class="la la-angle-double-left"  style="padding-top: 9px;"></i></a></li>
                                            <?php
                                        }
                                        if($prevPage==0)
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0);"><i class="la la-angle-left"  style="padding-top: 9px;"></i></a></li>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $prevPage?>&from_date=<?php echo $from ?>&to_date=<?php echo $to ?>"><i class="la la-angle-left"  style="padding-top: 9px;"></i></a></li>
                                            <?php
                                        }


                                        $sql = "SELECT COUNT(id) as count FROM log WHERE MONTH(date_time) ='$dateCondition' AND  date_time BETWEEN '$from_date' AND '$to_date'";





                                        $result = mysqli_query($conn, $sql);


                                        if (mysqli_num_rows($result)) {

                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                            $show = 10;


                                            $get = $count / $show;


                                            $pageFooter = floor($get);

                                            if ($get > $pageFooter) {
                                                $pageFooter++;
                                            }

                                            for ($i = 1; $i <= $pageFooter; $i++) {

                                                if($i==$page) {
                                                    $active = "active";
                                                }
                                                else {
                                                    $active = "";
                                                }

                                                if($i<=($pageSql+10) && $i>$pageSql || $pageFooter<=10) {
                                                    ?>

                                                    <li class="page-item <?php echo $active ?>"><a class="page-link"
                                                                                                   href="?page_no=<?php echo $i ?>&from_date=<?php echo $from ?>&to_date=<?php echo $to ?>"><?php echo $i ?></a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            $nextPage=$page+1;


                                            if($nextPage>$pageFooter)
                                            {
                                                ?>
                                                <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0);"><i class="la la-angle-right"  style="padding-top: 9px;"></i></a></li>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $nextPage ?>&from_date=<?php echo $from ?>&to_date=<?php echo $to ?>"><i class="la la-angle-right"  style="padding-top: 9px;"></i></a></li>
                                                <?php
                                            }
                                            if ($nextPage < $pageFooter) {
                                                ?>
                                                <li class="page-item page-indicator"><a class="page-link"
                                                                                        href="?page_no=<?php echo $pageFooter ?>&from_date=<?php echo $from ?>&to_date=<?php echo $to ?>"><i
                                                                class="la la-angle-double-right"  style="padding-top: 9px;"></i></a></li>
                                                <?php
                                            }

                                        }
                                        ?>

                                    </ul>
                                </nav>
                            </div>
                            <?php
                        }
                        else {
                            ?>
                            <h1 style="text-align:center">No Record Found <span style='font-size:40px;'>&#128533;</span>
                            </h1>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php Include ('../includes/footer.php') ?>


</div>

<script src="../vendor/global/global.min.js"></script>
<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../js/custom.min.js"></script>
<script src="../js/dlabnav-init.js"></script>
<script src="../vendor/owl-carousel/owl.carousel.js"></script>

<script src="../vendor/peity/jquery.peity.min.js"></script>

<!--<script src="../vendor/apexchart/apexchart.js"></script>-->

<!--<script src="../js/dashboard/dashboard-1.js"></script>-->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="../js/plugins-init/jquery.validate-init.js"></script>

<script>
    $( document ).ready(function() {
        $('#from_date').val('<?php echo $from;?>');
        $('#to_date').val('<?php echo $to;?>');
    });

</script>

</body>
</html>
