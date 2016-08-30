<?php
class Progres_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_progres($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('master_progres');
        return $query->result_array();
    }

    public function add_progres($data = array())
    {
        $empty = $this->get_progres(array('name' => $data['name']));
        if(empty($empty)){
            $this->db->insert('master_progres',$data);
            if( $this->db->affected_rows() > 0)
            {
                return $this->db->insert_id();
            }
        }else{
            return false;
        }
    }
	
	public function edit_progres($data = array())
    {
        $empty = $this->get_progres(array('name' => $data['name'], 'id !=' => $data['id']));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('master_progres', $data); 
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }
	
	public function update_progres($data = array())
    {
        $nempty = $this->get_progres(array('id' => $data['id']));
		if(!empty($nempty)){
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('master_progres', $data);
        }else{
            return false;
        }
    }
    
    public function remove_progres($id)
    {
        $data['status'] = 'inactive';
        $this->db->where('id',$id);
        $this->db->update('master_progres',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }

    public function reactivate_progres($id)
    {
        $data['status'] = 'active';
        $this->db->where('id',$id);
        $this->db->update('master_progres',$data);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return ;
    }
}