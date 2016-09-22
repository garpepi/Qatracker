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
			<?php 
				echo $this->session->flashdata('form_msg');
			?>
			<form autocomplete="false" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='/manageuser/changepas' method='post' >
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name </label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" value="<?= $contents['users'][0]['name']?>" disabled >
				</div>
			  </div>
			  <div class="form-group">
				<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="email" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $contents['users'][0]['email']?>"disabled >
				</div>
			  </div>
			  <div class="form-group">
				<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password </label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input autocomplete="new-password" pattern=".{8,}" id="password" class="form-control col-md-7 col-xs-12" required title="8 characters minimum" type="password" name="password">
				  <span class="required">Please Fill this textbox if you want to change the password</span>
				</div>
			  </div>
			  <div class="form-group">
				<label for="confpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password </label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input pattern=".{8,}" id="confpassword" class="form-control col-md-7 col-xs-12" required title="8 characters minimum" type="password" name="passconf">
				  <span class="required">Please Fill this textbox if you want to change the password</span>
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button onclick="goBack()" class="btn btn-primary">Cancel</button>
				  <button type="submit" class="btn btn-success">Change</button>
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