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
				<form action='<?php echo base_url();?>reports/generate_monthly_rank' method='post' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
				  <div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Users Filter </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
					  <div class="">
						<label>
						  <input name='alluser' type="checkbox" class="js-switch" id='user-switch' checked /> All User
						</label>
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Testers Name <span class="required">*</span></label> 
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <select class="select2_multiple form-control" id='users' name='users[]' multiple="multiple" required disabled>
						
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
				  <hr>
				  <div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Filter </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
					  <div class="">
						<label>
						  <input name='alldate' type="checkbox" class="js-switch" id='date-switch' checked /> All Date
						</label>
					  </div>
					</div>
				  </div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Range
						</label>
						<div class="col-md-2 col-sm-2 col-xs-6">
						  <input type="text" style="width: 200px" name="daterange" id="daterange" class="form-control" required disabled>
						</div>
					</div>
				
			</div>

			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <?php if($this->uri->segment(2) != 'view') : ?>
					  <button type="submit" class="btn btn-primary">Cancel</button>
					  <button type="submit" class="btn btn-success">Submit</button>
				  <?php else:?>
					  <button class="btn btn-primary" onclick="self.close()">Close</button>
				  <?php endif;?>
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

<script>
	var stats = '<?php if(!empty($this->uri->segment(2))): ?><?php echo $this->uri->segment(2); ?><?php endif;?>';
</script>
