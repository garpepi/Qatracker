<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class ManageUser extends MY_Controller {
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
		
		public function resetpassword($param){
				try {
				//$this->fancy_print($this->session->userdata('logged_in_data'));
					$this->load->helper('string');
					$passwordgen=random_string('alnum', 16);
					  if(!$this->users_model->reset_password($param,  $passwordgen) ) {
						throw new Exception('Error on change password');
					  }
				} catch (Exception $e) {
				  //alert the user.
				  var_dump($e->getMessage());exit();
				}
			
			$data['password'] = $passwordgen;
			$data['name'] = $this->users_model->get_users(array('id' => $param))[0]['name'];
			$data['email'] = $this->users_model->get_users(array('id' => $param))[0]['email'];
			$this->session->set_flashdata($data);
			redirect('/resetpassword');
		}
		
		public function userlist(){
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
							'page/user/manageuser.js'
						);
            $this->contents = 'user/list';
			
			// Form Data
			$this->data['contents'] = array(
							'table_active' => $this->users_model->get_users(array('status' => 'active')),
							'table_dissable' => $this->users_model->get_users(array('status' => 'inactive')),
							);
			
            $this->layout();
		}
		
		public function reactivate($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'active');
				$this->users_model->update_users($data);				
			}
			$this->session->set_flashdata('form_msg', 'Success Activate user!');
			redirect('/manageuser/userlist');
		}
		
		public function revoke($id = 0){
			if($id != 0){
				$data = array('id' => $id, 'status' => 'inactive');
				$this->users_model->update_users($data);				
			}
			$this->session->set_flashdata('form_msg', 'Success Disable User!');
			redirect('/manageuser/userlist');
		}
				
    }