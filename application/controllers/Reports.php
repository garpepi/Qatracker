<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Reports extends MY_Controller {
		public function __construct(){
			parent::__construct();	
			$this->load->model('projects_model');	
			$this->load->model('daily_reports_model');	
			
			//content used
			$this->load->model('environment_model');
			$this->load->model('teamleads_model');
			$this->load->model('progres_model');
			$this->load->model('phase_model');			
			$this->load->model('tester_on_projects_model');	
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Reports',
							'box_title_1' => 'Add Report',
							'sub_box_title_1' => 'Adding new report',
							'box_title_2' => 'Projects List',
							'sub_box_title_2' => 'List of projects',
							'box_title_3' => 'Finished Projects List',
							'sub_box_title_3' => 'List of Finished projects',
							'box_title_4' => 'Droped Projects List',
							'sub_box_title_4' => 'List of Droped projects'
						);
			$this->page_css  = array(
							'vendors/iCheck/skins/flat/green.css',
							'vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
							'vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
							'vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
							'vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
							'vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
							'vendors/select2/dist/css/select2.min.css'

						);
			$this->page_js  = array(
							'vendors/iCheck/icheck.min.js',
							'vendors/datatables.net/js/jquery.dataTables.min.js',
							'vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
							'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
							'vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
							'vendors/datatables.net-buttons/js/buttons.flash.min.js',
							'vendors/datatables.net-buttons/js/buttons.html5.min.js',
							'vendors/datatables.net-buttons/js/buttons.print.min.js',
							'vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
							'vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
							'vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
							'vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
							'vendors/datatables.net-scroller/js/datatables.scroller.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'vendors/select2/dist/js/select2.full.min.js',
							'vendors/moment/moment.min.js',
							'vendors/datepicker/daterangepicker.js',
							'vendors/jquery/jquery.cookie.js',
							'page/reports/formreport.js'
						);
		}
		
		public function index(){
			$this->page_js  = array(
							'vendors/iCheck/icheck.min.js',
							'vendors/datatables.net/js/jquery.dataTables.min.js',
							'vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
							'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
							'vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
							'vendors/datatables.net-buttons/js/buttons.flash.min.js',
							'vendors/datatables.net-buttons/js/buttons.html5.min.js',
							'vendors/datatables.net-buttons/js/buttons.print.min.js',
							'vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
							'vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
							'vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
							'vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
							'vendors/datatables.net-scroller/js/datatables.scroller.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'vendors/select2/dist/js/select2.full.min.js',
							'vendors/moment/moment.min.js',
							'vendors/datepicker/daterangepicker.js',
							'vendors/jquery/jquery.cookie.js',
							'page/reports/reportlists.js'
						);
			$this->front_stuff();
			$this->contents = 'reports/list/index'; // its your view name, change for as per requirement.
			
			// Table
			$this->data['contents'] = array(
							'daily_reports' => $this->daily_reports_model->get_reports(array('daily_reports.user_id' => $this->session->userdata('logged_in_data')['id']))
			);
			//$this->fancy_print($this->data['contents']);
			$this->layout();
		}
		
		public function view($id=0){
			if($id != 0){
				$this->front_stuff();
				$this->contents = 'reports/form/index'; // its your view name, change for as per requirement.
				
				// get list project based on tester
				$project = $this->_get_projects($id);
				$form_data = $this->daily_reports_model->get_reports(array('daily_reports.id' => $id))[0];
				$form_data['downtimes_cut'] = $this->minuteToTime($form_data ['downtimes']);
				//$this->fancy_print($this->daily_reports_model->get_reports(array('daily_reports.id' => $id))[0]);
				//$this->fancy_print($form_data);
				// Table Active
				$this->data['contents'] = array(
								'project' => $project,
								'form' => $form_data,
								'environment' => $this->environment_model->get_environment(array('status' => 'active')),
								'team_leads' => $this->teamleads_model->get_teamleads(array('status' => 'active')),
								'progress' => $this->progres_model->get_progres(array('status' => 'active')),
								'phase' => $this->phase_model->get_phase(array('status' => 'active'))
								);
				// Table Incactive
				
				$this->layout();
			}
		}
		
        public function add() {
			$data_project = array();
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				$this->front_stuff();
				$this->contents = 'reports/form/index'; // its your view name, change for as per requirement.
				
				// get list project based on tester
				$project_lists = array();
				$tester_project_lists = $this->tester_on_projects_model->get_tester_on_projects(array('tester_on_projects.tester_id' => $this->session->userdata('logged_in_data')['id'],'tester_on_projects.status' => 'active')) ; 
				foreach($tester_project_lists as $key => $value){
					array_push($project_lists, $this->projects_model->get_manageprojects(array('projects.id' => $value['project_id'], 'projects.status' => 'active'))[0] );
				}
				// Table Active
				$this->data['contents'] = array(
								'project_lists' => $project_lists,
								'environment' => $this->environment_model->get_environment(array('status' => 'active')),
								'team_leads' => $this->teamleads_model->get_teamleads(array('status' => 'active')),
								'progress' => $this->progres_model->get_progres(array('status' => 'active')),
								'phase' => $this->phase_model->get_phase(array('status' => 'active'))
								);
				// Table Incactive
				
				$this->layout();
			}else{
				
				$this->form_validation->set_rules('project_id', 'Project', 'required');
				$this->form_validation->set_rules('environment_id', 'Environment', 'required');
				$this->form_validation->set_rules('team_lead_id', 'Team Leader', 'required');
				$this->form_validation->set_rules('progress_id', 'Progress', 'required');
				$this->form_validation->set_rules('phase_id', 'Phase', 'required');
				$this->form_validation->set_rules('total_test_case', 'Total Tase case', 'required|min_length[0]');
				$this->form_validation->set_rules('test_case_per_user', 'Total Tase case assign', 'required|min_length[0]');
				$this->form_validation->set_rules('test_case_executed', 'Total Tase case executed', 'required|min_length[0]');
				$this->form_validation->set_rules('downtimes_day', 'Day', 'required|min_length[0]');
				$this->form_validation->set_rules('downtimes_hour', 'Hour', 'required|min_length[0]');
				$this->form_validation->set_rules('downtimes_minute', 'Minute', 'required|min_length[0]');
				$this->form_validation->set_rules('actual_end_date', 'Actual End Date', 'required');
				$this->form_validation->set_rules('actual_end_doc_date', 'Actual Doc End Date', 'required');
				
				if($this->form_validation->run()){
					
					$data = $this->input->post();
						if(!empty($data['actual_start_date'])){
							$data_project['actual_start_date'] = date('Y-m-d',strtotime($data['actual_start_date']));						
						}
						if(!empty($data['actual_start_doc_date'])){
							$data_project['actual_start_doc_date'] = date('Y-m-d',strtotime($data['actual_start_doc_date']));
						}
						if(!empty($data['actual_end_date'])){
							$data_project['actual_end_date'] = date('Y-m-d');						
						}
						if(!empty($data['actual_end_doc_date'])){
							$data_project['actual_end_doc_date'] = date('Y-m-d');
						}
					$data['downtimes'] = ($data['downtimes_day'] * 1440) + ($data['downtimes_hour'] * 60) + ($data['downtimes_minute'] * 1);
					unset($data['actual_start_date']);
					unset($data['actual_start_doc_date']);
					unset($data['actual_end_date']);
					unset($data['actual_end_doc_date']);
					unset($data['downtimes_day']);
					unset($data['downtimes_hour']);
					unset($data['downtimes_minute']);
					
					$data['test_case_outstanding'] = $data['test_case_per_user'] - $data['test_case_executed'] ;
					$data['user_id'] = $this->session->userdata('logged_in_data')['id'];
					
					if(!$this->daily_reports_model->add_reports($data)){
						$this->session->set_flashdata('form_msg', 'Error insert Report');	
					}else{
						//check need to update project or not
						$flag = 0;
						if(isset($data_project['actual_start_date']) && count($this->projects_model->get_manageprojects(array('projects.id' => $data['project_id'], 'projects.status' => 'active', 'projects.actual_start_date' => null)))>0 ){
							$flag = 1;
						}
						if(isset($data_project['actual_start_doc_date']) && $this->projects_model->get_manageprojects(array('projects.id' => $data['project_id'], 'projects.status' => 'active', 'projects.actual_start_doc_date' => null))){
							$flag = 1;
						}
						if(isset($data_project['actual_end_date']) && $this->projects_model->get_manageprojects(array('projects.id' => $data['project_id'], 'projects.status' => 'active', 'projects.actual_end_date' => null))){
							$flag = 1;				
						}
						if(isset($data_project['actual_end_doc_date']) && $this->projects_model->get_manageprojects(array('projects.id' => $data['project_id'], 'projects.status' => 'active', 'projects.actual_end_doc_date' => null))){
							$flag = 1;
						}
						
						if($flag){
							// update project
							$data_project['id'] = $data['project_id'];
							$this->projects_model->update_manageprojects($data_project);
						}
						$this->session->set_flashdata('form_msg', 'Success');
						redirect('/reports/add');
					}
										
					
				}else{
					if(!$this->form_validation->run()){
						$this->session->set_flashdata('form_msg', validation_errors());
					}else{
						$this->session->set_flashdata('form_msg', 'Please Contact Administrator');
					}
				}
				
			}
			
        }
		
		private function _get_projects($id){
			$project_data = $this->projects_model->get_manageprojects(array('projects.id' => $id, 'projects.status' => 'active'))[0];
				$application_impacts = '';
				foreach($project_data['application_impact'] as $application_name){
					if(empty($application_impacts)){
						$application_impacts .=  $application_name['name'];
					}else{
						$application_impacts .= ' ,'.$application_name['name'];						
					}
				}
				$data = array(
						'id' => $project_data['id'],
						'project_desc' => $project_data['desc'],
						'TRF' => $project_data['TRF'],
						'sum_TRF' => $project_data['sum_TRF'],
						'application_impacts' => $application_impacts,
						'type_of_change' => $project_data['TOC'],
						'plan_start_date' => site_show_date_format($project_data['plan_start_date']),
						'plan_end_date' => site_show_date_format($project_data['plan_end_date']),
						'plan_start_doc_date' => site_show_date_format($project_data['plan_start_doc_date']),
						'plan_end_doc_date' => site_show_date_format($project_data['plan_end_doc_date']),
						'actual_start_date' => site_show_date_format($project_data['actual_start_date']),
						'actual_start_doc_date' => site_show_date_format($project_data['actual_start_doc_date']),
						'actual_end_date' => site_show_date_format($project_data['actual_end_date']),
						'actual_end_doc_date' => site_show_date_format($project_data['actual_end_doc_date'])
					);
				return $data;
		}
		
		public function get_projects(){			
			if(is_ajax() && $this->input->post('id')){
				$data = $this->_get_projects($this->input->post('id'));
				unset($data['id']);
				return_json($data);
			}else{
				redirect('/home');
			}
			
		}
		
		private function fetch_project($status = 'active'){
			return $this->projects_model->get_manageprojects(array('projects.status'=>$status));
		}
		
		private function fetch_project_done(){
			return $this->projects_model->get_manageprojects();
		}
		
		private function minuteToTime($minute) {
			$seconds = $minute * 60;
			$dtF = new \DateTime('@0');
			$dtT = new \DateTime("@$seconds");
			$array = array(
					'day' => $dtF->diff($dtT)->format('%a'),
					'hour' => $dtF->diff($dtT)->format('%h'),
					'minute' => $dtF->diff($dtT)->format('%i')
					);
			//return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
			return $array;
		}

    }