<!-- page content -->
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3><?php echo $title;?> </h3>
	  </div>

	  <div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		  <div class="input-group">
			<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
			  <button class="btn btn-default" type="button">Go!</button>
			</span>
		  </div>
		</div>
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
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">Team Leader Name <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="team-leader-name" name='name' required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-email">Email <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="team-leader-email" name='email' required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-phone-number">Phone Number <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="team-leader-phone-number" name='phone_number' required="required" class="form-control col-md-7 col-xs-12">
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
					  <input type="radio" class="flat" name="gender" value='Inactive'> Inactive
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
		  
			<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Team Leader Id </th>
				  <th>Team Leader Name </th>
				  <th>Email </th>
				  <th>Phone Number </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>1</td>
				  <td>Firstname Middlename Lastname </td>
				  <td>first.mid.last@email.com</td>
				  <td>+628111111111</td>
				  <td class=" last"><a href="#">View</a>  <a href="#">Edit</a>  <a href="#">Disable</a>
				  </td>
				</tr>
				<tr>
				  <td>2</td>
				  <td>John Doe</td>
				  <td>John.Doe@email.com</td>
				  <td>+628222222222</td>
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
		  
			<table id="table2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>Team Leader Id </th>
				  <th>Team Leader Name </th>
				  <th>Email </th>
				  <th>Phone Number </th>
				  <th><span class="nobr">Action</span>
				</tr>
			  </thead>
			  <tbody>
				  <tr>
					<td>1</td>
					<td>Firstname Middlename Lastname </td>
					<td>first.mid.last@email.com</td>
					<td>+628111111111</td>
					<td class=" last"><a href="#">Activate</a>
					</td>
				  </tr>
				  <tr>
					<td>2</td>
					<td>John Doe</td>
					<td>John.Doe@email.com</td>
					<td>+628222222222</td>
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