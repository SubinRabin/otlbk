<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Reviews_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function hotel_review_add($data) {
		// print_r($data);
		// exit();
		$data= array(
                  'Username' =>$data['username'],
                  'Evaluation' =>$data['evaluation'],
                  'Title' =>$data['title'],
                  'Comment' =>$data['comment'],
                  // 'Email' =>$data['email'],
                  // 'Date' =>$data['date'],
                  'Cleanliness' =>$data['cleanliness'],
                  'Room_Comfort' =>$data['room_comfort'],
                  'Location' =>$data['location'],
                  'Service_Staff' =>$data['service_staff'],
                  'Sleep_Quality' =>$data['sleep_quality'],
                  'Value_Price' =>$data['value_price'],
                  // 'Review_Heading' =>$data['review_heading'],
                  // 'Description' =>$data['description'],
                  'Created_Date' => date('Y-m-d'),
                     );
        $this->db->insert('hotel_tbl_review',$data);
        $review_id = $this->db->insert_id();
        return $review_id;
        return true;
	}
	public function hotel_review_list() {
		$this->db->select('*,hotel_tbl_review.id as review_id');
		$this->db->from('hotel_tbl_review');
    $this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_review.hotel_id');
		$this->db->where('hotel_tbl_review.delflg',1);
		$data= $this->db->get();
		return $data;
	}
	public function hotel_review_delete($id) {
        $data = array('delflg' => '0');
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_review',$data);
        return true;
    }
    public function hotel_review_update($data,$id)
    {
        $data= array(
                  'Username' =>$data['username'],
                  'Evaluation' =>$data['evaluation'],
                  'Title' =>$data['title'],
                  'Comment' =>$data['comment'],
                  // 'Email' =>$data['email'],
                  'Cleanliness' =>$data['cleanliness'],
                  'Room_Comfort' =>$data['room_comfort'],
                  'Location' =>$data['location'],
                  'Service_Staff' =>$data['service_staff'],
                  'Sleep_Quality' =>$data['sleep_quality'],
                  'Value_Price' =>$data['value_price'],
                  // 'Review_Heading' =>$data['review_heading'],
                  'Updated_Date' => date('Y-m-d'),
                  'Updated_By' =>  $this->session->userdata('id'),);
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_review',$data);
        return true;
    }
    public function hotel_review_edit($id) {
        $this->db->select('*');
        $this->db->from('hotel_tbl_review');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $final= $query->result();
        return $final;
    }
    public function hotel_review_single_data($id) {
        $this->db->where('id',$id);
        $this->db->from('hotel_tbl_review');
        $this->db->limit('1');
        $query=$this->db->get();
        return $query->result();
    }
}