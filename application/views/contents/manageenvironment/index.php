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
			echo $this->session->flashdata('form_msg'); 
		  ?>
			<form action='/manageenvironment/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['form']['id'];?> <?php endif;?>' method='post' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">Environment <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="team-leader-name" name='name' required="required" class="form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'edit') :?> value='<?php echo $contents['form']['name'];?>'  <?php endif;?> >				  
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat" name="status" checked value='Active'> Active
					</label>
					<label>
					  <input type="radio" class="flat" name="status" value='Inactive'> Inactive
					</label>
				  </div>
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="reset" class="btn btn-primary">Cancel</button>
				  <input type="submit" class="btn btn-success"></button>
				</div>
			  </div>

			</form>
		  </div>
		</div>
	  </div>
	  
	  <?php if ($this->uri->segment(2) != 'edit'): ?>
	  <div class="col-md-6 col-sm-6 col-xs-12">
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
				  <th>Applications Name </th>
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
							<!--<a href="/manageenvironment/view?id=<?php echo $incactive_record['id'] ; ?>" target='_blank'>View</a>  -->
							<a href="/manageenvironment/edit/<?php echo $active_record['id'] ; ?>">Edit</a>  
							<a href="/manageenvironment/revoke/<?php echo $active_record['id'] ; ?>" onclick="return confirm('are you sure?')">Disable</a>
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
	  
	  <div class="col-md-6 col-sm-6 col-xs-12">
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
				  <th>Environment Name </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_inactive'] as $incactive_record){
					?>
					<tr>
					  <td><?php echo $incactive_record['name'] ; ?> </td>
					  <td>
						<a href="/manageenvironment/reactivate/<?php echo $incactive_record['id'] ; ?>" onclick="return confirm('are you sure?')">Reactivate</a>
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