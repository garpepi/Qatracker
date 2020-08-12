<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Employeegate extends MY_Controller {

	  public function __construct(){
			parent::__construct();
			$this->load->model('userhirearki_model');
			$this->load->model('users_model');			
			$this->load->model('overtime_bucket_model');
      $this->load->model('leaves_bucket_model');
		}
		
		private function front_stuff(){		
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
							'page/contents/employeegate.js',
						);
		}
		public function print(){
			if (!$this->input->server('REQUEST_METHOD') == 'POST'){
				redirect('/employeegate/overtime');
			}
			$data = $this->input->post();
			$this->form_validation->set_rules('period_date', 'Period', 'required');
			
			if($this->form_validation->run()){
				$end_time = strtotime($data['period_date'].'-01');
				$end_time_final = date("Y-m-d", strtotime("+1 month", $end_time));
				$fetch = $this->overtime_bucket_model->get_overtime(array('user_id' => $this->session->userdata('logged_in_data')['id'],'acc_stat ' => 'accept','start_in >=' => $data['period_date'].'-01 00:00:00', 'start_in <=' => $end_time_final.' 23:59:59'));

				$data = array(
					'table' => $fetch,
					'period' => date('F Y'),
					'leader_name' => $this->userhirearki_model->get_user_hirearki(array('user_id' => $this->session->userdata('logged_in_data')['id']))[0]['leader_name'],
					'user_name' => $this->userhirearki_model->get_user_hirearki(array('user_id' => $this->session->userdata('logged_in_data')['id']))[0]['user_name']
					
				);
				//$this->fancy_print($this->db->last_query());
				$this->load->view('print/overtime', $data);

			}else{
				$this->session->set_flashdata('form_msg', validation_errors());
				redirect('/employeegate/overtime');
			}
			
			
		}
    public function Leaves($id = '') {
			
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$data = $this->input->post();
				
				$this->form_validation->set_rules('plan_start_date', 'Start In', 'required');
				$this->form_validation->set_rules('plan_end_date', 'End Out', 'required');
				$this->form_validation->set_rules('reason', 'Reason', 'required');
				
				if($this->form_validation->run()){
					$start_in = strtotime($data['plan_start_date']);
					$end_out = strtotime($data['plan_end_date']);
					
					if($end_out < $start_in){
						$this->session->set_flashdata('form_msg', 'End-Out Cannot less than Start-in');
						redirect('/employeegate/leaves');
					}

					if($this->leaves_bucket_model->add_leaves($this->session->userdata('logged_in_data')['id'],array('start_in' => $start_in, 'end_out' => $end_out, 'reason' => $data['reason'])))
					{
						$this->session->set_flashdata('form_msg', 'Success add Leaves');
					}else{
						$this->session->set_flashdata('form_msg', 'Error when inserting. Potentially the start in date already exist.');
					}
					redirect('/employeegate/leaves');					
					
				}else{
					$this->session->set_flashdata('form_msg', validation_errors());
					redirect('/employeegate/leaves');
				}			
			}
			
			//print_r($this->data);exit();
			$this->front_stuff();
				$this->data = array(
							'title' => 'Employee Gate',
							'box_title_1' => 'Leaves Submission',
							'sub_box_title_1' => '',
							'box_title_2' => 'Leaves Submission Queue List',
							'sub_box_title_2' => '',
							'box_title_3' => 'Leaves Submission Accept Status',
							'sub_box_title_3' => '',
							'box_title_4' => 'Leaves Submission Reject Status',
							'sub_box_title_4' => '',
							'box_title_5' => 'Print Leaves Report',
							'sub_box_title_5' => ''
						);
			
            $this->contents = 'employeegate/leaves/index'; // its your view name, change for as per requirement.
			
			// Leader id != ""
			
			$users = $this->users_model->get_users(array('emp_id !=' => '', 'status' => 'active'));
			usort($users, function($a, $b) {
				return $a['name'] <=> $b['name'];
			});

			$this->data['contents'] = array(
				'leaders' => $this->userhirearki_model->get_leader(),
				'table_queue' => $this->leaves_bucket_model->get_leaves(array('user_id' => $this->session->userdata('logged_in_data')['id'], 'acc_stat' => 'queue')),
				'table_status_acc' => $this->leaves_bucket_model->get_leaves(array('user_id' => $this->session->userdata('logged_in_data')['id'],'acc_stat ' => 'accept')),
				'table_status_rejct' => $this->leaves_bucket_model->get_leaves(array('user_id' => $this->session->userdata('logged_in_data')['id'], 'acc_stat' => 'reject')),
				'users' => $users,
			);				
			if(!empty($leader_id)){
				$this->data['contents']['table_active'] = $this->userhirearki_model->get_user_hirearki(array('uh.leader_id' => $leader_id, 'uh.status' => 'active'));
				$this->data['contents']['leader_id'] = $leader_id;
			}else{
			}
			
            $this->layout();
    }
    
    public function Overtime($id = '') {
			
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$data = $this->input->post();
				
				$this->form_validation->set_rules('plan_start_date', 'Start In', 'required');
				$this->form_validation->set_rules('plan_end_date', 'End Out', 'required');
				$this->form_validation->set_rules('reason', 'Reason', 'required');
				
				if($this->form_validation->run()){
					$start_in = strtotime($data['plan_start_date']);
					$end_out = strtotime($data['plan_end_date']);
					
					if($end_out < $start_in){
						$this->session->set_flashdata('form_msg', 'End-Out Cannot less than Start-in');
						redirect('/employeegate/overtime');
					}

					if($this->overtime_bucket_model->add_overtime($this->session->userdata('logged_in_data')['id'],array('start_in' => $start_in, 'end_out' => $end_out, 'reason' => $data['reason'])))
					{
						$this->session->set_flashdata('form_msg', 'Success Overtime');
					}else{
						$this->session->set_flashdata('form_msg', 'Error when inserting. Potentially the start in date already exist.');
					}
					redirect('/employeegate/overtime');					
					
				}else{
					$this->session->set_flashdata('form_msg', validation_errors());
					redirect('/employeegate/overtime');
				}			
			}
			
			//print_r($this->data);exit();
			$this->front_stuff();
				$this->data = array(
							'title' => 'Employee Gate',
							'box_title_1' => 'Overtime Submission',
							'sub_box_title_1' => '',
							'box_title_2' => 'Overtime Submission Queue List',
							'sub_box_title_2' => '',
							'box_title_3' => 'Overtime Submission Accept Status',
							'sub_box_title_3' => '',
							'box_title_4' => 'Overtime Submission Reject Status',
							'sub_box_title_4' => '',
							'box_title_5' => 'Print Overtime Report',
							'sub_box_title_5' => ''
						);
			
            $this->contents = 'employeegate/overtime/index'; // its your view name, change for as per requirement.
			
			// Leader id != ""
			
			$users = $this->users_model->get_users(array('emp_id !=' => '', 'status' => 'active'));
			usort($users, function($a, $b) {
				return $a['name'] <=> $b['name'];
			});
			//$this->overtime_bucket_model->get_overtime(array('user_id' => $this->session->userdata('logged_in_data')['id'], 'acc_stat = \'reject\' or acc_stat =' => 'accept'));
			//$this->fancy_print($this->db->last_query());
			$this->data['contents'] = array(
				'leaders' => $this->userhirearki_model->get_leader(),
				'table_queue' => $this->overtime_bucket_model->get_overtime(array('user_id' => $this->session->userdata('logged_in_data')['id'], 'acc_stat' => 'queue')),
				'table_status_acc' => $this->overtime_bucket_model->get_overtime(array('user_id' => $this->session->userdata('logged_in_data')['id'],'acc_stat ' => 'accept')),
				'table_status_rejct' => $this->overtime_bucket_model->get_overtime(array('user_id' => $this->session->userdata('logged_in_data')['id'], 'acc_stat' => 'reject')),
				'users' => $users,
			);				
			if(!empty($leader_id)){
				$this->data['contents']['table_active'] = $this->userhirearki_model->get_user_hirearki(array('uh.leader_id' => $leader_id, 'uh.status' => 'active'));
				$this->data['contents']['leader_id'] = $leader_id;
			}else{
			}
			
            $this->layout();
    }
		
		public function index($leader_id = '') {
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				redirect('/assignsubordinate/index/'.$this->input->post('leader'));
			}
			
			$this->front_stuff();
            $this->contents = 'userhirearki/index'; // its your view name, change for as per requirement.
			
			// Leader id != ""
			
			$users = $this->users_model->get_users(array('emp_id !=' => '', 'status' => 'active'));
			usort($users, function($a, $b) {
				return $a['name'] <=> $b['name'];
			});
			$this->data['contents'] = array(
				'leaders' => $this->userhirearki_model->get_leader(),
				'table_active' => array(),
				'users' => $users,
			);				
			if(!empty($leader_id)){
				$this->data['contents']['table_active'] = $this->userhirearki_model->get_user_hirearki(array('uh.leader_id' => $leader_id, 'uh.status' => 'active'));
				$this->data['contents']['leader_id'] = $leader_id;
			}else{
			}
			
            $this->layout();
        }
		
		public function add (){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/assignsubordinate');
			}
			
			$data = $this->input->post();
			$this->form_validation->set_rules('leader', 'Leader', 'required');
			$this->form_validation->set_rules('users[]', 'Subordinate', 'required');
			//print_r($data);exit();
			
			if($this->form_validation->run() && $this->userhirearki_model->add_hirarki($data['leader'],$data['users'])){
				$this->session->set_flashdata('form_msg', 'Success Add Leader and Subordiantes');
			}else{
				if(!$this->form_validation->run()){
					$this->session->set_flashdata('form_msg', validation_errors());
				}else{
					$this->session->set_flashdata('form_msg', 'Data Already Exist');
				}
			}
			redirect('/assignsubordinate');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$this->userhirearki_model->remove_access($id);				
			}
			redirect('/assignsubordinate');
		}
    }