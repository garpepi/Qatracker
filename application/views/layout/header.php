<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<title>QATracker <?php ?>! | </title>
 
<!-- Bootstrap core CSS -->
 
<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/layout/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url();?>assets/layout/css/font-awesome.min.css" rel="stylesheet">
<!-- jQuery custom content scroller -->
<link href="<?php echo base_url();?>assets/layout/css/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

<!-- Page CSS -->
<?php
foreach($page_css as $css):
	echo '<link href="'.base_url().'assets/'.$css.'" rel="stylesheet"/>';
endforeach;
?>

<!-- Custom Theme Style -->
<link href="<?php echo base_url();?>assets/layout/css/custom.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="../assets/js/ie8-responsive-file-warning.js"></script>
<![endif]-->
 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->