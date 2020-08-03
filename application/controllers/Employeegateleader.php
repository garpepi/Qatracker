<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Employeegateleader extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('users_model');	
			$this->load->model('employeegateleader_model');	
			$this->load->model('api_model');	
			$this->load->model('overtime_bucket_model');				
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Employee Leader Gate',
							'box_title_1' => 'Overtime Queue',
							'sub_box_title_1' => 'User Active',
							'box_title_2' => 'Overtime Queue',
							'sub_box_title_2' => 'List of Overtime Queue',
							'box_title_3' => 'Overtime Approval',
							'sub_box_title_3' => 'List of Overtime Approval'
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
							'page/user/info.js'
						);
		}
		
		public function index(){
			$this->front_stuff();
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
							'page/contents/employeegateleader.js'
						);
            $this->contents = 'employeegateleader/index';
			$this->employeegateleader_model->get_subordinate(array('uh.leader_id' => $this->session->userdata('logged_in_data')['id'],'ov.acc_stat' => 'queue'));

			// Form Data
			$this->data['contents'] = array(
							'table_queue' => $this->employeegateleader_model->get_subordinate(array('uh.leader_id' => $this->session->userdata('logged_in_data')['id'],'ov.acc_stat' => 'queue')),
							'table_status' => $this->employeegateleader_model->get_subordinate(array('uh.leader_id' => $this->session->userdata('logged_in_data')['id'],'ov.acc_stat = \'accept\' or ov.acc_stat = ' => 'reject')),
							);
			
            $this->layout();
		}
			
		public function accept($id = 0){
			// check subordinates
			$data = $this->employeegateleader_model->get_subordinate(array('ov.id' => $id,'ov.acc_stat' => 'queue'))[0];
			if(empty($data) && $data['leader_id'] != $this->session->userdata('logged_in_data')['id']){
				redirect('/home');
			}
			
			if($id != 0){
				$check = $this->employeegateleader_model->approval_overtime($id,$data['leader_id'],true);
				//$check = true;
				if(!empty($check)){
					$struk_dat = array(
						'no' => 0,
						'date' => date('Y-m-d',strtotime($data['start_in'])),
						'emp_id' => $data['subemp_id'],
						'name' => $data['subname'],
						'reason' => $data['reason'],
						'start_in' => $data['start_in'],
						'end_out' => $data['end_out'],
						'user_c' => $data['leader_empid'],
						'upload_status' => 'queue',
						'desc_status' => 'Approved by '.$data['leader_name']
					);
					$api = $this->api_model->post_raw_overtime($struk_dat);
					//$this->fancy_print($api);
				}
			}
			$overtime_data = $this->session->set_flashdata('form_msg', 'Success Approve Overtime Submission!');
			redirect('/employeegateleader');
		}
		
		public function reject($id = 0){
			// check subordinates
			$data = $this->employeegateleader_model->get_subordinate(array('ov.id' => $id,'ov.acc_stat' => 'queue'))[0];
			if(empty($data) && $data['leader_id'] != $this->session->userdata('logged_in_data')['id']){
				redirect('/home');
			}

			if($id != 0){
				//$data = array('id' => $id, 'status' => 'active');
				$this->employeegateleader_model->approval_overtime($id,$data['leader_id'],false);				
			}
			$this->session->set_flashdata('form_msg', 'Success Reject Overtime Submission!');
			redirect('/employeegateleader');
		}
		
				
    }