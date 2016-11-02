<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Manageself extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('users_model');			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Manage User',
							'box_title_1' => 'User Profiles',
							'sub_box_title_1' => 'User Active',
							'box_title_2' => 'Active Users List',
							'sub_box_title_2' => 'List of Disabled users',
							'box_title_3' => 'Disabled Users List',
							'sub_box_title_3' => 'List of Disabled users'
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
		
        public function index() {
			$this->front_stuff();
            $this->contents = 'user/info'; // its your view name, change for as per requirement.
			
			
			// Form Data
			$this->data['contents'] = array(
							'users' => $this->users_model->get_users(array('id' => $this->usr_desc['user_id']))
							);
			
            $this->layout();
        }
		public function changepas(){
			if ($this->input->server('REQUEST_METHOD') != 'POST'){
				redirect('/login');
				exit();
			}
			
			$this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');			
			if ($this->form_validation->run() == FALSE)
			{
					$this->session->set_flashdata('form_msg', validation_errors());
			}
			else
			{
				try { 
					  if(!$this->users_model->change_password($this->session->userdata('logged_in_data')['id'],  $this->input->post('password'))) {
						throw new Exception('Error on change password');
					  }
				} catch (Exception $e) {
				  //alert the user.
				  var_dump($e->getMessage());exit();
				}
				$this->session->set_flashdata('form_msg', 'Success Change Password!');
			}
			redirect('/manageself');
			
		}				
    }