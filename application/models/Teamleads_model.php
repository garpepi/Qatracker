<?php
class Teamleads_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_teamleads($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('team_leads');
        return $query->result_array();
    }

    public function add_teamleads($data = array())
    {
        if(isset($data['phone'])){
			$empty = $this->get_teamleads(array('email' => $data['email'], 'phone'=>$data['phone']));
		}else{
			$empty = $this->get_teamleads(array('email' => $data['email']));
		}
        if(empty($empty)){
            $this->db->insert('team_leads',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_teamleads($data = array())
    {
		if(isset($data['phone'])){
			$empty = $this->get_teamleads(array('email' => $data['email'], 'phone'=>$data['phone'],'id !=' => $data['id']));
		}else{
			$empty = $this->get_teamleads(array('email' => $data['email'], 'id !=' => $data['id']));
		}
        
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('team_leads', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_teamleads($data = array())
    {
        $nempty = $this->get_teamleads(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('team_leads', $data);
        }else{
            return false;
        }
    }
    
    public function remove_teamleads($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('team_leads',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_teamleads($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('team_leads',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}