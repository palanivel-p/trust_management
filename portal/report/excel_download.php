<?php
require_once 'excel_generator/PHPExcel.php';
Include("../includes/connection.php");

$f_date = $_GET['f_date'];
$t_date = $_GET['t_date'];
$search= $_GET['search'];
$branch_nameS= $_GET['branch_nameS']== ''?"all":$_GET['branch_nameS'];

if($f_date == ''){
    $f_date = date('Y-m-01');
}
if($t_date == ''){
    $t_date = date('Y-m-d');
}

$from_date = date('Y-m-d 00:00:00',strtotime($f_date));

$to_date = date('Y-m-d 23:59:59',strtotime($t_date));

$cookieStaffId = $_COOKIE['staff_id'];
$cookieBranch_Id = $_COOKIE['branch_id'];

if($_COOKIE['role'] == 'Super Admin'){
    $addedBranchSerach = '';
}
else {
    if ($_COOKIE['role'] == 'Admin'){
        $addedBranchSerach = "AND branch_name='$cookieBranch_Id'";

    }
    else{
        $addedBranchSerach = "AND added_by='$cookieStaffId' AND branch_name='$cookieBranch_Id'";

    }

}

// Create new PHPExcel object
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

$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');

$objPHPExcel->getActiveSheet()->setCellValue('A3', '#');
$objPHPExcel->getActiveSheet()->setCellValue('B3', 'Doner Name');
$objPHPExcel->getActiveSheet()->setCellValue('C3', 'Mobile No');
$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Pan No');
$objPHPExcel->getActiveSheet()->setCellValue('E3', 'Amount');
$objPHPExcel->getActiveSheet()->setCellValue('F3', 'Address');
$objPHPExcel->getActiveSheet()->setCellValue('G3', 'Payment Method');
$objPHPExcel->getActiveSheet()->setCellValue('H3', 'Branch Name');
$objPHPExcel->getActiveSheet()->setCellValue('I3', 'Date & Time');
$objPHPExcel->getActiveSheet()->setCellValue('J3', 'Emp Name');



$i = 0;

if ($branch_nameS == 'all') {
    $sql = "SELECT * FROM transaction WHERE verify = 1 AND date  BETWEEN '$from_date' AND '$to_date' $addedBranchSerach ";

} else {
    $sql = "SELECT * FROM transaction WHERE verify = 1 AND branch_name ='$branch_nameS' AND date  BETWEEN '$from_date' AND '$to_date' $addedBranchSerach";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
    $sNo = $i;
    while($row = mysqli_fetch_assoc($result)) {

        $sNo++;

        $staffId = $row['added_by'];

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


        if($_COOKIE['role'] == 'Staff') {

            $sqlstaffid = "SELECT * FROM `staff_profile` WHERE staff_id='$staffId'";
            $resultstaffid = mysqli_query($conn, $sqlstaffid);
            if (mysqli_num_rows($resultstaffid) > 0) {
                $rowstaff_name = mysqli_fetch_assoc($resultstaffid);

                $added_by = $rowstaff_name['staff_name'];
                $staff_id = $rowstaff_name['staff_id'];


            }
            $branch=$_COOKIE['branch_id'];
            $sqlbranchName = "SELECT * FROM `branch_profile` WHERE branch_id='$branch'";
            $resultBranchName = mysqli_query($conn, $sqlbranchName);
            if (mysqli_num_rows($resultBranchName) > 0) {
                $rowBranchName = mysqli_fetch_assoc($resultBranchName);

                $added_by = $rowBranchName['incharge'];
                $branchName = $rowBranchName['branch_name'];

            }



        }
        $branchId = $row['branch_name'];

        if ($_COOKIE['role'] == 'Admin' || $_COOKIE['role'] =='Super Admin') {
            $sqlbranchName = "SELECT * FROM `branch_profile` WHERE branch_id='$branchId'";
            $resultBranchName = mysqli_query($conn, $sqlbranchName);
            if (mysqli_num_rows($resultBranchName) > 0) {
                $rowBranchName = mysqli_fetch_assoc($resultBranchName);

                $added_by = $rowBranchName['incharge'];
                $branchName = $rowBranchName['branch_name'];

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
        $added_byTable;
        $branchNames;
        $batchName;



        $i++;

        $objPHPExcel->getActiveSheet()->setCellValue('A' . ($i + 3), ($i));
        $objPHPExcel->getActiveSheet()->setCellValue('B' . ($i + 3), $doner_name);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . ($i + 3), $mobile_no);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . ($i + 3), $pan_no);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . ($i + 3), $amount);
        $objPHPExcel->getActiveSheet()->setCellValue('F' . ($i + 3), $address);
        $objPHPExcel->getActiveSheet()->setCellValue('G' . ($i + 3), $pay_mode);
        $objPHPExcel->getActiveSheet()->setCellValue('H' . ($i + 3), $branchNames);
        $objPHPExcel->getActiveSheet()->setCellValue('I' . ($i + 3), $date);
        $objPHPExcel->getActiveSheet()->setCellValue('J' . ($i + 3), $added_byTable);

    }

}

ob_clean();
$objPHPExcel->getActiveSheet()->setCellValue('A1'," Report");
$objPHPExcel->getActiveSheet()->setCellValue('A2');
$objPHPExcel->getActiveSheet()
    ->getStyle('A1')
    ->getAlignment()
    ->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()
    ->getStyle('A2')
    ->getAlignment()
    ->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()
    ->getStyle('A1')
    ->getFont()
    ->setSize(16)
    ->setBold(true);

$objPHPExcel->getActiveSheet()
    ->getStyle('A2')
    ->getFont()
    ->setSize(13)
    ->setBold(true);


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');

$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
$objPHPExcel->getActiveSheet()
    ->getStyle('A2:B2')
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

cellColor('A3:J3', '#181f5a');

$objPHPExcel->getActiveSheet()
    ->getStyle('A3:J3')
    ->getFont()
    ->getColor()
    ->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()
    ->getStyle('A3:J3')
    ->getFont()
    ->setSize(12)
    ->setBold(true);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($_SERVER["DOCUMENT_ROOT"].'/portal/report/report.csv');
sleep(1);

header('Content-type: application/octet-stream');
header("Content-Disposition: attachment; filename=report.csv");
readfile($_SERVER["DOCUMENT_ROOT"].'/portal/report/report.csv');

@unlink($_SERVER["DOCUMENT_ROOT"].'/portal/report/report.csv');



?>