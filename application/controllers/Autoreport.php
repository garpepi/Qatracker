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
				$where += array('daily_reports.created_date >= ' => date('Y-m',strtotime('-1 month')).'-01 00:00:00');
				$where += array('daily_reports.created_date < ' => date('Y-m-d 00:00:00'));
			}else{
				$where += array('daily_reports.created_date >= ' => date('Y-m').'-01 00:00:00');
				$where += array('daily_reports.created_date < ' => date('Y-m-d 00:00:00'));
			}
			$fetch = $this->daily_reports_model->get_reports($where,'tester_name asc, daily_reports.created_date asc');
			$data = array();
			// Write log generate to file
			write_file('./genreports/file.log', 'Fetch : '.print_r($fetch, true)."\n", "a+");
			write_file('./genreports/file.log', 'Where : '.print_r($where, true)."\n", "a+");
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
						ltrim($value['remarks'],'='),
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

			$this->generate_report($data,date('d M Y'));
			write_file('./genreports/generate-file.log', 'File was generated: Summary Report QA '.date('d M Y').'.xls'."\n", "a+");

		}
		
		public function autogeneratebyreq($from,$to){
			/*
			$from & to = 17-08-1991
			
			*/
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
			
			$where += array('daily_reports.created_date >= ' => date('Y-m-d',strtotime($from)).' 00:00:00');
			$where += array('daily_reports.created_date < ' => date('Y-m-d',strtotime($to)).' 00:00:00');
			
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
						ltrim($value['remarks'],'='),
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

			$this->generate_report($data,date('d M Y',strtotime($to)));

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
			$this->load->model('api_model');
			$return_api = $this->api_model->get_milist();
			
			// Write log generate to file
			write_file('./genreports/milist.log', date('Y-m-d H:i:s').'Return API GET MILIST: '.print_r($return_api, true)."\n", "a+");
			
			if(empty($milist) || $milist == NULL){
				$return_api = $this->api_model->get_milist_postmethod();
				write_file('./genreports/milist.log', date('Y-m-d H:i:s').'Return API POST METHOD MILIST: '.print_r($return_api, true)."\n", "a+");
				$milist = $return_api['data'];
			}else{
				$milist = $return_api['data'];
			}
			
			if(empty($milist) || $milist == NULL){
				write_file('./genreports/milist.log', date('Y-m-d H:i:s').'FAILED TO GET MILIST DATA'."\n", "a+");
				exit();
			}
			
			foreach($milist as $value)
			{
				$email[]=$value->email;
			}

			$date = '';
			if(date('j') == 1){
				$date = date('Y-m',strtotime('-1 month')).'-01 00:00:00 - '.date('Y-m-d H:i:s');
			}else{
				$date = date('Y-m').'-01 00:00:00'.' - '.date('Y-m-d H:i:s');
			}

			$this->load->model('api_model');

			$holiday_date = array();
			foreach($this->api_model->get_holiday_list()['data'] as $holiday)
			{
				$holiday_date[] = $holiday->date;
			}

			if(in_array(date('Y-m-d'), $holiday_date))
			{
				return 'Today is holiday';
			}else{
        if(!$this->isWeekend(date('Y-m-d')))
        {
          return $this->sending_email( $this->config->item('email_sender'), 'Qatracker App', $email, array(), 'Qa Tracker Report '.date('d M Y'), "Dear Team, \n\n Berikut ini kami sampaikan daily report dari Team Adidata (terlampir). \n\n Thanks & Regards, \n Helpdesk@Adidata.co.id \n\n\n\n Qatracker App - by Garpepi", './genreports/Summary Report QA '.date('d M Y').'.xls');
        }else{
          return 'Today is weekend';
        }

			}

		}

    public function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }

		public function test()
		{
			$this->load->model('api_model');
			echo '<pre>';
			$milist = array();
			foreach($this->api_model->get_milist()['data'] as $milists)
			{
				$milist[] = $milists->email;
			}

		}

    }
