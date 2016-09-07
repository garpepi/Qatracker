<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageApplications extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('application_model');
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Manage Application',
							'box_title_1' => 'Adding Application',
							'sub_box_title_1' => 'List of Applications',
							'box_title_2' => 'Applications List',
							'sub_box_title_2' => 'List of Applications',
							'box_title_3' => 'Inactive Applications List',
							'sub_box_title_3' => 'List of Inactive Applications'
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
							'vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'page/contents/manageapplications.js'
						);
		}
        public function index() {
			$this->front_stuff();
            $this->contents = 'contents/manageapplication/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
							'table_active' => $this->fetch_application('active'),
							'table_inactive' => $this->fetch_application('inactive'),
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function add (){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/manageapplications');
			}
			
			$data = $this->input->post();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			if($this->form_validation->run() && $this->application_model->add_application($data) ){
				$this->session->set_flashdata('form_msg', 'Success Add New Application Name');
			}else{
				if(!$this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'Data Already Exist');
				}
			}
			redirect('/manageapplications');
		}
		
		private function edit ($id = 0){			
			if($id == 0 && $this->input->server('REQUEST_METHOD') != 'POST')
			{
				redirect('/manageapplications');
			}else{
				if ($this->input->server('REQUEST_METHOD') == 'POST'){
				// post data
					$data = $this->input->post();
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					$data['id'] = $id;
					if($this->form_validation->run() && $this->application_model->edit_application($data)){
						$this->session->set_flashdata('form_msg', 'Success Change Application Data');
						redirect('/manageapplications');
					}else{
						if(!$this->form_validation->run()){							
							$this->session->set_flashdata('form_msg', validation_errors());
						}else{
							$this->session->set_flashdata('form_msg', 'Data You Change to Already Exist');
						}
						redirect('/manageapplications/edit/'.$id);
					}
				}else{
					$this->front_stuff();
					$this->contents = 'contents/manageapplication/index'; // its your view name, change for as per requirement.
					$this->data['contents'] = array(
								'form' => $this->application_model->get_application(array('id'=>$id))[0]
							);
					$this->layout();
				}
			}
		}
		
		private function fetch_application($status = 'active'){
			return $this->application_model->get_application(array('status'=>$status));
		}
		
		public function reactivate($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'active');
				$this->application_model->update_application($data);				
			}
			redirect('/manageapplications');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'inactive');
				$this->application_model->update_application($data);				
			}
			redirect('/manageapplications');
		}
    }