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
                        <h1>Home</h1>
                        <p>welcome <?= $this->user_model->get_user('visitors')[0]['name']; ?></p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a class="btn btn-primary" href="<?= base_url(); ?>visitors/logout">Logout</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Artists</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                id
                            </th>
                            <th style="width: 20%">
                                Artists Name
                            </th>
                            <th style="width: 8%">
                                Email
                            </th>
                            <th style="width: 20%" class="text-center">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            if(isset($artists)){
                                foreach ($artists as $value){
                        ?>
                        <tr>
                            <td>
                                <?= $value['id']; ?>
                            </td>
                            <td>
                                <?= $value['name']; ?>
                            </td>
                            <td>
                                <?= $value['email']; ?>
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>/visitors/view/<?= $value['id']; ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                    <?php
                                    $user_id = $this->user_model->check_login();
                                    $booking = validate_booking($user_id,  $value['id']);
                                    if($booking){
                                        echo '<span style="opacity: 0.3;cursor: default" class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt"></i>
                                                Booked
                                            </span>';
                                    }else {
                                        echo '<a class="btn btn-info btn-sm" href="'.base_url().'visitors/booking/'.$value['id'].'">
                                                <i class="fas fa-pencil-alt"></i>
                                                Booking
                                            </a>';
                                    }?>

                            </td>
                        </tr>

                        <?php
                            } }
                        ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
