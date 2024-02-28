<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/vendors/feather/feather.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/typicons/typicons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
<!--  <link rel="stylesheet" href="<?=base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">-->
<!--  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/select.dataTables.min.css')?>">-->
<!-- End plugin css for this page -->
<!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/css/vertical-layout-light/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.png');?>" />
</head>

<body class="with-welcome-text">
  
    <!-- partial:partials/_navbar.html -->
    
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="<?=site_url('/dashboard');?>">
        <img src="<?=base_url('assets/images/logo.svg');?>" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="<?=site_url('/dashboard');?>">
        <img src="<?=base_url('assets/images/logo-mini.svg');?>" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top">
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold">Oya Suryana</span></h1>
        <h3 class="welcome-sub-text">Your performance summary this week </h3>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      


      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="<?=base_url('assets/images/faces/face8.jpg');?>" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="<?=base_url('assets/images/faces/face8.jpg');?>" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
            <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
          </div>
          <a href="<?=site_url('/profile');?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
            Profile</a>
          <a href="<?=site_url('/logout');?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
    <!-- partial -->
<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/dashboard');?>">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">Master Data</li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/pengguna');?>"">
        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
        <span class="menu-title">Pengguna</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/pelanggan');?>"">
        <i class="mdi mdi-account-box-outline menu-icon"></i>
        <span class="menu-title">Pelanggan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/produk');?>"">
        <i class="mdi mdi-apps menu-icon"></i>
        <span class="menu-title">Produk</span>
      </a>
    </li>
    <li class="nav-item nav-category">Transaksi</li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/penjualan');?>"">
        <i class="mdi mdi-apple-keyboard-caps menu-icon"></i>
        <span class="menu-title">Penjualan</span>
      </a>
    </li>
    
    <li class="nav-item nav-category">Laporan</li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/laporan-pendapatan');?>"">
        <i class="mdi mdi-archive-outline menu-icon"></i>
        <span class="menu-title">Pendapatan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('/laporan-stok');?>"">
        <i class="mdi mdi-archive-outline menu-icon"></i>
        <span class="menu-title">Stok Barang</span>
      </a>
    </li>
  </ul>
</nav>
      <!-- partial -->
      <div class="main-panel">  
      <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="border-radius:15px">
                <div class="card-body" style="min-height:400px">
                  <?php			
                  if(isset($judulHalaman)){
                    echo $this->renderSection('konten');
                  } else {
                    include('panel.php');
                  }
                  ?>              
                </div>
            </div>
        </div>
    </div>         

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
        href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
    <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
  </div>
</footer>
        <!-- partial -->
</div>
      <!-- main-panel ends -->
</div>
    <!-- page-body-wrapper ends -->
</div>

<!-- modal-bootstrap -->
  <div id="dataConfirmModal" class="modal fade bs-modal-sm" tableindex="-1" role="dialog" aria-hiden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="dataConfrimLabel">Konfirmasi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true"> Tidak </button>
				<a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"> Ya </a>
			</div>
		</div>
	</div>
</div>

  <!-- plugins:js -->
  <script src="<?=base_url('assets/vendors/js/vendor.bundle.base.js');?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=base_url('assets/vendors/chart.js/Chart.min.js');?>"></script>
  <script src="<?=base_url('assets/js/template.js');?>"></script>
  <!-- pangggil jquery mask -->
  <script src="<?=base_url('assets/jquery-mask/jquery.mask.js');?>"></script>
  
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!--<script src="<?=base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js');?>"></script>-->
  <!--<script src="<?=base_url('assets/vendors/progressbar.js/progressbar.min.js');?>"></script>-->
  <script src="<?=base_url('assets/js/off-canvas.js');?>"></script>
  <!--<script src="<?=base_url('assets/js/hoverable-collapse.js');?>"></script>-->
  <script src="<?=base_url('assets/js/settings.js');?>"></script>
  <!--<script src="<?=base_url('assets/js/todolist.js');?>"></script>-->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!--<script src="<?=base_url('assets/js/jquery.cookie.js');?>" type="text/javascript"></script>-->
  <!--<script src="<?=base_url('assets/js/proBanner.js');?>"></script>-->
  <!-- <script src="<?=base_url('assets/js/Chart.roundedBarCharts.js');?>"></script> -->
  <!-- End custom js for this page-->
 <script src="<?=base_url('assets/js/dashboard.js');?>"></script>
  <script>
    $(document).ready(function(){
      // memformat uang

      /*
    var urlTemp=$(location).attr('href');
	  var segment=urlTemp.split('/');
    alert(segment[4]);
    */  
    $('.uang').mask('000.000.000.000.000', {reverse: true});

    if ($("#leaveReport").length) { 
      const leaveReportCanvas = document.getElementById('leaveReport');
      new Chart(leaveReportCanvas, {
        type: 'bar',
        data: {
          labels: <?=isset($sourceLabelGrafik) ? $sourceLabelGrafik : '["Kosong"]';?>,
          
          datasets: [{
              label: 'Bulan',
              data: <?=isset($sourceDataGrafik) ? $sourceDataGrafik : '[0]';?>,
              backgroundColor: "#52CDFF",
              borderColor: [
                  '#52CDFF',
              ],
              borderWidth: 0,
              fill: true, // 3: no fill
              barPercentage: 0.5,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            line: {
                tension: 0.4,
            }
        },
          scales: {
            yAxes: {
              display: true,
              grid: {
                display: false,
                drawBorder: false,
                color:"rgba(255,255,255,.05)",
                zeroLineColor: "rgba(255,255,255,.05)",
              },
              ticks: {
                beginAtZero: true,
                autoSkip: true,
                maxTicksLimit: 5,
                fontSize: 10,
                color:"#6B778C",
                font: {
                  size: 14,
                }
              }
            },
            xAxes: {
              display: true,
              grid: {
                display: false,
              },
              ticks: {
                beginAtZero: false,
                autoSkip: true,
                maxTicksLimit: 7,
                fontSize: 14,
                color:"#6B778C",
                font: {
                  size: 14,
                }
              }
            }
          },
          plugins: {
            legend: {
                display: false,
            }
          }
        }
      });
    }


    });
  </script>
</body>

</html>
