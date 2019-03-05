<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends MY_Controller {

  
  public function __construct() {
          parent::__construct();
          $this->load->model('Tour_Model');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('upload');
          $this->load->helper('form');
          $this->load->helper('common');
          $this->load->library('email');
          $this->load->helper('manuallog');
  }
  
  public function supplier_index()
  {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $supplierMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Supplier'); 
    if (count($supplierMenu)!=0 && $supplierMenu[0]->view==1) {
      $this->load->view('backend/supplier/index');     
    } else {
      redirect(base_url().'backend/dashboard');
    }      
  }
  public function newsupplier() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $supplierMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Supplier');
    if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
      $id=$_REQUEST['edit_id'];
      $data['edit'] = $this->Tour_Model->supplier_details($_REQUEST['edit_id']);
      if (count($supplierMenu)!=0 && $supplierMenu[0]->view==1 && $supplierMenu[0]->edit==1) {
        $this->load->view('backend/supplier/newsupplier',$data);          
      } else {
            redirect(base_url().'backend/dashboard');
      }  
    } else {
      $supplier_max_id = $this->Tour_Model->supplier_max_id();
      $supplier_id = $supplier_max_id[0]->id+1;
      if (count($supplier_max_id)==0) {
        $data['supplier_max_id'] = "TA0001";
      } else {
        $data['supplier_max_id'] = "TA00".$supplier_id;
      } 
      if (count($supplierMenu)!=0 && $supplierMenu[0]->view==1 && $supplierMenu[0]->create==1) {
        $this->load->view('backend/supplier/newsupplier',$data);          
      } else {
            redirect(base_url().'backend/dashboard');
      } 
    }     
  }
  public function supplier_validation() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['supplier_name']=="") {
      $Return['error'] = 'Supplier Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['phone_landline']=="") {
      $Return['error'] = 'Landline number field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['salescontact_person']=="") {
      $Return['error'] = 'Sales contact person field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['salescontact_num']=="") {
      $Return['error'] = 'Sales contact number field is required!';
      $Return['color'] = 'orange';
    }else if (!filter_var($_REQUEST['sales_contact_email'], FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format"; 
      $Return['color'] = 'orange'; 
    }
    else if ($_REQUEST['credit_limit']=="") {
      $Return['error'] = 'Credit Limit field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['ops_contact_person']=="") {
      $Return['error'] = 'Ops contact person field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['ops_contact_num']=="") {
      $Return['error'] = 'Ops contact number field is required!';
      $Return['color'] = 'orange';
    }
    else if (!filter_var($_REQUEST['ops_contact_email'], FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format"; 
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
  public function addsupplier() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
      $data=array('supplier_code' => $_REQUEST['supplier_code'],
              'supplier_name' => $_REQUEST['supplier_name'],
              'phone_landline' => $_REQUEST['phone_landline'],
              'salescontact_person' => $_REQUEST['salescontact_person'],
              'salescontact_num' => $_REQUEST['salescontact_num'],
              'sales_contact_email' => $_REQUEST['sales_contact_email'],
              'credit_limit' => $_REQUEST['credit_limit'],
              'ops_contact_person' => $_REQUEST['ops_contact_person'],
              'ops_contact_num' => $_REQUEST['ops_contact_num'],
              'ops_contact_email' => $_REQUEST['ops_contact_email'],
            );
    if ($_REQUEST['edit_id']!="") 
    {
      $result = $this->Tour_Model->update_supplier($data,$_REQUEST['edit_id']);
      $description = 'Tour supplier details edited [ID: '.$result.']';
    } 
    else 
    {
      $result = $this->Tour_Model->add_supplier($data);
      $description = 'New tour supplier details added [ID: '.$result.']';
    }
    AdminlogActivity($description);
    redirect(base_url().'backend/tour/supplier_index');
  }
  public function supplier_details_list() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $supplier_details = $this->Tour_Model->details_select();
      foreach($supplier_details->result() as $key => $r) {
        $supplierMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Supplier');
        if($supplierMenu[0]->edit!=0) {
          $edit='<a href="newsupplier?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        } else {
          $edit= '';
        }
        if($supplierMenu[0]->delete!=0) {
          $delete='<a href="#" onclick="deletesupplierfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
        } else {
          $delete = '';
        }
        $data[] = array(
          $r->supplier_code,
          $r->supplier_name,
          $r->phone_landline,
          $r->salescontact_person,
          $r->salescontact_num,
          $r->sales_contact_email,
          $r->credit_limit,
          $edit.$delete
        );
      
      }
    $output = array(
       "draw" => $draw,
       "recordsTotal" => $supplier_details->num_rows(),
       "recordsFiltered" => $supplier_details->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function delete_supplier() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $this->Tour_Model->delete_supplier($_REQUEST['delete_id']);
    $Return['error'] = "Deleted Successfully";
    $Return['color'] = 'green';
    $Return['status'] = '1';
    $description = 'Tour supplier details deleted [ID: '.$_REQUEST['delete_id'].']';
    AdminlogActivity($description);
    echo json_encode($Return);
  }
  public function tour_contracts() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }  
    $contractMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Contracts'); 
    if (count($contractMenu)!=0 && $contractMenu[0]->view==1) {
        $this->load->view('backend/tour_contracts/index');  
      } else {
        redirect(base_url().'backend/dashboard');
      }         
  }
  public function newcontract() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $contractMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Contracts'); 
    $data['supplier'] = $this->Tour_Model->suppliers_select();
    $data['types'] = $this->Tour_Model->types_select();
    if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
      $data['edit'] = $this->Tour_Model->contract_details($_REQUEST['edit_id']);
      if (count($contractMenu)!=0 && $contractMenu[0]->view==1 && $contractMenu[0]->edit==1) {
        $this->load->view("backend/tour_contracts/newcontract",$data);        
      } else {
        redirect(base_url().'backend/dashboard');
      } 
    } else {
      $contract_max_id = $this->Tour_Model->contract_max_id();
      $contract_id = $contract_max_id[0]->id+1;
      if (count($contract_max_id)==0) {
        $data['contract_max_id'] = "TC0001";
      } else {
        $data['contract_max_id'] = "TC00".$contract_id;
      }
      if (count($contractMenu)!=0 && $contractMenu[0]->view==1 && $contractMenu[0]->create==1) {
        $this->load->view("backend/tour_contracts/newcontract",$data);        
      } else {
        redirect(base_url().'backend/dashboard');
      }  
    }
  }
  public function contract_validation() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['tour_type']=="") {
      $Return['error'] = 'Tour type field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['description']=="") {
      $Return['error'] = 'Description field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['supplier_id']=="") {
      $Return['error'] = 'Supplier name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['adult_cost']=="") {
      $Return['error'] = 'Adult Cost field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['adult_selling']=="") {
      $Return['error'] = 'Adult Selling field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['child_cost']=="") {
      $Return['error'] = 'Child Cost field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['child_selling']=="") {
      $Return['error'] = 'child_selling field is required!';
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
  public function addcontract() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
    $BlackDate = "";
      if (count($_REQUEST['BlackDate'])!=0) {
        $BlackDate = implode(",", $_REQUEST['BlackDate']);
      }
    $data=array('contract_code' =>$_REQUEST['contract_max_id'],
            'tour_type' => $_REQUEST['tour_type'],
            'description' => $_REQUEST['description'],
            'supplier_id' => $_REQUEST['supplier_id'],
            'valid_from' => $_REQUEST['valid_from'],
            'valid_to' => $_REQUEST['valid_to'],
            'adult_cost' => $_REQUEST['adult_cost'],
            'adult_selling' => $_REQUEST['adult_selling'],
            'child_cost' => $_REQUEST['child_cost'],
            'child_selling' => $_REQUEST['child_selling'],
            'max_childAge' => $_REQUEST['max_childAge'],
            'BlackOut' => $BlackDate

          );
    if ($_REQUEST['edit_id']!="") 
    {
      $result = $this->Tour_Model->update_contract($data,$_REQUEST['edit_id']);
      $description = 'Tour contract details edited [ID: '.$_REQUEST['edit_id'].']';
    } 
    else 
    {
      $result = $this->Tour_Model->add_contract($data);
      $description = 'New tour contract added [ID: '.$result.']';
    } 
    AdminlogActivity($description);
    redirect(base_url().'backend/tour/tour_contracts');
  }
  public function contract_details_list() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $contract_details = $this->Tour_Model->contract_details_select();
      foreach($contract_details->result() as $key => $r) {
        $contractMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Contracts'); 
        if($contractMenu[0]->edit!=0) {
          $edit='<a href="newcontract?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
          $policy='<a href="contractpolicy?id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-product-hunt" aria-hidden="true"></i></a>';
          $terms='<a href="contractconditions?id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-text-width" aria-hidden="true"></i></a>';
        } else {
          $edit = '';
          $policy = '';
          $terms = '';
        }
        if($contractMenu[0]->delete!=0) {
          $delete='<a href="#" onclick="deletecontractfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
        } else {
          $delete = '';
        }
       
        if ($r->status==0) {
          if($contractMenu[0]->edit!=0) {
            $switch = '<div class="switch">
                        <label>
                            <input type="checkbox"   id="contractStatus'.$r->id.'"  onchange="contractStatus('."'$r->id'".');" >
                            <span class="lever"></span>
                          </label>
                      </div>';
          } else {
            $switch = 'Disabled';
          }
        } else {
          if($contractMenu[0]->edit!=0) {
            $switch = '<div class="switch">
                        <label>
                            <input type="checkbox"  checked="checked" id="contractStatus'.$r->id.'"  onchange="contractStatus('."'$r->id'".');" >
                            <span class="lever"></span>
                          </label>
                      </div>';
          } else {
            $switch = 'Enabled';
          }
        }      
        $supplier_name = $this->Tour_Model->get_supplier_detail($r->supplier_id);
        $tour_type = $this->Tour_Model->get_tour_type($r->tour_type);
        $data[] = array(
          $r->contract_code,
          isset($tour_type[0]->type) ? $tour_type[0]->type : '',
          $supplier_name[0]->supplier_name,
          date("d/m/Y", strtotime($r->valid_from)),
          date("d/m/Y", strtotime($r->valid_to)),
          $r->adult_cost,
          $r->adult_selling,
          $r->child_cost,
          $r->child_selling,
          $switch,
          $policy.$terms,
          $edit.$delete
        );
      
        }
    $output = array(
       "draw" => $draw,
       "recordsTotal" => $contract_details->num_rows(),
       "recordsFiltered" => $contract_details->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function contractStatus() {
    $this->Tour_Model->contractStatus($_REQUEST['id'],$_REQUEST['status']);
    $description = 'Tour contract status updated [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    echo json_encode(true);
  }
  public function delete_contract() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $this->Tour_Model->delete_contract($_REQUEST['delete_id']);
    $Return['error'] = "Deleted Successfully";
    $Return['color'] = 'green';
    $Return['status'] = '1';
    $description = 'Tour contract details deleted [ID: '.$_REQUEST['delete_id'].']';
    AdminlogActivity($description);
    echo json_encode($Return);
  }
  public function contractpolicy() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    } 
    $data['contract_id'] = $_REQUEST['id']; 
     $this->load->view('backend/tour_contracts/policy',$data);    
  }
  public function policy_details_list($id) {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $data = array();
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $policy_details = $this->Tour_Model->policy_details_select($id);
      foreach($policy_details->result() as $key => $r) {
        $edit='<a href="newpolicy/'.$r->contract_id.'?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        $delete='<a href="#" onclick="deletepolicyfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';

        $data[] = array(
          $key+1,
          date('d/m/Y',strtotime($r->from_date)),
          date('d/m/Y',strtotime($r->to_date)),
          $r->from_day,
          $r->to_day,
          $r->description,
          $r->cancel_percent,
          $edit.$delete
        );
      
      }
    $output = array(
       "draw" => $draw,
       "recordsTotal" => $policy_details->num_rows(),
       "recordsFiltered" => $policy_details->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();   
  }
  public function newpolicy($id) {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $data['contract_id']=$id;
    if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
      $data['edit'] = $this->Tour_Model->policy_details($_REQUEST['edit_id']);
    } else {
      $data['edit'] =array();
    }
     $this->load->view("backend/tour_contracts/newpolicy",$data);      
  }
  public function policy_validation() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
    if ($_REQUEST['from_day']=="") {
      $Return['error'] = 'Day from field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['to_day']=="") {
      $Return['error'] = 'Day to field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['description']=="") {
      $Return['error'] = 'Description field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['cancel_percent']=="") {
      $Return['error'] = 'Cancellation Percentage field is required!';
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
  public function addpolicy() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
        $data=array('from_date' => $_REQUEST['from_date'],
                'to_date' => $_REQUEST['to_date'],
                'from_day' => $_REQUEST['from_day'],
                'to_day' => $_REQUEST['to_day'],
                'description' => $_REQUEST['description'],
                'cancel_percent' => $_REQUEST['cancel_percent'],
                'contract_id' => $_REQUEST['contract_id'],
              );
        $cid=$_REQUEST['contract_id'];
    if ($_REQUEST['edit_id']!="") 
    {
      $result = $this->Tour_Model->update_policy($data,$_REQUEST['edit_id']);
      $description = 'Tour Contract cancellation policy edited [Contract ID: '.$_REQUEST['contract_id'].', Policy ID: '.$_REQUEST['edit_id'].']';
    } 
    else 
    {
      $result = $this->Tour_Model->add_policy($data);
      $description = 'New tour contract cancellation policy added [Contract ID: '.$_REQUEST['contract_id'].', Policy ID: '.$result.']';
    }
    AdminlogActivity($description);
    redirect(base_url().'backend/tour/contractpolicy?id='.$cid);
  }
  public function delete_policy() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $this->Tour_Model->delete_policy($_REQUEST['delete_id']);
    $Return['error'] = "Deleted Successfully";
    $Return['color'] = 'green';
    $Return['status'] = '1';
    $description = 'Tour contract cancelation policy deleted [Policy ID: '.$_REQUEST['delete_id'].']';
    AdminlogActivity($description);
    echo json_encode($Return);
  }
  public function contractconditions() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    } 
    $data['contract_id'] = $_REQUEST['id']; 
     $this->load->view('backend/tour_contracts/conditions',$data);    
  }
  public function condition_details_list($id) {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $data = array();
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $condition_details = $this->Tour_Model->condition_details_select($id);
      foreach($condition_details->result() as $key => $r) {
        $edit='<a href="newcondition/'.$r->contract_id.'?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        $delete='<a href="#" onclick="deleteconditionfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';

        $data[] = array(
          $key+1,
          $r->conditions,
          $edit.$delete
        );
      
      }
    $output = array(
       "draw" => $draw,
       "recordsTotal" => $condition_details->num_rows(),
       "recordsFiltered" => $condition_details->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();   
  }
  public function newcondition($id) {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $data['contract_id']=$id;
    if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
      $data['edit'] = $this->Tour_Model->condition_details($_REQUEST['edit_id']);
    } else {
      $data['edit'] =array();
    }
     $this->load->view("backend/tour_contracts/newcondition",$data);      
  }
  public function condition_validation() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
    if ($_REQUEST['conditions']=="") {
      $Return['error'] = 'Terms and Conditions field is required!';
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
  public function addcondition() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
        $data=array('conditions' => $_REQUEST['conditions'],
                'contract_id' => $_REQUEST['contract_id'],
              );
        $cid=$_REQUEST['contract_id'];
    if ($_REQUEST['edit_id']!="") 
    {
      $result = $this->Tour_Model->update_condition($data,$_REQUEST['edit_id']);
      $description = 'Tour contract condition edited [Contract ID: '.$_REQUEST['contract_id'].', Condition ID: '.$_REQUEST['edit_id'].']';
    } 
    else 
    {
      $result = $this->Tour_Model->add_condition($data);
      $description = 'New tour contract condition added [Contract ID: '.$_REQUEST['contract_id'].', Condition ID: '.$result.']';
    }
      AdminlogActivity($description);
      redirect(base_url().'backend/tour/contractconditions?id='.$cid);
  }
  public function delete_condition() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $this->Tour_Model->delete_condition($_REQUEST['delete_id']);
    $Return['error'] = "Deleted Successfully";
    $Return['color'] = 'green';
    $Return['status'] = '1';
    $description = 'Tour contract condition deleted [Codition ID: '.$_REQUEST['delete_id'].']';
    AdminlogActivity($description);
    echo json_encode($Return);
  }
  public function tour_services() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    } 
    $servicesMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Services'); 
    if (count($servicesMenu)!=0 && $servicesMenu[0]->view==1) {
      $this->load->view('backend/tour_services/index'); 
    } else {
      redirect(base_url().'backend/dashboard');
    }       
  }
  public function service_details_list() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $data = array();
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $service_details = $this->Tour_Model->service_details_select();
      foreach($service_details->result() as $key => $r) {
        $servicesMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Services'); 
        if($servicesMenu[0]->edit!=0) {
          $edit='<a href="newservice/?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        } else {
          $edit = '';
        }
        if($servicesMenu[0]->delete!=0) {
         $delete='<a href="#" onclick="deleteservicefun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
        } else {
          $delete = '';
        }
        if($r->image!=""){
          $img_path = base_url().'uploads/tour_services_images/'.$r->id.'/'.$r->image;
        } else{
          $img_path = base_url().'skin/images/list-pre.png';
        }

        $data[] = array(
          $key+1,
          '<img width="50px" height="50px" src="'.$img_path.'" />',
          $r->type,
          $r->countryName,
          $r->CityName,
          $r->near_by,
          $r->duration.' '.$r->durationType,
          $edit.$delete
        );
      
      }
    $output = array(
       "draw" => $draw,
       "recordsTotal" => $service_details->num_rows(),
       "recordsFiltered" => $service_details->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();   
  }
  public function newservice() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    }
    $data['view']= $this->Tour_Model->SelectCountry();  
    $servicesMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Services');
    if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
      $data['edit'] = $this->Tour_Model->service_details($_REQUEST['edit_id']);
      $data['Services'] = $this->Tour_Model->multipleServices($_REQUEST['edit_id']);
      if (count($servicesMenu)!=0 && $servicesMenu[0]->view==1 && $servicesMenu[0]->edit==1) {
        $this->load->view("backend/tour_services/newservice",$data);       
      } else {
         redirect(base_url().'backend/dashboard');
      }  
    } else {
      $data['edit'] =array();
      $data['Services'] =array();
      if (count($servicesMenu)!=0 && $servicesMenu[0]->view==1 && $servicesMenu[0]->create==1) {
        $this->load->view("backend/tour_services/newservice",$data);       
      } else {
         redirect(base_url().'backend/dashboard');
      }  
    }    
  }
  public function service_validation() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    } 
    if ($_REQUEST['type']=="") {
      $Return['error'] = 'Service Name field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['description']=="") {
      $Return['error'] = 'Description field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['near_by']=="") {
      $Return['error'] = 'Nearby palces field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['ConSelect']=="") {
      $Return['error'] = 'Country field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['citySelect']=="") {
      $Return['error'] = 'City field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['highlights']=="") {
      $Return['error'] = 'Highlights field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['duration']=="") {
      $Return['error'] = 'Duration field is required!';
      $Return['color'] = 'orange';
    } else if ($_REQUEST['durationType']=="") {
      $Return['error'] = 'Duration type field is required!';
      $Return['color'] = 'orange';
    } else if(!isset($_REQUEST['Services'])) {
      $Return['error'] = 'Must add schedules!';
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
  public function addservice() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $data=array('type' =>$_REQUEST['type'],
            'description' => $_REQUEST['description'],
            'highlights' => $_REQUEST['highlights'],
            'near_by' => $_REQUEST['near_by'],
            'countryId' => $_REQUEST['ConSelect'],
            'cityId' => $_REQUEST['citySelect'],
            'duration' => $_REQUEST['duration'],
            'durationType' => $_REQUEST['durationType']
          );
    if ($_REQUEST['edit_id']!="") 
    {
      $result = $this->Tour_Model->update_service($data,$_REQUEST['edit_id']);
      $id = $_REQUEST['edit_id'];
      $description = 'Tour service details edited [ID: '.$id.']';
    } 
    else 
    {
      $result = $this->Tour_Model->add_service($data);
      $id = $result;
      $description = 'New tour service added [ID: '.$id.']';
    } 
    $this->Tour_Model->add_Multipleservice($id,$_REQUEST);
      tour_service_image_upload($result);
      AdminlogActivity($description);
      redirect(base_url().'backend/tour/tour_services');
  }
  public function delete_service() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $this->Tour_Model->delete_service($_REQUEST['delete_id']);
    $Return['error'] = "Deleted Successfully";
    $Return['color'] = 'green';
    $Return['status'] = '1';
    $description = 'Tour service details deleted [ID: '.$_REQUEST['delete_id'].']';
    AdminlogActivity($description);
    echo json_encode($Return);
  }
  public function CitySelect() {
      $data = $this->Tour_Model->SelectXmlCity($_REQUEST['Concode']);
      echo json_encode($data);
  }
  public function dateLoop() {
    $result = array();
    $result['count'] = 0;
    $checkin_date = date_create($_REQUEST['start']);
    $checkout_date=date_create($_REQUEST['end']);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    if ($tot_days!=0) {
        for($i = 0; $i <= $tot_days; $i++) {
            $result['date'][$i] = date('Y-m-d', strtotime($_REQUEST['start']. ' + '.$i.'  days'));
            $result['day'][$i] = date('d', strtotime($_REQUEST['start']. ' + '.$i.'  days'));
            $result['days'][$i] = date('D', strtotime($_REQUEST['start']. ' + '.$i.'  days'));
            $result['monthYear'][$i] = date('M Y', strtotime($_REQUEST['start']. ' + '.$i.'  days'));
          }
      $result['count'] = $tot_days;
    } 
      echo json_encode($result);
  }
}
?>
