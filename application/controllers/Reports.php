<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Reports extends MY_Controller {
		public function __construct(){
			parent::__construct();	
			$this->load->model('environment_model');
			$this->load->model('teamleads_model');
			$this->load->model('progres_model');
			$this->load->model('phase_model');			
			$this->load->model('tester_on_projects_model');	
			$this->load->model('projects_model');	
			
			//content used
			$this->load->model('application_model');
			$this->load->model('users_model');
			$this->load->model('typeofchange_model');
			
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
							'page/reports/addreport.js'
						);
		}
		
        public function add() {
			$this->front_stuff();
            $this->contents = 'reports/addreport/index'; // its your view name, change for as per requirement.
			
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
							'phase' => $this->phase_model->get_phase(array('status' => 'active')),
							'applications' => $this->application_model->get_application(array('status' => 'active')),
							'tester' => $this->users_model->get_users(array('status' => 0)),
							'type_of_changes' => $this->typeofchange_model->get_typeofchange(array('status' => 'active'))
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function get_projects(){
			
			if(is_ajax() && $this->input->post('id')){
				$project_data = $this->projects_model->get_manageprojects(array('projects.id' => $this->input->post('id'), 'projects.status' => 'active'))[0];
				$application_impacts = '';
				foreach($project_data['application_impact'] as $application_name){
					if(empty($application_impacts)){
						$application_impacts .=  $application_name['name'];
					}else{
						$application_impacts .= ' ,'.$application_name['name'];						
					}
				}
				$data = array(
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
						'actual_start_doc_date' => site_show_date_format($project_data['actual_start_doc_date'])
						);
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
    }