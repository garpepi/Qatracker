<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Resetpassword extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('users_model');			
		}
		
        public function index() {

			$this->load->view('resetpassword/index');
        }

				
    }