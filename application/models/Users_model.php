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
		if($this->session->userdata('logged_in_data')['id'] && !empty($password) && strlen($password) > 7 ){
			$data['password'] = hash("sha256", $password.$this->config->item('mysalt_psw'));
			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}else{
			return false;
		}
	}
	
	public function update_users($data = array())
    {
		if($this->session->userdata('logged_in_data')['id']){
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
			$this->db->trans_begin();
				try{
					$this->db->insert('users',$data);
					$user_id = $this->db->insert_id();
					$this->db->insert('access_menu_priviledge', array('users_id' => $user_id, 'class_menu_id' => 1, 'status' => 'persistence'));// class home
					$this->db->insert('access_menu_priviledge', array('users_id' => $user_id, 'class_menu_id' => 13, 'status' => 'persistence'));//class manageself
					if($data['type'] == 1){
						$access_right = array(
											array('users_id' => $user_id, 'class_menu_id' => 1, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 2, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 3, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 4, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 5, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 6, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 7, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 8, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 9, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 10, 'status' => 'active'),
											array('users_id' => $user_id, 'class_menu_id' => 11, 'status' => 'active')
										);
						$this->db->insert_batch('access_menu_priviledge', $access_right);
					}elseif($data['type'] == 0){
						$access_right = array(
							array('users_id' => $user_id, 'class_menu_id' => 12, 'status' => 'active')
						);
						$this->db->insert_batch('access_menu_priviledge', $access_right);
					}elseif($data['type'] == 3){
						$access_right = array(
							array('users_id' => $user_id, 'class_menu_id' => 14, 'status' => 'active')
						);
						$this->db->insert_batch('access_menu_priviledge', $access_right);
					}
					
				}catch (Exception $e){
					$this->db->trans_rollback();
					throw new Exception ('Error on insert');
				}			
				
			if ($this->db->trans_status() === FALSE)
			{
					$this->db->trans_rollback();
					throw new Exception ('Error on insert');
			}
			else
			{
					$this->db->trans_commit();
			}
			return true; 
			
		}else{
			return false;
		}
    }
}