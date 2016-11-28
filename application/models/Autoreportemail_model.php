<?php
class Autoreportemail_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_milist($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('autoreport_email');
        return $query->result_array();
    }

    public function add_milist($data = array())
    {
        $empty = $this->get_milist(array('email' => $data['email']));
        if(empty($empty)){
			$data['user_c'] = $this->session->userdata('logged_in_data')['id'];
            $this->db->insert('autoreport_email',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_milist($data = array())
    {
        $empty = $this->get_milist(array('email' => $data['email'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('autoreport_email', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_milist($data = array())
    {
        $nempty = $this->get_milist(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('autoreport_email', $data);
        }else{
            return false;
        }
    }
    
    public function remove_milist($id)
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

    public function reactivate_milist($id)
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