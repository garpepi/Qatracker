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
			</ul>
			<div class="clearfix"></div>
		  </div>

		  <div class="x_content">
		  
			<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Employee Name </th>
				  <th>Start-In </th>
				  <th>End-Out </th>  
				  <th>Reason </th>
				  <th>Req Date </th>
				  <th><span class="nobr">Action</span></th>
				</tr>
			  </thead>
			  <tbody>
			  <?php foreach($contents['table_queue'] as $key=>$value):?>
				<tr>
					<td><?php echo $value['subname'];?></td>
					<td><?php echo $value['start_in'];?></td>
					<td><?php echo $value['end_out'];?></td>
					<td><?php echo $value['reason'];?></td>
					<td><?php echo $value['created_date'];?></td>
					<td><a href="<?php echo base_url().'employeegateleader/accept/'.$value['id'];?>" onclick="return confirm('are you sure?')">Accept </a>
					| <a href="#" data-id=<?php echo $value['id'];?> data-toggle="modal" data-target="#reject">Reject</a>
					</td>
				</tr>
			  <?php endforeach;?>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
    <!--
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_4; ?> <small><?php echo $sub_box_title_4; ?></small></h2>
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
				  <th>Employee Name </th>
				  <th>Start-In </th>
				  <th>End-Out </th>  
				  <th>Reason </th>
				  <th>Req Date </th>
				  <th><span class="nobr">Action</span></th>
				</tr>
			  </thead>
			  <tbody>
			  <?php foreach($contents['table_leavesqueue'] as $key=>$value):?>
				<tr>
					<td><?php echo $value['subname'];?></td>
					<td><?php echo $value['start_in'];?></td>
					<td><?php echo $value['end_out'];?></td>
					<td><?php echo $value['reason'];?></td>
					<td><?php echo $value['created_date'];?></td>
					<td><a href="<?php echo base_url().'employeegateleader/leavesaccept/'.$value['id'];?>" onclick="return confirm('are you sure?')">Accept </a>
					| <a href="#" onclick="leavesrejects(<?php echo $value['id'];?>)">Reject</a>
					</td>
				</tr>
			  <?php endforeach;?>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
	  -->
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel collapsed">
		  <div class="x_title">
			<h2><?php echo $box_title_3; ?> <small><?php echo $sub_box_title_3; ?></small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>

		  <div class="x_content">
		  
			<table id="table2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Employee Name </th>
				  <th>Start-In </th>
				  <th>End-Out </th>  
				  <th>Reason </th>
				  <th>Req Date </th>
				  <th>Status</th>
				  <th>Reject Reason</th>
				</tr>
			  </thead>
			  <tbody>

			  <?php foreach($contents['table_status'] as $key=>$value):?>		  
				<tr>
					<td><?php echo $value['subname'];?></td>
					<td><?php echo $value['start_in'];?></td>
					<td><?php echo $value['end_out'];?></td>
					<td><?php echo $value['reason'];?></td>
					<td><?php echo $value['created_date'];?></td>
					<td><?php echo $value['acc_stat'];?></td>
					<td><?php if($value['acc_stat'] == 'reject') {echo $value['rej_reason'];}?></td>
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
  <!-- Modal -->
	<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="reject" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="reject"></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="form-group">
				<label for="reason">Reasons</label>
				<input id="reason-overtime" type="text" class="form-control" placeholder="Reasons" required>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary" id="reject-confirm">Save changes</button>
		  </div>
		</div>
	  </div>
	</div>
</div>
<!-- /page content -->