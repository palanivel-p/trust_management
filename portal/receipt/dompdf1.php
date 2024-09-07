<?php

$name = $_GET['name'];
$mobile = $_GET['mobile'];
$mobile1 = $_GET['mobile1'];
$amount = $_GET['amount'];
$date = $_GET['date'];
$newDate = date("d-m-Y", strtotime($date));
$pan = $_GET['pan'];
$address = $_GET['address'];
$pay_mode = $_GET['pay_mode'];
$type = $_GET['type'];
$transaction_id = $_GET['transaction_id'];
$dob = $_GET['dob'];
$dobDate = date("d-m-Y", strtotime($dob));

//$sqldonerRecent = "SELECT * FROM doner_profile ORDER BY id DESC LIMIT 1";
//$resultdonerRecent = mysqli_query($conn, $sqldonerRecent);
//$rowdonerRecent = mysqli_fetch_assoc($resultdonerRecent);
//$lastTransAmount = $rowdonerRecent['doner_id'];


function getIndianCurrency($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

$numberIntoWords = getIndianCurrency($amount);
?>

<html>
<head>
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <style>
        * {
            margin:0;
            padding:0;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #printPdf{
            margin-top: 0px;
        }
        .headerPdf{
            margin-top: 13px;

        }
        .flex-container{
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
        }
        .flex-start{
            justify-content: flex-start;
        }
        .flex-end {
            justify-content: flex-end;
            /*margin-left: 55px;*/
        }
        .end{
            margin-bottom: 25px;
        }
        .s{
            margin-top: 0px;margin-left: 0px;
            /*background-image: url('../images/re.png');*/
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /** {*/
        /*    box-sizing: border-box;*/
        /*}*/

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 130px; /* Should be removed. Only for demonstration */
            margin-top: 15px;
        }
        .columnl {
            float: left;
            width: 65%;
            padding: 10px;
            height: 50px; /* Should be removed. Only for demonstration */
        }
        .columnp {
            float: left;
            width: 35%;
            padding: 10px;
            height: 50px; /* Should be removed. Only for demonstration */
        }
        .columnr {
            float: left;
            width: 100%;
            padding: 10px;
            height: 100px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .headerContS{
            margin-top: 65px;
        }

    </style>
</head>

<body>
<div id="printPdf" style="border: 7px solid #ff2e74; height:80%; margin-right:8px;">
    <div class="headerPdf flex-container">

        <div class="headerCont flex-start" style="margin-left: 25px;">
            <h3 style="margin-bottom: 10px; margin-top: 20px; color: #f5256a;">GOD'S CHILDREN CHARITABLE TRUST</h3>
            <h5 style="line-height: 1.6"><strong>(Regn No:397/2023, PAN NO.AAETG4496J)</strong></h5>
            <h5 style="line-height: 1.6"><strong>Address : No.63,Bajanai Kovil Street,</strong></h5>
            <h5 style="line-height: 1.6"><strong>Mandhanankuppam,Kolathur,Chennai - 600099.</strong></h5>
            <h5 style="line-height: 1.6"><strong>Mobile : 9401522338 / 7810022997</strong></h5>
            <h5 style="line-height: 1.6"><strong>Email - gcctchennai@gmail.com | Website - www.gcct.in</strong></h5>
        </div>
        <div class="pdfLogo flex-end" style="margin-left: 35px;margin-top: 20px;">
            <img src="../images/god_logo.jpeg" style="height: 120px;width: 120px;">
        </div>
    </div>
    <!--    <hr style="margin-top: 18px;">-->
    <!-- main content-->
    <div>
        <div class="mainContent_pdf s row" style="margin-top: 30px;">
            <h2 style="margin-left: 160px; margin-bottom: 20px;"><span style="border-bottom: 1px solid black!important;">DONATION RECEIPT</span></h2>
            <!--        <h3 style="text-align: center;">Donation Receipt</h3>-->

            <!--left side data-->
            <div class="left columnl">

                <div>
                    <h3 style="margin-top: 9px;display: inline-block;">Receipt No: </h3><strong style="border-bottom: 1px dashed black;"> <?php echo strtoupper($lastTransAmount)?></strong>

                </div>
            </div>

            <div class="right columnp">
                <div style="display: flex;justify-content: space-between; margin-top: 7px; margin-right: 62px">
                    <h3>Date: </h3><strong style="border-bottom: 1px dashed black; margin-top: 2px;"><?php echo date("d-m-Y");?></strong>
                </div>
            </div>
            <div class="left columnr">

                <div>
                    <p style="margin-top: 9px;display: inline-block;font-family: 'Poppins', sans-serif;">Donor Name : </p><strong style="border-bottom: 1px dashed black;"> <?php echo strtoupper($name)?></strong>
                </div>
                <div>
                    <p style="margin-top: 9px;display: inline-block;font-family: 'Poppins', sans-serif;"> Amount (in words) :</p><strong style="border-bottom: 1px dashed black;"> <?php echo $numberIntoWords?></strong>
                </div>
                <div style="width: 500px; margin-top: 9px; word-wrap: break-word;font-family: 'Poppins', sans-serif;">
                    <p style="display: inline-block;">Address :</p>
                    <strong style="border-bottom: 1px dashed black;"><?php echo strtoupper($address)?></strong>
                </div>

            </div>


            <div class="left column">
                <div style="font-family: 'Poppins', sans-serif;">
                    <p style="margin-top: 9px;display: inline-block;">Mobile No :</p> <strong style="border-bottom: 1px dashed black;"><?php echo $mobile?></strong>
                </div>

                <div style="margin-top: 9px; font-family: 'Poppins', sans-serif;">
                    <p style="display: inline-block;">Donation Date :</p><strong style="border-bottom: 1px dashed black;"> <?php echo $newDate?></strong>
                </div>

                <?php
                if($type == '80G'){
                    ?>
                    <div style="margin-top: 9px; font-family: 'Poppins', sans-serif;">
                        <p style="display: inline-block;">Pan No :</p>
                        <strong style="border-bottom: 1px dashed black;"><?php echo strtoupper($pan)?></strong>
                    </div>
                    <br>
                    <?php
                }
                ?>

            </div>

            <!--Right side data-->
            <div class="right column">

                <div style="font-family: 'Poppins', sans-serif;">
                    <p style="margin-top: 9px;display: inline-block;">Alternate No :</p> <strong style="border-bottom: 1px dashed black;"><?php echo $mobile1?></strong>

                </div>

                <div style="font-family: 'Poppins', sans-serif;">
                    <p style="margin-top: 9px; display: inline-block;">Payment Mode :</p> <strong style="border-bottom: 1px dashed black;"> <?php echo strtoupper($pay_mode)?></strong>
                </div>

                <div style="font-family: 'Poppins', sans-serif;">
                    <p style="margin-top: 9px;display: inline-block;">Date of Birth :</p> <strong style="border-bottom: 1px dashed black;"><?php echo $dobDate?></strong>
                </div>

            </div>
            <div style="width: 570px; margin-top: 1px;" class="end">
                <p style="word-wrap: break-word;margin-top: 5px; text-align: center ;font-family: 'Poppins', sans-serif; font-weight: 400">Thank you very much to support<strong> GOD'S CHILDREN CHARITABLE TRUST </strong>to give a better life to the orphan childern's who are greatly in need.</p>

            </div>

            <div class="left column">
                <p style="margin-top: 20px!important; font-family: 'Great Vibes', cursive; font-size: 25px;">Helping orphaned children is a reflection of these values and a commitment to ensuring that all children have a chance at a better life.

                </p>

            </div>

            <!--Right side data-->
            <div class="right column">

                <div style="display: flex;justify-content: end; margin-right: 10px; margin-bottom:30px!important; margin-top: 28px!important;">

                    <p>For <strong>God's Children Charitable Trust</strong></p>
                </div>

                <div style="display: flex;justify-content: end; margin-right: 10px; height:50px !important;">
                    <img src="../images/Signature1.png">
                </div>

                <div style="display: flex;justify-content: end; margin-right: 10px; margin-bottom:30px!important; margin-top: 10px!important;">

                    <h5>Authorized Signatory</h5>
                </div>
            </div>

        </div>
        <!--        <div style="width: 550px; margin-top: 1px;" class="end">-->
        <!--            <p style="word-wrap: break-word;margin-top: 5px; text-align: center">Thank you very much to support<strong> GODS CHILDREN CHARITABLE TRUST </strong>to give a better life to the destitute and orphan childern's who are greatly need.</p>-->
        <!---->
        <!--        </div>-->

        <!--      <div>-->
        <!--        <div style="display: flex;justify-content: end; margin-right: 10px; margin-bottom:30px!important; margin-top: 20px!important;">-->
        <!---->
        <!--            <h5>For God's Children Charitable Trust</h5>-->
        <!--        </div>-->
        <!---->
        <!--        <div style="display: flex;justify-content: end; margin-right: 10px; height:50px !important;">-->
        <!--            <img src="../images/Signature1.png">-->
        <!--        </div>-->
        <!---->
        <!--        <div style="display: flex;justify-content: end; margin-right: 10px; margin-bottom:30px!important; margin-top: 10px!important;">-->
        <!---->
        <!--            <h5>Authorized Signatory</h5>-->
        <!--        </div>-->
        <!--      </div>-->
    </div>
    <!--    <hr style="margin-top: 10px;">-->
    <!--footer-->
    <div class="headerContS flex-center">

        <h5 style="text-align: center;"><strong>Our Social Activities :</strong></h5>
        <h5 style="text-align: center;"><strong>Child Hospitalization | Children Education | Donate Food for Orphanage Child Home</strong></h5>
        <h5 style="text-align: center; margin-bottom: 30px!important;"><strong>Hospitalization Support : Open Heart Surgery | Cancer Treatment | Kidney Treatment & Dialysis</strong></h5>
    </div>


</div>

<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
<script>
    //
    //     var element = document.getElementById('printPdf');
    //         html2pdf(element);

    let timesPdf = 0;

    if(timesPdf == 0){
        var element = document.getElementById('printPdf');

        useCORS: true;
        var opt = {
            margin:       0.9,
            filename:     'reciept.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2,useCORS: true },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();

        //  Old monolithic-style usage:
        // html2pdf(element, opt);

        timesPdf+=1;
    }

    setTimeout(() => {
        window.location.href = "https://donatecrp.in/portal/receipt";
    }, 800);


</script>

</body>
</html>