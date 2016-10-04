<!-- page content -->
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3><?php echo $title;?> </h3>
	  </div>
	</div>

	<div class="clearfix"></div>
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
	<div class="row">
	  
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_2; ?> <small><?php echo $sub_box_title_2; ?></small></h2>
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
		  
			<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>User Name </th>
				  <th>Email </th>
				  <th>Employee ID </th>  
				  <th>Type </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php foreach($contents['table_active'] as $key=>$value):?>
					<tr>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $value['email'];?></td>
					<td><?php echo $value['emp_id'];?></td>
					<td><?php echo ($value['type']==1 ? 'Admin' : 'Tester');?></td>
					<td><a href="<?php echo base_url().'manageuser/resetpassword/'.$value['id'];?>" onclick="return confirm('are you sure?')">Reset Password </a>
					| <a href="<?php echo base_url().'manageuser/revoke/'.$value['id'];?>" onclick="return confirm('are you sure?')">Disable</a>
					</td>
				  </tr>
			  <?php endforeach;?>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
	  
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_3; ?> <small><?php echo $sub_box_title_3; ?></small></h2>
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
		  
			<table id="table2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>User Name </th>
				  <th>Email </th>
				  <th>Employee ID </th>  
				  <th>Type </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php foreach($contents['table_dissable'] as $key=>$value):?>
					<tr>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $value['email'];?></td>
					<td><?php echo $value['emp_id'];?></td>
					<td><?php echo ($value['type']==1 ? 'Admin' : 'Tester');?></td>
					<td><a href="<?php echo base_url().'manageuser/reactivate/'.$value['id'];?>" onclick="return confirm('are you sure?')">Reactivate </a>
					</td>
				  </tr>
			  <?php endforeach;?>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
	  
	  <div class="clearfix"></div>

	  
	</div>
  </div>
</div>
<!-- /page content -->