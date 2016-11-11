<!-- page content -->
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3><?php echo $title;?> </h3>
	  </div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
	<?php if ($this->uri->segment(2) == 'edit'): ?>
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_1; ?> <small><?php echo $sub_box_title_1; ?></small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<br />
		  <?php 
		  if($this->session->flashdata('form_msg')):?>
			<div class="alert <?php if(strcasecmp(substr($this->session->flashdata('form_msg'),0,7),'success') == 0): echo 'alert-success'; else: echo 'alert-danger'; endif; ?> alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">*</span>
				</button>
				<?php echo $this->session->flashdata('form_msg'); ?>
			</div>
			<?php
		  endif;			 
		  ?>		  
			<form action='/accesspriv/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['form']['id'];?> <?php endif;?>' method='post' id="form1" data-parsley-validate class="form-horizontal form-label-left">
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">Users Name 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="team-leader-name" disabled class="form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'edit') :?> value='<?php echo $contents['form']['name'];?>'  <?php endif;?> >				  
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Access Menu</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select name='class_menu[]' class="select2_multiple form-control" multiple="multiple">
					<option value = ''>Choose option</option>
					<?php 
						foreach($contents['class_access'] as $class):
							$flag_select = 0;
							$flag_print = 1;
							foreach($contents['user_access'] as $u_access):
								if($u_access['class_menu_id'] == $class['id']):
									if($u_access['status'] == 'active'){
										$flag_select = 1;
									}
									
									if($u_access['status'] == 'persistence'){
										$flag_print = 0;
									}
								endif;
									
							endforeach;
						if($flag_print){
							?>
							<option <?php echo (($flag_select) ? 'selected' : '');?> value = '<?php echo $class['id'];?>'><?php echo $class['menu_name'];?> </option>
							<?php
						}
						endforeach;?>
				  </select>
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="reset" class="btn btn-primary">Cancel</button>
				  <button type="button" class="btn btn-success" onclick="submited();">Submit</button>
				</div>
			  </div>

			</form>
		  </div>
		</div>
	  </div>
	  <div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><i class="fa fa-bars"></i> Default List <small></small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">

			<div class="col-xs-3">
			  <!-- required for floating -->
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs tabs-left">
				<li class="active"><a href="#home" data-toggle="tab">Admin</a>
				</li>
				<li><a href="#profile" data-toggle="tab">Tester</a>
				</li>
				<li><a href="#messages" data-toggle="tab">Super Admin</a>
				</li>
			  </ul>
			</div>

			<div class="col-xs-9">
			  <!-- Tab panes -->
			  <div class="tab-content">
				<div class="tab-pane active" id="home">
				  <p class="lead">Admin List</p>
				  <li>
					<ul>Manage User</ul>
				  </li>
				  <li>
					<ul>Manage Application</ul>
				  </li>
				  <li>
					<ul>Manage Environment</ul>
				  </li>
				  <li>
					<ul>Manage Progress</ul>
				  </li>
				  <li>
					<ul>Manage Project</ul>
				  </li>
				  <li>
					<ul>Manage Phase</ul>
				  </li>
				  <li>
					<ul>Manage Team Leads</ul>
				  </li>
				  <li>
					<ul>Type of Changes</ul>
				  </li>
				  <li>
					<ul>Reports</ul>
				  </li>
				  <li>
					<ul>Reset Password (must be joined with Manage user)</ul>
				  </li>
				</div>
				<div class="tab-pane" id="profile">
				<p class="lead">Tester List</p>
				  <li>
					<ul>Daily Reports</ul>
				  </li>
				</div>
				<div class="tab-pane" id="messages">
				<p class="lead">Super Admin List</p>
				  <li>
					<ul>Access Priviledge</ul>
				  </li>
				</div>

			</div>

			<div class="clearfix"></div>

		  </div>
		</div>
	  </div>
  </div>
	  
	  <?php endif; ?>
	  
	  <?php if ($this->uri->segment(2) != 'edit'): ?>
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_2; ?> <small><?php echo $sub_box_title_2; ?></small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>

		  <div class="x_content">
			<?php 
		  if($this->session->flashdata('form_msg')):?>
			<div class="alert <?php if(strcasecmp(substr($this->session->flashdata('form_msg'),0,7),'success') == 0): echo 'alert-success'; else: echo 'alert-danger'; endif; ?> alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">*</span>
				</button>
				<?php echo $this->session->flashdata('form_msg'); ?>
			</div>
			<?php
		  endif;			 
		  ?>
			<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Users List </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_active'] as $active_record){
					?>
					<tr>
					  <td><?php echo $active_record['name'] ; ?> </td>
					  <td>
							<a href="/accesspriv/edit/<?php echo $active_record['id'] ; ?>"> Edit</a>
					  </td>
					</tr>
					<?php
				}
			  ?>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
	  
	 
	  <?php endif;?>
	  <div class="clearfix"></div>

	  
	</div>
  </div>
</div>
<!-- /page content -->