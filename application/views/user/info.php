<!-- page content -->
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3><?php echo $title;?></h3>
	  </div>

	</div>
	<div class="clearfix"></div>
	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2><?php echo $box_title_1; ?> <small><?php echo $sub_box_title_1; ?></small></h2>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<br />
			<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat" name="gender" value='M'> Male
					</label>
					<label>
					  <input type="radio" class="flat" name="gender" value='F'> Female
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
				</div>
			  </div>
			  <div class="form-group">
				<label for="phone-number" class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="phone-number" class="form-control col-md-7 col-xs-12" required="required" type="text" name="phone-number">
				</div>
			  </div>
			  <div class="form-group">
				<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="email" class="form-control col-md-7 col-xs-12" required="required" type="text" name="email">
				</div>
			  </div>
			  <?php
				if ($position == 'create'):
			  ?>
			  <div class="form-group">
				<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Generate Password <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="password" class="form-control col-md-7 col-xs-12" required="required" type="text" name="password" readonly>
				</div>
			  </div>
			  <?php
				else:
			  ?>
			  <div class="form-group">
				<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="password" class="form-control col-md-7 col-xs-12" required="required" type="password" name="password">
				</div>
			  </div>
			  <?php
				endif;
			  ?>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Type <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="radio">
					<label>
					  <input type="radio" class="flat" name="type" value='Admin'> Admin
					</label>
					<label>
					  <input type="radio" class="flat" name="type" checked value='Tester'> Tester
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
	</div>

	
  </div>
</div>
<!-- /page content -->