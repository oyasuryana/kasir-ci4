
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/vendors/feather/feather.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/ti-icons/css/themify-icons.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/typicons/typicons.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.base.css');?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/css/vertical-layout-light/style.css');?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png');?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
<!--                <img src="<?=base_url('assets/images/logo.svg');?>" alt="logo">-->
                <h2 class="fw-bold">ukkPOS</h2>
              </div>
              <h6 class="fw-light">Silahkan login dengan akun Anda</h6>
              <form class="pt-3" action="<?=site_url('/dashboard');?>">
                <div class="form-group">
                  <input type="email" name="txtUser" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="txtPassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >MASUK</button>
                </div>



                <div class="text-center mt-4 fw-light">
                  Belum punya akun ? <a href="register.html" class="text-primary">Buat Akun</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=site_url('assets/vendors/js/vendor.bundle.base.js');?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=site_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js');?>"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=site_url('assets/js/off-canvas.js');?>"></script>
  <script src="<?=site_url('assets/js/hoverable-collapse.js');?>"></script>
  <script src="<?=site_url('assets/js/template.js');?>"></script>
  <script src="<?=site_url('assets/js/settings.js');?>"></script>
  <script src="<?=site_url('assets/js/todolist.js');?>"></script>
  <!-- endinject -->
</body>

</html>
