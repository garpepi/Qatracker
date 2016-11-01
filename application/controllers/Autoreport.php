<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Autoreport extends CI_Controller {		
		public function __construct() {
		   parent::__construct();
		   $this->load->model('projects_model');	
			$this->load->model('daily_reports_model');	
		}
		
		private function generate_report($data_gen, $date){
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
			
			
			$filename='Summary Report QA '.$date.'.xls'; //save our workbook as this file name
		//	header('Content-Type: application/vnd.ms-excel'); //mime type
		//	header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		//	header('Cache-Control: max-age=0'); //no cache
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
			$objWriter->save('./genreports/'.$filename);
		}
		
		public function autogenerate(){
			//validate if not 6 a clock
			/*
			if(date('H') != 6){
				exit();
			}
			*/
			//if cli
			if(!is_cli()){
				exit();
			}
			$where = array();
			
			if(date('j') == 1){
				$where += array('daily_reports.created_date > ' => date('Y-m',strtotime('-1 month')).'-01 00:00:00');
				$where += array('daily_reports.created_date < ' => date('Y-m-d HH:mm:dd')); 
			}else{
				$where += array('daily_reports.created_date > ' => date('Y-m').'-01 00:00:00');
				$where += array('daily_reports.created_date < ' => date('Y-m-d HH:mm:dd')); 
			}
			$fetch = $this->daily_reports_model->get_reports($where,'tester_name asc, daily_reports.created_date asc');
			$data = array();
			// Write log generate to file
			write_file('./genreports/file.log', 'Fetch : '.print_r($fetch, true));
			write_file('./genreports/file.log', 'Where : '.print_r($where, true));
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
						$value['created_date'],
						$value['environment'],
						$value['tester_name'],
						$value['team_lead'],
						$value['project']['TRF'],
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
						$value['project']['plan_start_date'],
						$value['project']['plan_end_date'],
						$value['project']['actual_start_date'],
						$value['project']['actual_end_date'],
						$d.' Days, '.$h.' Hours, '.$m.' Minutes' ,
						$value['project']['plan_start_doc_date'],
						$value['project']['plan_end_doc_date'],
						$value['project']['actual_start_doc_date'],
						$value['project']['actual_end_doc_date']						
						);
				
				array_push($data,$temp);
			}
			
			$this->generate_report($data,date('d M Y'));			
			
		}
		
		private function sending_email($from_email, $from_name, $to, $cc= array(), $subject, $message, $attachment = ''){			
			$this->load->library('email');
		//$this->email->initialize($config);
			$this->email->from($from_email, $from_name);
			$this->email->to($to);
			if(!empty($cc)){
				$this->email->cc($cc);				
			}
			
			$this->email->subject($subject);
			$this->email->message($message);
			if(!empty($attachment)){
				if(is_file($attachment)){
					$this->email->attach($attachment);									
				}else{
					echo 'file not found - '. $attachment;
					exit();
				}
			}
			
			if($this->email->send()){
				return 'Sending Ok';
			}else{
				return 'Sending Not Ok';
			}
			
		}
		
		public function autoemail(){
			//validate if not 9 a clock
			/*if(date('H') != 9){
				exit();
			}*/
			
			//if cli
			if(!is_cli()){
				exit();
			}
			$this->config->load('qa_tracker_config');
			$date = '';
			if(date('j') == 1){
				$date = date('Y-m',strtotime('-1 month')).'-01 00:00:00 - '.date('Y-m-d h:m:s');
			}else{
				$date = date('Y-m').'-01 00:00:00'.' - '.date('Y-m-d h:m:s');
			}
			
			return $this->sending_email( $this->config->item('email_sender'), 'Qatracker App', $this->config->item('email_destinations'), array(), 'Qa Tracker Report '.date('d M Y'), "This Email Conatining Report Qa Tracker from \n ".$date ."\n\n Regards,\n\n QA Tracker - App", './genreports/Summary Report QA '.date('d M Y').'.xls');
		
		}

    }