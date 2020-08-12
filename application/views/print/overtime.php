<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css" media="print">
		@page { 
			size: landscape;
		}
	</style>
  </head>
  <body>
	<div class="container">
		<div class="row">
			<img src="http://adidata.co.id/images/logo.png" >
		</div>
		<div class="row justify-content-md-center" align="center">
			<h1>Overtime Report <?php echo $period;?></h1>
			<h2><?php echo $user_name;?></h2>
		</div>
		<hr>
		<div class="row justify-content-md-center">
		  <table class="table">
			<tr>
			  <th>Start - in </th>
			  <th>End - Out </th>
			  <th>Reasons </th>
			  <th>Created At </th>
			</tr>
		  <?php foreach ($table as $active_data): ?>
			  <tr>
				<td><?php echo $active_data['start_in'];?></td>
				<td><?php echo $active_data['end_out']; ?> </td>
				<td><?php echo $active_data['reason']; ?> </td>
				<td><?php echo $active_data['created_date']; ?> </td>
			  <tr>
		<?php endforeach;?>
			</table>		
		</div>
		<div class="row justify-content-md-center">
			<div class='col-xs-6'>
				<div class='col-xs-12' style="height: 100px;"> 
					Team Leader
				</div>
				<div class='col-xs-12'> 
					(<?php echo $leader_name;?>)
				</div>
			</div>
			<div class='col-xs-6'>
				<div class='col-xs-12' style="height: 100px;"> 
					Client Authorities
				</div>
				<div class='col-xs-12'> 
					(............................................)
				</div>
			</div>
			
		</div>
	</div>
  </body>
</html>