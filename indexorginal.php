<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/Img/MS/fav-icon-original.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/Img/MS/fav-icon-original.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/Img/MS/fav-icon-original.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
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

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css">
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css">
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css">
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css">
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css">
    <link rel="stylesheet" href="assets/vendors/oxpins-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css">
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css">
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css">

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/oxpins.css">
    <link rel="stylesheet" href="assets/css/oxpins-responsive.css">
    <style>
        .causes-one__img img {
            width: 100%;
            height: 250px; /* Set a fixed height for the images */
            object-fit: cover; /* Ensure the image covers the defined area without distortion */
        }
        .causes-one__single {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            height: 100%; /* Ensures cards have the same height */
        }
        .causes-one__content {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            flex-grow: 1; /* Makes the content area flexible to adjust the card size */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensures even spacing within the content */
        }
        .causes-one__title {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        .causes-one__text {
            margin-bottom: 10px;
            flex-grow: 1; /* Ensures the text area grows to fill available space */
            overflow: hidden; /* Prevents text from overflowing outside the card */
        }
        .causes-one__text p {
            margin: 5px 0; /* Adds consistent margin to paragraphs */
            text-overflow: ellipsis; /* Adds ellipsis (...) for overflowing text */
            overflow: hidden;
            white-space: nowrap; /* Keeps text on a single line */
        }
        .donate-now__payment-info-btn-box {
            display: flex;
            align-items: center;
        }
        .donate-now__payment-info-btn {
            padding: 10px 20px;
            background-color: #129fff;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }
        .donate-now__payment-info-btn span {
            margin-right: 5px;
        }

        .events-one__img img {
            width: 100%;
            height: 250px; /* Set a fixed height for the images */
            object-fit: cover; /* Ensure the image covers the defined area without distortion */
        }
        .events-one__single {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            height: 100%; /* Ensures cards have the same height */
        }
        .events-one__content {
            padding: 15px;
            /*background-color: rgba(255, 255, 255, 0.8); !* Semi-transparent background *!*/
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
            border-radius: 8px;
            flex-grow: 1; /* Makes the content area flexible to adjust the card size */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensures even spacing within the content */
        }
        .events-one__title {
            margin-bottom: 10px;
            font-size: 16px; /* Smaller font size */
            font-weight: bold;
            color: #fbfbfb; /* Darker color for better readability */
            text-decoration: none;
            word-wrap: break-word; /* Ensure words break to avoid overflow */
        }
        .events-one__title a {
            /*color: inherit;*/
            text-decoration: none;
        }
        .events-one__title a:hover {
            color: #129fff; /* Change color on hover */
        }
        .events-one__meta {
            margin-bottom: 10px;
            list-style: none;
            padding: 0;
        }
        .events-one__meta li {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            font-size: 14px; /* Smaller font size */
            color: #fbfbfb; /* Lighter color for meta information */
            word-wrap: break-word; /* Ensure words break to avoid overflow */
        }
        .events-one__meta li i {
            margin-right: 5px;
        }
        .events-one__date {
            position: absolute;
            top: 10px;
            left: 10px;
            /*background-color: rgba(0, 0, 0, 0.7);*/
            color: #888dff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .gallery-page__img {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }
        .gallery-page__img img {
            width: 100%;
            height: 250px; /* Set a fixed height for the images */
            object-fit: cover; /* Ensure the image covers the defined area without distortion */
            transition: transform 0.3s ease; /* Optional: Add a smooth transition effect */
        }
        .gallery-page__img:hover img {
            transform: scale(1.05); /* Optional: Zoom effect on hover */
        }
        .gallery-page__img {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }
        .gallery-page__img img {
            width: 100%;
            height: 250px; /* Set a fixed height for the images */
            object-fit: cover; /* Ensure the image covers the defined area without distortion */
            transition: transform 0.3s ease; /* Optional: Add a smooth transition effect */
        }
        .gallery-page__img:hover img {
            transform: scale(1.05); /* Optional: Zoom effect on hover */
        }
    </style>



</head>

<body class="custom-cursor">

<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->
<div class="page-wrapper">
    <?php Include("includes/header.php");
    ?>

    <!--Main Slider End-->
    <section class="main-slider clearfix">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
            <div class="swiper-wrapper">
                <?php

                $sql = "SELECT * FROM slider WHERE img = 1 ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="swiper-slide">

                            <div class="image-layer" style="background-image: url(https://atct.in/portal/home_slider/slider_img/<?php echo $row['slider_id']?>.jpg);"></div>
                            <!--                    <img src="home_slider/slider_img/--><?php //echo $row['slider_id']?><!--.jpg"></div>-->
                            <div class="main-slider-shape-1" style="background-image: url(assets/images/shapes/main-slider-shape-1.jpg);"></div>
                            <div class="main-slider-shape-2 float-bob-x">
                                <img src="assets/images/shapes/main-slider-shape-2.png" alt="">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="main-slider__content">
                                            <p class="main-slider__sub-title" style="margin-top: 127px;">Always donate for children</p>
                                            <h6 class="main-slider__title" style="color:#129fff"><?php echo $row['slider_name']?></h6>
                                            <div class="main-slider__btn-box">
                                                <a href="https://atct.in/about/" class="thm-btn main-slider__btn"> Discover more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next" style="margin-top: 57px;">
                    <i class="icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </section>

    <!--About One Start-->
    <section class="about-one">
        <div class="gallery-one__top" style="margin-bottom: 55px;margin-top: -120px">
            <h3 class="gallery-one__top-title">HOME</h3>
        </div>
        <div class="about-one__shape-box-1">
            <div class="about-one__shape-1" style="background-image: url(assets/images/shapes/about-one-shape-1.png);"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-one__img">
                                <img src="assets/Img/home/home1.jpg" alt="">
                            </div>
                            <div class="about-one__img-border" style="6px solid #4e97e5!important;"></div>

                            <div class="about-one__shape-2 zoom-fade">
                                <img src="assets/images/shapes/about-one-shape-2.png" alt="">
                            </div>
                            <div class="about-one__shape-3 float-bob-y">
                                <img src="assets/images/shapes/about-one-shape-3.png" alt="">
                            </div>
                            <div class="about-one__shape-4 zoominout">
                                <img src="assets/images/shapes/about-one-shape-4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Welcome to Annai Teresa Foundation</span>
                            <h2 class="section-title__title">Helping each other can make world better</h2>
                        </div>
                        <p class="about-one__text">Annai Teresa Foundation provides exceptional long-term care services for the elderly,
                            senior citizens and mentally retarded children. With skilled nursing facilities,
                            we ensure that our residents receive the highest quality of care and attention. </p>
                        <!--                        <div class="about-one__fund">-->
                        <!--                            <p class="about-one__fund-text">Helped fund <span>24,537</span> Projects in-->
                        <!--                                <span>24</span> Countries, Benefiting over <br> <span>8.2</span> Million people.</p>-->
                        <!--                        </div>-->
                        <ul class="list-unstyled about-one__points" style="margin-top: 35px">
                            <li>
                                <div class="icon">
                                    <span class="icon-volunteer"></span>
                                </div>
                                <div class="text">
                                    <h5 style="margin-top: 20px;"><a href="https://atct.in/about/">Join our team</a></h5>
                                    <!--                                    <p>Lorem ipsum dolor sit amet not quis mis notted.</p>-->
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-solidarity"></span>
                                </div>
                                <div class="text">
                                    <h5 style="margin-top: 20px;"><a href="https://atct.in/donation_now/">Start donating</a></h5>
                                    <!--                                    <p>Lorem ipsum dolor sit amet not quis mis notted.</p>-->
                                </div>
                            </li>
                        </ul>
                        <a href="https://atct.in/orphanage_home/" class="thm-btn about-one__btn">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End-->

    <!--Causes One Start-->
    <section class="causes-one" style="margin-top: -100px;">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Kids Details</span>
                <h2 class="section-title__title">Find the popular cause <br> and donate them</h2>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM children WHERE img = 1 AND child_type = 'current project' ORDER BY children_id DESC LIMIT 3";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                            <div class="causes-one__single">
                                <div class="causes-one__img">
                                    <img src="children_img/<?php echo $row['children_id']; ?>.jpg" alt="Image">
                                </div>
                                <div class="causes-one__content">
                                    <h3 class="causes-one__title">
                                        <a href="https://atct.in/donation_now/"><strong><?php echo $row['disease']; ?></strong></a>
                                    </h3>
                                    <div class="causes-one__text">
                                        <p><strong>Name :</strong> <?php echo $row['name']; ?></p>
                                        <p><strong>Disease :</strong> <?php echo $row['disease']; ?></p>
                                        <p><strong>Hospital :</strong> <?php echo $row['hospital']; ?></p>
                                        <p><strong>GOAL :₹</strong> <?php echo $row['amount']; ?></p>
                                        <p><strong>RAISED :</strong> 0 ₹</p>
                                    </div>
                                    <div class="donate-now__payment-info-btn-box">
                                        <a href="https://atct.in/donation_now?donation_type=<?php echo $row['name']?>&donation_id=<?php echo $row['children_id']?>&amount=<?php echo $row['amount'];?>"" class="thm-btn donate-now__payment-info-btn">
                                        <span class="fa fa-heart"></span> Donate now
                                        </a>
                                        <a href="https://atct.in/medical_support/current_project/child_details?name=<?php echo $row['name']; ?>&description=<?php echo $row['description']; ?>&amount=<?php echo $row['amount']; ?>&hospital=<?php echo $row['hospital']; ?>&disease=<?php echo $row['disease']; ?>&children_id=<?php echo $row['children_id']; ?>" style="margin-left: 25px;">
                                            <span class="icon-right-arrow"></span> Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!--Causes One End-->

    <!--Become Volunteer One Start-->
    <section class="become-volunteer-one" style="margin-top: -100px;">
        <div class="become-volunteer-one__bg-box">
            <div class="become-volunteer-one__bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/Img/Home/home_bg.jpg);"></div>
        </div>
        <div class="become-volunteer-one__shape-1" style="background-image: url(assets/images/shapes/become-volunteer-shape-1.png);"></div>
        <div class="container">
            <div class="become-volunteer-one__inner">
                <p class="become-volunteer-one__sub-title">Annai Terasa Foundation</p>
                <h3 class="become-volunteer-one__title">Join your hand with us for a <br> better life and future
                </h3>
                <div class="become-volunteer-one__btn-box">
                    <a href="https://atct.in/about/" class="thm-btn become-volunteer-one__btn">Discover More</a>
                </div>
            </div>
        </div>
    </section>
    <!--Become Volunteer One End-->

    <!--Events One Start-->
    <section class="events-one">
        <div class="events-one-shape-1" style="background-image: url(assets/images/shapes/events-one-shape-1.png)"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="events-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Upcoming events</span>
                            <h2 class="section-title__title">Join our latest upcoming events</h2>
                        </div>
                        <p class="events-one__text-1"></p>
                        <a href="https://atct.in/event/" class="thm-btn events-one__btn">Discover More</a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="events-one__right">
                        <div class="events-one__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                            "loop": false,
                            "autoplay": true,
                            "margin": 20,
                            "nav": true,
                            "dots": false,
                            "smartSpeed": 500,
                            "autoplayTimeout": 10000,
                            "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                            "responsive": {
                                "0": {
                                    "items": 1
                                },
                                "768": {
                                    "items": 2
                                },
                                "992": {
                                    "items": 2
                                },
                                "1200": {
                                    "items": 3
                                }
                            }
                        }'>
                            <?php
                            $sql = "SELECT * FROM event WHERE img =1";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)>0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="item">
                                        <!--Events One Single Start-->
                                        <div class="events-one__single">
                                            <div class="events-one__img">
                                                <img src="event/event_img/<?php echo $row['event_id']; ?>.jpg" alt="Event Image">
                                                <?php
                                                $inputDate = $row['date'];
                                                $dates = new DateTime($inputDate);
                                                $formattedDate = $dates->format('d-m-Y');
                                                ?>
                                                <div class="events-one__date">
                                                    <p><?php echo $formattedDate; ?></p>
                                                </div>
                                            </div>
                                            <div class="events-one__content">
                                                <ul class="list-unstyled events-one__meta">
                                                    <li><i class="fas fa-map-marker-alt"></i><?php echo $row['place']; ?></li>
                                                </ul>
                                                <h3 class="events-one__title"><a href="https://atct.in/event/"><?php echo $row['event_name']; ?></a></h3>
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
                </div>
            </div>
        </div>
    </section>



    <!--Events One End-->

    <!--Feature One Start-->
    <section class="feature-one">
        <h2 class="section-title__title" style="text-align: center;margin-bottom: 25px;margin-top: -100px;">What we do</h2>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6  wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="feature-one__single">
                        <div class="feature-one__single-bg" style="background-image: url(assets/images/shapes/feature-one-shape-1.png);"></div>
                        <div class="feature-one__top">
                            <div class="feature-one__top-inner">
                                <div class="feature-one__top-icon">
                                    <span class="icon-help"></span>
                                </div>
                                <div class="feature-one__top-title-box">
                                    <h3 class="feature-one__top-title"><a href="https://atct.in/medical_support/service">Medical Social Support</a></h3>
                                </div>
                            </div>
                        </div>
                        <p class="feature-one__text" style="color: #fff">Annai Terasa Foundation We believe that every child deserves the opportunity to live a healthy and fulfilling life, regardless of their background or circumstances. Our commitment to making a difference is evident through the comprehensive.</p>
                        <!--                        <ul class="list-unstyled feature-one__point">-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Sed et nulla a nunc finibus eleifend.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Mauris nulla nisl, pellentesque vetae.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Proin quis aliquam nisi.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <a href="https://atct.in/medical_support/service" class="thm-btn feature-one__btn">View details</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6  wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="feature-one__single feature-one__single--two">
                        <div class="feature-one__single-bg" style="background-image: url(assets/images/shapes/feature-one-shape-1.png);"></div>
                        <div class="feature-one__top">
                            <div class="feature-one__top-inner">
                                <div class="feature-one__top-icon feature-one__top-icon--two">
                                    <span class="icon-gift-box"></span>
                                </div>
                                <div class="feature-one__top-title-box">
                                    <h3 class="feature-one__top-title"><a href="https://atct.in/orphanage_home/old_age/">Annai Teresa Old Age Home</a></h3>
                                </div>
                            </div>
                        </div>
                        <p class="feature-one__text" style="color: #fff">Annai Teresa means joy and tranquillity and our home proves this beyond doubt. Presently we have 53 old age peoples in our Home who have no living children and no source of income, leading a blissful life as one big family making.
                        </p>
                        <!--                        <ul class="list-unstyled feature-one__point">-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Sed et nulla a nunc finibus eleifend.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Mauris nulla nisl, pellentesque vetae.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Proin quis aliquam nisi.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <a href="https://atct.in/orphanage_home/old_age/" class="thm-btn feature-one__btn">View details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Feature One End-->
    <!--Feature One Start-->
    <section class="feature-one" style="margin-top: -150px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6  wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="feature-one__single feature-one__single--two">
                        <div class="feature-one__single-bg" style="background-image: url(assets/images/shapes/feature-one-shape-1.png);"></div>
                        <div class="feature-one__top">
                            <div class="feature-one__top-inner">
                                <div class="feature-one__top-icon feature-one__top-icon--two">
                                    <span class="icon-gift-box"></span>
                                </div>
                                <div class="feature-one__top-title-box">
                                    <h3 class="feature-one__top-title"><a href="https://atct.in/sponcer/">Education Support</a></h3>
                                </div>
                            </div>
                        </div>
                        <p class="feature-one__text" style="color: #fff">Historically, many of the communities Karuna works with have been denied education and suffered from high drop out rates. We work holistically with schools, parents and children, providing support structures to enable disadvantaged children</p>
                        <!--                        <ul class="list-unstyled feature-one__point">-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Sed et nulla a nunc finibus eleifend.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Mauris nulla nisl, pellentesque vetae.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Proin quis aliquam nisi.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <a href="https://atct.in/sponcer/" class="thm-btn feature-one__btn">View details</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6  wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="feature-one__single">
                        <div class="feature-one__single-bg" style="background-image: url(assets/images/shapes/feature-one-shape-1.png);"></div>
                        <div class="feature-one__top">
                            <div class="feature-one__top-inner">
                                <div class="feature-one__top-icon">
                                    <span class="icon-help"></span>
                                </div>
                                <div class="feature-one__top-title-box">
                                    <h3 class="feature-one__top-title"><a href="https://atct.in/orphanage_home/children_home/">Annai Teresa Children Home</a></h3>
                                </div>
                            </div>
                        </div>
                        <p class="feature-one__text" style="color: #fff">Annai Teresa Foundation was founded in [2023] by a group of dedicated individuals who recognized the need to create a safe haven for orphaned boys. Since then,
                            we have been providing a loving and supportive environment.</p>
                        <!--                        <ul class="list-unstyled feature-one__point">-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Sed et nulla a nunc finibus eleifend.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Mauris nulla nisl, pellentesque vetae.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <div class="icon">-->
                        <!--                                    <span class="fa fa-check"></span>-->
                        <!--                                </div>-->
                        <!--                                <div class="text">-->
                        <!--                                    <p>Proin quis aliquam nisi.</p>-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <a href="https://atct.in/orphanage_home/children_home/" class="thm-btn feature-one__btn">View details</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Feature One End-->

    <!--Gallery Page Start-->
    <section class="gallery-carousel-page">
        <div class="gallery-one__top" style="margin-top: -190px;">
            <h3 class="gallery-one__top-title">Children Home Gallery</h3>
        </div>
        <div class="container" style="margin-top: 40px;">
            <div class="gallery-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style" data-owl-options='{
                "items": 3,
                "margin": 30,
                "smartSpeed": 700,
                "loop": false,
                "autoplay": 6000,
                "nav": false,
                "dots": true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive": {
                    "0": {
                        "items": 1
                    },
                    "768": {
                        "items": 2
                    },
                    "992": {
                        "items": 3
                    }
                }
            }'>
                <?php
                $sql = "SELECT * FROM gallery WHERE img = 1 AND gallery_type = 'children home'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!--Gallery Page Single Start-->
                        <div class="item">
                            <div class="gallery-page__single">
                                <div class="gallery-page__img">
                                    <img src="gallery/gallery_img/<?php echo $row['gallery_id']; ?>.jpg" alt="Gallery Image">
                                </div>
                            </div>
                        </div>
                        <!--Gallery Page Single End-->
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!--Gallery Page End-->
    <!--Gallery Page Start-->
    <section class="gallery-carousel-page" style="margin-top: -200px;">
        <div class="gallery-one__top">
            <h3 class="gallery-one__top-title">Old Age Home Gallery</h3>
        </div>
        <div class="container" style="margin-top: 40px;">
            <div class="gallery-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style" data-owl-options='{
                "items": 3,
                "margin": 30,
                "smartSpeed": 700,
                "loop": false,
                "autoplay": 6000,
                "nav": false,
                "dots": true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive": {
                    "0": {
                        "items": 1
                    },
                    "768": {
                        "items": 2
                    },
                    "992": {
                        "items": 3
                    }
                }
            }'>
                <?php
                $sql = "SELECT * FROM gallery WHERE img = 1 AND gallery_type = 'old age home'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!--Gallery Page Single Start-->
                        <div class="item">
                            <div class="gallery-page__single">
                                <div class="gallery-page__img">
                                    <img src="gallery/gallery_img/<?php echo $row['gallery_id']; ?>.jpg" alt="Gallery Image">
                                </div>
                            </div>
                        </div>
                        <!--Gallery Page Single End-->
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!--Gallery Page End-->

    <!--Site Footer Start-->
    <?php Include("includes/footer.php"); ?>
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
                        <li>
                            <a href="https://atct.in/medical_support/service" style="color: #000">Service</a>
                        </li>
                        <li>
                            <a href="https://atct.in/medical_support/current_project" style="color: #000">Current project</a>
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


<script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/jarallax/jarallax.min.js"></script>
<script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
<script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="assets/vendors/nouislider/nouislider.min.js"></script>
<script src="assets/vendors/odometer/odometer.min.js"></script>
<script src="assets/vendors/swiper/swiper.min.js"></script>
<script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
<script src="assets/vendors/wnumb/wNumb.min.js"></script>
<script src="assets/vendors/wow/wow.js"></script>
<script src="assets/vendors/isotope/isotope.js"></script>
<script src="assets/vendors/countdown/countdown.min.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="assets/vendors/vegas/vegas.min.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/vendors/timepicker/timePicker.js"></script>
<script src="assets/vendors/circleType/jquery.circleType.js"></script>
<script src="assets/vendors/circleType/jquery.lettering.min.js"></script>




<!-- template js -->
<script src="assets/js/oxpins.js"></script>
<script>
    var elems = document.querySelectorAll('.active_link');
    [].forEach.call(elems, function(el){
        el.classList.remove("active_link");
    });

    document.getElementById("nav_home").className = "active active_link";
</script>
<script>

    $(window).on('load', function() {


        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        if( isMobile.any() )
        {
            var mobile = 1;
            // var desktop = 0;

        }
        else {

            var desktop = 1;
            // var mobile = 0;
        }
        console.log(desktop+' Desktop');
        console.log(mobile+'Mobile');
        $.ajax({

            type: "POST",
            url: "detecting_mobile_api.php",
            data: $.param({mobile: mobile, desktop: desktop}),
            dataType: "json",
            success: function (res) {
                if (res.status == 'success') {
                    console.log(res.msg);

                }
                else if (res.status == 'failure') {
                    console.log(res.msg);

                }
            },
            error: function () {


            }

        });


    });



</script>
</body>

</html>