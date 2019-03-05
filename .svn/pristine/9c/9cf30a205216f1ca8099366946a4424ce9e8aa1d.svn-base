<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Xmlprovider extends MY_Controller {

	
	public function __construct() {
          parent::__construct();
          $this->load->model('Xmlprovider_Model');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->helper('Common');
          $this->load->helper('upload');
          $this->load->library('email');
          $this->load->helper('manuallog');
     }
     public function index() {
      $xmlMenu = menuPermissionAvailability($this->session->userdata('id'),'XML Providers',''); 
      if (count($xmlMenu)!=0 && $xmlMenu[0]->view==1) {
        $this->load->view('backend/xmlprovider/xml_details');
      } else {
        redirect(base_url().'backend/dashboard');
      }           
     }
     public function xml_details_list() { 
         if ($this->session->userdata('name')==""){
           redirect("../backend/");
         }
         $data = array();
         // Datatables Variables
         $draw = intval($this->input->get("draw"));
         $start = intval($this->input->get("start"));
         $length = intval($this->input->get("length"));
         $details = $this->Xmlprovider_Model->details_select();
         
         foreach($details->result() as $key => $r) {
            $xmlMenu = menuPermissionAvailability($this->session->userdata('id'),'XML Providers',''); 
            if($xmlMenu[0]->edit!=0) {
              $edit='<a href="xmlprovider/newprovider?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            } else {
              $edit = '';
            }
            if($xmlMenu[0]->delete!=0){
              $delete='<a href="#" onclick="deletexmlfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
            } else {
              $delete = '';
            }          
            if ($r->xmlproviderFlg==0) {
              if($xmlMenu[0]->edit==0) {
                $switch='Disabled';
               } else {
                $switch = '<div class="switch">
                      <label>
                          <input type="checkbox"   id="ActiveStatus'.$r->id.'"  onchange="ActiveStatus('."'$r->id'".');" >
                          <span class="lever"></span>
                        </label>
                    </div>';
              }
            } else {
              if($xmlMenu[0]->edit==0) {
                $switch='Enabled';
              } else {
                $switch = '<div class="switch">
                      <label>
                          <input type="checkbox"  checked="checked" id="ActiveStatus'.$r->id.'"  onchange="ActiveStatus('."'$r->id'".');" >
                          <span class="lever"></span>
                        </label>
                    </div>';
              }
            }

         $data[] = array(
               $key+1,
               $r->Name,
               $r->url,
               $r->ConnectionString,
               $r->UserName,
               $r->password,
               $r->Commision,
               $switch,
               $edit.$delete
             );
           
             }
         $output = array(
             "draw" => $draw,
            "recordsTotal" => $details->num_rows(),
            "recordsFiltered" => $details->num_rows(),
            "data" => $data
         );
         echo json_encode($output);
         exit();
     }
     public function newprovider() {
         if ($this->session->userdata('name')=="") {
           redirect("../backend/");
         }
         $xmlMenu = menuPermissionAvailability($this->session->userdata('id'),'XML Providers',''); 
         if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
           $data['edit'] = $this->Xmlprovider_Model->xml_single_data($_REQUEST['edit_id']);
           if (count($xmlMenu)!=0 && $xmlMenu[0]->view==1 && $xmlMenu[0]->edit==1) {
            $this->load->view("backend/xmlprovider/newprovider",$data);    
           } else {
            redirect(base_url().'backend/dashboard');
           }   
         } else {
           $data['edit'] =array();
           if (count($xmlMenu)!=0 && $xmlMenu[0]->view==1 && $xmlMenu[0]->create==1) {
            $this->load->view("backend/xmlprovider/newprovider",$data);    
           } else {
            redirect(base_url().'backend/dashboard');
           }  
         }
     }
     public function provider_validation() {
         if ($this->session->userdata('name')=="") {
           redirect("../backend/xmlprovider");
         } 
         if ($_REQUEST['name']=="") {
           $Return['error'] = 'Provider Name field is required!';
           $Return['color'] = 'orange';
         }
         else if ($_REQUEST['provider_url']=="") {
           $Return['error'] = 'Provider URL field is required!';
           $Return['color'] = 'orange';
         }
         else if ($_REQUEST['con_string']=="") {
               $Return['error'] = 'Connection string field is required!';
               $Return['color'] = 'orange';
         }
         else if ($_REQUEST['username']=="") {
               $Return['error'] = 'Username field is required!';
               $Return['color'] = 'orange';
         }
         else if ($_REQUEST['password']=="") {
               $Return['error'] = 'Password field is required!';
               $Return['color'] = 'orange';
         }
         else if ($_REQUEST['commision']=="") {
               $Return['error'] = 'Commision field is required!';
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
     public function addprovider() {
          if ($this->session->userdata('name')=="") {
               redirect("../backend/logout");
          }
          $data=array('Name' => $_REQUEST['name'],
                     'url' => $_REQUEST['provider_url'],
                     'ConnectionString' => $_REQUEST['con_string'],
                     'UserName' => $_REQUEST['username'],
                     'password' => $_REQUEST['password'],
                     'Commision' => $_REQUEST['commision'],
                   );
         if ($_REQUEST['edit_id']!="") {
           $update = $this->Xmlprovider_Model->update_provider($data,$_REQUEST['edit_id']);
           $description = 'XML provider details edited [ID: '.$_REQUEST['edit_id'].']';
         } else {
           $update = $this->Xmlprovider_Model->add_provider($data);
           $description = 'New XML provider details added [ID: '.$update.']';
         }
         AdminlogActivity($description);
         redirect('../backend/xmlprovider');
     }
     public function delete_xml() {
         $this->Xmlprovider_Model->delete_xml($_REQUEST['delete_id']);
         $Return['error'] = "Deleted Successfully";
         $Return['color'] = 'green';
         $Return['status'] = '1';
         $description = 'XML provider details deleted [ID: '.$_REQUEST['delete_id'].']';
         AdminlogActivity($description);
         echo json_encode($Return);
     }
     public function ActiveStatus() {
        $this->Xmlprovider_Model->ActiveStatus($_REQUEST['id'],$_REQUEST['status']);
        $description ='XML provider status updated [ID: '.$_REQUEST['id'].']';
        AdminlogActivity($description);
        echo json_encode(true);
      }
}