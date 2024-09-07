<?php
Include("../includes/connection.php");
if(isset($_GET['logout'])==1) {

    $userName = $_COOKIE['staff_id'];
    if($userName!='')
    {
        $info = urlencode("Logged Out");
        file_get_contents($website . "/portal/includes/log.php?emp_id=$userName&info=$info");

    }
    setcookie("panel_api_key", "", time() + (3600 * 1), "/"); // To empty the cookie
    setcookie("user_id", "", time() + (3600 * 1), "/"); // To empty the cookie
    setcookie("role", '', time() + (3600 * 1), "/"); // To set Login for 1 hr
    setcookie("name", '', time() + (3600 * 1), "/"); // To set Login for 1 hr
    setcookie("branch", '', time() + (3600 * 1), "/"); // To set Login for 1 hr
    setcookie("staff_id",'', time() + (3600 * 1), "/"); // To set Login for 1 hr
    setcookie("branch_id", '', time() + (3600 * 1), "/"); // To set Login for 1 hr


}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CRM Login form</title>

    <link rel="icon" type="image/png" sizes="16x16" href="https://bhims.ca/piloting/img/favicon_New.png">
    <link href="../css/style.css" rel="stylesheet">



</head>
<body class="h-100">
<div class="   h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="javascript:void(0)"><img src="https://bhims.ca/piloting/img/logo_footer.png" alt=""></a>
                                </div>
                                <h4 class="text-center mb-4 text-white">Sign In Your Account</h4>
                                <form>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Email</strong></label>
                                        <input type="email" class="form-control" id="mail" name="email" style="color: black;" placeholder="Enter Email">
                                    </div>
                                    <!--                                    <div class="form-group">-->
                                    <!--                                        <label class="mb-1 text-white"><strong>Password</strong></label>-->
                                    <!--                                        <input type="password" class="form-control" id="pwd" style="color: black;">-->
                                    <div class="form-group">
                                        <label style="color: white;">Password</label>
                                        <div class="input-group mb-3 input-primary">
                                            <input type="password" id="pwd" name="password" class="form-control" placeholder="Enter Password" style="color: black;">
                                            <div class="input-group-append">
                                                        <span class="input-group-text" onclick="pwdToggle()"  style="cursor: pointer;color:black;background-color: white;">
                                                            <i id="togglePassword" class="fa fa-eye-slash" aria-hidden="true"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <a class="text-white" href="javascript:void(0)" onclick="forget_password()">Forgot Password?</a>
                                        </div>
                                    </div>
<!--                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">-->
<!--                                        <div class="form-group">-->
<!--                                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#career_list" onclick="addTitle()">Change Password</button>-->
<!--                                            <a class="text-white" href="javascript:void(0)" data-toggle="modal" data-target="#career_list" onclick="addTitle()">Change Password?</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="text-center" style="margin-top: 63px;">
                                        <button class="btn bg-white text-primary btn-block" id="btn" onclick="login()" type="button">Sign In</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="career_list"  data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Staff Details</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="basic-form" style="color: black;">
                            <form id="staff_form" autocomplete="off">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label>Registered Email Id*</label>
                                        <input type="email" class="form-control" placeholder="Registered Email Id" id="registered_email" name="registered_ email" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Old Password *</label>
                                        <input type="text" class="form-control" placeholder="Old Password" id="old_password" name="old_password" style="border-color: #181f5a;color: black">
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
<!--                        <button class="btn bg-white text-primary btn-block" id="btn" onclick="login()" type="button">Sign In</button>-->
                        <button type="button" class="btn btn-primary" id="add_btn" onclick="change()">Change Password</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="../vendor/global/global.min.js"></script>
<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../js/custom.min.js"></script>
<script src="../js/dlabnav-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="../js/change.js"></script>


<script>
    function change() {

        var registered_email = document.getElementById("registered_email").value;
        var old_password = document.getElementById("old_password").value;
        var new_password = document.getElementById("new_password").value;

        if(registered_email != "") {

            if (old_password != "") {

              if (new_password != "") {

                if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(registered_email)) {

                    $("#btn").html("<i class=\"fa fa-spinner fa-spin\"></i> Loading...");

                    $.ajax({

                        type: "POST",
                        url: "change_api.php",
                        data: $.param({registered_email: registered_email,old_password: old_password,new_password:new_password}),
                        dataType: "json",

                        success: function(res){
                            if(res.result=='successs')
                            {
                                // window.location.href = '../dashboard/';
                                window.location.href = '../';
                                // document.getElementById('btn').style.pointerEvents="auto";
                                // document.getElementById('btn').style.cursor="pointer";
                                $("#add_btn").html("In");
                            }

                            else if(res.result=='failures')
                            {

                                Swal.fire(
                                    {
                                        title: "Failure",
                                        text: res.msg,
                                        icon: "warning",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {

                                        // window.location.reload();
                                        // $(this).unbind('click');
                                        // document.getElementById("btn").disabled = false;

                                        $("#add_btn").html("In");
                                    });

                            }
                        },

                        error: function() {
                            Swal.fire('Check your network connection')

                            document.getElementById("btn").disabled = true;
                            $("#btn").html("<span class=\"text\">Sign In</span>");
                        }

                    });
                }
            }

            else {
                //password
                Swal.fire(
                    'password required',
                    'New password cannot be empty',
                    'warning')
            }
            }

            else {
                //password
                Swal.fire(
                    'password required',
                    'Old password cannot be empty',
                    'warning')
            }

        }
        else {
            //email
            Swal.fire(
                'email required',
                'email cannot be empty',
                'warning')
        }


    }
    // function addTitle() {
    //     $("#title").html("Add Staff");
    //     $('#staff_form')[0].reset();
    //     $('#api').val("change_api.php")
    // }


    //to validate form
    // $("#staff_form").validate(
    //     {
    //         ignore: '.ignore',
    //          Specify validation rules
    //         rules: {
    //             registered_email: {
    //                 required: true,
    //                 email: true
    //             },
    //             old_password: {
    //                 required: true
    //             },
    //             new_password: {
    //                 required: true,
    //             },
    //
    //         },
    //         Specify validation error messages
    //         messages: {
    //             registered_email: "*This field is required",
    //             old_password: "*This field is required",
    //             new_password: "*This field is required",
    //         }
    //          Make sure the form is submitted to the destination defined
    //     });

    function login() {

        var email = document.getElementById("mail").value;
        var password = document.getElementById("pwd").value;

        if(email != "") {

            if (password != "") {

                if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {

                    $("#btn").html("<i class=\"fa fa-spinner fa-spin\"></i> Loading...");

                    $.ajax({

                        type: "POST",
                        url: "login_api.php",
                        data: $.param({email: email,password: password}),
                        dataType: "json",

                        success: function(res){
                            if(res.result=='success')
                            {
                                // window.location.href = '../dashboard/';
                                window.location.href = '../';
                                // document.getElementById('btn').style.pointerEvents="auto";
                                // document.getElementById('btn').style.cursor="pointer";
                                $("#btn").html("Sign In");
                            }

                            else if(res.result=='failure')
                            {

                                Swal.fire(
                                    {
                                        title: "Failure",
                                        text: res.msg,
                                        icon: "warning",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {

                                        // window.location.reload();
                                        // $(this).unbind('click');
                                        // document.getElementById("btn").disabled = false;

                                        $("#btn").html("Sign In");
                                    });

                            }
                        },

                        error: function() {
                            Swal.fire('Check your network connection')

                            document.getElementById("btn").disabled = true;
                            $("#btn").html("<span class=\"text\">Sign In</span>");
                        }

                    });
                }

            }

            else {
                //password
                Swal.fire(
                    'password required',
                    'password cannot be empty',
                    'warning')
            }

        }
        else {
            //email
            Swal.fire(
                'email required',
                'email cannot be empty',
                'warning')
        }


    }




    //password toggle
    function pwdToggle() {

        var x = document.getElementById("pwd");

        if (x.type === "password") {

            x.type = "text";
            $("#togglePassword").removeClass("fa-eye-slash");
            $("#togglePassword").addClass("fa-eye");




        } else {
            x.type = "password";
            $("#togglePassword").removeClass("fa-eye");
            $("#togglePassword").addClass("fa-eye-slash");

        }
    }


    //enter key
    $("#pwd").keyup(function(event) {
        if (event.keyCode === 13) {
            login();
        }
    });

    function forget_password() {
        const {value: email} =  Swal.fire({
            title: 'Input email address',
            input: 'email',
            inputLabel: 'Your email address',
            inputPlaceholder: 'Enter your email address'
        })
        console.log("Result: " +  email);

        Swal.fire({
            title: "Email!",
            text: "Enter Your Email",
            input: 'email',
            showCancelButton: true,
            heightAuto: false,
        }).then((result) => {
            if(result.isConfirmed)
            {
                var email = result.value;
                $.ajax({

                    type: "POST",
                    url: "forgot_password_api.php",
                    data: $.param({email: email}),
                    dataType: "json",
                    success: function (res) {
                        if (res.status == 'success') {
                            Swal.fire(
                                {
                                    title: "Email Sent!",
                                    text: res.msg,
                                    icon: "success",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                    heightAuto: false,
                                }
                            )
                                .then((value) => {
                                    window.window.location.reload();

                                });
                        } else if (res.status == 'failure') {
                            Swal.fire(
                                {
                                    title: "Failure",
                                    text: res.msg,
                                    icon: "warning",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                    heightAuto: false,
                                }
                            )
                                .then((value) => {
                                    window.window.location.reload();
                                });
                        }
                    },
                    error: function () {
                        Swal.fire("Check your network connection");

                    }
                });
            }
        });
    }

</script>


</body>
</html>

