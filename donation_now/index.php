<?php
Include("../includes/connection.php");
//$donation_id= $_GET['donation_id'];
//$amounts= $_GET['amount'];
//$donation_type= $_GET['donation_type'];


$donation_id = isset($_GET['donation_id']) ? htmlspecialchars($_GET['donation_id']) : '';
$amounts = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : '';
$donation_type = isset($_GET['donation_type']) ? htmlspecialchars($_GET['donation_type']) : '';
$amount_readonly = !empty($amounts) ? 'readonly' : '';
$donation_type_readonly = !empty($donation_type) ? 'readonly' : '';


$payment_status= $_GET['payment_status'];
$order_id= $_GET['order_id'];
$sqlOrder = "SELECT * FROM `transaction` WHERE `order_id` = '$order_id'";
$resOrder = mysqli_query($conn, $sqlOrder);
if(mysqli_num_rows($resOrder) > 0 ) {
    $rowOrder = mysqli_fetch_array($resOrder);
    $amount = $rowOrder['amount'];
    $orderStatus = $rowOrder['order_status'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Donate Now</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/Img/MS/fav-icon-original.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/Img/MS/fav-icon-original.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/Img/MS/fav-icon-original.png">
    <link rel="manifest" href="../assets/images/favicons/site.webmanifest">
    <meta name="description" content="Oxpins HTML 5 Template ">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="../assets/vendors/animate/custom-animate.css">
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendors/jarallax/jarallax.css">
    <link rel="stylesheet" href="../assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css">
    <link rel="stylesheet" href="../assets/vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="../assets/vendors/nouislider/nouislider.pips.css">
    <link rel="stylesheet" href="../assets/vendors/odometer/odometer.min.css">
    <link rel="stylesheet" href="../assets/vendors/swiper/swiper.min.css">
    <link rel="stylesheet" href="../assets/vendors/oxpins-icons/style.css">
    <link rel="stylesheet" href="../assets/vendors/tiny-slider/tiny-slider.min.css">
    <link rel="stylesheet" href="../assets/vendors/reey-font/stylesheet.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/vendors/bxslider/jquery.bxslider.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/vendors/vegas/vegas.min.css">
    <link rel="stylesheet" href="../assets/vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="../assets/vendors/timepicker/timePicker.css">

    <!-- template styles -->
    <link rel="stylesheet" href="../assets/css/oxpins.css">
    <link rel="stylesheet" href="../assets/css/oxpins-responsive.css">

    <style>
        .causes-one__img {
            width: 100%;
            height: 500px; /* Set a fixed height for the images */
            overflow: hidden;
            border-radius: 8px;
        }
        .causes-one__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .event-details__info {
            overflow: hidden; /* Ensures that any overflow is hidden */
            text-align: center; /* Center align the content within the div */
        }

        .event-details__info img {
            max-width: 100%; /* Ensures the image does not exceed the width of its container */
            height: auto; /* Maintains the aspect ratio of the image */
            display: inline-block; /* Centers the image within the div */
        }
        .donate-now {
            background-color: #eef2f5;
            padding: 40px 0;
            margin-top: -120px;
        }
        .become-volunteer-page__form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .become-volunteer-page__form .form-group label {
            font-weight: bold;
            color: #129fff;
        }
        .become-volunteer-page__form .form-group input,
        .become-volunteer-page__form .form-group select {
            border: 1px solid #129fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .become-volunteer-page__btn-box {
            margin-top: 30px;
        }
        .become-volunteer-page__btn-box .thm-btn {
            background-color: #129fff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s ease;
        }
        .become-volunteer-page__btn-box .thm-btn:hover {
            background-color: #129fff;
        }
    </style>
</head>

<body class="custom-cursor">

<!-- <div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div> -->





<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->


<div class="page-wrapper">
    <?php Include("../includes/header.php"); ?>


    <!--Page Header Start-->
    <section class="page-header" style="margin-top: 133px;">
        <div class="page-header-bg" style="background-image: url(../assets/Img/Donation1/Donation.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>/</span></li>
                    <li class="active">Donate now</li>
                </ul>
                <h2>Donate now</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <div class="gallery-one__top" style="margin-bottom: 0px;margin-top: 0px">
        <h3 class="gallery-one__top-title">DONATION INFO </h3>
    </div>
    <!--Donate Now Start-->
    <section class="donate-now" style="margin-top: 18px; padding: 40px 0; background-color: #eef2f5;">
        <div class="container" style="margin-top: -50px">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
<!--                    <h2 style="text-align: center; color: #181f5a; margin-bottom: 30px;">DONATION INFO</h2>-->
                    <div class="become-volunteer-page__right">
                        <form class="become-volunteer-page__form" id="contact-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>AMOUNT <span style="color: red">*</span></label>
                                    <input type="number" class="form-control" placeholder="Amount" name="amount" id="amount" value="<?php echo $amounts; ?>" <?php echo $amount_readonly; ?>>
                                    <input type="hidden" class="form-control" name="donation_id" id="donation_id" value="<?php echo $donation_id; ?>">
                                    <input type="hidden" class="form-control" name="general" id="general" value="general">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>DONATION TYPE <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Donation Type" name="donation_type" id="donation_type" value="<?php echo $donation_type; ?>" <?php echo $donation_type_readonly; ?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>NAME <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>MOBILE NO <span style="color: red">*</span></label>
                                    <input type="number" class="form-control" placeholder="Mobile Number" name="phone" id="phone" maxlength="10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>PAN NO <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Pan number" name="pan" id="pan" style="text-transform: uppercase;">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>EMAIL <span style="color: red">*</span></label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>TYPE</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value='Normal'>NORMAL</option>
                                        <option value='80G'>80G</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>NOTES</label>
                                    <input type="text" class="form-control" placeholder="Notes" name="notes" id="notes">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>ADDRESS <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" id="address">
                                </div>
                                <div class="become-volunteer-page__btn-box text-center">
                                    <button type="button" class="thm-btn contact-form__btn" id="submit_btn">Donate Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Become Volunteer Page Start-->
<!--<section class="become-volunteer-page" style="margin-top: -192px">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-6 col-lg-6">-->
<!--                <div class="become-volunteer-page__left">-->
<!--                    <div class="event-details__right">-->
<!--                        <div class="event-details__info">-->
<!--                            <div class="causes-one__single">-->
<!--                                <div class="causes-one__img">-->
<!--                                    <img class="volunteer-image" src="https://atct.in/assets/Img/Donation1/sbi_barcode.jpg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-6 col-lg-6">-->
<!--                <div class="become-volunteer-page__left">-->
<!--                    <div class="event-details__right">-->
<!--                        <div class="event-details__info">-->
<!--                            <div class="causes-one__single">-->
<!--                                <div class="causes-one__img">-->
<!--                                    <img class="volunteer-image" src="https://atct.in/assets/Img/Donation1/kotak_barcode.jpg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--Become Volunteer Page End-->
<section class="become-volunteer-page">
    <!-- <h2 class="section-title__title" style="text-align: center; margin-top: -175px">BANK DETAILS</h2> -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">
                    <div class="event-details__right">
                        <p class="section-title__tagline" style="text-align: center">SBI BANK</p>
                        <div class="event-details__info">
                            <img class="volunteer-image" src="https://atct.in/assets/Img/Donation1/sbi_bank.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">
                    <div class="event-details__right">
                        <p class="section-title__tagline" style="text-align: center">Kotak Mahindra Bank</p>
                        <div class="event-details__info">
                            <img class="volunteer-image" src="https://atct.in/assets/Img/Donation1/kotak_bank.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Become Volunteer Page Start-->
<section class="become-volunteer-page">
    <h2 class="section-title__title" style="text-align: center; margin-top: -175px">BANK DETAILS</h2>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">

                    <div class="event-details__right">
                        <p class="section-title__tagline" style="text-align: center">SBI BANK</p>
                        <div class="event-details__info">
                            <ul class="list-unstyled event-details__info-list">
                                <li>
                                    <p>Annai Teresa Foundation</p>
                                </li>
                                <li>
                                    <span>Account Number :</span>
                                    <p>42994608492</p>
                                </li>
                                <li>
                                    <span>Branch:</span>
                                    <p>Poomphuhar Nagar Branch</p>
                                </li>
                                <li>
                                    <span>IFSC Code :</span>
                                    <p>SBIN0012744</p>
                                </li>

                                <li>
                                    <span></span>
                                    <p></p>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">

                    <div class="event-details__right">
                        <p class="section-title__tagline" style="text-align: center">Kotak Mahindra Bank</p>
                        <div class="event-details__info">
                            <ul class="list-unstyled event-details__info-list">
                                <li>
                                    <p>Annai Teresa Foundation</p>
                                </li>
                                <li>
                                    <span>Account Number :</span>
                                    <p>9449257624</p>
                                </li>
                                <li>
                                    <span>Branch:</span>
                                    <p>Anna Nagar - Chennai</p>
                                </li>
                                <li>
                                    <span>IFSC Code :</span>
                                    <p>KKBK0008488</p>
                                </li>

                                <li>
                                    <span></span>
                                    <p></p>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!--Become Volunteer Page End-->
<!--Become Volunteer Page Start-->
<!--<section class="become-volunteer-page" style="margin-top: -200px">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-6 col-lg-6">-->
<!--                <div class="become-volunteer-page__left">-->
<!---->
<!--                    <div class="event-details__right">-->
<!--                        <span class="section-title__tagline" style="text-align: center!important;">HDFC BANK</span>-->
<!--                        <div class="event-details__info" style="margin-top: 32px;">-->
<!--                            <ul class="list-unstyled event-details__info-list">-->
<!--                                <li>-->
<!--                                    <p>At Old Age Home An At CHS Home CHR Trust</p>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span>Account Number :</span>-->
<!--                                    <p>50200075944610</p>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span>Branch:</span>-->
<!--                                    <p>Savings A/C Shenoy Nagar Branch,-->
<!--                                        Chennai - 600030</p>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span>IFSC Code :</span>-->
<!--                                    <p>HDFC0001587</p>-->
<!--                                </li>-->
<!---->
<!--                            </ul>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-6 col-lg-6">-->
<!--                <div class="become-volunteer-page__left">-->
<!---->
<!--                    <div class="event-details__right">-->
<!--                        <p class="section-title__tagline" style="text-align: center!important;">BANK OF INDIA</p>-->
<!--                        <div class="event-details__info" style="margin-top: 32px;">-->
<!--                            <ul class="list-unstyled event-details__info-list">-->
<!--                                <li>-->
<!--                                    <p>Annai Teresa Charitable Trust</p>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span>Account Number :</span>-->
<!--                                    <p>803810110001356</p>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span>Branch:</span>-->
<!--                                    <p>Savings A/C Nungambakkam Branch,-->
<!--                                        Chennai - 600034</p>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span>IFSC Code :</span>-->
<!--                                    <p>BKID0008038</p>-->
<!--                                </li>-->
<!---->
<!--                            </ul>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--Become Volunteer Page End-->
<!--Donate Now End-->

<!--Site Footer Start-->
<?php Include("../includes/footer.php"); ?>
<!--Site Footer End-->

</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="https://atct.in/" aria-label="logo image"><img src="https://atct.in/assets/images/annai_logo.png" width="143" alt=""></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container">
            <ul class="main-menu__list">
                <li class="nav_link current" id="nav_Home">
                    <a href="https://atct.in/">Home </a>

                </li>
                <li class="nav_link dropdown">
                    <a href="https://atct.in/about/history" id="nav_about">About Us</a>
                    <ul>
                        <li><a href="https://atct.in/about/history" style="color: #000">History</a></li>
                        <li><a href="https://atct.in/about/mission" style="color: #000">Mission</a></li>
                        <li><a href="https://atct.in/about/vision" style="color: #000">Vision</a></li>
                    </ul>
                </li>
                <li class="nav_link dropdown">
                    <a href="https://atct.in/medical_support/service" id="nav_needs">Medical Support</a>
                    <ul>
                        <li> <a href="https://atct.in/medical_support/service" style="color: #000">Service</a>
                        </li>
                        <li> <a href="https://atct.in/medical_support/current_project" style="color: #000">Current project</a>
                        </li>
                        <li><a href="https://atct.in/medical_support/completed_project" style="color: #000">Complete project</a></li>
                    </ul>
                </li>
                <li class="nav_link hv">
                    <a href="https://atct.in/sponcer" id="nav_sponcer" style="color: #fff">Sponcer</a>
                </li>
                <li class="nav_link">
                    <a href="https://atct.in/event" id="nav_events">Events</a>

                </li>
                <li class="nav_link dropdown">
                    <a href="https://atct.in/orphanage_home/old_age" id="nav_orph">Orphanage Home</a>
                    <ul>
                        <li>
                            <a href="https://atct.in/orphanage_home/old_age" style="color: #000">Annai Terasa Old Age Home</a>
                        </li>
                        <li><a href="https://atct.in/orphanage_home/children_home" style="color: #000">Mentally Retarded Children Home(Boys)</a></li>
                    </ul>
                </li>
                <li class="nav_link">
                    <a href="https://atct.in/gallery" id="nav_gallery">Gallery</a>

                </li>
                <li class="nav_link">
                    <a href="https://atct.in/contact" id="nav_contact">Contact</a>
                </li>
                <li class="nav_link">
                    <a href="https://atct.in/donation_now" id="nav_donate">Donate Now</a>
                </li>
            </ul>
        </div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:annaiteresafoundation@gmail.com">annaiteresafoundation@gmail.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:9087822777">9087822777</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here...">
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>


<script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
<script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendors/jarallax/jarallax.min.js"></script>
<script src="../assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="../assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="../assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
<script src="../assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="../assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="../assets/vendors/nouislider/nouislider.min.js"></script>
<script src="../assets/vendors/odometer/odometer.min.js"></script>
<script src="../assets/vendors/swiper/swiper.min.js"></script>
<script src="../assets/vendors/tiny-slider/tiny-slider.min.js"></script>
<script src="../assets/vendors/wnumb/wNumb.min.js"></script>
<script src="../assets/vendors/wow/wow.js"></script>
<script src="../assets/vendors/isotope/isotope.js"></script>
<script src="../assets/vendors/countdown/countdown.min.js"></script>
<script src="../assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="../assets/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="../assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="../assets/vendors/vegas/vegas.min.js"></script>
<script src="../assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="../assets/vendors/timepicker/timePicker.js"></script>
<script src="../assets/vendors/circleType/jquery.circleType.js"></script>
<script src="../assets/vendors/circleType/jquery.lettering.min.js"></script>


<!-- template js -->
<script src="../assets/js/oxpins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.js" integrity="sha512-2AOp8GEFv1X43dZpYqOp34WD+skmM18yOrCxS/S1Mh6VShz7uxlPhKmA98fsPrE7MMMtZgjshiMHKmzWtZR5uA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- template js -->
<script src="../assets/js/oxpins.js"></script>

<script>

    $("#contact-form").validate(
        {
            ignore: '.ignore',

            rules: {

                name: {
                    required: true
                },
                amount:{
                    required:true
                },
                phone: {
                    required: true,
                    maxlength: 10,
                    minlength: 10,
                },
                email: {
                    required: true,
                    email : true
                },
                pan: {
                    required: true
                    // maxlength: 10,
                    // minlength: 10,

                },
                address: {
                    required: true
                    // maxlength: 100,
                    // minlength: 0,
                },
                // message: {
                // required: true
                // maxlength: 500,
                // minlength: 0,
                // },

            },
            // Specify validation error messages
            messages: {
                pan: "*This field is required",
                name: "*This field is required",
                phone: "*Enter a valid number",
                address: "*This field is required",
                amount: "*This field is required",
                email: "*This field is required",



            }

        });
    //});



</script>

<script>

    $(document).ready(function(){
        $("#submit_btn").click(function(){

            $("#submit_btn").html('<i class="form-btn-loader fa fa-circle-o-notch fa-spin fa-fw margin-bottom d-block" style="margin: auto;font-size: 21px;"></i>');

            $("#contact-form").valid();

            if($("#contact-form").valid()==true) {

                document.getElementById('submit_btn').disabled=true;

                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    // data:'name='+name,
                    data: $('#contact-form').serialize(),
                    dataType: "json",
                    success: function(res)
                    {
                        if(res.status=='success')
                        {
                            var payload = {
                                encRequest: res.encRequest,
                                access_code: res.access_code
                            };
                            console.log(payload);
                            var form = document.createElement('form');
                            form.style.visibility = 'hidden';
                            form.method = 'POST';
                            form.action = "https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction";
                            // form.action = "https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction";
                            $.each(Object.keys(payload), function (index, key) {
                                var input = document.createElement('input');
                                input.name = key;
                                input.value = payload[key];
                                form.appendChild(input)
                            });
                            document.body.appendChild(form);
                            form.submit();

                        }
                        else if(res.status=='failure')
                        {
                            swal.fire(
                                {
                                    title: "failure",
                                    text: res.msg,
                                    icon: "warning",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                }
                            )
                                .then((value) => {
                                    document.getElementById("submit_btn").disabled = false;
                                    $("#submit_btn").html("<span class=\"text\"> DONATE NOW</span>");
                                    // $("#submit_btn").html('SEND MESSAGE');
                                });
                        }
                    },
                    error: function(){
                        swal.fire("Check your Internet Connection");
                        document.getElementById("submit_btn").disabled = false;
                        $("#submit_btn").html("<span class=\"text\"> DONATE NOW</span>");
                        // alert("Check your internet connection");
                        // swal("Check your Internet Connection");
                    }
                });

            }
            else{
                document.getElementById("submit_btn").disabled = false;
                $("#submit_btn").html("<span class=\"text\">  DONATE NOW</span>");
            }
        });

    });



    let paymentStatus = '<?php echo $_GET['payment_status']?>';
    let orderId = '<?php echo $order_id?>';
    let amount = '<?php echo $amount?>';
    let orderStatus = '<?php echo $orderStatus?>';

    if(paymentStatus == '1'){
        // document.cookie = "cartCount=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        // document.cookie = "courseCookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        Swal.fire({
            icon: 'success',
            title: 'Thank you Your Order Details Will Sent To Your Email !!!',
            html: '<strong>Order No :</strong>'+orderId+'<br>'+'<strong>Amount :</strong>'+amount+'<br>'+'<strong>Order Status :</strong>'+orderStatus+'<br>',
            button: "OK",
            allowOutsideClick: false,
            allowEscapeKey: false

        }).then((result) => {
            if (result.value) {

                window.location.href = "../";
            }
        });
    } else if(paymentStatus == '0') {
        // document.cookie = "cartCount=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        // document.cookie = "courseCookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        Swal.fire({
            icon: 'warning',
            title: 'Payment Failed, Order Not Placed!!!',
            html: '<strong>Order No :</strong>'+orderId+'<br>'+'<strong>Amount :</strong>'+amount+'<br>'+'<strong>Order Status :</strong>'+orderStatus+'<br>',
            button: "OK",
            allowOutsideClick: false,
            allowEscapeKey: false

        }).then((result) => {
            if (result.value) {

                window.location.href = "../";
            }

        });
    }

</script>


</body>

</html>
