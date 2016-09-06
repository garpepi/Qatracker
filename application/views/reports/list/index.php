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
				  <th>Date Created </th>
				  <th>Project Id </th>
				  <th>TRF </th>
				  <th>Project Desc </th>
				  <th>Application Impact </th>
				  <th>Team Lead </th>
				  <th>ENV </th>
				  <th>Progress </th>
				  <th>Phase </th>
				  <th>Total TC </th>
				  <th>Total TC executed </th>
				  <th>Total TC outstanding </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				foreach($contents['daily_reports'] as $daily_reports_datas){
					$application_impacts = '';
					foreach($daily_reports_datas['project']['application_impact'] as $key => $value){
						if($application_impacts == ''){
							$application_impacts .= $value['name'];
						}else{
							$application_impacts .= ' ,'.$value['name'];
						}
					}
					?>
					<tr>
					  <td><?php echo $daily_reports_datas['created_date'] ; ?> </td>
					  <td><?php echo $daily_reports_datas['project']['id'] ; ?> </td>
					  <td><?php echo $daily_reports_datas['project']['TRF'] ; ?> </td>
					  <td><?php echo $daily_reports_datas['project']['desc'] ; ?> </td>
					  <td><?php echo $application_impacts; ?> </td>
					  <td><?php echo $daily_reports_datas['team_lead'] ; ?> </td>					  
					  <td><?php echo $daily_reports_datas['environment'] ; ?> </td>
					  <td><?php echo $daily_reports_datas['progress'] ; ?> </td>					  
					  <td><?php echo $daily_reports_datas['phase'] ; ?> </td>					  
					  <td><?php echo $daily_reports_datas['total_test_case'] ; ?> </td>
					  <td><?php echo $daily_reports_datas['test_case_executed'] ; ?> </td>
					  <td><?php echo $daily_reports_datas['test_case_outstanding'] ; ?> </td>
					  <td>
						  <a href="/reports/view/<?php echo $daily_reports_datas['id'] ; ?>" target='_blank'>View</a>
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
	  <div class="clearfix"></div>

	  
	</div>
  </div>
</div>
<!-- /page content -->