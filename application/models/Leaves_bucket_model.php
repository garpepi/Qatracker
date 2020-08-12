<?php
class Leaves_bucket_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	
	public function get_leaves($where = array(),$or = array())
    {   
        $this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get('bucket_leaves');
        return $query->result_array();
    }
	
	public function add_leaves($user_id, $data = array())
    {
        // construct access menu priviledge
		$check = $this->get_leaves(array('user_id' => $user_id, '(acc_stat = \'queue\' or acc_stat = \'accept\') = ' => 1, 'start_in >=' => date('Y-m-d',$data['start_in']).' 00:00:00', 'start_in <=' => date('Y-m-d',$data['start_in']).' 23:59:59'));

		if(empty($check)){
			$datainsert = array(
				'start_in' => date('Y-m-d H:i:s',$data['start_in']), 
				'end_out' => date('Y-m-d H:i:s',$data['end_out']), 
				'reason' => $data['reason'],
				'user_id' => $user_id
			);
			//print_r(date('Y-m-d H:i:s',$data['start_in']));exit();
			return $this->db->insert('bucket_leaves', $datainsert);
		}else{
			return 0;
		}
    }
    
}