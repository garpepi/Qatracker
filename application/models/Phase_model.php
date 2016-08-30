<?php
class Phase_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_phase($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('phases');
        return $query->result_array();
    }

    public function add_phase($data = array())
    {
        $empty = $this->get_phase(array('name' => $data['name']));
        if(empty($empty)){
            $this->db->insert('phases',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_phase($data = array())
    {
        $empty = $this->get_phase(array('name' => $data['name'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('phases', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_phase($data = array())
    {
        $nempty = $this->get_phase(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('phases', $data);
        }else{
            return false;
        }
    }
    
    public function remove_phase($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('phases',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_phase($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('phases',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}