<?php
class Application_impact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
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
				$empty = $this->get_application_impact(array('project_id' => $project_id,'application_id' => $application_id));
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
	
	
}