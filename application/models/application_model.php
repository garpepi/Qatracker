<?php
class Application_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_application($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('application');
        return $query->result_array();
    }

    public function add_application($data = array())
    {
        $empty = $this->get_application(array('name' => $data['name']));
        if(empty($empty)){
            $this->db->insert('application',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_application($data = array())
    {
        $empty = $this->get_application(array('name' => $data['name'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('application', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_application($data = array())
    {
        $nempty = $this->get_application(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('application', $data);
        }else{
            return false;
        }
    }
    
    public function remove_application($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('application',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_application($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('application',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}