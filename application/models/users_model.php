<?php
class Users_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {    
		$password = $password.$this->config->item('mysalt_psw');
		$this->db->select('id, email, password');
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

   
}