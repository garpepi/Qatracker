<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MY_Controller extends CI_Controller 
    { 
        //set the class variable.
        public $template  = array();
        public $data      = array();
		public $page_css  = array();
		public $page_js  = array();
		
        /*Loading the default libraries, helper, language */
        public function __construct(){
            parent::__construct();
         //   $this->load->helper(array('form','language','url'));
          //  $this->lang->load('english');
        }
		
		public function is_login(){
			$this->data['usr_type'] = !empty($this->input->get('admin')) ? $this->input->get('admin') : NULL;
			
		}
		
        /*Front Page Layout*/
        public function layout() {
            // making template and send data to view.
			$this->is_login();
			$this->data['page_css'] = $this->page_css;
			$this->data['page_js'] = $this->page_js;
            $this->template['header'] = $this->load->view('layout/header', $this->data, true);
            $this->template['sidebar'] = $this->load->view('layout/sidebar', $this->data, true);
			$this->template['top_nav'] = $this->load->view('layout/top_nav', $this->data, true);
            $this->template['contents'] = $this->load->view($this->contents, $this->data, true);
            $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
            $this->load->view('layout/wrapper', $this->template);
        }
    }