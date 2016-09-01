<?php
class Projects_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_manageprojects($where = array())
    {   
		$this->load->model('application_impact_model', 'aim');
		$this->load->model('tester_on_projects_model', 'topm');
		
        $this->db->select('projects.*,typeofchanges.name as TOC');
		$this->db->from('projects');
        $this->db->where($where);
		$this->db->join('typeofchanges', 'typeofchanges.id = projects.type_of_change');
        $projects_data = $this->db->get();
        $data = $projects_data->result_array();
		
		foreach($data as $key => $value){
			$data[$key]['application_impact'] = $this->aim->get_application_impact( array('application_impact.project_id' => $value['id']) );
			$data[$key]['tester_on_projects'] = $this->topm->get_tester_on_projects( array('project_id' => $value['id']) );
		}
		
		
		return $data;
    }

    public function add_manageprojects($data = array())
    {
        $empty = $this->get_manageprojects(array('TRF' => $data['TRF'], 'TRF !=' => '','projects.status' => 'active'));
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