<?php
class Projects_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_manageprojects($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('projects');
        return $query->result_array();
    }

    public function add_manageprojects($data = array())
    {
        $empty = $this->get_manageprojects(array('TRF' => $data['TRF'], 'TRF !=' => ''));
        if(empty($empty)){
			$data['user_c'] = $this->session->userdata('logged_in_data')['id'];
            $this->db->insert('projects',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_manageprojects($data = array())
    {
        $empty = $this->get_manageprojects(array('name' => $data['name'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('projects', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_manageprojects($data = array())
    {
        $nempty = $this->get_manageprojects(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('projects', $data);
        }else{
            return false;
        }
    }
    
    public function remove_manageprojects($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('projects',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_manageprojects($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('projects',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}