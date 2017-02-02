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
		  
			<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Name </th>
				  <th>Total Test Script </th>
				  <th>Total Hour </th>
				  <th>Performance Test Script Number</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php foreach ($contents['data'] as $key => $value):?>
				<tr>
				  <th><?php echo $value[1];?> </th>
				  <th><?php echo $value[2];?> </th>
				  <th><?php echo $value[3];?> </th>
				  <th><?php echo $value[4];?> </th>
				</tr>
			   <?php endforeach;?>
			  </tbody>
			</table>

		  </div>

			 
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
