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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
      <a href=""><b>Photography</b>Art</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new Artist</p>

      <form action="<?php echo site_url(); ?>artists/processs_signup" id="registration" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='name' placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name='email' placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='password' placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='passconf' placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
              <select class="custom-select form-control-border" name='gender' id="exampleSelectBorder">
                  <option value="Male" selected>Male</option>
                  <option value="Female">Female</option>
              </select>
          </div>
          <div class="input-group mb-3">
              <input type="text" class="form-control" name='type' placeholder="Type of photography">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-user"></span>
                  </div>
              </div>
          </div>
          <div class="input-group mb-3">
              <input type="number" class="form-control" name='experience' placeholder="Number of Experience years">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-user"></span>
                  </div>
              </div>
          </div>
          <div class="input-group mb-3">
              <textarea class="form-control" name='description' placeholder="Write something about you withing 100 words"></textarea>
          </div>

          <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?= base_url(); ?>/artists" class="text-center">I am already a Artist</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script>
    let base = "<?= base_url(); ?>";
</script>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/api/artists.js"></script>
</body>
</html>
