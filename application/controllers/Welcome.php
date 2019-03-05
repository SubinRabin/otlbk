<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('common');
          $this->load->model('Hotels_Model');
          $this->load->model('List_Model');
          $this->load->model('Common_Model');
          $this->load->library('pagination');
     }
	public function index()
	{
    $arrContextOptions=array(
      "ssl"=>array(
          "verify_peer"=>false,
          "verify_peer_name"=>false,
        ),
    );

    $data['view'] = $this->Hotels_Model->currency_settings_select();
      $data['currency_list']= $this->Hotels_Model->currency();
    // $fb_count = file_get_contents('https://graph.facebook.com/v3.0/1300104086787656?access_token=EAAD8eaaZAwtABAKNhZCS6AZBvcv272qLRSj0aSkWMkG0hYvuUwcV51uRv9J7zi6Dv27lIrwzFuh9520RObZCpGZAaIRDAZCUsmVygqWcfGcKHhmbO2Nzn3PZAIxwZB04lYjuktHwqfj44WoHijx7VZAQKvcPb4X1kYV3p1icRTZCk2peXHdRztUcNKFQzouy88uaAZD&fields=fan_count', false, stream_context_create($arrContextOptions));
    // $data['fb_count']  = json_decode($fb_count)->fan_count;
    $this->load->view('index',$data);
    // $this->load->view('landingpage');
	}
  public function about_us(){
    $data['view'] = $this->Hotels_Model->about_us_select();
    $this->load->view('about_us',$data);
  }
  public function events(){
    $data['view'] = $this->Hotels_Model->events_select();
    $this->load->view('events',$data);
  }
  public function Agentlogin()
  {
    $data['view'] = $this->Hotels_Model->currency_settings_select();
    $data['currency_list']= $this->Hotels_Model->currency();
    $this->load->view('index',$data);
  }
  public function events_view($id) {
    $data['view'] = $this->Hotels_Model->events_single_select($id);
    $this->load->view('events_view',$data);
  }
  public function hotels() {
    $config = array();
    $config["base_url"] = base_url() . "hotelslist";
    $total_row = $this->Hotels_Model->record_count();
    $config["total_rows"] = $total_row;
    $config["per_page"] = 12;
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = $total_row;
    $config['cur_tag_open'] = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
    $this->pagination->initialize($config);

    if($this->uri->segment(2)){
    $page = ($this->uri->segment(2)) ;
    }
    else{
    $page = 0;
    }
    //print_r($page);exit;
    $data['view'] = $this->Hotels_Model->all_hotels_select($config["per_page"], $page);
    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links );
    $this->load->view('hotels',$data);
  }
  public function hotels_view($id) {
    $data['view'] = $this->Hotels_Model->hotels_single_select($id);
      $hotel_facilities = explode(",",$data['view'][0]->hotel_facilities); 
      foreach ($hotel_facilities as $key => $value) {
        $data['hotel_facilities'][$key] = $this->List_Model->hotel_facilities_data($value);
      }

      $room_facilities = explode(",",$data['view'][0]->room_facilities); 
      foreach ($room_facilities as $key => $value) {
        $data['room_facilities'][$key] = $this->List_Model->room_facilities_data($value);
      }
    $this->load->view('hotels_view',$data);
  }
  public function review_add() {
        //print_r($_REQUEST);exit;      
    if ($_REQUEST['review_uname']=="") {
        $Return['error'] = "Name field is required !";
        $Return['status'] = "0";
      } else if ($_REQUEST['title']=="") {
        $Return['error'] = "Title field is required !";
        $Return['status'] = "0";
      } else if ($_REQUEST['comment']=="") {
        $Return['error'] = "Comment field is required !";
        $Return['status'] = "0"; 
      } else {
        $Return['error'] = "Successfully Submitted !";
        $review= $this->List_Model->review_add($_REQUEST);
        $Return['status'] = "1";
      }
    echo json_encode($Return);
  } 
  public function GetCountryName() {
    $keyword=$_REQUEST['keyword'];
    $data=$this->Hotels_Model->GetRow($keyword);        
    echo json_encode($data);
  }
  public function telr_response() {
     print_r($_REQUEST);exit;
  }
  public function currencyUpdate() {

    $this->db->select('*');
    $this->db->from('currency_update');
    $query = $this->db->get()->result();

    foreach ($query as $key => $value) {
      $data[$key]=currency_type_gc($value->currency_type,"1"); 
      $update = $this->Common_Model->added_currency_amount_update($data[$key],$value->id); 
    }

    $description = 'Currency updated automatically [Time : '.date('H:i:s').']';
    OtherlogActivity($description);    
  }
  public function policies() {
    $this->load->view('policies');
  }
  public function contactus() {
    $this->load->view('contactus');
  }
  public function termsandCondition() {
    $this->load->view('termsandCondition');
  }
  public function getip() {
    $ip = get_client_ip();
    print_r($ip);
  }
  public function expireddatadelete() {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('to_date <',date('Y-m-d', strtotime('-30 days')));
    $query=$this->db->get()->result();
    if (count($query)!=0) {
      foreach ($query as $key => $value) {
        $query1 = $this->db->query("DELETE FROM hotel_tbl_allotement where contract_id = '".$value->contract_id."'");
        $query2 = $this->db->query("DELETE FROM hotel_tbl_boardsupplement where contract_id = '".$value->contract_id."'");
        $query3 = $this->db->query("DELETE FROM hotel_tbl_generalsupplement where contract_id = '".$value->contract_id."'");
        $query4 = $this->db->query("DELETE FROM hotel_tbl_closeout_period where contract_id = '".$value->contract_id."'");
        $query5 = $this->db->query("DELETE FROM hotel_tbl_minimumstay where contract_id = '".$value->contract_id."'");
        $query6 = $this->db->query("DELETE FROM hotel_tbl_extrabed where contract_id = '".$value->contract_id."'");
        $query7 = $this->db->query("DELETE FROM hotel_tbl_contract where contract_id = '".$value->contract_id."'");
      }
    }

    $description = 'Expired data removed automatically [Time : '.date('H:i:s').']';
    OtherlogActivity($description);
  }
}