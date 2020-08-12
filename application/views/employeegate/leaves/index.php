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
			<form <?php if($this->uri->segment(2) != 'view') : ?> action='/employeegate/leaves/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['form']['id'];?> <?php endif;?>' method='post' <?php endif;?> id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Start-In <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_start_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['plan_start_date'])); ?>' <?php endif; ?> required="required" type="text" name='plan_start_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">End-Out <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_end_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['plan_end_date'])); ?>' <?php endif; ?>  required="required" type="text" name='plan_end_date'>
				</div>
			  </div>
			  <div class="form-group" >
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Reason <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text"  name='reason' <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo $contents['form']['drop_reason']; ?>' <?php endif; ?> class="form-control col-md-7 col-xs-12" required>
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <?php if($this->uri->segment(2) != 'view') : ?>
					  <button type="submit" class="btn btn-success">Submit</button>
				  <?php endif;?>
				</div>
			  </div>
			</form>
			<?php if($this->uri->segment(2) == 'view') : ?>
				<button class="btn btn-primary" onclick="self.close()">Close</button>
			<?php endif;?>
		  </div>
		</div>
	  </div>
	  
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_5; ?> <small><?php echo $sub_box_title_5; ?></small></h2>
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
			<form autocomplete="off" <?php if($this->uri->segment(2) != 'view') : ?> action='/employeegate/leavesprint/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['form']['id'];?> <?php endif;?>' method='post' <?php endif;?> id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Period <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="period_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['period_date'])); ?>' <?php endif; ?> required="required" type="text" name='period_date'>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <?php if($this->uri->segment(2) != 'view') : ?>
					  <button type="submit" class="btn btn-success">Print</button>
				  <?php endif;?>
				</div>
			  </div>
			</form>
			<?php if($this->uri->segment(2) == 'view') : ?>
				<button class="btn btn-primary" onclick="self.close()">Close</button>
			<?php endif;?>
		  </div>
		</div>
	  </div>
	  
	  
	  

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
				  <th>Start - in </th>
				  <th>End - Out </th>
				  <th>Reasons </th>
				  <th>Created At </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_queue'] as $active_data){
					?>
						<tr>
						  <td><?php echo $active_data['start_in'];?></td>
						  <td><?php echo $active_data['end_out']; ?> </td>
						  <td><?php echo $active_data['reason']; ?> </td>
						  <td><?php echo $active_data['created_date']; ?> </td>
						  <td>
								<a href="/employeegate/leavesdrop/<?php echo $active_data['id'] ; ?>" onclick="return confirm('are you sure?')"> Drop</a>
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
	  
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
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
				  <th>Start - in </th>
				  <th>End - Out </th>
				  <th>Reasons </th>
				  <th>Status </th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_status_acc'] as $status_data){
					?>
						<tr>
						  <td><?php echo $status_data['start_in'];?></td>
						  <td><?php echo $status_data['end_out']; ?> </td>
						  <td><?php echo $status_data['reason']; ?> </td>
						  <td><?php echo $status_data['acc_stat']; ?> </td>
						</tr>
					<?php
				}
			  ?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_4; ?> <small><?php echo $sub_box_title_4; ?></small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
		  
			<table id="table3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Start - in </th>
				  <th>End - Out </th>
				  <th>Reasons </th>
				  <th>Status </th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_status_rejct'] as $status_data){
					?>
						<tr>
						  <td><?php echo $status_data['start_in'];?></td>
						  <td><?php echo $status_data['end_out']; ?> </td>
						  <td><?php echo $status_data['reason']; ?> </td>
						  <td><?php echo $status_data['acc_stat']; ?> </td>
						</tr>
					<?php
				}
			  ?>
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

<script>
	var stats = '<?php if(!empty($this->uri->segment(2))): ?><?php echo $this->uri->segment(2); ?><?php endif;?>';
</script>
