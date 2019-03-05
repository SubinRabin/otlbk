<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->helper('upload');
          $this->load->helper('common');
          $this->load->model('User_Model');
          $this->load->helper('manuallog');
     }
	
	public function index()
	{
    $usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users','');
    if (count($usersmenu)!=0 && $usersmenu[0]->view==1) {
      $this->load->view('backend/users/index'); 
    } else {
      redirect(base_url().'backend/dashboard');
    }
	}
	public function new_user()
	{
      $usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users','');
      $data['role'] =$this->User_Model->getRole();
      $data['currency_list']= $this->User_Model->currency();
      if (isset($_REQUEST['edit_id']) && $_REQUEST['edit_id'] !="") {
        $data['edit'] = $this->User_Model->edit($_REQUEST['edit_id']);
        $data['edit']['gender'] = [$data['edit'][0]->Sex=>$data['edit'][0]->Sex,'1'=>'Male','2' =>'Female','3'=>'Others'] ;
        if ((count($usersmenu)!=0 && $usersmenu[0]->view==1 && $usersmenu[0]->edit==1) || isset($_REQUEST['myAccount'])) {
          $this->load->view('backend/users/new_user',$data); 
        } else {
          redirect(base_url().'backend/dashboard');
        }
      } else {
        $data['edit'] =array();
        $data['edit']['gender'] = ['1'=>'Male','2' =>'Female','3'=>'Others'] ;
        if ((count($usersmenu)!=0 && $usersmenu[0]->view==1 && $usersmenu[0]->create==1) || isset($_REQUEST['myAccount'])) {
          $this->load->view('backend/users/new_user',$data); 
        } else {
          redirect(base_url().'backend/dashboard');
        }        
      }
  }
	public function user_validation()
	{
    if ($_REQUEST['email']!="") {
      if ($_REQUEST['edit_id']!="") {
        $mail = "1";
      } else {
         $mail = user_email_validation($_REQUEST['email']);
        }
    } else {
        $mail = "1";
      }
    if ($_REQUEST['pass_change']==1) {
        if ($_REQUEST['first_name']=="") {
          $Return['error'] = 'First Name field is required!';
            $Return['color'] = 'orange';
        }
        else if ($_REQUEST['last_name']=="") {
          $Return['error'] = 'Last Name field is required!';
          $Return['color'] = 'orange';
        }
        else if ($_REQUEST['phone']=="") {
          $Return['error'] = 'Phone Number field is required!';
          $Return['color'] = 'orange';
        }
        else if ($_REQUEST['sex']=="") {
          $Return['error'] = 'Sex field is required!';
          $Return['color'] = 'orange';
        }
        // else if ($_REQUEST['category']=="") {
        //   $Return['error'] = 'Category field is required!';
        //   $Return['color'] = 'orange';
        // }
        else if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
          $Return['error'] = "Invalid email format"; 
          $Return['color'] = 'orange'; 
        } else if ($mail==0) {
          $Return['error'] = "Mail already exist"; 
          $Return['color'] = 'orange'; 
        } else {
             if ($_REQUEST['edit_id']!="") {
                $Return['error'] = "Updated Successfully";
                $Return['color'] = 'green';
                $Return['status'] = '1';
              }
           else {
                $Return['error'] = "Inserted Successfully";
                $Return['color'] = 'green';
                $Return['status'] = '1';
          }
      }
    } else {
		    if ($_REQUEST['first_name']=="") {
          $Return['error'] = 'First Name field is required!';
            $Return['color'] = 'orange';
        }
        else if ($_REQUEST['last_name']=="") {
          $Return['error'] = 'Last Name field is required!';
          $Return['color'] = 'orange';
        }
        else if ($_REQUEST['phone']=="") {
          $Return['error'] = 'Phone Number field is required!';
          $Return['color'] = 'orange';
        }
        else if ($_REQUEST['sex']=="") {
          $Return['error'] = 'Sex field is required!';
          $Return['color'] = 'orange';
        }
        // else if ($_REQUEST['category']=="") {
        //   $Return['error'] = 'Category field is required!';
        //   $Return['color'] = 'orange';
        // }
        else if ($_REQUEST['password']=="") {
          $Return['error'] = 'Password field is required!';
          $Return['color'] = 'orange';

        }else if (strlen($_REQUEST['password']) <= 5) {
                $Return['error'] = 'Password Must Be At Least 6 Characters';
                $Return['color'] = 'orange';
        }
        else if ($_REQUEST['password1']=="") {
          $Return['error'] = 'Confirm Password field is required!';
          $Return['color'] = 'orange';
        } 
        else if ($_REQUEST['password'] != $_REQUEST['password1']) {
          $Return['error'] = 'Password And Confirm Password Is Not Match';
          $Return['color'] = 'orange';
        }
        else if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
          $Return['error'] = "Invalid email format"; 
          $Return['color'] = 'orange'; 
        } else if ($mail==0) {
          $Return['error'] = "Mail already exist"; 
          $Return['color'] = 'orange'; 
        } else {
                 if ($_REQUEST['edit_id']!="") {
                    $Return['error'] = "Updated Successfully";
                    $Return['color'] = 'green';
                    $Return['status'] = '1';
                  }
               else {
            				$Return['error'] = "Inserted Successfully";
                    $Return['color'] = 'green';
                		$Return['status'] = '1';
      			}
          }
    }
    echo json_encode($Return);
	}

   public function add_new_user() {
    if ($this->session->userdata('name')=="") {
      redirect("../backend/");
    } 
    if ($_REQUEST['edit_id']!="") {
      $result = $this->User_Model->update($_REQUEST,$_REQUEST['edit_id']);
      if ($_FILES['Img']['name']!="") {
        handle_user_profile_image_upload($_REQUEST['edit_id']);
      }
      $description = 'Existing user details updated [id:'.$_REQUEST['edit_id'].']';
      AdminlogActivity($description);
      redirect('../backend/users');
      } else {
      
      $user_id = $this->User_Model->insert($_REQUEST);
      if ($user_id!="") {
        handle_user_profile_image_upload($user_id);
        $description = 'New user added [id:'.$user_id.']';
        AdminlogActivity($description);
      }
      redirect('../backend/users');
    }
  }
    
   public function users_list_table() {
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    if (isset($_REQUEST['filter'])) {
      $filter = $_REQUEST['filter'];
    } else {
      $filter = "1";
    }
       
    $users = $this->User_Model->select($filter);
    foreach($users->result() as $key => $r) {
        if ($r->Img!="") {
            $img_path = base_url()."uploads/user_profile_pic/".$r->id."/thumb_".$r->Img."";
             } else {
            $img_path = base_url()."assets/images/user/1.png";
        }
        $usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users','');
        if($usersmenu[0]->edit!=0) {
            $edit = '<a href="users/new_user?edit_id='.$r->id.'" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        }else{
            $edit="";
        }
        if($usersmenu[0]->delete!=0)  {
            $permission = '<a href="#" onclick="deletefun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-ban red" aria-hidden="true"></i></a>';
        }else{
            $permission="";
        }
        $data[] = array(
              $key+1,
              '<span class="list-img"><img src="'.$img_path.'" alt=""></span>',
              '<a href="#"><span class="list-enq-name">'.$r->First_Name." ".$r->Last_Name.'</span><span class="list-enq-city">'.$r->City.", ".$r->Country.'</span></a>',
              $r->Phone_Num,
              $r->Email,
              $r->role_name,
              $edit,
              $permission,
        
          );
      }
      $output = array(
       "draw" => $draw,
       "recordsTotal" => $users->num_rows(),
       "recordsFiltered" => $users->num_rows(),
       "data" => $data
      );
    echo json_encode($output);
    exit();
  }
  public function delete_user() {
      $result = $this->User_Model->delete_user($_REQUEST['delete_id']);
      if ($result==true) {
        $Return['error'] = "Deleted Successfully";
            $Return['color'] = 'green';
            $Return['status'] = '1';
            $description = 'Existing user has been deleted [id:'.$_REQUEST['delete_id'].']';
            AdminlogActivity($description);
      } else {
        $Return['error'] = "Deleted Unsuccessfully!";
            $Return['color'] = 'red';
      }
      echo json_encode($Return);
  }
  public function userspermission() {
    $result = $this->User_Model->users_permission($_REQUEST);
    echo json_encode("success");
  }
}

?>
