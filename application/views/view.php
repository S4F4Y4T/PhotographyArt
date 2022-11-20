<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotographyArt</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin:0">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <?php
                    if(isset($artist)){
                        foreach($artist as $value){
                            ?>

                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <h3 class="profile-username text-center"><?= $value['name']; ?></h3>

                                        <p class="text-muted text-center">Photographer</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Email</b> <div class="float-right"><?= $value['email']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gender</b> <div class="float-right"><?= $value['gender']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Photography Type</b> <div class="float-right"><?= $value['type']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Years of Experience</b> <div class="float-right"><?= $value['experience']; ?></div>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <p class="text-muted">
                                            <?= $value['description']; ?>
                                        </p>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </div>
                            <!-- /.col -->



                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2 row">
                                        <div class="col-md-11">
                                            Artist's Profile
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                                <?php
                                                    if(isset($booked) && $booked == true){
                                                        echo "This artist already booked";
                                                    }else{
                                                ?>
                                                <a class="btn btn-primary" href="<?= base_url(); ?>visitors/booking/<?= $this->uri->segment('3'); ?>">Booking</a>
                                                <?php } ?>
                                            </div>
                                            <!-- /.tab-pane -->

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <?php
                        }
                    }
                    ?>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        </div>
        <strong>PhotographyArt</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/api/artists.js"></script>
</body>
</html>
