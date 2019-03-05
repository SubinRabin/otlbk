<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

	
	public function __construct() {
          parent::__construct();
          $this->load->model('Event_Model');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->helper('Common');
          $this->load->helper('upload');
          $this->load->library('email');
          $this->load->helper('manuallog');
  }
  public function index() {
    $eventMenu = menuPermissionAvailability($this->session->userdata('id'),'Events',''); 
    if (count($eventMenu)!=0 && $eventMenu[0]->view==1) {
      $this->load->view("backend/events/events_details");
    } else {
      redirect(base_url().'backend/dashboard');
    }      
  }
  public function newevents() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $eventMenu = menuPermissionAvailability($this->session->userdata('id'),'Events','');
    if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
      $data['edit'] = $this->Event_Model->event_single_data($_REQUEST['edit_id']);
      if (count($eventMenu)!=0 && $eventMenu[0]->view==1 && $eventMenu[0]->edit==1) {
         $this->load->view("backend/events/newevents",$data);    
      } else {
        redirect(base_url().'backend/dashboard');
      }   
    } else {
      $data['edit'] =array();
      if (count($eventMenu)!=0 && $eventMenu[0]->view==1 && $eventMenu[0]->create==1) {
         $this->load->view("backend/events/newevents",$data);    
      } else {
        redirect(base_url().'backend/dashboard');
      }  
    }   
  }
  public function addevents() {
      if ($this->session->userdata('name')=="") {
     redirect("../backend/logout");
    }
    $data=array('event_name' => $_REQUEST['event_name'],
                'event_description' => $_REQUEST['event_des'],
                'event_adrs' => $_REQUEST['event_adrs'],
                'start_date' => $_REQUEST['start_date'],
                'end_date' => $_REQUEST['end_date'],
                'userId' => $this->session->userdata('id'),
              );
    if ($_REQUEST['edit_id']!="") {
    $update = $this->Event_Model->update_events($data,$_REQUEST['edit_id']);
    $description = 'Event details edited [ID: '.$_REQUEST['edit_id'].']';
    } else {
    $update = $this->Event_Model->add_events($data);
    $description = 'New event added [ID: '.$update.']';
    }
    AdminlogActivity($description);
    event_gallery_image_upload($update);
    redirect('../backend/events');
  }
  public function events_details_list() {
    if ($this->session->userdata('name')==""){
      redirect("../backend/");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $events_details = $this->Event_Model->events_select();
    
    foreach($events_details->result() as $key => $r) {
      $eventMenu = menuPermissionAvailability($this->session->userdata('id'),'Events','');
      if($eventMenu[0]->edit!=0) {
        $edit='<a href="events/newevents?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
      } else {
        $edit = '';
      }
      if($eventMenu[0]->delete!=0){
        $delete='<a href="#" onclick="deleteeventfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
      } else {
        $delete = '';
      }
      $data[] = array(
          $key+1,
          '<img width="50px" height="50px" src="'.base_url().'uploads/events/'.$r->id.'/'.$r->event_image.'" />',
          $r->event_name,
          $r->event_description,
          $r->event_adrs,
          $r->start_date,
          $r->end_date,
          $edit.$delete
        );
      
    }
    $output = array(
        "draw" => $draw,
       "recordsTotal" => $events_details->num_rows(),
       "recordsFiltered" => $events_details->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function delete_event() {
    $this->Event_Model->delete_event($_REQUEST['delete_id']);
    $Return['error'] = "Deleted Successfully";
    $Return['color'] = 'green';
    $Return['status'] = '1';
    $description = 'Event details deleted [ID: '.$_REQUEST['delete_id'].']';
    AdminlogActivity($description);
    echo json_encode($Return);
  }
  public function event_validation() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/events");
    } 
    if ($_REQUEST['event_name']=="") {
      $Return['error'] = 'Event Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['event_des']=="") {
      $Return['error'] = 'Event Description field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['event_adrs']=="") {
          $Return['error'] = 'Event_address field is required!';
          $Return['color'] = 'orange';
    }
    else {
          if ($_REQUEST['edit_id']!="") {
            $Return['error'] = "Updated Successfully!";
            $Return['color'] = 'green';
            $Return['status'] = '1';
          } else {
            $Return['error'] = "Inserted Successfully!";
            $Return['color'] = 'green';
            $Return['status'] = '1';
      } 
    }
     echo json_encode($Return);
  }
}