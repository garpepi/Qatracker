<?php
if(!$this->session->flashdata()){
	redirect('/manageuser/userlist');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/layout/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url();?>assets/layout/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?php echo base_url();?>assets/layout/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h2>New Password</h2>
              <h1 class="error-number"><?php echo $this->session->flashdata('password'); ?> </h1>
              <p>Please contact <?php echo $this->session->flashdata('name'); ?> at <a href="mailto:<?php echo $this->session->flashdata('email'); ?>"><?php echo $this->session->flashdata('email'); ?></a>.<br> 
              </p>
              <div class="mid_center">
				<a href="<?php echo base_url();?>manageuser/userlist" class="btn btn-success">Back </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

		<!-- jQuery -->
		<script src="<?php echo base_url();?>assets/layout/js/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="<?php echo base_url();?>assets/layout/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url();?>assets/layout/js/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="<?php echo base_url();?>assets/layout/js/nprogress/nprogress.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="<?php echo base_url();?>assets/layout/js/custom.min.js"></script>
	  </body>
</html>