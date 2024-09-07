<?php Include("../includes/connection.php");
date_default_timezone_set("Asia/kolkata");

error_reporting(0);
$page= $_GET['page_no'];
$f_date = $_GET['f_date'];
$t_date = $_GET['t_date'];
$search= $_GET['search'];
$branch_nameS= $_GET['branch_nameS']== ''?"all":$_GET['branch_nameS'];
//$batch_ids= $_GET['batch_ids']== ''?"all":$_GET['batch_ids'];
$statuss= $_GET['statuss']== ''?"all":$_GET['statuss'];
$role = $_COOKIE['role'];
if($page=='') {
    $page=1;
}


$pageSql= $page-1;
$start=$pageSql*10;
$end = $start;

if($pageSql == 0) {
    $end = 10;
}

if($statuss != "all"){
    $statussSql= " AND verify = '".$statuss."'";

}
else{
    $statussSql ="";
}

if($f_date == ''){
    $f_date = date('Y-m-01');
}
if($t_date == ''){
    $t_date = date('Y-m-d');
}

$from_date = date('Y-m-d 00:00:00',strtotime($f_date));

$to_date = date('Y-m-d 23:59:59',strtotime($t_date));
//if($batch_ids != "all"){
//    $batch_idsSql= " AND batch_id = '".$batch_ids."'";
//
//}
//else{
//    $batch_idsSql ="";
//}

if($branch_nameS != "all"){
    $branch_nameSSql= " AND branch_name = '".$branch_nameS."'";

}
else{
    $branch_nameSSql ="";
}

if($search != ""){
    $searchSql= "AND mobile LIKE '%".$search."%'";

}
else{
    $searchSql ="";
}

$cookieStaffId = $_COOKIE['staff_id'];
$cookieBranch_Id = $_COOKIE['branch_id'];
if($_COOKIE['role'] == 'Super Admin'){
    $addedBranchSerach = "AND verify='2'";
}
else {
    if ($_COOKIE['role'] == 'Admin'){
        $addedBranchSerach = "AND branch_name='$cookieBranch_Id'";

    }
    else{
        $addedBranchSerach = "AND added_by='$cookieStaffId' AND branch_name='$cookieBranch_Id'";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Transaction profile</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon_New.png">
    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/chartist/css/chartist.min.css">

    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="../vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">



    <link href="../vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="../vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="../vendor/pickadate/themes/default.date.css">
    <link href="../vendor/summernote/summernote.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .error {
        color:red;
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

    $header_name ="Transaction";
    Include ('../includes/header.php') ?>



    <div class="content-body">
        <div class="page-titles" style="margin-left: 21px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaction</a></li>


            </ol>
            <?php
            if($_COOKIE['role'] == 'Super Admin' || $_COOKIE['role'] == 'Admin'){


                ?>
                <div class="d-flex justify-content-end">
                    <button type="button" style="margin-right: 20px;" class="excel_download btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-download color-success"></i>
            </span>Excel Download</button>
                    <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#upload_excel"><span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                    </span>Upload File</button>
                </div>
                <?php
            }
            ?>


        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <!--                    <h4 class="card-title">Transaction List</h4>-->
                    <div style="display: flex;justify-content: flex-end;">
                        <form class="form-inline">
                            <h5 class="text font-medium mr-auto">
                                From Date
                                <input type="date" id="f_date" name="f_date" class="form-control" value="<?php echo $from_date;?>"  min="1900-01-01" max="<?php echo date("Y-m-d")?>" style="border-radius:20px;color:black;border:1px solid black;">
                            </h5>
                            <h5 class="text font-medium mr-auto">
                                To Date
                                <input type="date" id="t_date" name="t_date" class="form-control" value="<?php echo $to_date;?>"  min="1900-01-01" max="<?php echo date("Y-m-d")?>" style="border-radius:20px;color:black;border:1px solid black;">
                            </h5>
                            <div class="form-group mx-sm-3 mb-2">
                                <label>Status</label>
                                <select data-search="true" class="form-control tail-select w-full" id="statuss" name="statuss" style="border-radius:20px;color:black;border:1px solid black;">
                                    <option value='all'>All</option>
                                    <option value= 1 >verified</option>
                                    <option value= 0 >Unverified</option>
                                    <option value= 2 >Confirmed</option>

                                </select>
                            </div>

                            <?php
                            if($_COOKIE['role'] == 'Super Admin'){

                                ?>

                                <label>Branch</label>
                                <select data-search="true" class="form-control tail-select w-full" id="branch_nameS" name="branch_nameS" style="border-radius:20px;color:black;border:1px solid black;">
                                    <option value='all'>All</option>
                                    <?php

                                    $sqlDevice="SELECT * FROM `branch_profile`";
                                    $resultDevice=mysqli_query($conn,$sqlDevice);
                                    if(mysqli_num_rows($resultDevice) > 0)
                                    {
                                        while($rowDevice = mysqli_fetch_array($resultDevice)) {
                                            ?>

                                            <!-- <option value='<?php //echo $rowDevice['branch_name'];?>' ><?php //echo strtoupper($rowDevice['branch_name']);?></option> -->
                                            <option value='<?php echo $rowDevice['branch_id'];?>' ><?php echo $rowDevice['branch_name'];?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                                <?php
                            }
                            ?>


                            <div class="form-group mx-sm-3 mb-2">

                                <input type="text" class="form-control" placeholder="Search By Mobile" name="search" id="search" style="border-radius:20px;color:black;border:1px solid black;">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>

                        <?php
                        if($_COOKIE['role'] != 'Super Admin'){


                            ?>
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#career_list" style="margin-left: 20px;" onclick="addTitle()">ADD</button>
                            <?php
                        }
                        ?>


                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table table-responsive-md" style="text-align: center;">
                            <thead>
                            <tr>
                                <th class="width80"><strong>#</strong></th>
                                <th><strong>Donation Date</strong></th>
                                <th><strong>Doner Name</strong></th>
                                <th><strong>Doner Type</strong></th>
                                <th><strong>Pan No</strong></th>
                                <th><strong>Mobile No</strong></th>
                                <th><strong>Amount</strong></th>
                                <th><strong>Donation Type</strong></th>
                                <th><strong>Transaction ID</strong></th>
                                <th><strong>Pay Mode</strong></th>
                                <th><strong>Emp Name</strong></th>
                                <th><strong>Branch</strong></th>
                                <th><strong>Receipt Type</strong></th>
<!--                                <th><strong>Batch Name</strong></th>-->
                                <!--<th><strong>Address</strong></th>-->
                                <th><strong>payment image</strong></th>
                                <th><strong>Status</strong></th>

                                <th><strong>Action</strong></th>

                            </tr>
                            </thead>
                            <?php
                            // if($search == "") {
                            //     $sql = "SELECT * FROM transaction ORDER BY id  LIMIT $start,10";
                            // }
                            // else {
                            //     $sql = "SELECT * FROM transaction WHERE doner_name = '$search' ORDER BY id  LIMIT $start,10";
                            // }

                            if($search == "" && $branch_nameS == "all" && $statuss == "all") {
                                $sql = "SELECT * FROM transaction WHERE id>0 AND date  BETWEEN '$from_date' AND '$to_date' $addedBranchSerach ORDER BY id  LIMIT $start,10";
                            }
                            else{
                                $sql = "SELECT * FROM transaction WHERE id > 0 AND date  BETWEEN '$from_date' AND '$to_date'$statussSql$branch_nameSSql$searchSql$addedBranchSerach ORDER BY id  LIMIT $start,10";
                            }
                            //
                            //                            elseif($search != "" && $branch_nameS == "all" && $statuss == "all") {
                            //                                $sql = "SELECT * FROM transaction WHERE mobile LIKE '%$search%' ORDER BY id  LIMIT $start,10";
                            //                            }
                            //                            elseif($search == "" && $branch_nameS != "all" && $statuss == "all") {
                            //                                $sql = "SELECT * FROM transaction WHERE branch_name = '$branch_nameS' ORDER BY id  LIMIT $start,10";
                            //                            }
                            //                            elseif($search == "" && $branch_nameS == "all" && $statuss != "all") {
                            //                                $sql = "SELECT * FROM transaction WHERE verify = '$statuss' ORDER BY id  LIMIT $start,10";
                            //                            }
                            //
                            //                            elseif($search != "" && $branch_nameS != "all" && $statuss == "all") {
                            //                                $sql = "SELECT * FROM transaction WHERE mobile LIKE '%$search%' AND branch_name = '$branch_nameS' ORDER BY id  LIMIT $start,10";
                            //                            }
                            //                            elseif($search != "" && $branch_nameS == "all" && $statuss != "all") {
                            //                                $sql = "SELECT * FROM transaction WHERE mobile LIKE '%$search%' AND verify = '$statuss' ORDER BY id  LIMIT $start,10";
                            //                            }
                            //                            elseif($search == "" && $branch_nameS != "all" && $statuss != "all") {
                            //                                $sql = "SELECT * FROM transaction WHERE branch_name = '$branch_nameS' AND verify = '$statuss' ORDER BY id  LIMIT $start,10";
                            //                            }
                            //                            else {
                            //                                $sql = "SELECT * FROM transaction WHERE mobile LIKE '%$search%' AND branch_name = '$branch_nameS' AND verify = '$statuss' ORDER BY id  LIMIT $start,10";
                            //                            }
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)>0) {
                            $sNo = $start;
                            while($row = mysqli_fetch_assoc($result)) {

                            $sNo++;
                            $img = $row['img'];
                            if($img == 1) {
                                $img_upload = "badge-success";
                                $img_modal = '#image_modal';
                            }
                            else {
                                $img_upload = "badge-danger";
                            }
                            $verify = $row["verify"];
                            if($verify == 1){
                                $verfied_content = "verified";
                            }
                            elseif(($verify == 0)){
                                $verfied_content = "unverified";
                            }
                            elseif(($verify == 2)){
                                $verfied_content = "confirmed";
                            }

                            $pay_mode = $row["pay_mode"];
//                            if($pay_mode == 'online'){
//                                $pay_type = "UPI/NEFT/IMPS";
//                            }
//                            else{
//                                $pay_type = "FIELD/CASH";
//                            }
                            //$date = $row['dob'];
                            //$dates = date('d-F-Y', strtotime($date));

                            //   $career_dates =   $row['career_date'];
                            //   $career_date =   date('d-F-Y');
                            $date = $row['date'];
                            $transaction_date = date('d-m-Y h:i:sa', strtotime($date));


                            $branchId = $row['branch_name'];
                            if($branchId == 'web'){
                                $branchNames = $branchId;
                            }
                            else{
                                $sqlbranchNames = "SELECT * FROM `branch_profile` WHERE branch_id='$branchId'";
                                $resultBranchNames = mysqli_query($conn, $sqlbranchNames);
                                if (mysqli_num_rows($resultBranchNames) > 0) {
                                    $rowBranchNames = mysqli_fetch_assoc($resultBranchNames);
                                    $branchNames = $rowBranchNames['branch_name'];
                                }
                                else{
                                    if($branchId == ''){
                                        $branchNames = 'NA';
                                    }
                                }
                            }


                            $staffId = $row['added_by'];
                            if($staffId == 'web'){
                                $added_byTable = $staffId;
                            }
                            else{
                                $sqlStaf = "SELECT * FROM `staff_profile` WHERE staff_id='$staffId'";
                                $resultStaf = mysqli_query($conn, $sqlStaf);
                                if (mysqli_num_rows($resultStaf) > 0) {
                                    $rowstaf = mysqli_fetch_assoc($resultStaf);

                                    $added_byTable = $rowstaf['staff_name'];
                                }
                                else {
                                    $sqlBr = "SELECT * FROM `branch_profile` WHERE branch_id='$staffId'";
                                    $resultBr = mysqli_query($conn, $sqlBr);
                                    if (mysqli_num_rows($resultBr) > 0) {
                                        $rowBr = mysqli_fetch_assoc($resultBr);
                                        $added_byTable = $rowBr['incharge'];
                                    }
                                    else{
                                        if($staffId == ''){
                                            $added_byTable = 'NA';
                                        }
                                    }
                                }
                            }


//                            $sqlbranchNames = "SELECT * FROM `branch_profile` WHERE branch_id='$branchId'";
//                            $resultBranchNames = mysqli_query($conn, $sqlbranchNames);
//                            if (mysqli_num_rows($resultBranchNames) > 0) {
//                                $rowBranchNames = mysqli_fetch_assoc($resultBranchNames);
//
//                                $branchNames = $rowBranchNames['branch_name'];
//
//                            }

                            //                            if($_COOKIE['role'] == 'Staff') {
                            //
                            //                                $sqlstaffid = "SELECT * FROM `staff_profile` WHERE staff_id='$staffId'";
                            //                                $resultstaffid = mysqli_query($conn, $sqlstaffid);
                            //                                if (mysqli_num_rows($resultstaffid) > 0) {
                            //                                    $rowstaff_name = mysqli_fetch_assoc($resultstaffid);
                            //
                            //                                    $added_by = $rowstaff_name['staff_name'];
                            //
                            //                                }
                            //                                $branch=$_COOKIE['branch_id'];
                            //
                            //                            }
                            //                            $branchId = $row['branch_name'];
                            //
                            //                       if ($_COOKIE['role'] == 'Admin' || $_COOKIE['role'] =='Super Admin') {
                            //                           $sqlbranchName = "SELECT * FROM `branch_profile` WHERE branch_id='$branchId'";
                            //                           $resultBranchName = mysqli_query($conn, $sqlbranchName);
                            //                           if (mysqli_num_rows($resultBranchName) > 0) {
                            //                               $rowBranchName = mysqli_fetch_assoc($resultBranchName);
                            //
                            //                               $added_by = $rowBranchName['incharge'];
                            //                               $branchNames = $rowBranchName['branch_name'];
                            //
                            //                           }
                            //                       }

                            $batchId = $row['batch_id'];
                            $doner_type = $row['doner_type'];

                            if($doner_type == ''){
                                $donerType = 'NA';
                            }
                            else{
                                $donerType = $doner_type;
                            }
                            $pan_no=$row['pan'];
                            if($pan_no == ''){
                                $pan = 'NA';
                            }
                            else{
                                $pan = $pan_no;
                            }

                            $sqlbatchName="SELECT * FROM `batch_profile` WHERE batch_id='$batchId'";
                            $resultbatchName=mysqli_query($conn,$sqlbatchName);
                            if(mysqli_num_rows($resultbatchName) > 0) {
                                $rowbatchName = mysqli_fetch_assoc($resultbatchName);

                                $batchName = $rowbatchName['batch_name'];

                            }
                            $transaction_id=$row['transaction_id'];
                            if($transaction_id == ''){
                                $transaction = 'NA';
                            }
                            else{
                                $transaction = $transaction_id;
                            }
                            $donation_type=$row['donation_type'];
                            if($donation_type == ''){
                                $donationType = 'General';
                            }
                            else{
                                $donationType = $donation_type;
                            }
                            ?>
                            <tbody>
                            <tr>
                                <td><strong><?php echo $sNo;?></strong></td>
                                <td> <?php echo $transaction_date?> </td>
                                <td style="text-transform: capitalize;"> <?php echo $row['doner_name']?> </td>
                                <td> <?php echo $donerType?> </td>
                                <td> <?php echo strtoupper($pan)?> </td>
                                <td> <?php echo $row['mobile']?> </td>
                                <td> <?php echo $row['amount']?> </td>
                                <td> <?php echo $donationType?> </td>
                                <td><?php echo strtoupper($transaction)?></td>
                                <td> <?php echo $pay_mode ?> </td>
                                <td> <?php echo $added_byTable?> </td>
                                <td> <?php echo $branchNames?> </td>
                                <td><?php echo $row['type'] ?></td>
<!--                                <td>--><?php //echo $batchName?><!--</td>-->

                                <!-- <td><?php //echo date('d-m-Y',strtotime($row['dob'])) ?></td> -->
                                <!-- <td><?php //echo date('d-m-Y',strtotime($row['date_of_joining'])) ?></td> -->


                                <td style="cursor: pointer">   <span class="badge badge-pill <?php echo $img_upload?> ml-2" data-toggle="modal" data-target="<?php echo $img_modal?>" onclick="imgModal('<?php echo $row['pay_id']; ?>')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                              <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                              <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                                            </svg>
                                        </span>
                                </td>
                                <td><?php echo $verfied_content ?></td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" data-toggle="modal" data-target="#career_list" style="cursor: pointer" onclick="editTitle('<?php echo $row['pay_id'];?>')">Edit</a>
                                            <a class="dropdown-item" style="cursor: pointer" onclick="delete_model('<?php echo $row['pay_id'];?>')">Delete</a>



                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } }
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
                                        <li class="page-item page-indicator"><a class="page-link"
                                                                                href="?page_no=<?php echo 1 ?>&search=<?php echo $search ?>&branch_nameS=<?php echo $branch_nameS ?>&statuss=<?php echo $statuss ?>"><i
                                                        class="la la-angle-double-left"  style="padding-top: 9px;"></i></a></li>
                                        <?php
                                    }
                                    if($prevPage==0)
                                    {
                                        ?>
                                        <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0);"><i class="la la-angle-left"></i></a></li>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $prevPage?>&search=<?php echo $search ?>&branch_nameS=<?php echo $branch_nameS ?>&statuss=<?php echo $statuss ?>"><i class="la la-angle-left"></i></a></li>
                                        <?php
                                    }

                                    if($search == "" && $branch_nameS == "all" && $statuss == "all") {
                                        $sql = "SELECT COUNT(id) as count FROM transaction WHERE id>0 AND date  BETWEEN '$from_date' AND '$to_date'$addedBranchSerach";
                                    }
                                    else{
                                        $sql = "SELECT COUNT(id) as count FROM transaction WHERE id > 0 AND date  BETWEEN '$from_date' AND '$to_date'$statussSql$branch_nameSSql$searchSql$addedBranchSerach";
                                    }

                                    // $sql = 'SELECT COUNT(id) as count FROM transaction;';
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
                                                                                               href="?page_no=<?php echo $i ?>&search=<?php echo $search ?>&branch_nameS=<?php echo $branch_nameS ?>&statuss=<?php echo $statuss ?>"><?php echo $i ?></a>
                                                </li>
                                                <?php
                                            }
                                        }

                                        $nextPage=$page+1;


                                        if($nextPage>$pageFooter)
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0);"><i class="la la-angle-right"></i></a></li>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $nextPage ?>&search=<?php echo $search ?>&branch_nameS=<?php echo $branch_nameS ?>&statuss=<?php echo $statuss ?>"><i class="la la-angle-right"></i></a></li>
                                            <?php
                                        }
                                        if($nextPage<$pageFooter)
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $pageFooter ?>&search=<?php echo $search ?>&branch_nameS=<?php echo $branch_nameS ?>&statuss=<?php echo $statuss ?>"><i class="la la-angle-double-right"></i></a></li>
                                            <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

        </div>





        <div class="modal fade" id="career_list"  data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">


                        <h5 class="modal-title" id="title">pay Details</h5>

                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">




                        <div class="basic-form" style="color: black;">
                            <form id="pay_form" autocomplete="off">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>Mobile *</label>
                                        <input type="number" class="form-control" placeholder="Mobile" id="mobile" name="mobile" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Doner Name *</label>
                                        <input type="text" class="form-control" placeholder="Doner Name" id="doner_name" name="doner_name" style="border-color: #181f5a;color: black">
                                        <input type="hidden" class="form-control"  id="api" name="api">
                                        <input type="hidden" class="form-control"  id="old_pa_id" name="old_pa_id">
                                        <input type="hidden" class="form-control"  id="doner_id" name="doner_id">
                                        <input type="hidden" class="form-control"  id="pay_id" name="pay_id">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Doner Type *</label>
                                        <select  class="form-control" id="doner_type" name="doner_type" style="border-color: #181f5a;color: black">
                                            <option value=''>Select Type</option>
                                            <option value='FRESH'>Fresh</option>
                                            <option value='LOGIN'>Login</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>D.O.B </label>
                                        <input type="date" max="<?php echo date("Y-m-d")?>" class="form-control" placeholder="DOB" id="dob" name="dob" style="border-color: #181f5a;color: black">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Alter Mobile </label>
                                        <input type="number" class="form-control" placeholder="Alter mobile" id="mobile1" name="mobile1" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Amount *</label>
                                        <input type="number" class="form-control" placeholder="amount" id="amount" name="amount" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Receipt Type</label>
                                        <select  class="form-control" id="type" name="type" style="border-color: #181f5a;color: black">
                                            <option value=''>Select Receipt Type</option>
                                            <option value='Normal'>Normal</option>
                                            <option value='80G'>80 G</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Pan No </label>
                                        <input type="text"  class="form-control" placeholder="Pan No" id="pan" name="pan" style="border-color: #181f5a;color: black; text-transform: uppercase;">
                                    </div>

                                    <!--                                    <input type="text" class="form-control " id="email" onkeypress="return emailKey(event)" name="email" placeholder="example@gmail.com">-->
                                    <!--                                    <p id="vemail" class="required" style="color:red"></p>-->

                                    <div class="form-group col-md-12">
                                        <label>Address </label>
                                        <textarea class="form-control" placeholder="Address" id="address" name="address" cols="70" rows="4" style="border: 1px solid black;color: black;"></textarea>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Transaction ID *</label>
                                        <input type="text" class="form-control" placeholder="Transaction ID" id="transaction_id" name="transaction_id" style="border-color: #181f5a;color: black; text-transform: uppercase;">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Payment Mode</label>
                                        <select  class="form-control" id="pay_mode" name="pay_mode" style="border-color: #181f5a;color: black">
                                            <option value='upi'>UPI</option>
                                            <option value='neft'>NEFT</option>
                                            <option value='imps'>IMPS</option>
                                            <option value='field'>FIELD</option>
                                            <option value='cash'>CASH</option>
                                            <option value='netbanking'>NET BANKING</option>
                                        </select>
                                    </div>

                                    <?php

                                    $branchA= $_COOKIE['branch_id'];

                                    $sqlbranch = "SELECT * FROM `branch_profile` WHERE branch_id='$branchA'";
                                    $resultBranch = mysqli_query($conn, $sqlbranch);
                                    if (mysqli_num_rows($resultBranch) > 0) {
                                        $rowBranch = mysqli_fetch_assoc($resultBranch);

                                        $branch = $rowBranch['branch_name'];

                                    }

                                    $staffA= $_COOKIE['staff_id'];

                                    $sqlstaff = "SELECT * FROM `staff_profile` WHERE staff_id='$staffA'";
                                    $resultstaff = mysqli_query($conn, $sqlstaff);
                                    if (mysqli_num_rows($resultstaff) > 0) {
                                        $rowstaff = mysqli_fetch_assoc($resultstaff);

                                        $staff = $rowstaff['staff_name'];

                                    }
                                    else{

                                        $sqlbranchD = "SELECT * FROM `branch_profile` WHERE branch_id='$staffA'";
                                        $resultBranchD = mysqli_query($conn, $sqlbranchD);
                                        if (mysqli_num_rows($resultBranchD) > 0) {
                                            $rowBranchD = mysqli_fetch_assoc($resultBranchD);

                                            $staff = $rowBranchD['incharge'];

                                        }
                                    }


                                    ?>


                                    <div class="form-group col-md-6">
                                        <label>Emp Name</label>
                                        <input type="text" value="<?php echo $staff?>" readonly class="form-control" placeholder="Emp Name" id="added_by" name="added_by" style="border-color: #181f5a;color: black; text-transform: uppercase;">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Branch Name</label>
                                        <input type="text" value="<?php echo $branch?>" readonly class="form-control" placeholder="Branch Name" id="branch_name" name="branch_name" style="border-color: #181f5a;color: black; text-transform: uppercase;">
                                    </div>


                                    <!--                                    <div class="form-group col-md-12" >-->
                                    <!--                                        <label>Added By *</label>-->
                                    <!--                                        <select data-search="true" class="form-control tail-select w-full" id="added_by" name="added_by" style="border-color: #181f5a;color: black">-->
                                    <!---->
                                    <!--                                            --><?php
                                    //                                            $staffId_cookie = $_COOKIE['staff_id'];
                                    //                                            if($_COOKIE['role'] == 'Staff'){
                                    //                                                $sqlDevice="SELECT * FROM `staff_profile` WHERE access_status=1 AND staff_id='$staffId_cookie'";
                                    //
                                    //                                            }
                                    //                                            elseif ($_COOKIE['role'] == 'Admin'){
                                    //                                                $sqlDevice="SELECT * FROM `branch_profile` WHERE access_status=1 AND branch_id='$staffId_cookie'";
                                    //
                                    //                                            }
                                    //                                            else {
                                    //                                                $sqlDevice="SELECT * FROM `staff_profile` WHERE access_status=1";
                                    //
                                    //                                            }
                                    //                                            $resultDevice=mysqli_query($conn,$sqlDevice);
                                    //                                            if(mysqli_num_rows($resultDevice) > 0)
                                    //                                            {
                                    //
                                    //                                                while($rowDevice = mysqli_fetch_array($resultDevice)) {
                                    //                                                    if($_COOKIE['role'] == 'Staff'){
                                    //                                                        $adminsId = 'staff_id';
                                    //                                                    }
                                    //                                                    elseif ($_COOKIE['role'] == 'Admin'){
                                    //                                                        $adminsId = 'branch_id';
                                    //
                                    //                                                    }
                                    //                                                    if($_COOKIE['role'] == 'Staff'){
                                    //                                                        $adminsName = 'staff_name';
                                    //                                                    }
                                    //                                                    elseif ($_COOKIE['role'] == 'Admin'){
                                    //                                                        $adminsName = 'incharge';
                                    //
                                    //                                                    }
                                    //
                                    //
                                    //
                                    //                                                    ?>
                                    <!--                                                    <option value='--><?php //echo $rowDevice[$adminsId];?><!--' >--><?php //echo strtoupper($rowDevice[$adminsName]);?><!--</option>-->
                                    <!--                                                    --><?php
                                    //                                                }
                                    //                                            }
                                    //                                            ?>
                                    <!--                                        </select>-->
                                    <!--                                    </div>-->


                                    <!--                                    <div class="form-group col-md-12" >-->
                                    <!--                                    <label>Branch Name</label>-->
                                    <!--                                        <select data-search="true" class="form-control tail-select w-full" id="branch_name" name="branch_name" style="border-color: #181f5a;color: black">-->
                                    <!---->
                                    <!--                                            --><?php
                                    //                                            $branchId_cookie = $_COOKIE['branch_id'];
                                    //                                              if($branchId_cookie == ''){
                                    //                                                  $sqlDeviceB="SELECT * FROM `branch_profile`";
                                    //
                                    //                                              }
                                    //                                              else {
                                    //                                                  $sqlDeviceB="SELECT * FROM `branch_profile` WHERE branch_id='$branchId_cookie'";
                                    //
                                    //                                              }
                                    //                                            $resultDeviceB=mysqli_query($conn,$sqlDeviceB);
                                    //                                           if(mysqli_num_rows($resultDeviceB) > 0)
                                    //                                            {
                                    //                                                while($rowDeviceB = mysqli_fetch_array($resultDeviceB)) {
                                    //                                                    ?>
                                    <!--                                                    <option value='--><?php //echo $rowDeviceB['branch_id'];?><!--' >--><?php //echo strtoupper($rowDeviceB['branch_name']);?><!--</option>-->
                                    <!--                                            --><?php
                                    //                                                }
                                    //                                            }
                                    //                                            ?>
                                    <!--                                        </select>-->
                                    <!--                                    </div>-->

                                    <!--                                    <div class="form-group col-md-12" >-->
                                    <!--                                        <label>Branch Name</label>-->
                                    <!--                                        <select data-search="true" class="form-control tail-select w-full" id="branch_name" name="branch_name" style="border-color: #181f5a;color: black">-->
                                    <!--                                            <option value='--><?php //echo $rowDevice['branch_id'];?><!--' >--><?php //echo $_COOKIE['branch']; ?><!--</option>-->
                                    <!--                                        </select>-->
                                    <!--                                    </div>-->
                                    <div class="form-group col-md-6">
                                        <label for="upload_image">Image (1 MB)</label>
                                        <input type="file" class="form-control" placeholder="Upload Image" id="upload_image" name="upload_image" style="border-color: #181f5a;color: black" accept=".jpg,.jpeg">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Remark </label>
                                        <input type="text" class="form-control" placeholder="Remark" id="remark" name="remark" style="border-color: #181f5a;color: black">
                                    </div>

                                </div>


                            </form>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <?php
                        if($_COOKIE['role'] == 'Super Admin'){
                            ?>

                            <button type="button" class="btn btn-succes" id="verify_btn" onclick= "verify()" style="background-color: green; color: white;">Verify</button>
                            <?php
                        }
                        ?>
                        <?php
                        if($_COOKIE['role'] == 'Admin'){
                            ?>

                            <button type="button" class="btn btn-succes" id="confirm_btn" onclick= "confirm()" style="background-color: green; color: white;">Confirm</button>
                            <?php
                        }
                        ?>
                        <!-- <button type="button" class="btn btn-succes" id="add_btn" style="background-color: green; color: white;">Verify</button> -->
                        <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>
                        <button type="button" class="btn btn-primary" id="add_btn">ADD</button>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="modal fade" id="image_modal"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border: 1px solid transparent;">



                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="" style="width:100%" id="modal_images">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upload_excel"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border: 1px solid transparent;">


                    <h5 class="modal-title" id="title"></h5>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">




                    <div class="basic-form" style="color: black;">
                        <form id="itemProfileExcel" autocomplete="off">
                            <div class="form-row">


                                <!--                                                                <div class="form-group col-md-12" style="display: flex;justify-content: space-evenly;">-->
                                <!--                                                                    <a href="sample_upload.csv" download>-->
                                <!---->
                                <!--                                                                        <button type="button" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-download color-success"></i>-->
                                <!--                                                                        </span>Download</button>-->
                                <!--                                                                    </a>-->
                                <!--                                                                    <p style="margin-top: 9px;">Sample Excel File To Upload</p>-->
                                <!---->
                                <!--                                                                </div>-->

                                <div class="form-group col-md-12">
                                    <label>Upload Excel File (Extension Should Be .csv)</label>
                                    <input type="file" class="form-control"  type="file" name="file" id="excel_file" style="border-color: #181f5a;color: black">
                                </div>

                            </div>

                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>
                    <button type="button" class="btnn_excel_ajax btn btn-primary" id="btnn_excel_ajax">Upload</button>
                </div>
            </div>
        </div>
    </div>
    <?php Include ('../includes/footer.php') ?>



</div>

<script>
    function imgModal(src) {
        document.getElementById('modal_images').setAttribute("src",'pay_img/'+src+'.jpg');

    }

</script>

<script src="../vendor/global/global.min.js"></script>
<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../js/custom.min.js"></script>
<script src="../js/dlabnav-init.js"></script>
<script src="../vendor/owl-carousel/owl.carousel.js"></script>

<script src="../vendor/peity/jquery.peity.min.js"></script>

<!--<script src="../vendor/apexchart/apexchart.js"></script>-->

<script src="../js/dashboard/dashboard-1.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="../js/plugins-init/jquery.validate-init.js"></script>


<script src="../vendor/moment/moment.min.js"></script>
<script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>



<script src="../vendor/summernote/js/summernote.min.js"></script>
<script src="../js/plugins-init/summernote-init.js"></script>

<script src="../js/change.js"></script>

<script>
    const type = document.getElementById('type');
    // Add an event listener to the dropdown
    type.addEventListener('change', function () {
        a(type.value);
    });
    function a(values) {
        if (values === '80G') {
            // Show the input field for other selections
            document.getElementById('pan').classList.remove('ignore');


        }
        else {
            // Hide the input field when 'Hide Input Field' is selected
            document.getElementById('pan').className +=" ignore";
        }
    }


    var roll_cokkie =  getCookie('role');

    function addTitle() {
        $("#title").html("Add Transaction");
        $('#pay_form')[0].reset();
        $('#api').val("add1_api.php")
        // $('#game_id').prop('readonly', false);

        if(roll_cokkie == 'Super Admin'){
            document.getElementById('verify_btn').hidden = true;

        }
        else if(roll_cokkie == 'Admin'){
            document.getElementById('confirm_btn').hidden = true;

        }

        document.getElementById('upload_image').classList.remove('ignore');

        document.getElementById('transaction_id').disabled=false;
        document.getElementById('type').disabled = false;
        document.getElementById('mobile1').disabled = false;
        document.getElementById('remark').disabled = false;
        document.getElementById('doner_id').disabled = false;
        document.getElementById('added_by').disabled = false;
        document.getElementById('branch_name').disabled = false;
        document.getElementById('pay_mode').disabled = false;
        // document.getElementById('pan').disabled = true;
        document.getElementById('address').disabled = false;
        document.getElementById('amount').disabled = false;
        document.getElementById('mobile').disabled = false;
        document.getElementById('dob').disabled = false;
        document.getElementById('doner_type').disabled = false;
        document.getElementById('pay_id').disabled = false;
    }

    function editTitle(data) {

        $("#title").html("Edit Transaction- "+data);
        $('#pay_form')[0].reset();
        $('#api').val("edit_api.php");
        if(roll_cokkie == 'Super Admin'){
            document.getElementById('verify_btn').hidden = false;
        }
        else if(roll_cokkie == 'Admin'){
            document.getElementById('confirm_btn').hidden = false;

        }

        document.getElementById('upload_image').classList.add('ignore');
        $.ajax({

            type: "POST",
            url: "view_api.php",
            data: 'pay_id='+data,
            dataType: "json",
            success: function(res){
                if(res.status=='success')
                {
                    $("#pay_id").val(res.pay_id);
                    $("#transaction_id").val(res.transaction_id);
                    $("#doner_name").val(res.doner_name);
                    $("#doner_type").val(res.doner_type);
                    $("#dob").val(res.dob);
                    $("#mobile").val(res.mobile);
                    $("#amount").val(res.amount);
                    $("#address").val(res.address);
                    $("#pan").val(res.pan);
                    $("#pay_mode").val(res.pay_mode);
                    $("#branch_name").val(res.branch_name);
                    $("#added_by").val(res.added_by);
                    $("#doner_id").val(res.doner_id);
                    $("#remark").val(res.remark);
                    $("#mobile1").val(res.mobile1);
                    $("#type").val(res.type);

                    var verify_status=res.verify;


                    var login_role = "<?php echo $role ?>";
                    if(login_role == 'Staff') {
                        if (verify_status == 1) {
                            document.getElementById('transaction_id').disabled = true;
                            document.getElementById('type').disabled = true;
                            document.getElementById('mobile1').disabled = true;
                            document.getElementById('remark').disabled = true;
                            document.getElementById('doner_id').disabled = true;
                            document.getElementById('added_by').disabled = true;
                            document.getElementById('branch_name').disabled = true;
                            document.getElementById('pay_mode').disabled = true;
                            // document.getElementById('pan').disabled = true;
                            document.getElementById('address').disabled = true;
                            document.getElementById('amount').disabled = true;
                            document.getElementById('mobile').disabled = true;
                            document.getElementById('dob').disabled = true;
                            document.getElementById('doner_type').disabled = true;
                            document.getElementById('pay_id').disabled = true;
                        }
                    }

                    $("#old_pa_id").val(res.pay_id);
                    $("#pay_id").val(res.pay_id);

                    var edit_model_title = "Edit Transaction - "+data;
                    $('#title').html(edit_model_title);
                    $('#add_btn').html("Save");

                    $('#career_list').modal('show');

                }
                else if(res.status=='wrong')
                {
                    swal("Invalid",  res.msg, "warning")
                        .then((value) => {
                            window.window.location.reload();
                        });

                }
                else if(res.status=='failure')
                {
                    swal("Failure",  res.msg, "error")
                        .then((value) => {
                            window.window.location.reload();

                        });

                }
            },
            error: function(){
                swal("Check your network connection");

                window.window.location.reload();

            }

        });

    }



    //to validate form
    $("#pay_form").validate(
        {
            ignore: '.ignore',
            // Specify validation rules
            rules: {

                doner_name: {
                    required: true
                },
                doner_type: {
                    required: true
                },
                type: {
                    required: true
                },
                transaction_id: {
                    required: true
                },
                // address: {
                //     required: true
                // },

                mobile: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                mobile1: {
                    // required: true,
                    maxlength: 10,
                    minlength: 10
                },
                amount: {
                    required: true
                },

                pan: {
                    required: true,
                    maxlength: 10,
                    minlength: 10

                },
                pay_mode: {
                    required: true
                },
                branch_name: {
                    required: true
                },
                upload_image: {
                    required: true
                },
                added_by: {
                    required: true
                },




            },
            // Specify validation error messages
            messages: {
                doner_name: "*This field is required",
                doner_type: "*This field is required",
                type: "*This field is required",
                transaction_id: "*This field is required",
                // address: "*This field is required",

                mobile: {
                    required:"*This field is required",
                    maxlength:"*Mobile Number Should Be 10 Character",
                    minlength:"*Mobile Number Should Be 10 Character"
                },
                mobile1: {
                    // required:"*This field is required",
                    maxlength:"*Mobile Number Should Be 10 Character",
                    minlength:"*Mobile Number Should Be 10 Character"
                },
                pan: {
                    required:"*This field is required",
                    maxlength:"*pan Number Should Be 10 Character",
                    minlength:"*pan Number Should Be 10 Character"
                },
                amount: "*This field is required",
                //pan: "*This field is required",
                pay_mode: "*This field is required",
                branch_name: "*This field is required",
                added_by: "*This field is required",
                upload_image: "*This field is required",

            }
            // Make sure the form is submitted to the destination defined
        });

    //add data

    $('#add_btn').click(function () {

        $("#pay_form").valid();

        if ($("#pay_form").valid() == true) {

            var pan_number = document.getElementById("pan").value;

            var isValidPan = panValid(pan_number);
            console.log(isValidPan);

            if (isValidPan == 0) {

                var api = $('#api').val();
                var form = $("#pay_form");

                var formData = new FormData(form[0]);
                //formData.append("active_status",access_status);

                this.disabled = true;
                this.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
                $.ajax({

                    type: "POST",
                    url: api,
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (res) {
                        if (res.status == 'success') {
                            Swal.fire(
                                {
                                    title: "Success",
                                    text: res.msg,
                                    icon: "success",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                }
                            )
                                .then((value) => {
                                    window.window.location.reload();
                                });
                        } else if (res.status == 'failure') {

                            Swal.fire(
                                {
                                    title: "Failure",
                                    text: res.msg,
                                    icon: "warning",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                }
                            )
                                .then((value) => {

                                    document.getElementById("add_btn").disabled = false;
                                    document.getElementById("add_btn").innerHTML = 'Add';
                                });

                        }
                    },
                    error: function () {

                        Swal.fire('Check Your Network!');
                        document.getElementById("add_btn").disabled = false;
                        document.getElementById("add_btn").innerHTML = 'Add';
                    }

                });
            }
            else{
                Swal.fire('invalid pan No');
            }


        } else {
            document.getElementById("add_btn").disabled = false;
            document.getElementById("add_btn").innerHTML = 'Add';

        }


    });


    //
    //delete model

    function delete_model(data) {

        Swal.fire({
            title: "Delete",
            text: "Are you sure want to delete the record?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            closeOnClickOutside: false,
            showCancelButton: true,
            cancelButtonText: 'Cancel'
        })
            .then((value) => {
                if(value.isConfirmed) {

                    $.ajax({

                        type: "POST",
                        url: "delete_api.php",
                        data: 'pay_id='+data,
                        dataType: "json",
                        success: function(res){
                            if(res.status=='success')
                            {
                                Swal.fire(
                                    {
                                        title: "Success",
                                        text: res.msg,
                                        icon: "success",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();

                                    });
                            }
                            else if(res.status=='failure')
                            {
                                swal(
                                    {
                                        title: "Failure",
                                        text: res.msg,
                                        icon: "warning",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();
                                    });

                            }
                        },
                        error: function(){
                            swal("Check your network connection");

                        }

                    });

                }

            });

    }

    $( document ).ready(function() {
        $('#search').val('<?php echo $search;?>');
        $('#branch_nameS').val('<?php echo $branch_nameS;?>');
        $('#statuss').val('<?php echo $statuss;?>');
        $('#f_date').val('<?php echo $f_date;?>');
        $('#t_date').val('<?php echo $t_date;?>');

    });

    function verify() {

        Swal.fire({
            title: "Verify",
            text: "Are you sure want to verify the record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            closeOnClickOutside: false,
            showCancelButton: true,
            cancelButtonText: 'Cancel'
        })
            .then((value) => {
                if(value.isConfirmed) {
                    var pay_id = document.getElementById("pay_id").value;
                    var doner_id = document.getElementById("doner_id").value;
                    $.ajax({

                        type: "POST",
                        url: "verify_api.php",
                        data: 'pay_id='+pay_id+'&doner_id='+doner_id,
                        dataType: "json",
                        success: function(res){
                            if(res.status=='success')
                            {
                                Swal.fire(
                                    {
                                        title: "Success",
                                        text: res.msg,
                                        icon: "success",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();

                                    });
                            }
                            else if(res.status=='failure')
                            {
                                swal(
                                    {
                                        title: "Failure",
                                        text: res.msg,
                                        icon: "warning",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();
                                    });

                            }
                        },
                        error: function(){
                            swal("Check your network connection");

                        }

                    });
                }
            });

    }
    //confirm ajax
    function confirm() {

        Swal.fire({
            title: "Confirm",
            text: "Are you sure want to Ccnfirm the record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            closeOnClickOutside: false,
            showCancelButton: true,
            cancelButtonText: 'Cancel'
        })
            .then((value) => {
                if(value.isConfirmed) {
                    var pay_id = document.getElementById("pay_id").value;
                    var doner_id = document.getElementById("doner_id").value;
                    $.ajax({

                        type: "POST",
                        url: "confirm_api.php",
                        data: 'pay_id='+pay_id+'&doner_id='+doner_id,
                        dataType: "json",
                        success: function(res){
                            if(res.status=='success')
                            {
                                Swal.fire(
                                    {
                                        title: "Success",
                                        text: res.msg,
                                        icon: "success",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();

                                    });
                            }
                            else if(res.status=='failure')
                            {
                                swal(
                                    {
                                        title: "Failure",
                                        text: res.msg,
                                        icon: "warning",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();
                                    });

                            }
                        },
                        error: function(){
                            swal("Check your network connection");

                        }

                    });
                }
            });

    }
    //if pay mode is offline img field not mandatory
    $('#pay_mode').on('change', function() {
        if(this.value == 'offline'){
            document.getElementById('upload_image').classList.add('ignore');
        }
        else{
            document.getElementById('upload_image').classList.remove('ignore');
        }

    });




    function panValid(pan){
        let isValid = 0;

        for(let i =0;i<pan.length;i++){

            let changeIntoNumber = Number(pan[i]);

            if(i == 0){
                if(!isNaN(changeIntoNumber)){
                    isValid = 1;

                }
            }


            if(i == 9){
                if(!isNaN(changeIntoNumber)){
                    isValid = 1;

                }
            }

        }
        if(isValid == 0){
            console.log("pan valid");
            return 0;
        }
        else {
            console.log("pan Not valid");
            return 1;
        }

    }



    $("#mobile").keyup(function(){
        let num = this.value;

        if(num.length == 10){

            $.ajax({

                type: "POST",
                url: "mobile_api.php",
                data: 'mobile_num='+num,
                dataType: "json",
                success: function(res){
                    if(res.status=='success')
                    {
                        $("#doner_name").val(res.doner_name);
                        // $("#doner_type").val(res.doner_type);
                        //$("#mobile").val(res.mobile);
                        $("#address").val(res.address);
                        $("#pan").val(res.pan);


                    }
                    else if(res.status=='wrong')
                    {

                    }
                    else if(res.status=='failure')
                    {


                    }
                },
                error: function(){


                }

            });

        }


    });

    $(document).on("click", ".excel_download", function () {
        window.location.href = "excel_download.php?search=<?php echo $search?>&branch_nameS=<?php echo $branch_nameS?>&batch_ids=<?php echo $batch_ids?>&statuss=<?php echo $statuss?>";
    });



    //to validate form
    $("#itemProfileExcel").validate(
        {
            ignore: '.ignore',
            // Specify validation rules
            rules: {

                file: {
                    required: true
                },

            }
            // Make sure the form is submitted to the destination defined
        });

    $(document).on("click", ".btnn_excel_ajax", function () {

        $("#itemProfileExcel").valid();
        if($("#itemProfileExcel").valid()==true) {
            this.disabled = true;
            this.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

            var file_data = $('#excel_file').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: 'excel_insert.php', // point to server-side PHP script
                dataType: 'json',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    if (res.status == 'success') {
                        Swal.fire(
                            {
                                title: "Success",
                                text: res.msg,
                                icon: "success",
                                button: "OK",
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                closeOnClickOutside: false,
                            }
                        )
                            .then((value) => {
                                window.window.location.reload();

                            });
                    } else if (res.status == 'failure') {
                        Swal.fire(
                            {
                                title: "Failure",
                                text: res.msg,
                                icon: "warning",
                                button: "OK",
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                closeOnClickOutside: false,
                            }
                        )
                            .then((value) => {
                                window.window.location.reload();
                            });

                    }
                },
                error: function () {
                    Swal.fire("Check your network connection");
                    document.getElementById("btnn_excel_ajax").disabled = false;
                    document.getElementById("btnn_excel_ajax").innerHTML = 'Upload';
                }

            });
        }
        else {
            document.getElementById("btnn_excel_ajax").disabled = false;
            document.getElementById("btnn_excel_ajax").innerHTML = 'Upload';

        }


    });

</script>


</body>
</html>