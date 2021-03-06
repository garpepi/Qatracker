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
			<form <?php if($this->uri->segment(2) != 'view') : ?> action='/dailyreports/<?php if($this->uri->segment(2) != 'edit') :?>add <?php else:?>edit/<?php echo $contents['project']['id'];?> <?php endif;?>' method='post' <?php endif;?> id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tester-name">Tester Name </span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <input type="text" id="tester_name" required="required" class="form-control col-md-7 col-xs-12" value='<?php echo $this->session->userdata('logged_in_data')['name']; ?>' disabled>
					</div>
				</div>
			   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Project <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				<?php
					if($this->uri->segment(2) != 'view' && isset($contents['project_lists'])):
				?>
				  <select class="select2_single_project form-control" id='project' required="required" name='project_id' required=required>
					<?php
					
						?>
						<option value=''>Choose option</option>
						<?php
						foreach($contents['project_lists'] as $key => $value){
							?>
								<option value="<?php echo $value['id'];?>"><?php echo $value['id'].'-'.((!empty($value['TRF']))? $value['TRF'] : 'UPCOMING TRF').'-'.$value['sum_TRF'];?></option>
							<?php
						}
					?>
				  </select>
				<?php
					else:
				?>
					<input type="text" required="required" class="form-control col-md-7 col-xs-12" value='<?php echo $contents['project']['id'].'-'.((!empty($contents['project']['TRF']))? $contents['project']['TRF'] : 'UPCOMING TRF').'-'.$contents['project']['sum_TRF'];?>' disabled>
				<?php
					endif;
				?>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Description Project  <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled type="text" id="project-desc" <?php if($this->uri->segment(2) == 'view' ): ?> value='<?php echo $contents['project']['project_desc']; ?>' <?php endif; ?>  required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-leader-name">TRF 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled type="text" id="TRF" <?php if(($this->uri->segment(2) == 'view' ) && !empty($contents['project']['TRF'])):?> value='<?php echo $contents['project']['TRF']; ?>' <?php else: ?> placeholder='UPCOMING TRF' <?php endif; ?> class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Summary TRF <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled  type="text" id="trf-sum" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['project']['sum_TRF']; ?>' <?php endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Impact App <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled  type="text" id="impact-app" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['project']['application_impacts']; ?>' <?php endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Type of Change <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled  type="text" id="type_of_change" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['project']['type_of_change']; ?>' <?php endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div> 
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Project Environment <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select class="form-control" name='environment_id' <?php echo ($this->uri->segment(2) == 'view') ? 'disabled' : '' ; ?> required="required">
					<option value=''>Choose option</option>
					<?php
					foreach ($contents['environment'] as $env):
					?>
						<option value="<?php echo $env['id'];?>" <?php if( ($this->uri->segment(2) == 'view') && ($env['id'] == $contents['form']['environment_id'])):?> selected <?php endif;?> ><?php echo $env['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Team Leader <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select class="form-control" name='team_lead_id' <?php echo ($this->uri->segment(2) == 'view') ? 'disabled' : '' ; ?> required="required">
					<option value=''>Choose option</option>
					<?php
					foreach ($contents['team_leads'] as $team_lead):
					?>
						<option value="<?php echo $team_lead['id'];?>" <?php if(($this->uri->segment(2) == 'view') &&  $team_lead['id'] == $contents['form']['team_lead_id']):?> selected <?php endif;?> ><?php echo $team_lead['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Progress <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select class="form-control" name='progress_id' <?php echo ($this->uri->segment(2) == 'view') ? 'disabled' : '' ; ?> required="required">
					<option value=''>Choose option</option>
					<?php
					foreach ($contents['progress'] as $progress):
					?>
						<option value="<?php echo $progress['id'];?>" <?php if( ($this->uri->segment(2) == 'view') &&  $progress['id'] == $contents['form']['progress_id']):?> selected <?php endif;?> ><?php echo $progress['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Phase <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <select id = 'phase' class="form-control" name='phase_id' <?php echo ($this->uri->segment(2) == 'view') ? 'disabled' : '' ; ?> required="required">
					<option value=''>Choose option</option>
					<?php
					foreach ($contents['phase'] as $phase):
					?>
						<option value="<?php echo $phase['id'];?>" <?php if(($this->uri->segment(2) == 'view') &&  $phase['id'] == $contents['form']['phase_id']):?> selected <?php endif;?> ><?php echo $phase['name'];?></option>
					<?php
					endforeach;
					?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Remark (255 max) :</label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
						<textarea <?php echo ($this->uri->segment(2) == 'view') ? 'disabled' : '' ; ?>  id="message" class="form-control" name="remarks"  data-parsley-maxlength="20000" data-parsley-maxlength-message="Max 20000 caracters long info description" data-parsley-validation-threshold="50" <?php if($this->uri->segment(2) == 'view' ):?> <?php echo $contents['form']['remarks']; ?>  <?php endif; ?> ></textarea>
				   </div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Total Test case <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input name='total_test_case' min='1' type="number" id="total_test_case" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['form']['total_test_case']; ?>' disabled  <?php else: echo 'value=0 '; endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Total Test case Assign <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input name='test_case_per_user' min='1' type="number" id="total_test_case_assign" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['form']['test_case_per_user']; ?>' disabled  <?php else: echo 'value=0 '; endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Total Test case Executed <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input name='test_case_executed' min='0' type="number" id="total_test_case_executed" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['form']['test_case_executed']; ?>' disabled <?php else: echo 'value=0 '; endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Total Test case Outstanding <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input readonly type="number" id="total_test_case_outstanding" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['form']['test_case_per_user']-$contents['form']['test_case_executed']; ?>' disabled <?php else: echo 'value=0 '; endif; ?> required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-desc">Downtimes <span class="required">*</span>
				</label>
				<div class="col-md-2 col-sm-2 col-xs-4">
				Days  <input placeholder='Day' name='downtimes_day' min='0' type="number" id="total_test_case_executed" <?php if($this->uri->segment(2) == 'view' ):	?> value= '<?php echo $contents['form']['downtimes_cut']['day']; ?>' disabled <?php else :?> value=0<?php endif; ?> required="required" class="form-control col-md-1 col-xs-1">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-4">
				Hour
				 <input placeholder='Hour' name='downtimes_hour' min='0' type="number" id="total_test_case_executed" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['form']['downtimes_cut']['hour']; ?>' disabled <?php else :?> value=0<?php endif; ?> required="required" class="form-control col-md-1 col-xs-1">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-4">
				Minute
				 <input placeholder='Minute' name='downtimes_minute' min='0' type="number" id="total_test_case_executed" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo $contents['form']['downtimes_cut']['minute']; ?>' disabled <?php else :?> value=0<?php endif; ?> required="required" class="form-control col-md-1 col-xs-1">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="plan_start_date">Plan Start Date 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled type="text" id="plan_start_date" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo date('m/d/Y',strtotime($contents['project']['plan_start_date'])); ?>' disabled <?php endif; ?>  class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="plan_end_date">Plan End Date 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled type="text" id="plan_end_date" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo date('m/d/Y',strtotime($contents['project']['plan_end_date'])); ?>' disabled <?php endif; ?>  class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="plan_start_doc_date">Plan Start Doc Date 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled type="text" id="plan_start_doc_date" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo date('m/d/Y',strtotime($contents['project']['plan_start_doc_date'])); ?>' disabled <?php endif; ?>  class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="plan_end_doc_date">Plan End Doc Date 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input disabled type="text" id="plan_end_doc_date" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo date('m/d/Y',strtotime($contents['project']['plan_end_doc_date'])); ?>' disabled <?php endif; ?>  class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Actual Start Date 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="actual_start_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo (!empty($contents['project']['actual_start_date'])) ? date('m/d/Y',strtotime($contents['project']['actual_start_date'])) : ''; ?>'  disabled <?php endif; ?> type="text" name='actual_start_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Actual Start Doc Date 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="actual_start_doc_date" class="date-picker form-control col-md-7 col-xs-12" <?php if($this->uri->segment(2) == 'view' ):	?> value='<?php echo (!empty($contents['project']['actual_start_doc_date'])) ? date('m/d/Y',strtotime($contents['project']['actual_start_doc_date'])) : ''; ?>' disabled <?php endif; ?> type="text" name='actual_start_doc_date'>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Actual End Test <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type='hidden' name="actual_end_date" value=0 >
				  <div class="radio" id='actual_end_date_radio'>
					<label>
					  <input type="radio" class="flat" name="actual_end_date" 
					  <?php 
					  
						if($this->uri->segment(2) == 'view'){
							if(empty($contents['project']['actual_end_date'])){
								echo 'checked';
							}else{
								echo 'disabled';
							}
						}else{
							echo 'checked';
						}
						
					  ?> value='0'> Not done
					</label>
					<label>
					  <input type="radio" class="flat" name="actual_end_date" 
					  <?php 
					  
						if($this->uri->segment(2) == 'view'){
							if(!empty($contents['project']['actual_end_date'])){
								echo 'checked';
							}else{
								echo 'disabled';
							}
						}else{
							echo '';
						}
						
					  ?> value='1'> Done
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Actual End Doc Test <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type='hidden' name="actual_end_doc_date" value=0 >
				  <div class="radio" id='actual_end_doc_date_radio'>
					<label>
					  <input type="radio" class="flat" name="actual_end_doc_date" 
					  <?php 
					  
						if($this->uri->segment(2) == 'view'){
							if(empty($contents['project']['actual_end_doc_date'])){
								echo 'checked';
							}else{
								echo 'disabled';
							}
						}else{
							echo 'checked';
						}
						
					  ?> value='0'> Not done
					</label>
					<label>
					  <input type="radio" class="flat" name="actual_end_doc_date" 
					  <?php 
					  
						if($this->uri->segment(2) == 'view'){
							if(!empty($contents['project']['actual_end_doc_date'])){
								echo 'checked';
							}else{
								echo 'disabled';
							}
						}else{
							echo '';
						}
					  ?> value='1'> Done
					</label>
				  </div>
				</div>
			  </div>
			  <div class="ln_solid"></div>
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
