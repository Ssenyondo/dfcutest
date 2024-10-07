<?php
/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-06 16:33:23
 * @modify date 2024-10-06 16:33:23
 * @desc [description]
 */
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="dfcu HR API client app">
    <meta name="author" content="William Ssenyondo">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('public/assets/images/favicon.png')?>">
    <title><?=esc($title)?></title>
    <!-- Custom CSS -->
    <link href="<?=base_url('public/dist/css/style.min.css')?>" rel="stylesheet">

     <!-- This Page CSS -->
     <link rel="stylesheet" type="text/css" href="<?=base_url('public/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?=base_url('public/assets/images/big/auth-bg.jpg')?>) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <span class="db"><img src="<?=base_url('public/assets/images/logo-icon.png')?>" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Create new employee</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">

                            <?php if (session()->has('message')) { ?>
                                <div class="alert <?=session()->getFlashdata('alert-class')?>">
                                    <?=session()->getFlashdata('message')?>
                                </div>
                            <?php } ?>
                            <?php $validation = \Config\Services::validation(); ?>

                            <form class="form-horizontal m-t-20" method="post" enctype="multipart/form-data" action="<?=site_url('editstaff')?>" novalidate>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <h5>Employee ID <span class="text-danger">*</span></h5>
                                        <input name="emp_id" class="form-control form-control-lg" type="text" required data-validation-required-message="This field is required" aria-invalid="true">
                                        <?php if($validation->getError('emp_id')) {?>
                                            <label style="color:#f0643b"><?= $error = $validation->getError('emp_id')?></label>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <h5>Employee date of birth <span class="text-danger">*</span></h5>
                                        <input name="emp_dob" class="form-control form-control-lg mydatepicker" type="text" placeholder="mm/dd/yyyy" required data-validation-required-message="This field is required" aria-invalid="true">
                                        <?php if($validation->getError('emp_dob')) {?>
                                            <label style="color:#f0643b"><?= $error = $validation->getError('emp_dob')?></label>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <h5>Employee photo</h5>
                                        <input name="emp_photo" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " type="submit ">UPDATE</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        dfcu HR Portal <?php echo anchor('/', '<b>Register</b>', 'class="text-info m-l-5"') ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?=base_url('public/assets/libs/jquery/dist/jquery.min.js')?>"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url('public/assets/libs/popper.js/dist/umd/popper.min.js')?>"></script>
    <script src="<?=base_url('public/assets/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!--Custom JavaScript -->
    <script src="<?=base_url('public/dist/js/custom.min.js')?>"></script>
    <script src="<?=base_url('public/assets/extra-libs/jqbootstrapvalidation/validation.js')?>"></script>

    <!-- This Page JS -->
    <script src="<?=base_url('public/assets/libs/moment/moment.js')?>"></script>
    <script src="<?=base_url('public/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>

    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>

    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>
