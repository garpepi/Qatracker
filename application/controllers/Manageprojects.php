<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageProjects extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('projects_model');
			$this->load->model('application_impact_model');
			$this->load->model('tester_on_projects_model');
			
			//content used
			$this->load->model('application_model');
			$this->load->model('users_model');
			$this->load->model('typeofchange_model');
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Manage Projects',
							'box_title_1' => 'Add Project',
							'sub_box_title_1' => 'Adding new projects',
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
							'vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'vendors/select2/dist/js/select2.full.min.js',
							'vendors/moment/moment.min.js',
							'vendors/datepicker/daterangepicker.js',
							'page/projects/manageprojects.js'
						);
		}
        public function index() {
			$this->front_stuff();
            $this->contents = 'projects/manageprojects/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
							'table_active' => $this->fetch_project('active'),
							'table_drop' => $this->fetch_project('drop'),
							'table_finish' => $this->fetch_project_done(),
							'applications' => $this->application_model->get_application(array('status' => 'active')),
							'tester' => $this->users_model->get_users(array('type' => 0,'status' => 'active')),
							'type_of_changes' => $this->typeofchange_model->get_typeofchange(array('status' => 'active'))
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function view($id) {
			$this->front_stuff();
            $this->contents = 'projects/manageprojects/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
								'applications' => $this->application_model->get_application(array('status' => 'active')),
								'tester' => $this->users_model->get_users(array('type' => 0,'status' => 'active')),
								'type_of_changes' => $this->typeofchange_model->get_typeofchange(array('status' => 'active')),
								'form' => $this->projects_model->get_manageprojects(array('projects.id'=>$id))[0]
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function add (){
						
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/manageprojects');
			}
			$data = $this->input->post();
			$data['plan_start_date'] = date('Y-m-d',strtotime($data['plan_start_date']));
			$data['plan_end_date'] = date('Y-m-d',strtotime($data['plan_end_date']));
			$data['plan_start_doc_date'] = date('Y-m-d',strtotime($data['plan_start_doc_date']));
			$data['plan_end_doc_date'] = date('Y-m-d',strtotime($data['plan_end_doc_date']));

			$this->form_validation->set_rules('applications[]', 'Application Impact', 'required');
			$this->form_validation->set_rules('desc', 'Desc', 'required');
			$this->form_validation->set_rules('sum_TRF', 'Summary TRF', 'required');
			$this->form_validation->set_rules('testers[]', 'Tester', 'required');
			$this->form_validation->set_rules('type_of_change', 'Type Of Change', 'required');
			$this->form_validation->set_rules('plan_start_date', 'Plan Start Date', 'required');
			$this->form_validation->set_rules('plan_end_date', 'Plan End Date', 'required');
			$this->form_validation->set_rules('plan_start_doc_date', 'Plan Doc Start Date', 'required');
			$this->form_validation->set_rules('plan_end_doc_date', 'Plan Doc Start Date', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			$projects_data = array(
						'desc' => $data['desc'],
						'TRF' => $data['TRF'],
						'sum_TRF' => $data['sum_TRF'],
						'type_of_change' => $data['type_of_change'],
						'plan_start_date' => $data['plan_start_date'],
						'plan_end_date' => $data['plan_end_date'],
						'plan_start_doc_date' => $data['plan_start_doc_date'],
						'plan_end_doc_date' => $data['plan_end_doc_date'],
						'status' => $data['status']
						);
						
			$project_id = $this->projects_model->add_manageprojects($projects_data);
			if($this->form_validation->run() && $project_id){
				// add list application impact
				$this->application_impact_model->add_application_impact($project_id,$data['applications']);
				// add list tester involve
				$this->tester_on_projects_model->add_tester_on_projects($project_id,$data['testers']);
				$this->session->set_flashdata('form_msg', 'Success Add New Application Name');
				
			}else{
				if(!$this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'TRF Already Exist');
				}
			}		
			redirect('/manageprojects');
		}
		
		public function edit ($id = 0){			
			if($id == 0 && $this->input->server('REQUEST_METHOD') != 'POST')
			{
				redirect('/manageprojects');
			}else{
				if ($this->input->server('REQUEST_METHOD') == 'POST'){

				// post data
					$data = $this->input->post();
					$data['plan_start_date'] = date('Y-m-d',strtotime($data['plan_start_date']));
					$data['plan_end_date'] = date('Y-m-d',strtotime($data['plan_end_date']));
					$data['plan_start_doc_date'] = date('Y-m-d',strtotime($data['plan_start_doc_date']));
					$data['plan_end_doc_date'] = date('Y-m-d',strtotime($data['plan_end_doc_date']));
					$data['id'] = $id;
					
					$this->form_validation->set_rules('applications[]', 'Application Impact', 'required');
					$this->form_validation->set_rules('desc', 'Desc', 'required');
					$this->form_validation->set_rules('sum_TRF', 'Summary TRF', 'required');
					$this->form_validation->set_rules('testers[]', 'Tester', 'required');
					$this->form_validation->set_rules('type_of_change', 'Type Of Change', 'required');
					$this->form_validation->set_rules('plan_start_date', 'Plan Start Date', 'required');
					$this->form_validation->set_rules('plan_end_date', 'Plan End Date', 'required');
					$this->form_validation->set_rules('plan_start_doc_date', 'Plan Doc Start Date', 'required');
					$this->form_validation->set_rules('plan_end_doc_date', 'Plan Doc Start Date', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					
					$projects_data = array(
							'id' => $id,
							'desc' => $data['desc'],
							'TRF' => $data['TRF'],
							'sum_TRF' => $data['sum_TRF'],
							'type_of_change' => $data['type_of_change'],
							'plan_start_date' => $data['plan_start_date'],
							'plan_end_date' => $data['plan_end_date'],
							'plan_start_doc_date' => $data['plan_start_doc_date'],
							'plan_end_doc_date' => $data['plan_end_doc_date'],
							'status' => $data['status']
						);

					if($this->form_validation->run()){
						try { 
							  if(!$this->projects_model->edit_manageprojects($projects_data)) {
								throw new Exception('Error on Save Edit Project');
							  }
						} catch (Exception $e) {
							print_r($projects_data);
						  var_dump($e->getMessage());
						  $this->db->last_query();
						  exit();
						}
						
						try { 
							$_editapp = $this->application_impact_model->edit_application_impact($id,$data['applications'],$data['status']);
							print_r($_editapp);
							  if(!$_editapp) {
								throw new Exception('Error on Save Edit APP');
							  }
						} catch (Exception $e) {
						  var_dump($e->getMessage());exit();
						}
						try { 
							$_testerproj = $this->tester_on_projects_model->edit_tester_on_projects($id,$data['testers'],$data['status']);
							print_r($_testerproj);
							 if(!$_testerproj) {
								throw new Exception('Error on Save Edit Tester on Project');
							  }
						} catch (Exception $e) {
						  var_dump($e->getMessage());exit();
						}
						//$this->projects_model->edit_manageprojects($projects_data);
						//$this->application_impact_model->edit_application_impact($id,$data['applications'],$data['status']);
						//$this->tester_on_projects_model->edit_tester_on_projects($id,$data['testers'],$data['status']);
						
						$this->session->set_flashdata('form_msg', 'Success Change Application Data');
						redirect('/manageprojects');
						
					}else{						
						if(!$this->form_validation->run()){							
							$this->session->set_flashdata('form_msg', validation_errors());
						}else{							
							$this->session->set_flashdata('form_msg', 'Data You Change to Already Exist');
						}
					//	redirect('/manageprojects/edit/'.$id);
					}
				}else{
					$this->front_stuff();
					$this->contents = 'projects/manageprojects/index'; // its your view name, change for as per requirement.
					
					$this->data['contents'] = array(
										'applications' => $this->application_model->get_application(array('status' => 'active')),
										'tester' => $this->users_model->get_users(array('type' => 0, 'status' => 'active')),
										'type_of_changes' => $this->typeofchange_model->get_typeofchange(array('status' => 'active')),
										'form' => $this->projects_model->get_manageprojects(array('projects.id'=>$id))[0]
									);
					$this->layout();
				}
			}
		}
		
		private function fetch_project($status = 'active'){
			return $this->projects_model->get_manageprojects(array('projects.status'=>$status));
		}
		
		private function fetch_project_done(){
			return $this->projects_model->get_manageprojects();
		}
		
		public function reactivate($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'active');
				$this->typeofchange_model->update_typeofchange($data);				
			}
			redirect('/manageprojects');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'inactive');
				$this->typeofchange_model->update_typeofchange($data);				
			}
			redirect('/manageprojects');
		}
    }