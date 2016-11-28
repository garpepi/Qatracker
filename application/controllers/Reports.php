<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Reports extends MY_Controller {
		public function __construct(){
			parent::__construct();	
			$this->load->model('projects_model');	
			$this->load->model('daily_reports_model');	
			
			//content used
			$this->load->model('users_model');
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Reports',
							'box_title_1' => 'Manual Generate Report',
							'sub_box_title_1' => 'Manual Generate  report',
							'box_title_2' => 'Projects List',
							'sub_box_title_2' => 'List of projects',
							'box_title_3' => 'Finished Projects List',
							'sub_box_title_3' => 'List of Finished projects',
							'box_title_4' => 'Droped Projects List',
							'sub_box_title_4' => 'List of Droped projects'
						);
			$this->page_css  = array(
							'vendors/iCheck/skins/flat/green.css',
							'vendors/switchery/dist/switchery.min.css',
							'vendors/select2/dist/css/select2.min.css'

						);
			$this->page_js  = array(
							'vendors/iCheck/icheck.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'vendors/select2/dist/js/select2.full.min.js',
							'vendors/moment/moment.min.js',
							'vendors/datepicker/daterangepicker.js',
							'vendors/jquery/jquery.cookie.js',
							'vendors/switchery/dist/switchery.min.js',
							'page/reports/manualreports.js'
						);
		}
		
		public function manualreports(){
			$this->front_stuff();
			$this->contents = 'reports/manualreports'; // its your view name, change for as per requirement.
			
			// Contents
			$this->data['contents'] = array(
							'tester' => $this->users_model->get_users(array('type' => 0,'status' => 'active'))
			);
			//$this->fancy_print($this->data['contents']);
			$this->layout();
		}
		
		public function generate_manual(){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/reports/manualreports');
			}
			$where = array();
			
			//validation
				if(!$this->input->post('alluser')){
					$this->form_validation->set_rules('users[]', 'Testers', 'required');
				}
				if(!$this->input->post('alldate')){
					$this->form_validation->set_rules('daterange', 'Date Range', 'required');
				}
			//end validation
			// seting up useable data
			if(!$this->input->post('alluser')){
				foreach($this->input->post('users') as $key => $value){
					$where += array('daily_reports.user_id' => $value);
				}
			}
			if(!$this->input->post('alldate')){
				$where += array('daily_reports.created_date >= ' => db_date_format(substr($this->input->post('daterange'),0,10)));
				$where += array('daily_reports.created_date <= ' => db_date_format(substr($this->input->post('daterange'),-10)));
			}
			
			
			$fetch = $this->daily_reports_model->get_reports($where,'tester_name asc, daily_reports.created_date asc');
			$data = array();
			
			foreach($fetch as $key=> $value)
			{
				// set data
				$temp = array(); // initialize
				$application_list = '';// initialize
				foreach($value['project']['application_impact'] as $keys => $app_data){
					if(empty($application_list) || isset($app_data['project']['application_impact'][$keys+1]) ){
						$application_list .= $app_data['name'].',';
					}else{
						$application_list .= $app_data['name'];
					}
				}
				
				// Time Convert
				//
				$d = floor ($value['downtimes'] / 1440);
				$h = floor (($value['downtimes'] - $d * 1440) / 60);
				$m = $value['downtimes'] - ($d * 1440) - ($h * 60);
				
				$temp = array(
						date('Y-m-d',strtotime($value['created_date'])),
						$value['environment'],
						$value['tester_name'],
						$value['team_lead'],
						($value['project']['TRF'] != '' ? $value['project']['TRF'] : 'UPCOMING TRF'),
						$value['project']['TOC'],
						$application_list,
						$value['project']['sum_TRF'],
						$value['progress'],
						$value['phase'],
						$value['remarks'],
						$value['total_test_case'],
						$value['test_case_per_user'],
						$value['test_case_executed'],
						$value['test_case_outstanding'],
						(!empty($value['project']['plan_start_date']) ? date('Y-m-d',strtotime($value['project']['plan_start_date']) ):'' ),
						(!empty($value['project']['plan_end_date']) ? date('Y-m-d',strtotime($value['project']['plan_end_date']) ):'' ),
						(!empty($value['project']['actual_start_date']) ? date('Y-m-d',strtotime($value['project']['actual_start_date']) ):'' ),
						(!empty($value['actual_end_date']) ? date('Y-m-d',strtotime($value['actual_end_date']) ):'' ),
						$d.' Days, '.$h.' Hours, '.$m.' Minutes' ,
						(!empty($value['project']['plan_start_doc_date']) ? date('Y-m-d',strtotime($value['project']['plan_start_doc_date']) ):'' ),
						(!empty($value['project']['plan_end_doc_date']) ? date('Y-m-d',strtotime($value['project']['plan_end_doc_date']) ):'' ),
						(!empty($value['project']['plan_end_doc_date']) ? date('Y-m-d',strtotime($value['project']['plan_end_doc_date']) ):'' ),
						(!empty($value['actual_end_doc_date']) ? date('Y-m-d',strtotime($value['actual_end_doc_date']) ):'' )			
						);
				
				array_push($data,$temp);
			}
			// end formating data
			$this->generate_report($data);
		}
		
		private function generate_report($data_gen){
			$header[] = array(
						'Timestamp',
						'Project',
						'Tester Name',
						'Test Lead Name',
						'TRF Number',
						'Type of Changes',
						'Application',
						'Summary',
						'SIT / UAT Status',
						'Phase',
						'Remark',
						'Total Test Case Aplikasi',
						'Total Assigned TC per tester',
						'Test Case Executed',
						'Outstanding Test Case',
						'Plan Start Date',
						'Plan Completion Date',
						'Actual Start Date',
						'Actual Completion Date',
						'Downtime',
						'Plan Start Date - Doc',
						'Plan Completion Date - Doc',
						'Actual Start Date - Doc',
						'Actual Completion Date - Doc'
					);
			$data = array_merge($header,$data_gen);
			// start Generate Excel
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Adidata QA Daily Report'); // naming sheet
			
			
			$filename='Summary Report QA.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
			$this->excel->getActiveSheet()->fromArray( 
					$data,  // The data to set
					NULL,        // Array values with this value will not be set
					'A1'         // Top left coordinate of the worksheet range where
								 //    we want to set these values (default is A1)
				);
			//make the font become bold
			$this->excel->getActiveSheet()->getStyle('A1:X1')->getFont()->setBold(true);
			//Autosize
			for($col = 'A'; $col !== 'Y'; $col++) {
				$this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
			}
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');
		}
		

    }