<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Assignsubordinate extends MY_Controller {

	  public function __construct(){
			parent::__construct();
			$this->load->model('userhirearki_model');
			$this->load->model('users_model');
			
			//
			$this->load->model('progres_model');
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Assign Leader and Subordinate',
							'box_title_1' => 'Leader List',
							'sub_box_title_1' => '',
							'box_title_2' => 'Subordinate List',
							'sub_box_title_2' => 'List of Subordinate',
							'box_title_3' => 'Add Leader or Subordinate',
							'sub_box_title_3' => ''
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
							'vendors/select2/dist/js/select2.full.min.js',
							'page/contents/assignsubordiante.js',
						);
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