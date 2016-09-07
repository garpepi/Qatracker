<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageTypeOfChanges extends MY_Controller {

	  public function __construct(){
			parent::__construct();
			$this->load->model('typeofchange_model');
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Type Of Changes',
							'box_title_1' => 'Adding Type Of Change',
							'sub_box_title_1' => 'List Type Of Change',
							'box_title_2' => 'Type Of Changes List',
							'sub_box_title_2' => 'List of Type Of Changes',
							'box_title_3' => 'Inactive Type Of Changes List',
							'sub_box_title_3' => 'List of Inactive Type Of Changes'
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
							'page/contents/managetypeofchanges.js'
						);
		}
        public function index() {
			$this->front_stuff();
            $this->contents = 'contents/managetypeofchanges/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
							'table_active' => $this->fetch_typeofchange('active'),
							'table_inactive' => $this->fetch_typeofchange('inactive'),
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function add (){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/managetypeofchanges');
			}
			
			$data = $this->input->post();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			if($this->form_validation->run() && $this->typeofchange_model->add_typeofchange($data) ){
				$this->session->set_flashdata('form_msg', 'Success Add New Application Name');
			}else{
				if(!$this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'Data Already Exist');
				}
			}
			redirect('/managetypeofchanges');
		}
		
		public function edit ($id = 0){			
			if($id == 0 && $this->input->server('REQUEST_METHOD') != 'POST')
			{
				redirect('/managetypeofchanges');
			}else{
				if ($this->input->server('REQUEST_METHOD') == 'POST'){
				// post data
					$data = $this->input->post();
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					$data['id'] = $id;
					if($this->form_validation->run() && $this->typeofchange_model->edit_typeofchange($data)){
						$this->session->set_flashdata('form_msg', 'Success Change Application Data');
						redirect('/managetypeofchanges');
					}else{
						if(!$this->form_validation->run()){							
							$this->session->set_flashdata('form_msg', validation_errors());
						}else{
							$this->session->set_flashdata('form_msg', 'Data You Change to Already Exist');
						}
						redirect('/managetypeofchanges/edit/'.$id);
					}
				}else{
					$this->front_stuff();
					$this->contents = 'contents/managetypeofchanges/index'; // its your view name, change for as per requirement.
					$this->data['contents'] = array(
								'form' => $this->typeofchange_model->get_typeofchange(array('id'=>$id))[0]
							);
					$this->layout();
				}
			}
		}
		
		private function fetch_typeofchange($status = 'active'){
			return $this->typeofchange_model->get_typeofchange(array('status'=>$status));
		}
		
		public function reactivate($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'active');
				$this->typeofchange_model->update_typeofchange($data);				
			}
			redirect('/managetypeofchanges');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'inactive');
				$this->typeofchange_model->update_typeofchange($data);				
			}
			redirect('/managetypeofchanges');
		}
		
		
    }