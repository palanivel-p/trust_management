<?php
Include("connection.php");
?>

<style>
     .active{
        color: #129fff !important;
     }
     .main-header{
         width:100%;
         position:fixed;
         top:0;
         left:0;
         right:0;
     }
     .page-header {

         margin-top: 54px;

     }

    </style>

<header class="main-header">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="main-menu__wrapper-inner">
                        <div class="main-menu__left">
                            <div class="main-menu__logo">
                                <a href="https://atct.in/"><img src="https://atct.in/assets/images/annai_logo.png" alt=""></a>
                            </div>
<!--                            <div class="main-menu__shape-1 float-bob-x">-->
<!--                                <img src="https://atct.in/assets/images/shapes/main-menu-shape-1.png" alt="">-->
<!--                            </div>-->
                        </div>
                        <div class="main-menu__right">
                            <div class="main-menu__right-top" style="display: flex;
  justify-content: space-between;">
                                <div class="main-menu__right-top-left" style="margin-left: 30px">
                                    <div class="main-menu__volunteers">
                                        <div class="main-menu__volunteers-icon">
                                            <img src="https://atct.in/assets/images/icon/main-menu-heart-icon.png" alt="">
                                        </div>
                                        <div class="main-menu__volunteers-text-box">
                                            <p class="main-menu__volunteers-text">Become
                                                    a
                                                    <span>volunteers</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-menu__right-top-right" style="margin-right: 50px">
                                    <div class="main-menu__right-top-address">
                                        <ul class="list-unstyled main-menu__right-top-address-list">
                                            <li style="margin-right: 20px">
                                                <div class="icon">
                                                    <span class="icon-phone-call"></span>
                                                </div>
                                                <div class="content">
<!--                                                    <p>Helpline</p>-->
                                                    <h5><a href="tel:8939885777">8939885777</a></h5>
                                                </div>

                                            </li>
                                            <li style="margin-right: 5px">
                                                <div class="icon">
                                                    <span class="icon-message"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Send email</p>
                                                    <h5><a href="mailto:annaiteresafoundation@gmail.com">annaiteresafoundation@gmail.com</a>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li style="margin-right: -90px">
                                                <div class="icon">
                                                    <span class="icon-location"></span>
                                                </div>
                                                <div class="content">
                                                    <p>No - 47,Outer Circular Road,Kilpauk,</p>
                                                    <h5>Chennai-600010</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-menu__right-top-social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-menu__right-bottom" style="background-color: #252525d4;">
                                <div class="main-menu__main-menu-box">
                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                    <ul class="main-menu__list" style="margin-left: -22px;">
                                        <li class="nav_link hv">
                                            <a href="https://atct.in/" id="nav_home" style="color: #fff">Home </a>

                                        </li>
<!--                                        <li class="nav_link hv">-->
<!--                                            <a href="https://atct.in/about" id="nav_about">About Us</a>-->
<!--                                        </li>-->
                                        <li class="nav_link dropdown">
                                            <a href="https://atct.in/about/history" id="nav_about" style="color: #fff">About</a>
                                            <ul>
                                                <li><a href="https://atct.in/about/history" style="color: #000">History</a></li>
                                                <li><a href="https://atct.in/about/mission" style="color: #000">Mission</a></li>
                                                <li><a href="https://atct.in/about/vision" style="color: #000">Vision</a></li>

                                            </ul>
                                        </li>

                                        <li class="nav_link dropdown">
                                            <a href="https://atct.in/medical_support/service" id="nav_needs" style="color: #fff">Medical Support</a>
                                            <ul>
                                                <li class="nav_link dropdown">
                                                    <a href="https://atct.in/medical_support/service" style="color: #000">Service</a>
                                                </li>
                                                <li class="nav_link dropdown">
                                                    <a href="https://atct.in/medical_support/current_project" style="color: #000">Current Project</a>
                                                </li>
                                                <li><a href="https://atct.in/medical_support/completed_project" style="color: #000">Completed Project</a></li>

                                            </ul>
                                        </li>

                                        <li class="nav_link hv">
                                            <a href="https://atct.in/sponsor" id="nav_sponcer" style="color: #fff">Sponsor</a>
                                        </li>

                                        <li class="nav_link hv">
                                            <a href="https://atct.in/event" id="nav_events" style="color: #fff">Events</a>

                                        </li>
                                        <li class="nav_link dropdown">
                                            <a href="#" id="nav_orph" style="color: #fff">Orphanage Home</a>
                                            <ul>
                                                <li class="nav_link dropdown">
                                                    <a href="https://atct.in/orphanage_home/old_age" style="color: #000">Annai Terasa Old Age Home</a>
                                                </li>
                                                <li><a href="https://atct.in/orphanage_home/children_home" style="color: #000">Mentally Retarded Children Home(Boys)</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav_link hv">
                                            <a href="https://atct.in/gallery" id="nav_gallery" style="color: #fff">Gallery</a>

                                        </li>
                                        <li class="nav_link hv">
                                            <a href="https://atct.in/contact" id="nav_contact" style="color: #fff">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-menu__main-menu-content-box">
                                    <div class="main-menu__search-cat-btn-box">
<!--                                        <div class="main-menu__search-box">-->
<!--                                            <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>-->
<!--                                        </div>-->
<!--                                        <div class="main-menu__cat-box">-->
<!--                                            <a href="cart.html" class="main-menu__cart icon-shopping-cart"></a>-->
<!--                                        </div>-->
                                        <div class="main-menu__btn-box">
                                            <a href="https://atct.in/donation_now" class="main-menu__btn"> <span class="fa fa-heart"></span> Donate
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>


