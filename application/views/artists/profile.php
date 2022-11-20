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
                                        <b>Email</b> <a class="float-right"><?= $value['email']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right"><?= $value['gender']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Photography Type</b> <a class="float-right"><?= $value['type']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Years of Experience</b> <a class="float-right"><?= $value['experience']; ?></a>
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
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit Profile</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="<?= base_url(); ?>artists/logout">Logout</a>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        You are logged in
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="edit">
                                        <form action="<?php echo site_url(); ?>artists/update" id="update" method="post">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name='name' class="form-control" id="inputName" value="<?= $value['name']; ?>" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name='email' class="form-control" id="inputEmail" value="<?= $value['email']; ?>" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select form-control-border" name='gender' id="exampleSelectBorder">
                                                        <?php if($value['gender'] == 'Male'){
                                                            echo "<option value='Male' selected >Male</option>";
                                                            echo "<option value='Female'>Female</option>";
                                                        }else{
                                                            echo "<option value='Male' >Male</option>";
                                                            echo "<option value='Female' selected>Female</option>";
                                                        }  ?>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Type Of Photography</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name='type' value="<?= $value['type']; ?>" placeholder="Type of photography">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Years Of Experience</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name='experience' value="<?= $value['experience']; ?>" placeholder="Number of Experience years">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">About Me</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name='description'>
                                                        <?= $value['description']; ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </div>
                                        </form>
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
