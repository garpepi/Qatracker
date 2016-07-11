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
			<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
				
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Project Type <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="form-control" name='type'>
					<option>Choose option</option>
					<option>SIT</option>
					<option>UAT</option>
					<option>VIT</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Test Team Leader <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_single_teamleader form-control" tabindex="-1" name='team_leader' required="required">
					<option></option>
					<option value="Ika">Ika</option>
					<option value="Valen">Valen</option>
					<option value="Bani">Bani</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Application <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_single_application form-control" tabindex="-1" name='application' required="required">
					<option></option>
					<option value="Ika">Mobit</option>
					<option value="Valen">SMS Ketik</option>
					<option value="Bani">SMS Blast</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Change <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="form-control" name='type_of_change'>
					<option>Choose option</option>
					<option>CR # Change Request</option>
					<option>PI # Production Issue</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total-test-case">Total Test Case <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="total_test_case" name='total_test_case' required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tc-per-tester">Test Case per User<span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tc_per_tester" name='tc_per_tester' required="required" class="form-control col-md-7 col-xs-12">
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
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat" name="gender" checked value='Active'> Active
					</label>
					<label>
					  <input type="radio" class="flat" name="gender" value='Drop'> Drop
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
				  <th>Applications Id </th>
				  <th>Applications Name </th>
				  <th>TRF </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>1</td>
				  <td>Firstname Middlename Lastname </td>
				  <td>111</td>
				  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
				  </td>
				</tr>
				<tr>
				  <td>2</td>
				  <td>John Doe</td>
				  <td>222</td>
				  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
				</td>
			  </tr>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
	  
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
		  
			<table id="table2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Applications Id </th>
				  <th>Applications Name </th>
				  <th>TRF </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>1</td>
				  <td>Firstname Middlename Lastname </td>
				  <td>111</td>
				  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
				  </td>
				</tr>
				<tr>
				  <td>2</td>
				  <td>John Doe</td>
				  <td>222</td>
				  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
				</td>
			  </tr>
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
				  <th>Applications Id </th>
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