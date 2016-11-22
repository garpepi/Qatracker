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
			$data[$key]['application_impact'] = $this->aim->get_application_impact( array('application_impact.project_id' => $value['id'],'application_impact.status' => 'active') );
			$data[$key]['tester_on_projects'] = $this->topm->get_tester_on_projects( array('project_id' => $value['id'],'tester_on_projects.status' => 'active') );
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
        $empty = $this->get_manageprojects(array('TRF' => $data['TRF'], 'projects.id !=' => $data['id'], 'projects.status' => 'active', 'TRF !=' => ''));
		if(empty($empty)){            
			$id = $data['id'];
			unset($data['id']);
			$data['user_m'] = $this->session->userdata('logged_in_data')['id'];
			$this->db->where('id', $id);
			return $this->db->update('projects', $data); 
        }else{
            return false;
        }
    }
	
	public function update_manageprojects($data = array())
    {
        $nempty = $this->get_manageprojects(array('projects.id' => $data['id']));
		if(!empty($nempty)){
			// check if status need to change to finish or not
			$check_end = 0;
			$check_doc = 0;
			$end_test_db = $nempty[0]['actual_start_date'];
			$end_doc_db = $nempty[0]['actual_start_doc_date'];
			if(isset($data['actual_end_date'])){
				if(!empty($data['actual_end_date']) && !empty($end_test_db)){
					$check_end = 1;
				}
			}
			if(isset($data['actual_start_doc_date'])){
				if(!empty($data['actual_start_doc_date']) && !empty($end_doc_db)){
					$check_doc = 1;
				}
			}
			if($check_end == 1 && $check_doc == 1){
				//$data['status'] = 'finish';
			}
			
			//end check
			$id = $data['id'];
			unset($data['id']);
			$this->db->where('id', $id);
			$this->db->update('projects', $data);
			return $this->db->affected_rows();
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