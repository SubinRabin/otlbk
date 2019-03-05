<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add_events($data) {
    	$this->db->insert('eventdetails',$data);
    	return $this->db->insert_id();
    }
    public function events_select() {
		$this->db->select('*');
		$this->db->from('eventdetails');
  	    $query=$this->db->get();
		return $query;
	}
   	public function event_single_data($id) {
		$this->db->select('*');
		$this->db->from('eventdetails');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function update_events($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("eventdetails",$data);
		return $id;
	}
	public function delete_event($id) {
		$this->db->where('id',$id);
		$this->db->delete('eventdetails');
		return true;
	}	
}