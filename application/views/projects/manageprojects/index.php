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
			<form action='/manageprojects/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['form']['id'];?> <?php endif;?>' method='post' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Application <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_multiple form-control" required="required" name='applications[]' multiple="multiple">
					<option>Choose option</option>
					<?php
					foreach ($contents['applications'] as $application):
					?>
						<option value="<?php echo $application['id'];?>"><?php echo $application['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Description Project  <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="project-desc" name='desc' required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">TRF 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="TRF" name='TRF' class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Summary TRF <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="trf-sum" name='sum_TRF' required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tester Name <span class="required">*</span></label> 
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_multiple form-control" required="required"  name='testers[]' multiple="multiple">
					<option>Choose option</option>
					<?php
					foreach ($contents['tester'] as $tester):
					?>
						<option value="<?php echo $tester['id'];?>"><?php echo $tester['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Change <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="form-control" name='type_of_change'>
					<option>Choose option</option>
					<?php
					foreach ($contents['type_of_changes'] as $toc):
					?>
						<option value="<?php echo $toc['id'];?>"><?php echo $toc['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Start Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_start_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_start_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan End Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_end_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_end_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Start Doc Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_start_doc_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_start_doc_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan End Doc Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_end_doc_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_end_doc_date'>
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
					  <input type="radio" class="flat" name="status" value='Drop'> Drop
					</label>
				  </div>
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button type="submit" class="btn btn-primary">Cancel</button>
				  <button type="submit" class="btn btn-success">Submit</button>
				</div>
			  </div>

			</form>
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
					?>
						<tr>
						  <td><?php echo $active_data['id'];?></td>
						  <td><?php foreach ($active_data['application_impact'] as $app_name): echo $app_name['name'].', '; endforeach;?> </td>
						  <td><?php if(empty($active_data['TRF'])): echo 'UPCOMING TRF'; else: echo $active_data['TRF']; endif;  ?></td>
						  <td><?php foreach ($active_data['tester_on_projects'] as $tester_name): echo $tester_name['name'].', '; endforeach;?> </td>
						  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
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
				foreach($contents['table_drop'] as $drop_data){
					?>
						<tr>
						  <td><?php echo $drop_data['id'];?></td>
						  <td><?php foreach ($drop_data['application_impact'] as $app_name): echo $app_name['name'].', '; endforeach;?> </td>
						  <td><?php if(empty($drop_data['TRF'])): echo 'UPCOMING TRF'; else: echo $drop_data['TRF']; endif;  ?></td>
						  <td><?php foreach ($drop_data['tester_on_projects'] as $tester_name): echo $tester_name['name'].', '; endforeach;?> </td>
						  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
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
				foreach($contents['table_finish'] as $finish_data){
					?>
						<tr>
						  <td><?php echo $finish_data['id'];?></td>
						  <td><?php foreach ($finish_data['application_impact'] as $app_name): echo $app_name['name'].', '; endforeach;?> </td>
						  <td><?php if(empty($finish_data['TRF'])): echo 'UPCOMING TRF'; else: echo $finish_data['TRF']; endif;  ?></td>
						  <td><?php foreach ($finish_data['tester_on_projects'] as $tester_name): echo $tester_name['name'].', '; endforeach;?> </td>
						  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
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
		  
			<table id="table3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Project ID </th>
				  <th>Applications Name </th>
				  <th>TRF </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
				  <tr>
					<td>3</td>
					<td>Firstname Middlename Lastname </td>
					<td>333</td>
					<td class=" last"><a href="#">Activate</a>
					</td>
				  </tr>
				  <tr>
					<td>4</td>
					<td>John Doe</td>
					<td>444</td>
					<td class=" last"><a href="#">Activate</a>
					</td>
				  </tr>
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