<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Accesspriv extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('application_model');
			$this->load->model('access_model');
			$this->load->model('users_model');
			
		}
		
		private function front_stuff(){
			$this->data = array(
							'title' => 'Access Priviledge',
							'box_title_1' => 'Access Priviledge',
							'sub_box_title_1' => 'List of Access Priviledge',
							'box_title_2' => 'Access Priviledge List',
							'sub_box_title_2' => 'List of Access Priviledge',
							'box_title_3' => 'Inactive Applications List',
							'sub_box_title_3' => 'List of Inactive Applications'
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
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'vendors/select2/dist/js/select2.full.min.js',
							'page/contents/accesspriv.js'
						);
		}
        public function index() {
			$this->front_stuff();
            $this->contents = 'accesspriv/index'; // its your view name, change for as per requirement.
			
			// Table Active
			$this->data['contents'] = array(
							'table_active' => $this->users_model->get_users(array('status' => 'active'))
							);
			// Table Incactive
			
            $this->layout();
        }
		
		public function edit ($id = 0){			
			if($id == 0 && $this->input->server('REQUEST_METHOD') != 'POST')
			{
				redirect('/accesspriv');
			}else{
				if ($this->input->server('REQUEST_METHOD') == 'POST'){
				// post data
					$data_post = $this->input->post();
					if(empty($data_post)){
						$data = array();
					}else{
						foreach($data_post['class_menu'] as $class_id){
							$data[] = array(
									'users_id' => $id,
									'class_menu_id' => $class_id
								);
						}
					}
					if($this->access_model->update_access($id,$data)){
						$this->session->set_flashdata('form_msg', 'Success Change Access Priviledge');
						redirect('/accesspriv');
					}else{
						$this->session->set_flashdata('form_msg', 'Data You Change to failed');
						redirect('/accesspriv/edit/'.$id);
					}
				}else{
					$this->front_stuff();
					$this->contents = 'accesspriv/index'; // its your view name, change for as per requirement.
					$this->data['contents'] = array(
								'form' => $this->users_model->get_users(array('id' => $id,'status' => 'active'))[0],
								'user_access' => $this->access_model->get_access(array('users_id' => $id, 'status !=' => 'deleted')),
								'class_access' => $this->access_model->get_class()
							);
					$this->layout();
				}
			}
		}
    }