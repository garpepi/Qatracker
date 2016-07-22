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
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tester-name">Tester Name </span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tester_name" name='tester_name' required="required" class="form-control col-md-7 col-xs-12" value='John Doe' disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Project <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="select2_single_projects form-control" tabindex="-1" name='application' required="required">
					<option></option>
					<option value="Ika">Mobit</option>
					<option value="Valen">SMS Ketik</option>
					<option value="Bani">SMS Blast</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tester-name">Application Name </span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tester_name" name='tester_name' required="required" class="form-control col-md-7 col-xs-12" value='Mobit' disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tester-name">Type of Change </span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tester_name" name='tester_name' required="required" class="form-control col-md-7 col-xs-12" value='CR # Change Request' disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tester-name">Project Type </span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tester_name" name='tester_name' required="required" class="form-control col-md-7 col-xs-12" value='SIT' disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tester-name">Test Team Leader </span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tester_name" name='tester_name' required="required" class="form-control col-md-7 col-xs-12" value='Ika' disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total-test-case">Total Test Case </span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="total_test_case" name='name' required="required" class="form-control col-md-7 col-xs-12" value=100 disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tc-per-tester">Test Case per User<span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="tc_per_tester" name='tc_per_tester' required="required" class="form-control col-md-7 col-xs-12" value=10 disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Start Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_start_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_start_date'  value='01/29/2015' disabled >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan End Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_end_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_end_date' value='01/29/2016' disabled >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Doc Start Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_doc_start_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_doc_start_date'  value='10/29/2015' >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Plan Doc End Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="plan_doc_end_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='plan_doc_end_date'  value='10/29/2015' >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Actual Test Start Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="actual_test_start_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='actual_test_start_date'  value='10/29/2015' >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Actual Doc Start Date <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="actual_doc_start_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name='actual_doc_start_date'  value='10/29/2015' >
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="form-control" name='downtimes'>
					<option>Choose option</option>
					<option>SIT START</option>
					<option>UAT START</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test-case-executed-today">Test Case Executed Today </span><span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="test_case_executed" name='test_case_executed' required="required" class="form-control col-md-7 col-xs-12" value=''>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Downtimes <span class="required">*</span></label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <select class="form-control" name='downtimes'>
					<option>Choose option</option>					
					<option>None</option>
					<option>1 hour</option>
					<option>2 hour</option>
					<option>3 hour</option>
					<option>1 day</option>
					<option>2 day</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				  <label for="message">Downtime Message (255 max) :</label>
				  <textarea id="message" required="required" class="form-control" name="downtime_message" data-parsley-trigger="keyup" data-parsley-maxlength="255" data-parsley-maxlength-message="Max 255 caracters long info description"
					data-parsley-validation-threshold="10"></textarea>						
			  </div>
			  
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Already Done for Documentation <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat" name="actual_doc_end_date" checked value='not'> Not yet
					</label>
					<label>
					  <input type="radio" class="flat" name="actual_doc_end_date" value='done'> Done
					</label>
				  </div>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Already Done for Testing <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat" name="actual_test_end_date" checked value='not'> Not yet
					</label>
					<label>
					  <input type="radio" class="flat" name="actual_test_end_date" value='done'> Done
					</label>
				  </div>
				</div>
			  </div>

			  <div class="form-group">
				  <label for="message">Other Message (255 max) :</label>
				  <textarea id="message" required="required" class="form-control" name="other_message" data-parsley-trigger="keyup" data-parsley-maxlength="255" data-parsley-maxlength-message="Max 255 caracters long info description"
					data-parsley-validation-threshold="10"></textarea>						
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
	  
	  
	  <div class="clearfix"></div>

	  
	</div>
  </div>
</div>
<!-- /page content -->