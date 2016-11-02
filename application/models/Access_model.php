<?php
class Access_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_access($where = array())
    {    
        $this->db->select('access_menu_priviledge.*, class_menu.class_name');
		$this->db->from('access_menu_priviledge');
		$this->db->join('class_menu','access_menu_priviledge.class_menu_id = class_menu.id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_class($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('class_menu');
        return $query->result_array();
    }
	
	public function update_access($users_id, $data = array())
    {
        $this->remove_access($users_id);
		return $this->db->insert_batch('access_menu_priviledge', $data);
    }
    
    public function remove_access($users_id)
    {
        $this->db->where('users_id',$users_id);
		$this->db->where('status','active');
        $this->db->update('access_menu_priviledge',array('status' => 'deleted'));
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}