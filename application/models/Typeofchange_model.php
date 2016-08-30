<?php
class Typeofchange_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_typeofchange($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('typeofchanges');
        return $query->result_array();
    }

    public function add_typeofchange($data = array())
    {
        $empty = $this->get_typeofchange(array('name' => $data['name']));
        if(empty($empty)){
            $this->db->insert('typeofchanges',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_typeofchange($data = array())
    {
        $empty = $this->get_typeofchange(array('name' => $data['name'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('typeofchanges', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_typeofchange($data = array())
    {
        $nempty = $this->get_typeofchange(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('typeofchanges', $data);
        }else{
            return false;
        }
    }
    
    public function remove_typeofchange($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('typeofchanges',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_typeofchange($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('typeofchanges',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}