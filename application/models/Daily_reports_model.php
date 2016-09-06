<?php
class Daily_reports_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_reports($where = array())
    {   
		$this->load->model('projects_model', 'pm');
		
		$this->db->select('daily_reports.*,environment.name as environment, team_leads.name as team_lead, master_progres.name as progress, phases.name as phase');
		$this->db->from('daily_reports');
        $this->db->where($where);
		$this->db->join('environment', 'environment.id = daily_reports.environment_id');
		$this->db->join('team_leads', 'team_leads.id = daily_reports.team_lead_id');
		$this->db->join('master_progres', 'master_progres.id = daily_reports.progress_id');
		$this->db->join('phases', 'phases.id = daily_reports.phase_id');
        $projects_data = $this->db->get();
        $data = $projects_data->result_array();
		
		foreach($data as $key => $value){
			$data[$key]['project'] = $this->pm->get_manageprojects( array('projects.id' => $value['project_id']) )[0];
		}
		
		return $data;
    }	

    public function add_reports($data = array())
    {
		$data['user_c'] = $this->session->userdata('logged_in_data')['id'];
		$this->db->insert('daily_reports',$data);
		
		return $this->db->affected_rows();
	
    }
	
	public function edit_reports($data = array())
    {
       
    }
	
	public function update_reports($data = array())
    {
       
    }
    
    public function remove_reports($id)
    {
        
    }

    public function reactivate_reports($id)
    {
        
    }
}