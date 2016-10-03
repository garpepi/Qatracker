<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('session');
		
	}
	public function index()
	{
		if($this->session->userdata('logged_in_data'))
		{
			redirect('/home', 'refresh');
		}
		print_r($this->session->userdata('logged_in'));
		$this->load->view('login/login');
	}
	
	public function logged_in()
	{
		if ($this->input->server('REQUEST_METHOD') != 'POST'){
			redirect('/login');
		}
		
		$data = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() && $this->users_model->login($data['email'],$data['password']) )
		{
			$query = $this->users_model->login($data['email'],$data['password']);

			$sess_array = array(
			 'id' => $query[0]->id,
			 'name' => $query[0]->name
			);
			$this->session->set_userdata('logged_in_data', $sess_array);
			redirect('/home');
		}else{
			if(!$this->form_validation->run()){
				$this->session->set_flashdata('logedin_msg', validation_errors());	
			}else{
				print_r($data);
				print_r($this->users_model->login($data['email'],$data['password']));
				$this->session->set_flashdata('logedin_msg', 'Your failed to logged in');				
			}
			redirect('/login');
		}
	}
	
	public function getpswd(){
		$pass = 'password'.$this->config->item('mysalt_psw');
		echo hash("sha256", $pass);
	}
}
