<?php
class Tester_on_projects_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_tester_on_projects($where = array())
    {    
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('tester_on_projects');
        return $query->result_array();
    }
	
	public function add_tester_on_projects($project_id , $data)
    {
		$batch_data = array();
		if(!empty($data)){
			foreach($data as $tester_id){
				$empty = $this->get_tester_on_projects(array('project_id' => $project_id,'tester_id' => $tester_id));
				if(!empty($empty)){
					return false;
				}else{
					array_push($batch_data,
									array(
										'project_id' => $project_id,
										'tester_id' => $tester_id,
										'user_c' => $this->session->userdata('logged_in_data')['id']
									)
								);
				}
			}
			$this->db->insert_batch('tester_on_projects', $batch_data);
			return true;
		}
		return false;
    }
	
	
	
}