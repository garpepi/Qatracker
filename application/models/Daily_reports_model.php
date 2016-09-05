<?php
class Daily_reports_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_reports($where = array())
    {   

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