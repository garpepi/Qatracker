<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MY_Controller extends CI_Controller 
    { 
        //set the class variable.
        public $template  = array();
        public $data      = array('content' => array()); // all things that will be pass throug to view
		public $page_css  = array();
		public $page_js  = array();
		public $usr_desc = array(); // for sidebar
		
        /*Loading the default libraries, helper, language */
        public function __construct(){
            parent::__construct();
			$this->is_login();
         //   $this->load->helper(array('form','language','url'));
          //  $this->lang->load('english');
        }
		
		public function is_login(){
			// check login or not
				// if not login
					// go to login
				// else login
			//$this->usr_desc['user_id'] = !empty($this->input->get('admin')) ? 1 : 0;
			$this->usr_desc['user_id'] = 1; //1 admin, 0 tester			
			
			// check admin or regular or guess
			if($this->is_admin($this->usr_desc['user_id'])){
				$this->data['usr_type'] = 'admin';
				$this->usr_desc['status'] = 'admin'; // for sidebar
			}else{
				$this->data['usr_type'] = NULL;
				$this->usr_desc['status'] = NULL; // for sidebar
			}
			
			// check page allowed
			if(!$this->page_access()){
				redirect('/welcome', 'refresh');
			} 
			
		}
		
		/* Check status admin*/
		protected function is_admin($user_id){
				//querry if user admin or not
				$user_status = ($user_id != 1 ? 'nonmin' : 'admin') ;
				
				if($user_status == 'admin')
				{
					return 1;
				}else{
					return 0;
				}
		}
		
		/* Page management*/
		private function page_access(){
			 $admin_list = array('manageapplications','manageenvironment','managetypeofchanges','manageprogres','managephases');
			 $tester_list = array();
			 $guess_list = array();

			 if($this->is_admin($this->usr_desc['user_id']) && in_array($this->uri->segment(1),$admin_list))
			 {
				 return 1;
			 }else{
				 return 0;
			 }
			 
			 // write to log "USER <ID> <USER> NOT ALLOW TO ENTER PAGE <PAGE>"
		}
		
        /*Front Page Layout*/
        public function layout() {
            // making template and send data to view.
			$this->data['page_css'] = $this->page_css;
			$this->data['page_js'] = $this->page_js;
            $this->template['header'] = $this->load->view('layout/header', $this->data, true);
            $this->template['sidebar'] = $this->load->view('layout/sidebar', $this->usr_desc, true);
			$this->template['top_nav'] = $this->load->view('layout/top_nav', $this->data, true);
            $this->template['contents'] = $this->load->view($this->contents, $this->data, true);
            $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
            $this->load->view('layout/wrapper', $this->template);
        }
    }