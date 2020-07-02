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
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<?php echo $this->session->flashdata('form_msg'); ?>
			</div>
			<?php
		  endif;			 
		  ?>
			<form action='/assignsubordinate' method='post' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">Leader <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select class="form-control" name='leader'>
					<option value="">Select leader</option>
					<?php
					foreach ($contents['leaders'] as $toc):
					?>
						<option value="<?php echo $toc['leader_id'];?>" <?php if(!empty($this->uri->segment(2)) && $toc['leader_id'] == $toc['leader_id']):?> selected <?php endif;?> ><?php echo $toc['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="submit" class="btn btn-success">Search!</button>
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
				  <th> Subordinate Name </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_active'] as $active_record){
					?>
					<tr>
					  <td><?php echo $active_record['user_name'] ; ?> </td>
					  <td>
							<a href="/assignsubordinate/revoke/<?php echo $active_record['id'] ; ?>" onclick="return confirm('are you sure?')">Disable</a>
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
			<br />
			<form action='/assignsubordinate/add' method='post' id="demo-form1" data-parsley-validate class="form-horizontal form-label-left">
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">Leader <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select class="form-control" name='leader'>
					<option>Select leader</option>
					<?php
					foreach ($contents['users'] as $toc):
					?>
						<option value="<?php echo $toc['id'];?>" <?php if(!empty($this->uri->segment(2)) && $toc['id'] == $contents['leader_id']):?> selected <?php endif;?>><?php echo $toc['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subordinates <span class="required">*</span></label> 
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_multiple form-control" required="required"  name='users[]' multiple="multiple">
					
					<?php
					if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):
						foreach ($contents['users'] as $users):
							?>
								<option value="<?php echo $users['id'];?>"><?php echo $users['name'];?></option>
							<?php
						endforeach;
					else:
						// NON EDIT / VIEW
						foreach ($contents['users'] as $users): echo $this->uri->segment(2)
						?>
							<option value="<?php echo $users['id'];?>"><?php echo $users['name'];?></option>
						<?php
						endforeach;
					endif;
					?>
					
				  </select>
				</div>
			  </div>			  
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="submit" class="btn btn-success">Submit</button>
				</div>
			  </div>

			</form>
		  </div>
		</div>
	  </div>
	  <?php endif;?>
	  <div class="clearfix"></div>

	  
	</div>
  </div>
</div>
<!-- /page content -->