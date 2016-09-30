<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
	<div class="navbar nav_title" style="border: 0;">
	  <a href="<?php echo base_url();?>home" class="site_title"><i class="fa fa-paw"></i> <span>QATracker <?php ?>!</span></a>
	</div>

	<div class="clearfix"></div>

	<!-- menu profile quick info -->
	<div class="profile">
	  <div class="profile_pic">
		<img src="<?php echo base_url();?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
	  </div>
	  <div class="profile_info">
		<span>Welcome,</span>
		<h2><?php echo $this->session->userdata('logged_in_data')['name']; ?></h2>
	  </div>
	</div>
	<!-- /menu profile quick info -->

	<br />
	
	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	  <div class="menu_section">
		<?php if(!empty($status)) :?>
		<h3>Admin</h3>
		<ul class="nav side-menu">
  		  <li><a href="<?php echo base_url();?>home"><i class="fa fa-dashboard"></i> Dashboards </a>
		  <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="<?php echo base_url();?>manageuser/userlist">Manage User</a></li>
			</ul>
		  </li>
		  <li><a><i class="fa fa-tasks"></i> Projects <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="<?php echo base_url();?>manageprojects">Manage Projects</a></li>
			 <!-- 
			  <li><a href="<?php echo base_url();?>assigntesters">Assign Testers</a></li>-->
			</ul>
		  </li>
		  <li><a><i class="fa fa-tasks"></i> Masters <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="<?php echo base_url();?>manageteamleads">Manage Team Leads</a></li>
			  <li><a href="<?php echo base_url();?>manageapplications">Manage Applications</a></li>
			  <li><a href="<?php echo base_url();?>managetypeofchanges">Type Of Changes</a></li>
			  <li><a href="<?php echo base_url();?>manageenvironment">Manage Environment</a></li>
			  <li><a href="<?php echo base_url();?>manageprogres">Manage Progres</a></li>
			  <li><a href="<?php echo base_url();?>managephases">Manage Phases</a></li> 
			</ul>
		  </li>
		</ul>
		<?php else:?>
		<h3>Tester</h3>
		<ul class="nav side-menu">
		  <li><a href="<?php echo base_url();?>home"><i class="fa fa-dashboard"></i> Dashboards </a>
		  </li>
		  <li><a><i class="fa fa-file-o"></i> Daily Reports <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="<?php echo base_url();?>dailyreports">List Daily Reports</a></li>
			  <li><a href="<?php echo base_url();?>dailyreports/add">Add Daily Report</a></li>
			</ul>
		  </li>
		</ul>
		<?php endif;?>
	  </div>
	  <!--
	  <div class="menu_section">
		<h3> MY Management </h3>
		<ul class="nav side-menu">
		  <li><a><i class="fa fa-user"></i> Edit Profile </a>
		  <li><a><i class="fa fa-key"></i> Change Password </a>
		</ul>
	  </div>
	  -->

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