<?php
require_once 'excel_generator/PHPExcel.php';
Include("../includes/connection.php");



$search= $_GET['search'];
$branch_nameS= $_GET['branch_nameS']== ''?"all":$_GET['branch_nameS'];
$batch_ids= $_GET['batch_ids']== ''?"all":$_GET['batch_ids'];
$statuss= $_GET['statuss']== ''?"all":$_GET['statuss'];

if($statuss != "all"){
    $statussSql= " AND verify = '".$statuss."'";

}
else{
    $statussSql ="";
}

if($batch_ids != "all"){
    $batch_idsSql= " AND batch_id = '".$batch_ids."'";

}
else{
    $batch_idsSql ="";
}

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

//Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Mark Baker")
    ->setLastModifiedBy("Mark Baker")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

// Add some data
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->mergeCells('A1:Q1');
//$objPHPExcel->getActiveSheet()->mergeCells('A2:P2');

$objPHPExcel->getActiveSheet()->setCellValue('A2', '#');
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Doner Id');
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'Date Time');
$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Doner Name');
//$objPHPExcel->getActiveSheet()->setCellValue('D2', '');
$objPHPExcel->getActiveSheet()->setCellValue('E2', 'Doner Type');
$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Date Of Birth');
$objPHPExcel->getActiveSheet()->setCellValue('G2', 'Pan No');
$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Mobile No');
$objPHPExcel->getActiveSheet()->setCellValue('I2', 'Amount');
//$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Payment ID');
$objPHPExcel->getActiveSheet()->setCellValue('J2', 'Pay Mode');
$objPHPExcel->getActiveSheet()->setCellValue('K2', 'Emp Name');
$objPHPExcel->getActiveSheet()->setCellValue('L2', 'Branch Name');
$objPHPExcel->getActiveSheet()->setCellValue('M2', 'Batch Name');
$objPHPExcel->getActiveSheet()->setCellValue('N2', 'Address');
$objPHPExcel->getActiveSheet()->setCellValue('O2', 'Transaction_ID');
$objPHPExcel->getActiveSheet()->setCellValue('P2', 'Status');
$objPHPExcel->getActiveSheet()->setCellValue('Q2', 'Type');
if($_COOKIE['role'] == 'Super Admin'){
    $objPHPExcel->getActiveSheet()->setCellValue('R2', 'Remark');
}



$i = 0;

if($search == "" && $branch_nameS == "all" && $statuss == "all" && $batch_ids =="all") {
    $sql = "SELECT * FROM transaction WHERE id>0 $addedBranchSerach ";
}
else{
    $sql = "SELECT * FROM transaction WHERE id > 0 $statussSql$batch_idsSql$branch_nameSSql$searchSql$addedBranchSerach ";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
    $sNo = $i;
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

        $staffId = $row['added_by'];
        $branchId = $row['branch_name'];


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
        }

        $sqlbranchNames = "SELECT * FROM `branch_profile` WHERE branch_id='$branchId'";
        $resultBranchNames = mysqli_query($conn, $sqlbranchNames);
        if (mysqli_num_rows($resultBranchNames) > 0) {
            $rowBranchNames = mysqli_fetch_assoc($resultBranchNames);

            $branchNames = $rowBranchNames['branch_name'];

        }
        $batchId = $row['batch_id'];


        $sqlbatchName="SELECT * FROM `batch_profile` WHERE batch_id='$batchId'";
        $resultbatchName=mysqli_query($conn,$sqlbatchName);
        if(mysqli_num_rows($resultbatchName) > 0) {
            $rowbatchName = mysqli_fetch_assoc($resultbatchName);

            $batchName = $rowbatchName['batch_name'];

        }

        $date =  $row['date'];
        $doner_name =  $row['doner_name'];
        $doner_type =  $row['doner_type'];
        $doner_id =  $row['doner_id'];
        $dob=  $row['dob'];
        $pan_no =  $row['pan'];
        $mobile_no =  $row['mobile'];
        $amount =  $row['amount'];
        $pay_id =  $row['pay_id'];
        $pay_mode =  $row['pay_mode'];
        // $added_by =  $rowvalue['date'];
        //$branch_name =  $rowvalue['date'];
        //$batch_name =  $rowvalue['date'];
        $address =  $row['address'];
        $transaction_id =  $row['transaction_id'];
        $type =  $row['type'];
        $remark =  $row['remark'];
        $added_byTable;
        $branchNames;
        $batchName;
//                $staffId = $rowvalue['added_by'];
//                $branchId = $rowvalue['branch_name'];
//                $batchId = $rowvalue['batch_id'];




        $i++;

        $objPHPExcel->getActiveSheet()->setCellValue('A' . ($i + 2) , ($i));
        $objPHPExcel->getActiveSheet()->setCellValue('B' . ($i + 2) , ($doner_id));
        $objPHPExcel->getActiveSheet()->setCellValue('C' . ($i + 2) ,$date);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . ($i + 2) ,$doner_name);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . ($i + 2) ,$doner_type);
//                $objPHPExcel->getActiveSheet()->setCellValue('E' . ($i + 2) ,$doner_id);
        $objPHPExcel->getActiveSheet()->setCellValue('F' . ($i + 2) ,$dob);
        $objPHPExcel->getActiveSheet()->setCellValue('G' . ($i + 2) ,$pan_no);
        $objPHPExcel->getActiveSheet()->setCellValue('H' . ($i + 2) ,$mobile_no);
        $objPHPExcel->getActiveSheet()->setCellValue('I' . ($i + 2) ,$amount);
//                $objPHPExcel->getActiveSheet()->setCellValue('H' . ($i + 2) ,$pay_id);
        $objPHPExcel->getActiveSheet()->setCellValue('J' . ($i + 2) ,$pay_mode);
        $objPHPExcel->getActiveSheet()->setCellValue('K' . ($i + 2) ,$added_byTable);
        $objPHPExcel->getActiveSheet()->setCellValue('L' . ($i + 2) ,$branchNames);
        $objPHPExcel->getActiveSheet()->setCellValue('M' . ($i + 2) ,$batchName);
        $objPHPExcel->getActiveSheet()->setCellValue('N' . ($i + 2) ,$address);
        $objPHPExcel->getActiveSheet()->setCellValue('O' . ($i + 2) ,$transaction_id);
        $objPHPExcel->getActiveSheet()->setCellValue('P' . ($i + 2) ,$verfied_content);
        $objPHPExcel->getActiveSheet()->setCellValue('Q' . ($i + 2) ,$type);

        if($_COOKIE['role'] == 'Super Admin'){
            $objPHPExcel->getActiveSheet()->setCellValue('R' . ($i + 2) ,$remark);
        }

        //  }
    }
}


//echo $_SERVER["DOCUMENT_ROOT"];

$objPHPExcel->getActiveSheet()->setCellValue('A1'," Transaction");
//$objPHPExcel->getActiveSheet()->setCellValue('A2');
$objPHPExcel->getActiveSheet()
    ->getStyle('A1')
    ->getAlignment()
    ->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

//$objPHPExcel->getActiveSheet()
//    ->getStyle('A2')
//    ->getAlignment()
//    ->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()
    ->getStyle('A1')
    ->getFont()
    ->setSize(16)
    ->setBold(true);

//$objPHPExcel->getActiveSheet()
//    ->getStyle('A2')
//    ->getFont()
//    ->setSize(13)
//    ->setBold(true);


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');

$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
$objPHPExcel->getActiveSheet()
    ->getStyle('A2:B1')
    ->getProtection()->setLocked(
        PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
    );

function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => $color
        )
    ));
}

if($_COOKIE['role'] == 'Super Admin'){

    cellColor('A2:R2', '#181f5a');

    $objPHPExcel->getActiveSheet()
        ->getStyle('A2:R2')
        ->getFont()
        ->getColor()
        ->setRGB('FFFFFF');

    $objPHPExcel->getActiveSheet()
        ->getStyle('A2:R2')
        ->getFont()
        ->setSize(12)
        ->setBold(true);
}

cellColor('A2:Q2', '#181f5a');

$objPHPExcel->getActiveSheet()
    ->getStyle('A2:Q2')
    ->getFont()
    ->getColor()
    ->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()
    ->getStyle('A2:Q2')
    ->getFont()
    ->setSize(12)
    ->setBold(true);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
ob_clean();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($_SERVER["DOCUMENT_ROOT"].'/portal/transaction/transaction.csv');
sleep(1);

header('Content-type: application/octet-stream');
header("Content-Disposition: attachment; filename=transaction.csv");
readfile($_SERVER["DOCUMENT_ROOT"].'/portal/transaction/transaction.csv');

@unlink($_SERVER["DOCUMENT_ROOT"].'/portal/transaction/transaction.csv');

?>