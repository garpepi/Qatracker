<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Adduser extends MY_Controller {
        public function index() {
			$this->data = array(
							'title' => 'Add User',
							'box_title_1' => 'User Data',
							'sub_box_title_1' => 'Information about user',
							'position' => 'create'
						);
			$this->page_css  = array(
							'vendors/iCheck/skins/flat/green.css',
						);
			$this->page_js  = array(
							'vendors/iCheck/icheck.min.js',
						);
            $this->contents = 'user/info'; // its your view name, change for as per requirement.
            $this->layout();
        }
    }