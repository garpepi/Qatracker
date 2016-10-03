<?php
class Application_impact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    }

    public function get_application_impact($where = array())
    {    
        $this->db->select('application_impact.*,application.name as name');
		$this->db->from('application_impact');
        $this->db->where($where);
		$this->db->join('application', 'application.id = application_impact.application_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_application_impact($project_id , $data)
    {
		$batch_data = array();
		if(!empty($data)){
			foreach($data as $application_id){
				$empty = $this->get_application_impact(array('project_id' => $project_id,'application_id' => $application_id,'application_impact.status' => 'active'));
				if(!empty($empty)){
					return false;
				}else{
					array_push($batch_data,
									array(
										'project_id' => $project_id,
										'application_id' => $application_id,
										'user_c' => $this->session->userdata('logged_in_data')['id']
									)
								);
				}
			}
			$this->db->insert_batch('application_impact', $batch_data);
			return true;
		}
		return false;
    }
	
	public function edit_application_impact($project_id , $data, $status)
    {
		if($status != 'active'){
			$this->db->where('application_impact.project_id', $project_id);
			$this->db->where('application_impact.status', 'active');
			return $this->db->update('application_impact', array('status' => $status));
		}else{
			$now_data = array();
			$fetch_now_data = $this->get_application_impact(array('project_id' => $project_id,'application_impact.status' => 'active'));
			
			foreach($fetch_now_data as $tmp_now_data){
				array_push($now_data, $tmp_now_data['application_id']);
			}
			
			if(($now_data != $data) && !empty($data)){
				$this->update_application_impact($project_id);
				$this->add_application_impact($project_id, $data);				
			}
			return true;
		}
		return false;			
    }
	
	public function update_application_impact($project_id)
    {
        $nempty = $this->get_application_impact(array('project_id' => $project_id,'application_impact.status' => 'active'));
		if(!empty($nempty)){
			$data = array(
				'status' => 'changed',
				'user_m' => $this->session->userdata('logged_in_data')['id']
				);
			$this->db->where('application_impact.project_id', $project_id);
			$this->db->update('application_impact', $data);
			return true;
        }else{
            return false;
        }
    }
	
	
}