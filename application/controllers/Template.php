<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Template extends MY_Controller {
        public function index() {
			
            $this->contents = 'template'; // its your view name, change for as per requirement.
            $this->layout();
        }
    }