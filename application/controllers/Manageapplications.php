<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageApplications extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('application_model');
		}
        public function index() {
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
							'vendors/datatables.net-scroller/js/datatables.scroller.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'page/contents/manageapplications.js'
						);
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
			
			
			
			if($this->application_model->add_application($data) && $this->form_validation->run()){
				$this->session->set_flashdata('form_msg', 'Success Add New Application Name');
			}else{
				if($this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'Data Already Exist');
				}
			}
			redirect('/manageapplications');
		}
		
		public function edit ($id = 0){			
			/*
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				// post data
				
			}else if($this->input->server('REQUEST_METHOD') == 'GET' ){
				// get data
				$this->edit($this->input->get('id'));
			}else{
				// normal condition with data
				if($id == 0)
				{
					redirect('/manageapplications');
				}else{
					$this->data['contents'] = array(
								'form' => $this->get_application(array('id'=>$id))
							);
					$this->index();					
				}
			}
			*/
			if($id == 0)
			{
				redirect('/manageapplications');
			}else{
				$this->data['contents'] = array(
							'form' => $this->application_model->get_application(array('id'=>$id))
						);
				$this->index();					
			}
		}
		
		private function fetch_application($status = 'active'){
			return $this->application_model->get_application(array('status'=>$status));
		}
    }