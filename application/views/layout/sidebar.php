<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
	<div class="navbar nav_title" style="border: 0;">
	  <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>QATracker <?php ?>!</span></a>
	</div>

	<div class="clearfix"></div>

	<!-- menu profile quick info -->
	<div class="profile">
	  <div class="profile_pic">
		<img src="<?php echo base_url();?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
	  </div>
	  <div class="profile_info">
		<span>Welcome,</span>
		<h2>John Doe</h2>
	  </div>
	</div>
	<!-- /menu profile quick info -->

	<br />

	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	  <div class="menu_section">
		<?php if(!empty($usr_type)) :?>
		<h3>Admin</h3>
		<ul class="nav side-menu">
		  <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="<?php echo base_url();?>index.php/adduser?admin=1">Add User</a></li>
			  <li><a href="<?php echo base_url();?>index.php/manageuser?admin=1">Manage User</a></li>
			</ul>
		  </li>
		  <li><a><i class="fa fa-tasks"></i> Projects <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="<?php echo base_url();?>index.php/manageteamleads?admin=1">Manage Team Leads</a></li>
			  <li><a href="<?php echo base_url();?>index.php/manageapplications?admin=1">Manage Applications</a></li>
			  <li><a href="<?php echo base_url();?>index.php/manageprojects?admin=1">Manage Projects</a></li>
			</ul>
		  </li>
		</ul>
		<?php else:?>
		<h3>Tester</h3>
		<ul class="nav side-menu">
		  <li><a><i class="fa fa-dashboard"></i> Dashboards </a>
		  </li>
		  <li><a><i class="fa fa-file-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="#">Add Report</a></li>
			  <li><a href="#">Manage Reports</a></li>
			</ul>
		  </li>
		</ul>
		<?php endif;?>
	  </div>
	  <div class="menu_section">
		<h3> MY Management </h3>
		<ul class="nav side-menu">
		  <li><a><i class="fa fa-user"></i> Edit Profile </a>
		  <li><a><i class="fa fa-key"></i> Change Password </a>
		</ul>
	  </div>

	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<div class="sidebar-footer hidden-small">
	  <a data-toggle="tooltip" data-placement="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="Lock">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="Logout">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	  </a>
	</div>
	<!-- /menu footer buttons -->
  </div>
</div>