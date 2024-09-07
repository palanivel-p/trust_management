 <?php
Include("connection.php");
$api_key = $_COOKIE['panel_api_key'];

?>
    <div class="nav-header" style="background-color: #e5f0f3">
    <!-- <h1>#e5f0f3;</h1> -->
        <a href="../dashboard/" class="brand-logo">
<!--            <img class="logo-abbr" src="../images/Logo_new.png" alt="">-->
            <img class="logo-abbr" src="../includes/portal_logo1.png" alt="">
            <img class="logo-compact" src="../includes/portal_logo2.png" alt="">
            <img class="brand-title" src="../includes/portal_logo3.png" alt="">

        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line" style="background-color: #1ac348!important;"></span>
                <span class="line" style="background-color: #1ac348!important;"></span>
                <span class="line" style="background-color: #1ac348!important;"></span>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-content" style="background-color: #181f5a!important;">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar" style="color: #fff;">
                            <?php echo  $header_name; ?>
                        </div>
                    </div>
<!--                    <div>-->
<!--                        <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#change_modal" style="margin-left: 20px;" onclick="change()">Change Password</button>-->
<!--                    </div>-->
                    <div>
                        <a class="btn btn-primary" href="../transaction/" role="button" style= "margin-left: 440px; background-color: #18a55a!important; color: #f3ec09;">Transaction</a>
                    </div>
               
                    <ul class="navbar-nav header-right">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item dropdown notification_dropdown">
                        </li>
                        <li class="nav-item dropdown notification_dropdown">
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                <img src="../img/avatar.jpg" width="20" alt="">
                                <div class="header-info">
                                    <span class="text-black" style ="text-transform:capitalize;color: #fff!important;"><?php echo $_COOKIE['role']; ?></span>
                                    <span class="text-black" style ="text-transform:capitalize;color: #fff!important;"><?php echo $_COOKIE['name']; ?></span>
                                    <span class="text-black" style ="text-transform:capitalize;color: #fff!important;"><?php echo $_COOKIE['branch']; ?></span>
                                    <p class="fs-12 mb-0" style="color: #fff;">
                                        <?php
                                        date_default_timezone_set("Asia/Calcutta");
                                        if (date("H") < 12) {
                                            echo "Good Morning !";
                                        } elseif (date("H") > 11 && date("H") < 17) {
                                            echo "Good Afternoon !";
                                        } elseif (date("H") > 16) {
                                            echo "Good Evening !";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                         width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-2"><?php  echo $_COOKIE['role'];?></span>
                                </a>
                                <a href="../login?logout=1" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                         width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">Logout </span>
                                </a>
                                <?php
                                if ($_COOKIE['role'] == "Super Admin") {
                                    ?>
                                    <a class="dropdown-item ai-icon" data-toggle="modal" data-target="#change_modal">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                             width="18" height="18" viewbox="0 0 24 24" fill="none"
                                             stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Change Password</span>
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

<div class="dlabnav">
    <div class="dlabnav-scroll" style="background-color: #181f5a!important;">
<!--        <div class="dlabnav-scroll" style="background: #0f0f3f; ">-->
        <ul class="metismenu" id="menu">
            <?php
//            if($_COOKIE['role'] == "owner")
//            {
                ?>
            <li><a class="ai-icon" href="../dashboard/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <?php
                      if($_COOKIE['role'] != "Staff") {
                          if($_COOKIE['role'] != "Admin") {


                              ?>
                              <li><a class="ai-icon" href="../branch_profile/" aria-expanded="false" style="color: #fff!important;">
                                      <i class="flaticon-381-list"></i>
                                      <span class="nav-text">Branch Profile</span>
                                  </a>
                              </li>
                              <?php

                          }
                              ?>
                          <li><a class="ai-icon" href="../staff_profile/" aria-expanded="false" style="color: #fff!important;">
                                  <i class="flaticon-381-user-4"></i>
                                  <span class="nav-text">Staff Profile</span>
                              </a>
                          </li>
                          <?php
                      }
            ?>
            <li><a class="ai-icon" href="../doner_profile/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-id-card-1"></i>
                    <span class="nav-text">Doner Profile</span>
                </a>
            </li>

            <li><a class="ai-icon" href="../transaction/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-send"></i>
                    <span class="nav-text">Transaction</span>
                </a>
            </li>
            <li><a class="ai-icon" href="../report/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-search-3"></i>
                    <span class="nav-text">Report</span>
                </a>
            </li>
            <li><a class="ai-icon" href="../receipt/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-print"></i>
                    <span class="nav-text">Receipt</span>
                </a>
            </li>
            <?php
            if ($_COOKIE['role'] == "Super Admin") {
                ?>
            <li><a class="ai-icon" href="../children_profile/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-id-card-1"></i>
                    <span class="nav-text">Children Profile</span>
                </a>
            </li>
            <li><a class="ai-icon" href="../tariff/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Tariff</span>
                </a>
            </li>
                <li><a class="ai-icon" href="../home_slider/" aria-expanded="false" style="color: #fff!important;">
                        <i class="flaticon-381-notepad"></i>
                        <span class="nav-text">Home Slider</span>
                    </a>
                </li>
            <li><a class="ai-icon" href="../gallery/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-print"></i>
                    <span class="nav-text">Gallery</span>
                </a>
            </li>
            <li><a class="ai-icon" href="../event/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-print"></i>
                    <span class="nav-text">Event</span>
                </a>
            </li>
            <li><a class="ai-icon" href="../log/" aria-expanded="false" style="color: #fff!important;">
                    <i class="flaticon-381-print"></i>
                    <span class="nav-text">Log</span>
                </a>
            </li>
                <?php
            }
            ?>
        </ul>

        <div class="copyright">
            <p><strong>Trust  Admin Dashboard</strong> © <?php echo date('Y')?> All Rights Reserved</p>
<!--            <p>Made with <span class="heart"></span> by <a href="https://www.gbtechcorp.co.in/" target="_blank">GB TECH CORP</a></p>-->
        </div>
    </div>
</div>


<!--<script src="../js/change.js"></script>-->

<div class="modal fade" id="change_modal"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titles">Change Password Details</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form" style="color: black;">
                    <form id="change_form" autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Old Password *</label>
                                <input type="text" class="form-control" placeholder="Old Password" id="old_password" name="old_password" style="border-color: #181f5a;color: black">
<!--                                <input type="hidden" class="form-control"  id="api" name="api">-->
                            </div>
                            <div class="form-group col-md-12">
                                <label>New Password *</label>
                                <input type="text" class="form-control" placeholder="New Password" id="new_password" name="new_password" style="border-color: #181f5a;color: black">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>
                <button type="button" class="btn btn-primary" id="change_btn">Change</button>
            </div>
        </div>
    </div>
</div>

<script>

</script>








