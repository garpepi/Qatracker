<?php
class Userhirearki_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	public function get_user_hirearki($where = array())
    {    
        $this->db->select('uh.*,u.name as user_name,l.name as leader_name');
		$this->db->from('user_hirearki uh');
		$this->db->join('users u', 'u.id = uh.user_id');
		$this->db->join('users l', 'l.id = uh.leader_id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_leader($where = array())
    {   
        $this->db->select('DISTINCT(uh.leader_id), l.name');
		$this->db->from('user_hirearki uh');
		$this->db->join('users l', 'l.id = uh.leader_id');
        $this->db->where($where);
        $query = $this->db->get('user_hirearki');
        return $query->result_array();
    }
	
	public function add_hirarki($leader_id, $users = array())
    {
        // construct access menu priviledge
		$data = array();
		foreach($users as $user){
			$check = $this->get_user_hirearki(array('uh.leader_id' => $leader_id, 'uh.user_id' => $user));
			if(empty($check)){
				$datainsert[] = array(
					'leader_id' => $leader_id, 
					'user_id' => $user,
				);				
			}else{
				//print_r($check);exit();
				$dataupdate[] = array(
					'id' => $check[0]['id'],
					'status' => 'active'
				);
			}
		}
		if(!empty($dataupdate)){
			$this->db->update_batch('user_hirearki', $dataupdate, 'id');
		}
		if(!empty($datainsert)){
			$this->db->insert_batch('user_hirearki', $datainsert, 'id');
		}
		return 1;
    }
    
    public function remove_access($id)
    {
        $this->db->where('id',$id);
		$this->db->where('status','active');
        $this->db->update('user_hirearki',array('status' => 'inactive'));
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}