<?php Include("../includes/connection.php");
date_default_timezone_set("Asia/kolkata");

error_reporting(0);
$page= $_GET['page_no'];
$search= $_GET['search'];
$children_type= $_GET['child_type']== ''?"all":$_GET['child_type'];

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
    <title>Children profile</title>

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

    $header_name ="Children";
    Include ('../includes/header.php') ?>



    <div class="content-body">
        <div class="page-titles" style="margin-left: 21px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Children</a></li>


            </ol>

        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Children List</h4>
                    <div style="display: flex;justify-content: flex-end;">
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label>Children Type</label>
                                <select data-search="true" class="form-control tail-select w-full" id="child_type" name="child_type" style="border-radius:20px;color:black;border:1px solid black;">
                                    <option value='all'>All</option>
                                    <option value='current project'>current project</option>
                                    <option value='completed project'>completed project</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">

                                <input type="text" class="form-control" placeholder="Search By Children ID" name="search" id="search" style="border-radius:20px;color:black;" >
                            </div>
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
                                <th><strong>Children ID</strong></th>
                                <th><strong>Children Name</strong></th>
                                <th><strong>Children Type</strong></th>

<!--                                <th><strong>Address</strong></th>-->
                                <th><strong>Amount</strong></th>
                                <th><strong>Description</strong></th>
                                <th><strong>Image</strong></th>
                                <th><strong>pdf</strong></th>
                                <th><strong>Action</strong></th>


                            </tr>
                            </thead>
                            <?php
                            if($search == "" && $children_type == "all") {
                                $sql = "SELECT * FROM children WHERE id>0 $addedBranchSerach  ORDER BY id  LIMIT $start,10";
                            }
                            elseif($search != "" && $children_type == "all") {
                                $sql = "SELECT * FROM children WHERE children_id LIKE '%$search%' $addedBranchSerach ORDER BY id  LIMIT $start,10";
                            }
                            elseif($search == "" && $children_type != "all") {
                                $sql = "SELECT * FROM children WHERE child_type = '$children_type' $addedBranchSerach ORDER BY id  LIMIT $start,10";
                            }
                            else {
                                $sql = "SELECT * FROM children WHERE children_id LIKE '%$search%' AND child_type = '$children_type' $addedBranchSerach ORDER BY id  LIMIT $start,10";
                            }

//                            if($search == "") {
//                                $sql = "SELECT * FROM children ORDER BY id  LIMIT $start,10";
//                            }
//                            else {
//                                $sql = "SELECT * FROM children WHERE name = '$search' ORDER BY id  LIMIT $start,10";
//                            }
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

                            $offer_letter_pdf = $row['pdf'];
                            if($offer_letter_pdf == 1) {
                                $offer_letter_pdfs = "badge-success";
                                $offer_letterLink = "../../children_pdf/".$row['children_id'].".pdf";
                                $targetLink = 'target="_blank"';
                            }
                            else {
                                $offer_letter_pdfs = "badge-danger";
                                $offer_letterLink = "javascript:void(0)";
                                $targetLink = "";
                            }

                            ?>
                            <tbody>
                            <tr>
                                <td><strong><?php echo $sNo;?></strong></td>
                                <td><?php echo $row['children_id']?></td>

                                <td> <?php echo $row['name']?> </td>
                                <td> <?php echo $row['child_type']?> </td>
<!--                                <td> --><?php //echo $row['address']?><!-- </td>-->
                                <td> <?php echo $row['amount']?> </td>
                                <td> <?php echo substr($row['description'],0,100).'...'?> </td>
                                <td style="cursor: pointer">   <span class="badge badge-pill <?php echo $img_upload?> ml-2" data-toggle="modal" data-target="<?php echo $img_modal?>" onclick="imgModal('<?php echo $row['children_id']; ?>')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                              <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                              <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                                            </svg>
                                        </span>
                                </td>
                                <td style="cursor: pointer">
                                    <a href="<?php echo $offer_letterLink?>" <?php echo $targetLink?>>
                                    <span class="badge badge-pill <?php echo $offer_letter_pdfs?> ml-2">
                                   <svg height="16" width="16" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 370.32 370.32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#020202;" d="M148.879,85.993H95.135c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15h53.744 c8.284,0,15-6.716,15-15C163.879,92.709,157.163,85.993,148.879,85.993z"></path> <path style="fill:#020202;" d="M148.879,148.327H95.135c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15h53.744 c8.284,0,15-6.716,15-15C163.879,155.043,157.163,148.327,148.879,148.327z"></path> <path style="fill:#020202;" d="M211.944,253.354v14.608h7.717c9.359,0,9.359-5.599,9.359-7.439c0-1.775,0-7.17-9.359-7.17H211.944z "></path> <path style="fill:#020202;" d="M325.879,225.752h-24.41V73.703c0-3.934-1.56-7.705-4.344-10.484l-58.876-58.88 C235.465,1.561,231.699,0,227.765,0H50.58C34.527,0,21.469,13.059,21.469,29.112v312.095c0,16.054,13.059,29.113,29.111,29.113 h221.777c16.052,0,29.111-13.06,29.111-29.113v-30.048h24.41c12.687,0,22.973-10.285,22.973-22.973v-39.462 C348.852,236.038,338.566,225.752,325.879,225.752z M269.855,337.906H53.082V32.414H207.17V75.99 c0,10.555,8.554,19.107,19.105,19.107h43.58v130.655h-74.178c-12.688,0-22.973,10.286-22.973,22.973v39.462 c0,12.688,10.285,22.973,22.973,22.973h74.178V337.906z M238.51,260.523c0,10.441-7.224,16.928-18.85,16.928h-7.717v8.977 c0,2.316-1.877,4.197-4.195,4.197h-1.097c-2.319,0-4.197-1.881-4.197-4.197v-38.366c0-2.316,1.878-4.197,4.197-4.197h13.009 C231.287,243.864,238.51,250.246,238.51,260.523z M262.305,290.625H247.21c-2.319,0-4.197-1.881-4.197-4.197v-38.366 c0-2.316,1.877-4.197,4.197-4.197h15.095c13.148,0,23.845,10.5,23.845,23.409C286.15,280.15,275.454,290.625,262.305,290.625z M322.455,249.156c0,2.32-1.878,4.197-4.197,4.197h-17.045v10.053h14.521c2.317,0,4.197,1.875,4.197,4.195v1.099 c0,2.316-1.88,4.197-4.197,4.197h-14.521v13.53c0,2.316-1.877,4.197-4.196,4.197h-1.096c-2.32,0-4.197-1.881-4.197-4.197v-38.366 c0-2.316,1.877-4.197,4.197-4.197h22.337c2.319,0,4.197,1.881,4.197,4.197V249.156z"></path> <path style="fill:#020202;" d="M262.305,253.354h-9.803v27.782h9.803c7.915,0,14.355-6.222,14.355-13.862 C276.661,259.598,270.221,253.354,262.305,253.354z"></path> </g> </g></svg>
                                        </span>
                                    </a>
                                </td>




                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" data-toggle="modal" data-target="#career_list" style="cursor: pointer" onclick="editTitle('<?php echo $row['children_id'];?>')">Edit</a>
                                            <a class="dropdown-item" style="cursor: pointer" onclick="delete_model('<?php echo $row['children_id'];?>')">Delete</a>

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
                                    if($search == "" && $children_type == "all") {
                                        $sql = "SELECT COUNT(id) as count FROM children WHERE id>0 $addedBranchSerach ";
                                    }
                                    elseif($search != "" && $children_type == "all") {
                                        $sql = "SELECT COUNT(id) as count FROM children WHERE children_id LIKE '%$search%' $addedBranchSerach";
                                    }
                                    elseif($search == "" && $children_type != "all") {
                                        $sql = "SELECT COUNT(id) as count FROM children WHERE child_type = '$children_type' $addedBranchSerach";
                                    }
                                    else {
                                        $sql = "SELECT COUNT(id) as count FROM children WHERE children_id LIKE '%$search%' AND child_type = '$children_type' $addedBranchSerach";
                                    }


//                                    if($search == "") {
//                                        $sql = "SELECT COUNT(id) as count FROM children";
//                                    }
//                                    else {
//                                        $sql = "SELECT COUNT(id) as count FROM children WHERE name = '$search'";
//                                    }
                                    // $sql = 'SELECT COUNT(id) as count FROM career;';
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


                        <h5 class="modal-title" id="title">Children</h5>

                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">




                        <div class="basic-form" style="color: black;">
                            <form id="career_form" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-md-6" id="children_types">
                                        <label>Children Type</label>
                                        <select data-search="true" class="form-control tail-select w-full" id="children_type" name="children_type" style="border-color: #181f5a;color: black">
                                            <option value=''>Select Type</option>
                                            <option value='completed project'>Completed Project</option>
                                            <option value='current project'>Current Project</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6" id="children_names">
                                        <label>Children Name*</label>
                                        <input type="text" class="form-control" placeholder="Children Name" id="children_name" name="children_name" style="border-color: #181f5a;color: black">
                                        <input type="hidden" class="form-control"  id="api" name="api">
                                        <input type="hidden" class="form-control"  id="children_id" name="children_id">
                                    </div>

                                    <div class="form-group col-md-6" id="amounts">
                                        <label>Amount*</label>
                                        <input type="text" class="form-control" placeholder="Amount" id="amount" name="amount" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6"id="diseases">
                                        <label>Disease Name*</label>
                                        <input type="text" class="form-control" placeholder="Disease name" id="disease" name="disease" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6" id="hospitals">
                                        <label>Hospital Name*</label>
                                        <input type="text" class="form-control" placeholder="Hospital Name" id="hospital" name="hospital" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6" id="descriptions">
                                        <label>Description*</label>
                                        <input type="text" class="form-control" placeholder="Description" id="description" name="description" style="border-color: #181f5a;color: black">
                                    </div>
                                    <div class="form-group col-md-6" id="upload_images">
                                        <label for="upload_image">Image (1 MB)* 370px width & 370 height</label>
                                        <input type="file" class="form-control" placeholder="Upload Image" id="upload_image" name="upload_image" style="border-color: #181f5a;color: black" accept=".jpg,.jpeg">
                                    </div>
                                    <div class="form-group col-md-6" id="upload_pdfs">
                                        <label for="upload_pdf">Children Pdf *</label>
                                        <input type="file" class="form-control" placeholder="Upload pdf" id="upload_pdf" name="upload_pdf" style="border-color: #181f5a;color: black" accept=".pdf">
                                    </div>



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



    <div class="modal fade" id="image_modal"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border: 1px solid transparent;">



                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="" style="width:100%" id="modal_images">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal" style="background-color: red; color: white;">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php Include ('../includes/footer.php') ?>



</div>

<script>
    function imgModal(src) {
        document.getElementById('modal_images').setAttribute("src",'pay_img/'+src+'.jpg');

    }

</script>

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
<script src="../js/change.js"></script>

<script>
    // Get references to the dropdown and input field
    const children_type = document.getElementById('children_type');
    const children_types = document.getElementById('children_types');
    const children_name = document.getElementById('children_names');
    const amount = document.getElementById('amounts');
    const disease = document.getElementById('diseases');
    const hospital = document.getElementById('hospitals');
    const description = document.getElementById('descriptions');
    const upload_image = document.getElementById('upload_images');
    const upload_pdf = document.getElementById('upload_pdfs');

    // Add an event listener to the dropdown
    children_type.addEventListener('change', function () {

        a(children_type.value);

    });

    function a(values) {
        if (values === 'completed project') {
            // Hide the input field when 'Hide Input Field' is selected
            upload_pdf.style.display = 'none';
            description.style.display = 'none';
            hospital.style.display = 'none';
            amount.style.display = 'none';
            disease.style.display = 'block';
            children_name.style.display = 'block';
            upload_image.style.display = 'block';
            children_types.style.display = 'block';

            document.getElementById('hospital').className +=" ignore";
            document.getElementById('amount').className +=" ignore";
            document.getElementById('description').className +=" ignore";
            document.getElementById('upload_pdf').className +=" ignore";
        }
        else {
            // Show the input field for other selections
            upload_image.style.display = 'block';
            upload_pdf.style.display = 'block';
            children_name.style.display = 'block';
            children_types.style.display = 'block';
            amount.style.display = 'block';
            description.style.display = 'block';
            hospital.style.display = 'block';
            disease.style.display = 'block';

            document.getElementById('hospital').classList.remove('ignore');
            document.getElementById('amount').classList.remove('ignore');
            document.getElementById('description').classList.remove('ignore');
            // document.getElementById('upload_pdf').classList.remove('ignore');
        }
    }
</script>

<script>


    function imgModal(src) {
        document.getElementById('modal_images').setAttribute("src",'../../children_img/'+src+'.jpg');

    }

    function addTitle() {
        $("#title").html("Add Children");
        $('#career_form')[0].reset();
        $('#api').val("add_api.php")
        // $('#game_id').prop('readonly', false);

        document.getElementById('upload_image').classList.remove('ignore');
        document.getElementById('upload_pdf').classList.remove('ignore');
    }

    function editTitle(data) {

        $("#title").html("Edit Children- "+data);
        $('#career_form')[0].reset();
        $('#api').val("edit_api.php");
        document.getElementById('upload_image').classList.add('ignore');
        document.getElementById('upload_pdf').classList.add('ignore');
        $.ajax({

            type: "POST",
            url: "view_api.php",
            data: 'children_id='+data,
            dataType: "json",
            success: function(res){
                if(res.status=='success')
                {
                    $("#children_name").val(res.children_name);
                    $("#children_type").val(res.children_type);

                    $("#amount").val(res.amount);
                    $("#hospital").val(res.hospital);
                    $("#disease").val(res.disease);
                    $("#description").val(res.description);
                    $("#children_id").val(res.children_id);



                    a(res.children_type);

                    // $('#game_id').prop('readonly', true);

                    var edit_model_title = "Edit children - "+data;
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

                children_name: {
                    required: true
                },
                children_type: {
                    required: true
                },

                amount: {
                    required: true
                },
                hospital: {
                    required: true
                },
                disease: {
                    required: true
                },
                description: {
                    required: true
                },

                upload_image: {
                    required: true
                },
                upload_pdf: {
                    required: true
                },


            },
            // Specify validation error messages
            messages: {
                children_name: "*This field is required",
                children_type: "*This field is required",
                amount: "*This field is required",
                disease: "*This field is required",
                hospital: "*This field is required",
                description: "*This field is required",
               
                upload_image: "*This field is required",
                upload_pdf: "*This field is required",
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
                        data: 'children_id='+data,
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

    // $('#children_type').on('change', function() {
    //     if(this.value == 'current project'){
    //         document.getElementById('upload_pdf').classList.add('ignore');
    //     }
    //     else{
    //         document.getElementById('upload_pdf').classList.remove('ignore');
    //     }
    //
    // });

    $('#children_type').on('change', function() {
        if(this.value == 'completed project'){
            document.getElementById('upload_pdf').classList.add('ignore');
        }
        else{
            document.getElementById('upload_pdf').classList.remove('ignore');
        }

    });
</script>


</body>
</html>
