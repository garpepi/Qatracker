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
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
	<link href="<?php echo base_url();?>assets/layout/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action = '/login/logged_in' method='post'>
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" name = 'email' required="required" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name='password' required="" />
              </div>
              <div>
                <input type="submit" value="Submit">
				<?php 
					echo $this->session->flashdata('logedin_msg'); 
				  ?>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">DEMO PURPOSES ONLY </p>
					<a class="btn btn-default submit" href="addreport">TESTER</a>
					<a class="btn btn-default submit" href="adduser?admin=1">ADMIN</a>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> QA Tracker!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Themes - QATracker by Garpepi. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>