<?php
class Employeegateleader_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	
	public function get_subordinate($where = array())
    {   
        $this->db->select('uh.*, ov.*, u.name as subname, u.emp_id as subemp_id, l.name as leader_name, l.id as leader_id, l.emp_id as leader_empid');
		$this->db->from('user_hirearki uh');
		$this->db->join('users l', 'l.id = uh.leader_id','left');
		$this->db->join('bucket_overtime ov', 'ov.user_id = uh.user_id');
		$this->db->join('users u', 'u.id = ov.user_id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function add_overtime($user_id, $data = array())
    {
        // construct access menu priviledge
		$check = $this->get_overtime(array('user_id' => $user_id, '(acc_stat = \'queue\' or acc_stat = \'accept\') = ' => 1, 'start_in >=' => date('Y-m-d',$data['start_in']).' 00:00:00', 'start_in <=' => date('Y-m-d',$data['start_in']).' 23:59:59'));

		if(empty($check)){
			$datainsert = array(
				'start_in' => date('Y-m-d H:i:s',$data['start_in']), 
				'end_out' => date('Y-m-d H:i:s',$data['end_out']), 
				'reason' => $data['reason'],
				'user_id' => $user_id
			);
			//print_r(date('Y-m-d H:i:s',$data['start_in']));exit();
			return $this->db->insert('bucket_overtime', $datainsert);
		}else{
			return 0;
		}
    }
    
    public function approval_overtime($id,$leader_id,$isApprove, $reasons = "")
    {
		//echo $leader_id;exit();
        $this->db->where('id',$id);
        if($isApprove)
        {
          $this->db->update('bucket_overtime',array('acc_stat' => ($isApprove ? 'accept' : 'reject'),'acc_id' => $leader_id));          
        }else{
          $this->db->update('bucket_overtime',array('acc_stat' => ($isApprove ? 'accept' : 'reject'),'acc_id' => $leader_id,'rej_reason' => $reasons));
        }
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();
        }
        return 0;
    }
}