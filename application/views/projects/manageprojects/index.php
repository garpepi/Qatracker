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
			<form <?php if($this->uri->segment(2) != 'view') : ?> action='/manageprojects/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['form']['id'];?> <?php endif;?>' method='post' <?php endif;?> id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			  <?php
				if($this->uri->segment(2)) :
			  ?>
				 <div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Project ID  <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input type="text" value='<?php echo $contents['form']['id']; ?>' required="required" disabled class="form-control col-md-7 col-xs-12">
					</div>
				  </div>
			  <?php
				endif;
			  ?>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Description Project  <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="project-desc" name='desc' <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo $contents['form']['desc']; ?>' <?php endif; ?>  required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">TRF 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="TRF" name='TRF' <?php if(($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit') && !empty($contents['form']['TRF'])):?> value='<?php echo $contents['form']['TRF']; ?>' <?php else: ?> placeholder='UPCOMING TRF' <?php endif; ?> class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Summary TRF <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="trf-sum" name='sum_TRF' <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo $contents['form']['sum_TRF']; ?>' <?php endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tester Name <span class="required">*</span></label> 
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_multiple form-control" required="required"  name='testers[]' multiple="multiple">
					
					<?php
					if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):
						foreach ($contents['tester'] as $tester):
							$flag = 0;
							foreach ($contents['form']['tester_on_projects'] as $key => $value):
								if($tester['id'] == $value['tester_id']):
									$flag = 1;
								endif;
						?>
						<?php 
							endforeach;
								if($flag):
									?>
										<option value="<?php echo $tester['id'];?>" selected><?php echo $tester['name'];?></option>
									<?php
									else:
									?>
										<option value="<?php echo $tester['id'];?>"><?php echo $tester['name'];?></option>
									<?php
								endif;
						endforeach;
					else:
						// NON EDIT / VIEW
						foreach ($contents['tester'] as $tester): echo $this->uri->segment(2)
						?>
							<option value="<?php echo $tester['id'];?>"><?php echo $tester['name'];?></option>
						<?php
						endforeach;
					endif;
					?>
					
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Change <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="form-control" name='type_of_change'>
					
					<?php
					foreach ($contents['type_of_changes'] as $toc):
					?>
						<option value="<?php echo $toc['id'];?>" <?php if(!empty($this->uri->segment(2)) && $toc['id'] == $contents['form']['type_of_change']):?> selected <?php endif;?> ><?php echo $toc['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Application <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_multiple form-control" required="required" name='applications[]' multiple="multiple" >
					
					<?php
					if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):
						foreach ($contents['applications'] as $application):
							$flag = 0;
							foreach ($contents['form']['application_impact'] as $key => $value):
								if($application['id'] == $value['application_id']):
									$flag = 1;
								endif;
						?>
						<?php 
							endforeach;
								if($flag):
									?>
										<option value="<?php echo $application['id'];?>" selected><?php echo $application['name'];?></option>
									<?php
									else:
									?>
										<option value="<?php echo $application['id'];?>"><?php echo $application['name'];?></option>
									<?php
								endif;
						endforeach;
					else:
						// NON EDIT / VIEW
						foreach ($contents['applications'] as $application): echo $this->uri->segment(2)
						?>
							<option value="<?php echo $application['id'];?>"><?php echo $application['name'];?></option>
						<?php
						endforeach;
					endif;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Start Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_start_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['plan_start_date'])); ?>' <?php endif; ?> required="required" type="text" name='plan_start_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan End Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_end_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['plan_end_date'])); ?>' <?php endif; ?>  required="required" type="text" name='plan_end_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Start Doc Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_start_doc_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['plan_start_doc_date'])); ?>' <?php endif; ?> required="required" type="text" name='plan_start_doc_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan End Doc Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_end_doc_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo date('m/d/Y',strtotime($contents['form']['plan_end_doc_date'])); ?>' <?php endif; ?> required="required" type="text" name='plan_end_doc_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat status" name="status" <?php echo (!empty($contents['form']['status']) ? ($contents['form']['status'] == 'active' ? 'checked' : '' ): 'checked');?> value='active'> Active
					</label>
					<label>
					  <input type="radio" class="flat status" name="status" value='drop' <?php echo (!empty($contents['form']['status']) ? ($contents['form']['status'] == 'drop' ? 'checked' : '' ): '');?>> Drop
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group" id="drop_reason">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Drop Reason <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text"  name='drop_reason' <?php if($this->uri->segment(2) == 'view' || $this->uri->segment(2) == 'edit'):	?> value='<?php echo $contents['form']['drop_reason']; ?>' <?php endif; ?> class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <?php if($this->uri->segment(2) != 'view') : ?>
					  <a href="/manageprojects" class="btn btn-primary">Back</a>
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
	  
<?php if(empty($this->uri->segment(2))):?>
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
				  <th>Project ID </th>
				  <th>Applications Impact </th>
				  <th>TRF </th>
				  <th>Testers </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_active'] as $active_data){
					$appname = '';
					$testname = '';
					foreach ($active_data['application_impact'] as $app_name): $appname=$app_name['name'].', '.$appname; endforeach;
					foreach ($active_data['tester_on_projects'] as $tester_name): $testname=$tester_name['name'].', '.$testname; endforeach;
					if(strlen ($appname) > 26)
					{
						$appname = substr($appname,0,25).'.... (click view for more detail)';
					}
					if(strlen ($testname) > 26)
					{
						$testname = substr($testname,0,25).'.... (click view for more detail)';
					}
					?>
						<tr>
						  <td><?php echo $active_data['id'];?></td>
						  <td><?php echo $appname; ?> </td>
						  <td><?php if(empty($active_data['TRF'])): echo 'UPCOMING TRF'; else: echo $active_data['TRF']; endif;  ?></td>
						  <td><?php echo $testname; ?> </td>
						  <td>
								<a href="/manageprojects/view/<?php echo $active_data['id'] ; ?>" target='_blank'><span class='fa fa-eye'></span></a>
								<a href="/manageprojects/edit/<?php echo $active_data['id'] ; ?>"><span class='fa fa-edit'></span></a>  
								<!--<a href="/manageprojects/drop/<?php echo $active_data['id'] ; ?>" onclick="return confirm('are you sure?')"> Drop</a>-->
								<a href="#drop" class='drop_proj' data-url= '/manageprojects/drop/' data-id="<?php echo $active_data['id'] ; ?>"> <span class='fa fa-trash'></span></a>
								<a href="/manageprojects/done/<?php echo $active_data['id'] ; ?>" class='confirmation' data-url= '/manageprojects/done/' data-id="<?php echo $active_data['id'] ; ?>"> <span class='fa fa-thumbs-o-up'></span></a>
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
			<h2><?php echo $box_title_4; ?> <small><?php echo $sub_box_title_4; ?></small></h2>
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
				  <th>Project ID </th>
				  <th>Applications Impact </th>
				  <th>TRF </th>
				  <th>Testers </th>
				  <th>Drop Reason </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_drop'] as $drop_data){
					?>
						<tr>
						  <td><?php echo $drop_data['id'];?></td>
						  <td><?php foreach ($drop_data['application_impact'] as $app_name): echo $app_name['name'].', '; endforeach;?> </td>
						  <td><?php if(empty($drop_data['TRF'])): echo 'UPCOMING TRF'; else: echo $drop_data['TRF']; endif;  ?></td>
						  <td><?php foreach ($drop_data['tester_on_projects'] as $tester_name): echo $tester_name['name'].', '; endforeach;?> </td>
						  <td><?php echo $drop_data['drop_reason'];  ?></td>
						  <td>
								<a href="/manageprojects/view/<?php echo $drop_data['id'] ; ?>" target='_blank'><span class='fa fa-eye'></span></a>
						  </td>
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
		  
			<table id="table3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Project ID </th>
				  <th>Applications Impact </th>
				  <th>TRF </th>
				  <th>Testers </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['table_finish'] as $finish_data){
					?>
						<tr>
						  <td><?php echo $finish_data['id'];?></td>
						  <td><?php foreach ($finish_data['application_impact'] as $app_name): echo $app_name['name'].', '; endforeach;?> </td>
						  <td><?php if(empty($finish_data['TRF'])): echo 'UPCOMING TRF'; else: echo $finish_data['TRF']; endif;  ?></td>
						  <td><?php foreach ($finish_data['tester_on_projects'] as $tester_name): echo $tester_name['name'].', '; endforeach;?> </td>
						  <td>
								<a href="/manageprojects/view/<?php echo $finish_data['id'] ; ?>" target='_blank'><span class='fa fa-eye'></span></a>
								<a href="/manageprojects/undone/<?php echo $finish_data['id'] ; ?>" class='confirmation' data-url= '/manageprojects/undone/' data-id="<?php echo $active_data['id'] ; ?>"> <span class='fa fa-thumbs-o-down'></span></a>
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

<script>
	var stats = '<?php if(!empty($this->uri->segment(2))): ?><?php echo $this->uri->segment(2); ?><?php endif;?>';
</script>
