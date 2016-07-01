<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
		if($header) echo $header ;
	?>
	</head>
	<body class="nav-md">
		<div class="container body">
		  <div class="main_container">
			<?php 
				if($sidebar)   echo $sidebar ;
				if($top_nav)   echo $top_nav ;
				if($contents) echo $contents ;
				if($footer) echo $footer ;
			?>
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
		<!-- jQuery custom content scroller -->
		<script src="<?php echo base_url();?>assets/layout/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Adding Page Script -->
			<?php
			foreach($page_js as $js):
				echo '<script src="'.base_url().'assets/'.$js.'"></script>'."\n";
			endforeach;
			?>
		<!-- Custom Theme Scripts -->
		<script src="<?php echo base_url();?>assets/layout/js/custom.min.js"></script>
	</body>
</html>