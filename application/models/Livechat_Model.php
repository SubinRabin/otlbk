<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livechat_Model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function load_details($agent_id,$ch_id) {
    	$query=$this->db->query("select tbl_private_chat_messages.*,IF(tbl_private_chat_messages.private_chat_id=0, 'agent', 'admin') as type,hotel_tbl_agents.id from tbl_private_chat_messages left join hotel_tbl_agents on hotel_tbl_agents.id=tbl_private_chat_messages.user_id where tbl_private_chat_messages.private_chat_id='$ch_id'"); 
    	$data=array('agent_read' => 1);
    	$this->db->where('private_chat_id',$ch_id);
    	$this->db->update('tbl_private_chat_messages',$data);
    	return $query->result();
  	   
	}
	public function load_admin_details($adminid) {
  	    $this->db->select('*');
		$this->db->from('hotel_tbl_user');
		$this->db->where('id',$adminid);
		$query=$this->db->get();
		return $query->result();
	}
	public function load_agent_details($aid) {
  	    $this->db->select('*');
		$this->db->from('hotel_tbl_agents');
		$this->db->where('id',$aid);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_pr_chat_details($agent_id){
		$this->db->select('private_chat_id');
		$this->db->from('tbl_chat_requests');
		$this->db->where('agent_id',$agent_id);
		$this->db->where('created_date',date('Y-m-d'));
		$query=$this->db->get()->result();
		if (count($query)!=0) {
			$return = $query[0]->private_chat_id;
		} else {
			$return = 0;
		}
		return $return;
	}
	public function get_unread_count($chat_id){
		$this->db->select('*');
		$this->db->from('tbl_private_chat_messages');
		$this->db->where('private_chat_id',$chat_id);
		$this->db->where('agent_read',0);
		$query=$this->db->get()->result();
		$return=count($query);
		return $return;
	}
	public function get_admin_msg($agent_id,$chat_id){
		$this->db->select('*');
		$this->db->from('tbl_private_chat_messages');
		$this->db->where('private_chat_id',$chat_id);
		$this->db->where('agent_read',0);
		$this->db->where('agent_id',0);
		$query=$this->db->get()->result();
		return $query;
	}
}