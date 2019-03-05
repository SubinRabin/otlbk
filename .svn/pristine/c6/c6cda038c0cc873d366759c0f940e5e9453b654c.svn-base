<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xmlprovider_Model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add_provider($data) {
    	$this->db->insert('xml_providers_tbl',$data);
    	return $this->db->insert_id();
    }
    public function details_select() {
		$this->db->select('*');
		$this->db->from('xml_providers_tbl');
  	    $query=$this->db->get();
		return $query;
	}
   	public function xml_single_data($id) {
		$this->db->select('*');
		$this->db->from('xml_providers_tbl');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function update_provider($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("xml_providers_tbl",$data);
		return $id;
	}
	public function delete_xml($id) {
		$this->db->where('id',$id);
		$this->db->delete('xml_providers_tbl');
		return true;
	}
	public function ActiveStatus($id,$status) {
		$data= array( 
			 'xmlproviderFlg' 	  => $status,
			);
		$this->db->where('id',$id);
		$this->db->update('xml_providers_tbl',$data);
		return true;
	}	
}