<?php
$payment_status= $_GET['payment_status'];
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

    <!-- <div class="stricky-header stricked-menu main-menu">-->
    <!--            <div class="sticky-header__content"></div>-->
    <!-- /.sticky-header__content -->
    <!--        </div>-->
    <!-- /.stricky-header -->

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

    <!--Donate Now Start-->
    <section class="donate-now" style="margin-top: -120px">
        <div class="container">
            <form class="contact-page__form" id="contact-form">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="become-volunteer-page__right">
                            <form class="become-volunteer-page__form" id="contact-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <input type="text" placeholder="Amount" name="amount" id="amount">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <input type="text" placeholder="Your Name" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <input type="text" placeholder="Mobile Number" name="phone" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <input type="text" placeholder="Pan number" name="pan" id ="pan">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <input type="text" placeholder="Address" name="address" id ="address">
                                        </div>
                                    </div>

                                    <!--                                    <div class="col-xl-12">-->
                                    <!--                                        <div class="become-volunteer-page__input become-volunteer__message-box">-->
                                    <!--                                            <textarea name="message" placeholder="Write a Comment"></textarea>-->
                                    <!--                                        </div>-->
                                    <div class="become-volunteer-page__btn-box">
                                        <button type="button" class="thm-btn contact-form__btn" id="submit_btn">Send a
                                            message</button>
                                    </div>
                                </div>
                        </div>
            </form>
        </div>
</div>
<div class="col-xl-4 col-lg-5" style="margin-top: 31px">
    <div class="donate-now__right">
        <div class="causes-one__single">
            <div class="causes-one__img">
                <img src="https://atct.in/assets/Img/Donation1/QR.png" alt="">
            </div>
        </div>
    </div>
    <div class="donate-now__right">
        <?php
        // $sql = "SELECT * FROM children WHERE ORDER BY id DESC LIMIT 1,1";
        $sql = "SELECT * FROM children WHERE img =1 AND child_type = 'current project' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result)
            ?>
            <div class="causes-one__single">

                <div class="causes-one__img">
                    <img src="../children_img/<?php echo $row['children_id']?>.jpg" alt="">
                    <!--                                             -->
                    <!--                                                <div class="causes-one__cat">-->
                    <!--                                                    <p>Education</p>-->
                    <!--                                                </div>-->
                </div>
                <div class="donation-details__organizer-content">
                    <ul class="list-unstyled donation-details__organizer-list">
                        <li>
                            <div class="text">
                                <p> <strong> Children Name:-</strong> <?php echo $row['children_name']?></p>
                            </div>
                        </li>
                        <li>
                            <div class="text">
                                <p>
                                    <strong> Disease:-</strong><?php echo $row['disease']?></p>
                            </div>
                        </li>
                        <li>
                            <div class="text">
                                <p>
                                    <strong>Hospital:-</strong> <?php echo $row['hospital']?></p>
                            </div>
                        </li>
                        <li>
                            <div class="text">
                                <p>
                                    <strong> Amount:- </strong> ₹<?php echo $row['amount']?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
    </div>



</div>

</div>
</form>
</div>
</section>
<!--Become Volunteer Page Start-->
<section class="become-volunteer-page">
    <h2 class="section-title__title" style="text-align: center; margin-top: -175px">BANK DETAILS</h2>
    <div class="container">
        <!--            <div class="section-title text-center">-->
        <!--                <span class="section-title__tagline">Annai Teresa Charitable Trust</span>-->
        <!--                <h2 class="section-title__title"></h2>-->
        <!--            </div>-->
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">

                    <div class="event-details__right">
                        <!--                            <span class="section-title__tagline">Annai Teresa Charitable Trust</span>-->
                        <p class="section-title__tagline" style="text-align: center">AXIS BANK</p>
                        <div class="event-details__info">
                            <ul class="list-unstyled event-details__info-list">
                                <li>
                                    <!--                                        <span>Account with Bank:</span>-->
                                    <!--                                        <p>Axis Bank</p>-->
                                    <p>Annai Teresa Charitable Trust</p>
                                </li>
                                <li>
                                    <span>Account Number :</span>
                                    <p>914020003977349</p>
                                </li>
                                <li>
                                    <span>Category:</span>
                                    <p>Current A/C Kilpauk Branch,Chennai - 600010</p>
                                </li>
                                <li>
                                    <span>IFSC Code :</span>
                                    <p>UTIB0000620</p>
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
                        <!--                            <span class="section-title__tagline"> Annai Teresa OldAge Home and AnnaiTeresa Childrens Home Charitable Trust</span>-->
                        <p class="section-title__tagline" style="text-align: center"> ICICI BANK</p>
                        <div class="event-details__info">
                            <ul class="list-unstyled event-details__info-list">
                                <li>
                                    <!--                                        <span>Account with Bank:</span>-->
                                    <!--                                        <p>ICICI BANKk</p>-->
                                    <p>Annai Teresa OldAge Home and AnnaiTeresa Childrens Home Charitable Trust</p>
                                </li>
                                <li>
                                    <span>Account Number :</span>
                                    <p>168305002328</p>
                                </li>
                                <li>
                                    <span>Branch:</span>
                                    <p>Savings A/C ANNA NAGAR Branch,
                                        Chennai - 600040</p>
                                </li>
                                <li>
                                    <span>IFSC Code :</span>
                                    <p>ICIC0001683</p>
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
<section class="become-volunteer-page" style="margin-top: -200px">
    <div class="container">
        <!--            <div class="section-title text-center">-->
        <!--                <span class="section-title__tagline">Annai Teresa Charitable Trust</span>-->
        <!--                <h2 class="section-title__title"></h2>-->
        <!--            </div>-->
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">

                    <div class="event-details__right">
                        <span class="section-title__tagline" style="text-align: center!important;">HDFC BANK</span>
                        <!--                                <span class="section-title__tagline">At Old Age Home An At CHS Home CHR Trust</span>-->
                        <div class="event-details__info" style="margin-top: 32px;">
                            <ul class="list-unstyled event-details__info-list">
                                <li>
                                    <!--                                            <span>Account with Bank:</span>-->
                                    <p>At Old Age Home An At CHS Home CHR Trust</p>
                                </li>
                                <li>
                                    <span>Account Number :</span>
                                    <p>50200075944610</p>
                                </li>
                                <li>
                                    <span>Branch:</span>
                                    <p>Savings A/C Shenoy Nagar Branch,
                                        Chennai - 600030</p>
                                </li>
                                <li>
                                    <span>IFSC Code :</span>
                                    <p>HDFC0001587</p>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">

                    <div class="event-details__right">
                        <!--                            <span class="section-title__tagline">Annai Teresa Charitable Trust</span>-->
                        <p class="section-title__tagline" style="text-align: center!important;">BANK OF INDIA</p>
                        <div class="event-details__info" style="margin-top: 32px;">
                            <ul class="list-unstyled event-details__info-list">
                                <li>
                                    <!--                                        <span>Account with Bank:</span>-->
                                    <!--                                        <p>Bank of India</p>-->
                                    <p>Annai Teresa Charitable Trust</p>
                                </li>
                                <li>
                                    <span>Account Number :</span>
                                    <p>803810110001356</p>
                                </li>
                                <li>
                                    <span>Branch:</span>
                                    <p>Savings A/C Nungambakkam Branch,
                                        Chennai - 600034</p>
                                </li>
                                <li>
                                    <span>IFSC Code :</span>
                                    <p>BKID0008038</p>
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
                <a href="mailto:atctchennai@gmail.com">atctchennai@gmail.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:+91 9600001030">+91 9600001030</a>
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
                    required: true
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
                                    $("#submit_btn").html("<span class=\"text\"> SEND MESSAGE</span>");
                                    // $("#submit_btn").html('SEND MESSAGE');
                                });
                        }
                    },
                    error: function(){
                        swal.fire("Check your Internet Connection");
                        document.getElementById("submit_btn").disabled = false;
                        $("#submit_btn").html("<span class=\"text\"> SEND MESSAGE</span>");
                        // alert("Check your internet connection");
                        // swal("Check your Internet Connection");
                    }
                });
// });

// });
            }
            else{
                document.getElementById("submit_btn").disabled = false;
                $("#submit_btn").html("<span class=\"text\"> SEND MESSAGE</span>");
            }
        });

    });

    let paymentStatus = '<?php echo $_GET['paymentStatus']?>';

    if(paymentStatus == '1'){
        document.cookie = "cartCount=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        document.cookie = "courseCookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        Swal.fire({
            icon: 'success',
            title: 'Thank you Your Order Details Will Sent To Your Email !!!',
            // html: '<strong>Order No :</strong>'+orderId+'<br>'+'<strong>Amount :</strong>'+amount+'<br>'+'<strong>Order Status :</strong>'+orderStatus+'<br>',
            html: 'Success',
            button: "OK",
            allowOutsideClick: false,
            allowEscapeKey: false

        }).then((result) => {
            if (result.value) {

                window.location.href = "../";
            }
        });
    } else if(paymentStatus == '0') {
        document.cookie = "cartCount=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        document.cookie = "courseCookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        Swal.fire({
            icon: 'warning',
            title: 'Payment Failed, Order Not Placed!!!',
            // html: '<strong>Order No :</strong>'+orderId+'<br>'+'<strong>Amount :</strong>'+amount+'<br>'+'<strong>Order Status :</strong>'+orderStatus+'<br>',
            html: 'Failure',
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
