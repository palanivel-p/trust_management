<?php Include("../includes/connection.php");
date_default_timezone_set("Asia/kolkata");

error_reporting(0);
$page= $_GET['page_no'];
//$search= $_GET['search'];
$search= $_GET['search']== ''?"all":$_GET['search'];

if($page=='') {
    $page=1;
}


$pageSql= $page-1;
$start=$pageSql*10;
$end = $start;

if($pageSql == 0) {
    $end = 10;
}



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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tariff profile</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon_New.png">
    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/chartist/css/chartist.min.css">

    <link href="../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="../vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">



    <link href="../vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="../vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="../vendor/pickadate/themes/default.date.css">
    <link href="../vendor/summernote/summernote.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .error {
        color:red;
    }

</style>
<body>


<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<div id="main-wrapper">


    <?php

    $header_name ="Tariff";
    Include ('../includes/header.php') ?>



    <div class="content-body">
        <div class="page-titles" style="margin-left: 21px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tariff</a></li>


            </ol>

        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tariff List</h4>
                    <div style="display: flex;justify-content: flex-end;">
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label>Sponcer Type</label>
                                <select data-search="true" class="form-control tail-select w-full" id="search" name="search" style="border-radius:20px;color:black;border:1px solid black;">
                                    <option value='all'>All</option>
                                    <option value='food'>Food</option>
                                    <option value='medicine'>Medicine</option>
                                    <option value='grocery'>Grocery</option>
                                </select>
                            </div>
                            <!--                            <div class="form-group mx-sm-3 mb-2">-->
                            <!---->
                            <!--                                <input type="text" class="form-control" placeholder="Search By Food Type" name="search" id="search" style="border-radius:20px;color:black;" >-->
                            <!--                            </div>-->
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#career_list" style="margin-left: 20px;" onclick="addTitle()">ADD</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table table-responsive-md" style="text-align: center;">
                            <thead>
                            <tr>
                                <th class="width80"><strong>#</strong></th>
                                <th><strong>Tariff ID</strong></th>
                                <th><strong>Sponcer Type</strong></th>
                                <th><strong>Amount</strong></th>
                                <th><strong>Sponcer For / Food Type</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                            </thead>
                            <?php
                            if($search == "all") {
                                $sql = "SELECT * FROM tariff ORDER BY id  LIMIT $start,10";
                            }
                            else {
                                $sql = "SELECT * FROM tariff WHERE sponcer_type = '$search' ORDER BY id  LIMIT $start,10";
                            }
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)>0) {
                            $sNo = $start;
                            while($row = mysqli_fetch_assoc($result)) {

                            $sNo++;


                            $img = $row['img'];
                            if($img == 1) {
                                $img_upload = "badge-success";
                                $img_modal = '#image_modal';
                            }
                            else {
                                $img_upload = "badge-danger";
                            }
                            //
                            //                            $offer_letter_pdf = $row['offer_pdf'];
                            //                            if($offer_letter_pdf == 1) {
                            //                                $offer_letter_pdfs = "badge-success";
                            //$offer_letterLink = "../../placements/pdf/".$row['placement_id'].".pdf";
                            //                                $targetLink = 'target="_blank"';
                            //                            }
                            //                            else {
                            //                                $offer_letter_pdfs = "badge-danger";
                            //                                $offer_letterLink = "javascript:void(0)";
                            //                                $targetLink = "";
                            //                            }
                            $sponcer=$row['sponcer_type'];
                            ?>
                            <tbody>

                            <tr>

                                <td><strong><?php echo $sNo;?></strong></td>
                                <td><?php echo $row['tariff_id']?></td>
                                <td> <?php echo $row['sponcer_type']?> </td>
                                <td> <?php echo $row['budget']?> </td>

                                <?php
                                if ($sponcer === 'food' || $sponcer === 'medicine' || $sponcer === 'grocery') {
                                    ?>
                                    <td> <?php echo $row['sponcer_for']; ?> </td>
                                    <?php
                                } else {
                                    // Handle the case when $sponcer is not 'food', 'medicine', or 'grocery'
                                    ?>
                                    <td> <?php echo $row['food_type']?> </td>
                                    <?php
                                }
                                ?>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" data-toggle="modal" data-target="#career_list" style="cursor: pointer" onclick="editTitle('<?php echo $row['tariff_id'];?>')">Edit</a>
                                            <a class="dropdown-item" style="cursor: pointer" onclick="delete_model('<?php echo $row['tariff_id'];?>')">Delete</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } }
                            ?>

                            </tbody>
                        </table>
                        <div class="col-12 pl-3" style="display: flex;justify-content: center;">
                            <nav>
                                <ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg">

                                    <?php

                                    $prevPage=abs($page-1);

                                    if($prevPage==0)
                                    {
                                        ?>
                                        <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0);"><i class="la la-angle-left"></i></a></li>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $prevPage?>"><i class="la la-angle-left"></i></a></li>
                                        <?php
                                    }
                                    if($search == "all") {
                                        $sql = "SELECT COUNT(id) as count FROM tariff";
                                    }
                                    else {
                                        $sql = "SELECT COUNT(id) as count FROM tariff WHERE sponcer_type = '$search'";
                                    }
                                    //                                    $sql = 'SELECT COUNT(id) as count FROM tariff;';
                                    $result = mysqli_query($conn, $sql);


                                    if (mysqli_num_rows($result)) {

                                        $row = mysqli_fetch_assoc($result);
                                        $count = $row['count'];
                                        $show = 10;


                                        $get = $count / $show;


                                        $pageFooter = floor($get);

                                        if ($get > $pageFooter) {
                                            $pageFooter++;
                                        }

                                        for ($i = 1; $i <= $pageFooter; $i++) {

                                            if($i==$page) {
                                                $active = "active";
                                            }
                                            else {
                                                $active = "";
                                            }

                                            if($i<=($pageSql+10) && $i>$pageSql || $pageFooter<=10) {

                                                ?>

                                                <li class="page-item <?php echo $active ?>"><a class="page-link"
                                                                                               href="?page_no=<?php echo $i ?>"><?php echo $i ?></a>
                                                </li>
                                                <?php
                                            }
                                        }

                                        $nextPage=$page+1;


                                        if($nextPage>$pageFooter)
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0);"><i class="la la-angle-right"></i></a></li>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <li class="page-item page-indicator"><a class="page-link" href="?page_no=<?php echo $nextPage ?>"><i class="la la-angle-right"></i></a></li>
                                            <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

        </div>



        <div class="modal fade" id="career_list"  data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">


                        <h5 class="modal-title" id="title">Tariff</h5>

                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">




                        <div class="basic-form" style="color: black;">
                            <form id="career_form" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Sponcer Type</label>
                                        <select data-search="true" class="form-control tail-select w-full" id="sponcer_type" name="sponcer_type" style="border-color: #181f5a;color: black">
                                            <option value=''>Select Sponcer Type</option>
                                            <option value='food'>Food</option>
                                            <option value='medicine'>Medicine</option>
                                            <option value='grocery'>Grocery</option>
                                            <option value='old_age'>Old Age Home</option>
                                            <option value='child_home'>Children Home</option>
                                        </select>
                                        <input type="hidden" class="form-control"  id="api" name="api">
                                        <input type="hidden" class="form-control"  id="tariff_id" name="tariff_id">
                                        <input type="hidden" class="form-control"  id="old_pa_id" name="old_pa_id">
                                    </div>

                                    <div class="form-group col-md-12" id="sponcer_fors">
                                        <label>Sponcer For*</label>
                                        <input type="text" class="form-control" placeholder="Sponcer For" id="sponcer_for" name="sponcer_for" style="border-color: #181f5a;color: black">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Amount*</label>
                                        <input type="text" class="form-control" placeholder="Amount" id="budget" name="budget" style="border-color: #181f5a;color: black">
                                    </div>

                                    <div class="form-group col-md-12" id="food_types">
                                        <label>Food Type*</label>
                                        <select data-search="true" class="form-control tail-select w-full" id="food_type" name="food_type" style="border-color: #181f5a;color: black">
                                            <option value='break_fast'>Break Fast</option>
                                            <option value='lunch'>Lunch</option>
                                            <option value='dinner'>Dinner</option>
                                        </select>
                                        <!--                                        <input type="text" class="form-control" placeholder="Food Type" id="food_type" name="food_type" style="border-color: #181f5a;color: black">-->
                                    </div>

                                    <!--                                    <div class="form-group col-md-12" id="times">-->
                                    <!--                                        <label>Date*</label>-->
                                    <!--                                        <input type="date" class="form-control" placeholder="Date" id="date" name="date" style="border-color: #181f5a;color: black">-->
                                    <!--                                    </div>-->

                                </div>


                            </form>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>
                        <button type="button" class="btn btn-primary" id="add_btn">ADD</button>
                    </div>
                </div>
            </div>
        </div>






    </div>



    <!--    <div class="modal fade" id="image_modal"  data-keyboard="false" data-backdrop="static">-->
    <!--        <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--            <div class="modal-content">-->
    <!--                <div class="modal-header" style="border: 1px solid transparent;">-->
    <!---->
    <!---->
    <!---->
    <!--                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--                <div class="modal-body">-->
    <!---->
    <!--                    <img src="" style="width:100%" id="modal_images">-->
    <!--                </div>-->
    <!--                <div class="modal-footer">-->
    <!--                    <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <?php Include ('../includes/footer.php') ?>



</div>
<!---->
<!--<script>-->
<!--    function imgModal(src) {-->
<!--        document.getElementById('modal_images').setAttribute("src",'../../event/event_img/'+src+'.jpg');-->
<!---->
<!--    }-->
<!---->
<!--</script>-->

<script src="../vendor/global/global.min.js"></script>
<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../js/custom.min.js"></script>
<script src="../js/dlabnav-init.js"></script>
<script src="../vendor/owl-carousel/owl.carousel.js"></script>

<script src="../vendor/peity/jquery.peity.min.js"></script>

<!--<script src="../vendor/apexchart/apexchart.js"></script>-->

<script src="../js/dashboard/dashboard-1.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="../js/plugins-init/jquery.validate-init.js"></script>


<script src="../vendor/moment/moment.min.js"></script>
<script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>



<script src="../vendor/summernote/js/summernote.min.js"></script>
<script src="../js/plugins-init/summernote-init.js"></script>


<script>
    // Get references to the dropdown and input field
    const sponcer_type = document.getElementById('sponcer_type');
    const food_type = document.getElementById('food_types');
    // const date = document.getElementById('times');
    const sponcer_for = document.getElementById('sponcer_fors');


    // Add an event listener to the dropdown
    sponcer_type.addEventListener('change', function () {
        if (sponcer_type.value === 'food' || sponcer_type.value === 'medicine' || sponcer_type.value === 'grocery') {
            // Hide the input field when 'Hide Input Field' is selected
            food_type.style.display = 'none';
            sponcer_for.style.display = 'block';
        }
        else {
            // Show the input field for other selections
            food_type.style.display = 'block';
            // date.style.display = 'block';
            sponcer_for.style.display = 'none';
        }
    });
</script>

<script>


    // function imgModal(src) {
    //     document.getElementById('modal_images').setAttribute("src",'../../event/event_img/'+src+'.jpg');
    //
    // }

    function addTitle() {
        $("#title").html("Add Tariff");
        $('#career_form')[0].reset();
        $('#api').val("add_api.php")
        // $('#game_id').prop('readonly', false);

    }

    function editTitle(data) {

        $("#title").html("Edit Tariff- "+data);
        $('#career_form')[0].reset();
        $('#api').val("edit_api.php");

        $.ajax({

            type: "POST",
            url: "view_api.php",
            data: 'tariff_id='+data,
            dataType: "json",
            success: function(res){
                if(res.status=='success')
                {

                    $("#sponcer_for").val(res.sponcer_for);
                    $("#sponcer_type").val(res.sponcer_type);
                    $("#tariff_id").val(res.tariff_id);
                    $("#budget").val(res.budget);
                    $("#food_type").val(res.food_type);
                    // $("#date").val(res.date);
                    //$("#Designation").val(res.Designation);
                    // $("#emp_id").val(res.emp_id);

                    // $('#game_id').prop('readonly', true);

                    var edit_model_title = "Edit Tariff - "+data;
                    $('#title').html(edit_model_title);
                    $('#add_btn').html("Save");


                    $('#career_list').modal('show');


                }
                else if(res.status=='wrong')
                {
                    swal("Invalid",  res.msg, "warning")
                        .then((value) => {
                            window.window.location.reload();
                        });

                }
                else if(res.status=='failure')
                {
                    swal("Failure",  res.msg, "error")
                        .then((value) => {
                            window.window.location.reload();

                        });

                }
            },
            error: function(){
                swal("Check your network connection");

                window.window.location.reload();

            }

        });

    }



    //to validate form
    $("#career_form").validate(
        {
            ignore: '.ignore',
            // Specify validation rules
            rules: {


                budget: {
                    required: true
                },
                sponcer_type: {
                    required: true
                },
                sponcer_for: {
                    required: true
                },
                food_type: {
                    required: true
                },



            },
            // Specify validation error messages
            messages: {
                sponcer_type: "*This field is required",
                sponcer_for: "*This field is required",
                budget: "*This field is required",
                food_type: "*This field is required",
                // date: "*This field is required",
                // upload_image: "*This field is required",

            }
            // Make sure the form is submitted to the destination defined
        });

    //add data

    $('#add_btn').click(function () {




        $("#career_form").valid();



        if($("#career_form").valid()==true) {


            var api = $('#api').val();
            var form = $("#career_form");

            var formData = new FormData(form[0]);
            this.disabled = true;
            this.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
            $.ajax({

                type: "POST",
                url: api,
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (res) {
                    if (res.status == 'success') {
                        Swal.fire(
                            {
                                title: "Success",
                                text: res.msg,
                                icon: "success",
                                button: "OK",
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                closeOnClickOutside: false,
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
                            }
                        )
                            .then((value) => {

                                document.getElementById("add_btn").disabled = false;
                                document.getElementById("add_btn").innerHTML = 'Add';
                            });

                    }
                },
                error: function () {

                    Swal.fire('Check Your Network!');
                    document.getElementById("add_btn").disabled = false;
                    document.getElementById("add_btn").innerHTML = 'Add';
                }

            });



        } else {
            document.getElementById("add_btn").disabled = false;
            document.getElementById("add_btn").innerHTML = 'Add';

        }


    });


    //
    //delete model

    function delete_model(data) {

        Swal.fire({
            title: "Delete",
            text: "Are you sure want to delete the record?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            closeOnClickOutside: false,
            showCancelButton: true,
            cancelButtonText: 'Cancel'
        })
            .then((value) => {
                if(value.isConfirmed) {

                    $.ajax({

                        type: "POST",
                        url: "delete_api.php",
                        data: 'tariff_id='+data,
                        dataType: "json",
                        success: function(res){
                            if(res.status=='success')
                            {
                                Swal.fire(
                                    {
                                        title: "Success",
                                        text: res.msg,
                                        icon: "success",
                                        button: "OK",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        closeOnClickOutside: false,
                                    }
                                )
                                    .then((value) => {
                                        window.window.location.reload();

                                    });
                            }
                            else if(res.status=='failure')
                            {
                                swal(
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
                                        window.window.location.reload();
                                    });

                            }
                        },
                        error: function(){
                            swal("Check your network connection");

                        }

                    });

                }

            });

    }

    $( document ).ready(function() {
        $('#search').val('<?php echo $search;?>');

    });

</script>


</body>
</html>
