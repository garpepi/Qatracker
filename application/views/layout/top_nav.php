<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
	<nav class="" role="navigation">
	  <div class="nav toggle">
		<a id="menu_toggle"><i class="fa fa-bars"></i></a>
	  </div>

	  <ul class="nav navbar-nav navbar-right">
		<li class="">
		  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			<img src="<?php echo base_url();?>assets/images/img.jpg" alt=""><?php echo $this->session->userdata('logged_in_data')['name']; ?>
			<span class=" fa fa-angle-down"></span>
		  </a>
		  <ul class="dropdown-menu dropdown-usermenu pull-right">
			<li><a href="/manageuser"><i class="fa fa-sign-out pull-right"></i> Change Password</a></li>
			<li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
		  </ul>
		</li>

		
	  </ul>
	</nav>
  </div>

</div>
<!-- /top navigation -->