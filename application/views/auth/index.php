<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login | siMAYA</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
  <!-- adminpro icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminpro-custon-icon.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/meanmenu.min.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.mCustomScrollbar.min.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/normalize.css">
  <!-- form CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/form.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- Header top area start-->

  <!-- login Start-->

  <div class="login-form-area animated bounceInDown col-lg-12 ">
    <div class="container-fluid">
      <div class="col-lg-4"></div>
      <div class="row ">

        <form id="adminpro-form" class="adminpro-form " method="POST" href="<?= base_url('Auth'); ?>">
          <div class="col-lg-4 align-self-center ">
            <div class="logo">
              <a href="#"><img src="<?= base_url('assets/'); ?>img/kemenpora_logo.png" alt="" style="height:200px;width:200px;margin-bottom:-70px;" />
              </a>
            </div>
            <div class="login-bg">
              <div class="row">
                <div class="col-lg-12">

                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-title">
                    <h1>SIMAYA</h1>
                  </div>
                </div>
              </div>

              <?php if ($this->session->flashdata('flash')) {
                echo $this->session->flashdata('flash');
              }  ?>
              <div class="row">
                <div class="col-lg-4">
                  <div class="login-input-head">
                    <p>Username</p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="login-input-area">
                    <input type="text" name="username" required />
                    <i class="fa fa-user login-user" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="login-input-head">
                    <p>Password</p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="login-input-area">
                    <input type="password" name="password" required />
                    <i class="fa fa-lock login-user"></i>
                  </div>


                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-8">
                  <div class="login-button-pro">
                    <button type="submit" class="login-button login-button-lg">Log in</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
    
            </div>
                <div class="col-lg-6">
                  <div>
                    <a href="/simaya.apk"><h1 class="fa fa-android"> Simaya Versi Android</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-4"></div>
  </div>
  </div>
  <!-- login End-->


  <!-- Footer Start-->
  <!-- Footer End-->
  <!-- jquery
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/vendor/jquery-1.11.3.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/jquery.meanmenu.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sticky JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/jquery.sticky.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/jquery.scrollUp.min.js"></script>
  <!-- form validate JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/jquery.form.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.validate.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/form-active.js"></script>
  <!-- main JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/main.js"></script>
</body>

</html>