<?php
class Users_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {    
		$password = $password.$this->config->item('mysalt_psw');
		$this->db->select('id, email, password, name');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', hash("sha256", $password));
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
    }
	
	public function get_users($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('users');
        return $query->result_array();
    }

	public function change_password($id, $password){
		if($id == $this->session->userdata('logged_in_data')['id'] && !empty($password) && strlen($password) > 7 ){
			$data['password'] = hash("sha256", $password.$this->config->item('mysalt_psw'));
			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}else{
			return false;
		}
	}
	public function reset_password($id, $password){
		if($this->session->userdata('logged_in_data')['id'] && $this->get_users(array('id' => $this->session->userdata('logged_in_data')['id'] ))[0]['type'] == 1 && !empty($password) && strlen($password) > 7 ){
			$data['password'] = hash("sha256", $password.$this->config->item('mysalt_psw'));
			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}else{
			return false;
		}
	}
	
	public function update_users($data = array())
    {
		if($this->session->userdata('logged_in_data')['id'] && $this->get_users(array('id' => $this->session->userdata('logged_in_data')['id'] ))[0]['type'] == 1){
			$id = $data['id'];
			unset($data['id']);
			
			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}else{
			return false;
		}
    }
	
	public function update_users_api($emp_id,$data = array())
    {	
		$this->db->where('emp_id',$emp_id);
		return $this->db->update('users',$data);
		
    }
	
	public function insert_users($data = array())
    {
		if(!empty($data)){
			$this->db->insert('users',$data);
		}else{
			return false;
		}
		return true;
    }
}