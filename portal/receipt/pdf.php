<?php

$name = $_GET['name'];
$pay_id = $_GET['pay_id'];
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
if($dobDate== '30-11--0001'){
    $dobDate='Nill';
}

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Yellowtail&family=Yesteryear&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        * {
            margin:0;
            padding:0;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #printPdf{
            margin-right: 5px;
            border-width:2px 3px 2px 2px;
            border-style: solid;
            border-color: #3c99e6;
        }
        .headerPdf{
            margin-top: 10px;

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
        .footer{
            background-color: #3C99E6;
        }
        .s{
            margin-top: 0px;margin-left: 0px;margin-right: 0px;
            background-image: url('../images/water mark2.png');

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
            font-family: Arial;
        }
        .columnl {
            float: left;
            width: 65%;
            padding: 10px;
            height: 50px; /* Should be removed. Only for demonstration */
            font-family: Arial;
        }
        .columnp {
            float: left;
            width: 35%;
            padding: 10px;
            height: 50px; /* Should be removed. Only for demonstration */
            font-family: Arial;
        }
        .columnr {
            float: left;
            width: 100%;
            padding: 10px;
            height: 100px; /* Should be removed. Only for demonstration */
            font-family: Arial;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .headerContS{
            margin-top: 15px;
        }
        .headline{
            font-family: 'Kanit', sans-serif;
            font-family: 'Yellowtail', cursive;
            font-family: 'Yesteryear', cursive;
            font-size:19px;
            background-color: #3C99E6;
            color: white;
            text-align: center;
            padding-bottom: 3px;
        }
        .left-div {
            /*background-color: #f0f0f0;*/
            padding: 20px;
        }

        .right-div {
            /*background-color: #e0e0e0;*/
            padding: 20px;
        }
        .container{
            font-family: Arial;
            margin-top: 70px;
        }
    </style>
</head>

<body>
<div id="printPdf" style="height:80%; margin-right:8px;">
    <div class="headerPdf flex-container">
        <div class="pdfLogo flex-start" style="margin-left: 8px;margin-top: 10px;">
            <img src="../images/final_logo.png" style="height: 150px;width: 150px;">
        </div>
        <div class="headerCont flex-end" style="margin-left: -20px;margin-top: 45px;font-family: 'Poppins', sans-serif;">
            <h2 style="margin-bottom: 10px; margin-top: 20px; color: #3c99e6;text-align: center;font-weight:bold">ANNAI TERESA CHARITABLE TRUST</span></h2>
            <h5 style="line-height: 1.6;text-align: center;"><strong>(Regn No: 322/2.7.2012 | PAN NO: AADTA5861C)</strong></h5>
            <?php
            if($type == '80G'){
                ?>
                <h5 style="line-height: 1.6;text-align: center;"><strong>Unique Regn No: AADTA5861CF20221</strong></h5>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="headline">
        <p>Your contribution will bring smiles to the faces of Children and comfort to heart of the elderly.</p>
    </div>
    <!-- main content-->
    <div>
        <div class="mainContent_pdf s row" style="margin-top: 15px;">
            <?php
            if($type == '80G'){
                ?>
                <h2 style="margin-left: 200px; margin-bottom: 10px;"><span style="border-bottom: 1px solid black!important;font-family: 'Poppins', sans-serif;">DONATION 80G RECEIPT</span></h2>
                <?php
            }else {
                ?>
                <h2 style="margin-left: 200px; margin-bottom: 10px;"><span style="border-bottom: 1px solid black!important;font-family: 'Poppins', sans-serif;">DONATION RECEIPT</span></h2>
                <?php
            }
            ?>
            <!--left side data-->
            <div class="left columnl">
                <div style="margin-left: 22px;">
                    <h4 style="margin-top: 9px;display: inline-block;">Receipt No: </h4><span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"> <?php echo strtoupper($pay_id)?></span>
                </div>
            </div>

            <div class="right columnp">
                <div style="display: flex;justify-content: space-around; margin-top: 7px; margin-right: 60px">
                    <h4>Date: </h4><span style="border-bottom: 1px dashed black; margin-top: 2px;font-family: 'Poppins', sans-serif;"><?php echo date("d-m-Y");?></span>
                </div>
            </div>

            <div class="left columnr">

                <div>
                    <p style="margin-top: 9px;display: inline-block;font-family: 'Poppins', sans-serif;margin-left: 25px;">Donor Name : </p><span  class="dname" style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"> <?php echo strtoupper($name)?></span>
                </div>
                <div>
                    <p style="margin-top: 13px;display: inline-block;font-family: 'Poppins', sans-serif;margin-left: 25px;">Amount (in Numbers) : ₹</p><span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"> <?php echo $amount?></span>
                </div>
                <div>
                    <p style="margin-top: 13px;display: inline-block;font-family: 'Poppins', sans-serif;margin-left: 25px;"> Amount (in words) :</p><span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"> <?php echo $numberIntoWords?></span>
                </div>
                <div style="width: 400px; margin-top: 13px; word-wrap: break-word;margin-left: 25px;">
                    <p style="display: inline-block;font-family: 'Poppins', sans-serif;">Address :</p>
                    <span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"><?php echo strtoupper($address)?></span>
                </div>

            </div>


            <div class="left column">
                <div style="margin-left: 25px;">
                    <p style="margin-top: 40px;display: inline-block;font-family: 'Poppins', sans-serif;">Mobile No :</p> <span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"><?php echo $mobile?></span>
                </div>

                <div style="margin-top: 13px;margin-left: 25px;">
                    <p style="display: inline-block;font-family: 'Poppins', sans-serif;">Email Id :</p><span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"> <?php echo ""?></span>
                </div>

                <?php
                if($type == '80G'){
                    ?>
                    <div style="margin-top: 13px;margin-left: 25px;">
                        <p style="display: inline-block;font-family: 'Poppins', sans-serif;">Pan No :</p>
                        <span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"><?php echo strtoupper($pan)?></span>
                    </div>
                    <br>
                    <?php
                }
                ?>

            </div>

            <!--Right side data-->
            <div class="right column">
                <div style="margin-left: 25px;">
                    <p style="margin-top: 40px;display: inline-block;font-family: 'Poppins', sans-serif;">Alternate No :</p> <span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"><?php echo $mobile1?></span>
                </div>

                <div style="margin-left: 25px;">
                    <p style="margin-top: 13px; display: inline-block;font-family: 'Poppins', sans-serif;">Payment Mode :</p> <span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"> <?php echo strtoupper($pay_mode)?></span>
                </div>

                <div style="margin-left: 25px;">
                    <p style="margin-top: 13px;display: inline-block; font-family: 'Poppins', sans-serif;">Date of Birth :</p> <span style="border-bottom: 1px dashed black;font-family: 'Poppins', sans-serif;"><?php echo $dobDate?></span>
                </div>
            </div>

            <div class="left column">
                <p style="margin-top: -2px!important;color:#3C99E6; font-family: 'Yesteryear', cursive;font-size: 25px;">Thank you for yopur compossionate support and for making a meaningful diffrent in the lines of both the Young and the Old</p>
            </div>


            <!--Right side data-->
            <div class="right column">
                <div style="display: flex;justify-content: end; margin-bottom:-5px;margin-top: 20px; margin-right: -20px; height:100px !important;">
                    <img src="../images/annai_signature.png">
                </div>
            </div>
        </div>
    </div>
    <!--    <hr style="margin-top: 10px;">-->

    <div class="container" style="background-color: #b1b1b1;overflow: hidden; width: 661px">
        <div class="row">
            <div class="col-md-6">
                <div class="left-div">
                    <!-- Content for the left side -->
                    <h4 style="border-bottom: 1px solid black;margin-bottom: 2px;width: 220px;">Annai Teresa Children Home</h4>
                    <p><span style= "color:#3c99e6;font-size: 16px;margin-top: 6px;" class="material-symbols-outlined">location_on</span>&nbsp;No.63,Bajanai Kovil Street,</p>
                    <p style= "margin-top: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mandhanankuppam,Kolathur,</p>
                    <p style= "margin-top: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chennai,Tamilnadu.</p>
                    <p style= "margin-top: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pincode-600099</p>
                    <p><span style= "color:#3c99e6;font-size: 16px;margin-top: 7px;" class="material-symbols-outlined">tty</span>&nbsp;+99-8939885777</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-div">
                    <h4 style="border-bottom: 1px solid black;margin-bottom: 2px;width: 215px;">Annai Teresa Old Age Home</h4>
                    <p><span style= "color:#3c99e6;font-size: 16px;margin-top: 6px;" class="material-symbols-outlined">location_on</span>&nbsp;No.47,Outer Circular Road,</p>
                    <p style= "margin-top: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kilpauk Garden Colony,kilpauk,</p>
                    <p style= "margin-top: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chennai,Tamilnadu.</p>
                    <p style= "margin-top: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pincode-600010</p>
                    <p><span style= "color:#3c99e6;font-size: 16px;margin-top: 7px;" class="material-symbols-outlined">tty</span>&nbsp;+99-9087822777</p>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php
    if($type == '80G'){
        ?>
        <div class="footer" style="padding-bottom: 15px;padding-top: 15px">
            <p style="word-wrap: break-word;margin-top: 0px; text-align: center ;font-family: 'Poppins', sans-serif; font-weight: 400">Note: You have donated to an organization which is offer tax-exemption U/S 80G of Income Tax Act 1961.</p>
        </div>
        <?php
    }
    ?>

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
            margin:       0.5,
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
        window.location.href = "https://atct.in/portal/receipt";
    }, 800);


</script>

</body>
</html>