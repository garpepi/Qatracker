<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageTeamLeads extends MY_Controller {		
	  public function __construct(){
			parent::__construct();
			$this->load->model('teamleads_model');
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Manage Team Leaders',
							'box_title_1' => 'Adding Team Leader',
							'sub_box_title_1' => 'List of Team Leaders',
							'box_title_2' => 'Team Leaders List',
							'sub_box_title_2' => 'List of Team Leaders',
							'box_title_3' => 'Inactive Team Leaders List',
							'sub_box_title_3' => 'List of Inactive Team Leader'
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
							'page/contents/manageteamleads.js'
						);
		}
        public function index() {
			$this->front_stuff();
            $this->contents = 'contents/manageteamleads/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
							'table_active' => $this->fetch_teamleads('active'),
							'table_inactive' => $this->fetch_teamleads('inactive'),
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function add (){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/manageteamleads');
			}
			
			$data = $this->input->post();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[team_leads.email]');
			$this->form_validation->set_rules('phone', 'Phone', 'numeric|is_unique[team_leads.phone]');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			if($this->form_validation->run() && $this->teamleads_model->add_teamleads($data) ){
				$this->session->set_flashdata('form_msg', 'Success Add New Team Lead Data');
			}else{
				if(!$this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'Data Already Exist');
				}
			}
			redirect('/manageteamleads');
		}
		
		public function edit ($id = 0){			
			if($id == 0 && $this->input->server('REQUEST_METHOD') != 'POST')
			{
				redirect('/manageteamleads');
			}else{
				if ($this->input->server('REQUEST_METHOD') == 'POST'){
				// post data
					$data = $this->input->post();
					$original_value = $this->teamleads_model->get_teamleads(array('id' => $id))[0];
					if($data['email'] != $original_value['email']) {
					   $is_unique =  '|is_unique[team_leads.email]';
					} else {
					   $is_unique =  '';
					}
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email'.$is_unique );
					$this->form_validation->set_rules('phone', 'Phone', 'numeric|is_unique[team_leads.phone]');
					$this->form_validation->set_rules('status', 'Status', 'required');
					$data['id'] = $id;
					if($this->form_validation->run() && $this->teamleads_model->edit_teamleads($data)){
						$this->session->set_flashdata('form_msg', 'Success Change Team Lead Data');
						redirect('/manageteamleads');
					}else{
						if(!$this->form_validation->run()){							
							$this->session->set_flashdata('form_msg', validation_errors());
						}else{
							$this->session->set_flashdata('form_msg', 'Data You Change to Already Exist');
						}
						redirect('/manageteamleads/edit/'.$id);
					}
				}else{
					$this->front_stuff();
					$this->contents = 'contents/manageteamleads/index'; // its your view name, change for as per requirement.
					$this->data['contents'] = array(
								'form' => $this->teamleads_model->get_teamleads(array('id'=>$id))[0]
							);
					$this->layout();
				}
			}
		}
		
		private function fetch_teamleads($status = 'active'){
			return $this->teamleads_model->get_teamleads(array('status'=>$status));
		}
		
		public function reactivate($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'active');
				$this->teamleads_model->update_teamleads($data);				
			}
			redirect('/manageteamleads');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'inactive');
				$this->teamleads_model->update_teamleads($data);				
			}
			redirect('/manageteamleads');
		}
    }