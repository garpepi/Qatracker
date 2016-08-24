<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageEnvironment extends MY_Controller {
	
		public function __construct(){
			parent::__construct();
			$this->load->model('environment_model');
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Environment',
							'box_title_1' => 'Adding Environment',
							'sub_box_title_1' => 'List Environment',
							'box_title_2' => 'Environment List',
							'sub_box_title_2' => 'List of Environment',
							'box_title_3' => 'Inactive Environment List',
							'sub_box_title_3' => 'List of Inactive Environment'
						);
			$this->page_css  = array(
							'vendors/iCheck/skins/flat/green.css',
							'vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
							'vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
							'vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
							'vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
							'vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'

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
							'page/contents/manageenvironment.js'
						);
		}
        public function index() {
			$this->front_stuff();
            $this->contents = 'contents/manageenvironment/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
							'table_active' => $this->fetch_environment('active'),
							'table_inactive' => $this->fetch_environment('inactive'),
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function add (){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/manageenvironment');
			}
			
			$data = $this->input->post();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			if($this->form_validation->run() && $this->environment_model->add_environment($data) ){
				$this->session->set_flashdata('form_msg', 'Success Add New Application Name');
			}else{
				if(!$this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'Data Already Exist');
				}
			}
			redirect('/manageenvironment');
		}
		
		public function edit ($id = 0){			
			if($id == 0 && $this->input->server('REQUEST_METHOD') != 'POST')
			{
				redirect('/manageenvironment');
			}else{
				if ($this->input->server('REQUEST_METHOD') == 'POST'){
				// post data
					$data = $this->input->post();
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					$data['id'] = $id;
					if($this->form_validation->run() && $this->environment_model->edit_environment($data)){
						$this->session->set_flashdata('form_msg', 'Success Change Application Data');
						redirect('/manageenvironment');
					}else{
						if(!$this->form_validation->run()){							
							$this->session->set_flashdata('form_msg', validation_errors());
						}else{
							$this->session->set_flashdata('form_msg', 'Data You Change to Already Exist');
						}
						redirect('/manageenvironment/edit/'.$id);
					}
				}else{
					$this->front_stuff();
					$this->contents = 'contents/manageenvironment/index'; // its your view name, change for as per requirement.
					$this->data['contents'] = array(
								'form' => $this->environment_model->get_environment(array('id'=>$id))[0]
							);
					$this->layout();
				}
			}
		}
		
		private function fetch_environment($status = 'active'){
			return $this->environment_model->get_environment(array('status'=>$status));
		}
		
		public function reactivate($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'active');
				$this->environment_model->update_environment($data);				
			}
			redirect('/manageenvironment');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'inactive');
				$this->environment_model->update_environment($data);				
			}
			redirect('/manageenvironment');
		}
    }