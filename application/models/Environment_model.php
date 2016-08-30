<?php
class Environment_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_environment($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('environment');
        return $query->result_array();
    }

    public function add_environment($data = array())
    {
        $empty = $this->get_environment(array('name' => $data['name']));
        if(empty($empty)){
            $this->db->insert('environment',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_environment($data = array())
    {
        $empty = $this->get_environment(array('name' => $data['name'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('environment', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_environment($data = array())
    {
        $nempty = $this->get_environment(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('environment', $data);
        }else{
            return false;
        }
    }
    
    public function remove_environment($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('environment',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_environment($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('environment',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}