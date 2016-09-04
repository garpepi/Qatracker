<?php
class Tester_on_projects_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_tester_on_projects($where = array())
    {    
		$this->db->select('tester_on_projects.*,users.name as name');
		$this->db->from('tester_on_projects');
        $this->db->where($where);
		$this->db->join('users', 'users.id = tester_on_projects.tester_id');
        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function add_tester_on_projects($project_id , $data)
    {
		$batch_data = array();
		if(!empty($data)){
			foreach($data as $tester_id){
				$empty = $this->get_tester_on_projects(array('project_id' => $project_id,'tester_id' => $tester_id,'tester_on_projects.status' => 'active'));
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
	
	public function edit_tester_on_projects($project_id , $data)
    {
		$batch_data = array();
		$now_data = array();
		$fetch_now_data = $this->get_tester_on_projects(array('project_id' => $project_id,'tester_on_projects.status' => 'active'));
		
		foreach($fetch_now_data as $tmp_now_data){
			array_push($now_data, $tmp_now_data['tester_id']);
		}
		
		if(($now_data != $data) && !empty($data)){
			$this->update_tester_on_projects($project_id);
			$this->add_tester_on_projects($project_id, $data);
			return true;
		}
		return false;
    }
	
	public function update_tester_on_projects($project_id)
    {
        $nempty = $this->get_tester_on_projects(array('project_id' => $project_id,'tester_on_projects.status' => 'active'));
		if(!empty($nempty)){
			$data = array(
				'status' => 'inactive',
				'user_m' => $this->session->userdata('logged_in_data')['id']
				);
			$this->db->where('tester_on_projects.project_id', $project_id);
			$this->db->update('tester_on_projects', $data);
			return true;
        }else{
            return false;
        }
    }
	
	
	
}