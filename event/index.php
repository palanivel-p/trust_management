<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Events</title>
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
        .events-one__img {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for a lifted effect */
        }
        .events-one__img img {
            width: 100%;
            height: 500px; /* Set a fixed height for the images */
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .events-one__single {
            margin-bottom: 30px; /* Adjust margin as needed */
        }
        .events-one__content {
            padding: 20px;
            background-color: transparent; /* Remove background color */
            border: none; /* Remove border */
        }
        .events-one__content ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .events-one__content ul li {
            margin-bottom: 5px;
            color: #627bef; /* Set text color to black */
            text-align: left; /* Align text to the left */
        }
        .events-one__title {
            font-size: 15px; /* Adjust font size as needed */
            font-weight: bold; /* Optional: Adjust font weight */
            margin-bottom: 10px; /* Optional: Adjust margin */
            text-align: left; /* Align text to the left */
        }
        .events-one__meta {
            text-align: left; /* Align meta information to the left */
        }
        .events-one__meta a {
            color: #627bef; /* Set link color to black */
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
		
<!--       <div class="stricky-header stricked-menu main-menu">-->
<!--            <div class="sticky-header__content"></div>-->
           <!-- /.sticky-header__content -->
<!--        </div>-->
        <!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header" style="margin-top: 133px;">
        <div class="page-header-bg" style="background-image: url(../assets/Img/Event1/Events.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="https://atct.in/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Events</li>
                    </ul>
                    <h2>Events</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Events Page Start-->
        <section class="events-page">
            <div class="gallery-one__top" style="margin-top: -120px">
                <h3 class="gallery-one__top-title">Event</h3>
            </div>
            <div class="container" style="margin-top: 30px;">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM event WHERE img =1";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            $dateString = $row['date']; // Replace with your date in Y-m-d format
                            // Convert the date format
                            $newDateFormat = date("d-m-Y", strtotime($dateString));
                            ?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <!--Events One Single Start-->
                                <div class="events-one__single">
                                    <div class="events-one__img">
                                        <img class="event-image" src="event_img/<?php echo $row['event_id'] ?>.jpg" alt="">
                                        <div class="events-one__date">
                                            <p><?php echo $newDateFormat ?></p>
                                        </div>
                                        <div class="events-one__content">
                                            <ul class="list-unstyled events-one__meta">
                                                <li><i class="fas fa-map-marker-alt"></i> <?php echo $row['place'] ?></li>
                                            </ul>
                                            <h5 class="events-one__title" style="color: #0d56a8"><?php echo $row['event_name'] ?></h5>
                                            <ul class="list-unstyled events-one__meta">
                                                <li>
                                                    <a href="https://atct.in/event/event_detail?event_id=<?php echo $row['event_id'] ?>&place=<?php echo $row['place'] ?>&date=<?php echo $row['date'] ?>&time=<?php echo $row['time'] ?>&description=<?php echo $row['description'] ?>&event_name=<?php echo $row['event_name'] ?>&time=<?php echo $row['time'] ?>">
                                                        <span class="fa fa-heart"></span> View more
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Events One Single End-->
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!--Events Page End-->

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
                            <li><a href="https://atct.in/medical_support/service" style="color: #000">Service</a>
                            </li>
                            <li><a href="https://atct.in/medical_support/current_project" style="color: #000">Current project</a>
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

    <script>
var elems = document.querySelectorAll('.active_link');
[].forEach.call(elems, function(el){
    el.classList.remove("active_link");
});

document.getElementById("nav_events").className = "active active_link";
</script>
</body>

</html>