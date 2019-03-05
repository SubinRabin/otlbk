<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Reviews_Model');
		$this->load->helper('upload');
		$this->load->helper('url');
    $this->load->helper('html');
    $this->load->helper('manuallog');
    $this->load->helper('common');
    }
    public function index() {

      $Review = menuPermissionAvailability($this->session->userdata('id'),'Reviews','Hotel'); 
      if (count($Review)!=0 && $Review[0]->view==1) {
      $this->load->view('backend/reviews/hotel_review_list');
      } else {
        redirect(base_url().'backend/dashboard');
      }

    	
    }
    public function hotel_review() {
    	if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
           $data['edit'] = $this->Reviews_Model->hotel_review_edit($_REQUEST['edit_id']);
        } else {
           $data['edit'] =array();
        }
    	
     	$this->load->view('backend/reviews/hotel_review_add',$data);
    }
    public function hotel_review_add() {
    	if ($_REQUEST['edit_id']!="") {
        	$data = $this->Reviews_Model->hotel_review_update($_REQUEST,$_REQUEST['edit_id']);
        		redirect('../backend/reviews');
      } else {
    	   		$review_id= $this->Reviews_Model->hotel_review_add($_REQUEST);
      			redirect('../backend/reviews');
        }
     	$this->load->view('backend/reviews/hotel_review_add',$data);
        redirect('../backend/reviews');

    }
    public function hotel_review_list() {
    	$data = array();
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
    	$review = $this->Reviews_Model->hotel_review_list();
        foreach($review->result() as $key => $r) {
          $Review = menuPermissionAvailability($this->session->userdata('id'),'Reviews','Hotel');
          if ($Review[0]->view!=0) {
            $edit='<a href="reviews/hotel_review?edit_id='.$r->review_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          }else{
            $edit="";
          }
          if($Review[0]->delete!=0){
            $delete='<a href="#" onclick="deletefun('.$r->review_id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red fa fa-trash-o" aria-hidden="true"></i></a>';
          }else{
            $delete="";
          }

        	$data[] = array(
              $r->hotel_name,
              $r->location,
		          $r->Username,
		          $r->Title,
              $r->Evaluation,
              $r->Comment,
		          $edit,
              $delete,
        );
      }
    	$output = array(
        "draw" => $draw,
        "recordsTotal" => $review->num_rows(),
        "recordsFiltered" => $review->num_rows(),
        "data" => $data
                  );
	echo json_encode($output);
    }
    public function hotel_review_delete() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $result = $this->Reviews_Model->hotel_review_delete($_REQUEST['delete_id']);
    if ($result==true) {
      $Return['error'] = "Deleted Successfully";
          $Return['color'] = 'green';
          $Return['status'] = '1';
          $description = 'Hotel review details deleted [ID: '.$_REQUEST['delete_id'].']';
          AdminlogActivity($description);
    } else {
      $Return['error'] = "Deleted Unsuccessfully!";
      $Return['color'] = 'red';
    }
    echo json_encode($Return);
  }
  public function hotel_review_view() {
    $data['view'] = $this->Reviews_Model->hotel_review_edit($_GET['id']);
    
    $this->load->view('backend/reviews/view_modal',$data); 
  }
  
}
?>
