<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

 class Finance extends MY_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
	    $this->load->helper('html');
		$this->load->model("Finance_Model");
	    $this->load->model('Company_Model');
		$this->load->model("List_Model");
	    $this->load->helper('upload');
	    $this->load->helper('common');
	    $this->load->library('email');
        $this->load->helper('manuallog');
	}

    public function company() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $compdata['view'] = $this->Company_Model->company_getdata();
        $this->load->view('backend/finance/company',$compdata);
    }
    public function finance_account(){
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        if ($this->session->userdata('account')!="") {
          $_REQUEST['id'] = $this->session->userdata('account');
          redirect('../backend/finance/account_group');
        } else {
            $compdata['view'] = $this->Company_Model->company_getdata();
            $this->load->view('backend/finance/account_group',$compdata);
        }
       
    }
    public function account_group(){
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
       if ($this->session->userdata('account')!="") {
          $_REQUEST['id'] = $this->session->userdata('account');
       }
        $strGroupId = "";
        $rowsSub = array();
    	if ($_REQUEST['id']!="") {
            $this->session->set_userdata('account', $_REQUEST['id']);
            $data['new_id'] = $this->Company_Model->group_max_id();
    		$data['view'] = $this->Company_Model->company_tree_data($_REQUEST['id']);
            $data['view_accounts'] = $this->Company_Model->account_group_tree($_REQUEST['id']);
            if (count($data['view_accounts']) > 0) {
                foreach ($data['view_accounts'] as $key => $value) {
                    $data['sub_accounts1'][$key] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value->Fag_ID);
                    foreach ($data['sub_accounts1'][$key] as $key1 => $value1) {
                        $data['sub_accounts2'][$key][$key1] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value1->Fag_ID);
                        if (count($data['sub_accounts2'][$key][$key1]) > 0) {
                            foreach ($data['sub_accounts2'][$key][$key1] as $key2 => $value2) {
                                $data['sub_accounts3'][$key][$key1][$key2] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value2->Fag_ID);
                                    if (count($data['sub_accounts3'][$key][$key1][$key2]) > 0) {
                                        foreach ($data['sub_accounts3'][$key][$key1][$key2] as $key3 => $value3) {
                                            $data['sub_accounts4'][$key][$key1][$key2][$key3] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value3->Fag_ID);
                                            if (count($data['sub_accounts4'][$key][$key1][$key2][$key3]) > 0) {
                                                foreach ($data['sub_accounts4'][$key][$key1][$key2][$key3] as $key4 => $value4) {
                                                    $data['sub_accounts5'][$key][$key1][$key2][$key3][$key4] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value4->Fag_ID);
                                                    if (count($data['sub_accounts5'][$key][$key1][$key2][$key3][$key4]) > 0) {
                                                        foreach ($data['sub_accounts5'][$key][$key1][$key2][$key3][$key4] as $key5 => $value5) {
                                                            $data['sub_accounts6'][$key][$key1][$key2][$key3][$key4][$key5] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value5->Fag_ID);
                                                            if (count($data['sub_accounts6'][$key][$key1][$key2][$key3][$key4][$key5]) > 0) {
                                                                foreach ($data['sub_accounts6'][$key][$key1][$key2][$key3][$key4][$key5] as $key6 => $value6) {
                                                                    $data['sub_accounts7'][$key][$key1][$key2][$key3][$key4][$key5][$key6] = $this->Company_Model->sub_account_group_tree($_REQUEST['id'],$value6->Fag_ID);
                                                                    if (count($data['sub_accounts7'][$key][$key1][$key2][$key3][$key4][$key5][$key6]) > 0) {
                                                                        foreach ($data['sub_accounts7'][$key][$key1][$key2][$key3][$key4][$key5][$key6] as $key7 => $value7) {

                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                }
                            }
                        }
                    }
                   
                }
            }
            $this->load->view('backend/finance/account_group_cmpny',$data);
    	} else{
            redirect("../backend/finance/finance_head");
    	}
    }
	public function finance_head(){
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        if ($this->session->userdata('account')!="") {
          $_REQUEST['id'] = $this->session->userdata('account');
          redirect('../backend/finance/account_head');
        } else {
        	$compdata['view'] = $this->Company_Model->company_getdata();
            $this->load->view('backend/finance/account_head',$compdata);
      	}
    }
    public function account_head(){
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        if ($this->session->userdata('account')!="") {
          $_REQUEST['id'] = $this->session->userdata('account');
        }
        $strGroupId = "";
        $strSubGroupId = "";
        $rowsSub = array();
        if ($_REQUEST['id']!="") {
            $this->session->set_userdata('account', $_REQUEST['id']);
            $data['view'] = $this->Company_Model->company_tree_data($_REQUEST['id']);
            $data['view4'] = $this->Company_Model->sub_branch();
            $data['account_group_list'] = $this->Company_Model->account_group_list($_REQUEST['id']);
            $data['account_head_list'] = $this->Company_Model->account_head_list($_REQUEST['id']);
            $data['Category'] = array('0'=>'Normal','1' => 'Supplier payment','2' => 'Bank Deposit','3' => 'Purchase Head','4'=>'Customer Receipt');
            $data['view_accounts'] = $this->Company_Model->account_head_tree($_REQUEST['id']);
            if (count($data['view_accounts']) > 0) {
                foreach ($data['view_accounts'] as $key => $value) {
                    if ($strGroupId != $value->GroupID &&  $value->GroupParentID == "0") {
                        $data['view_accounts_branch'][] = $this->Company_Model->account_group_branch($value->GroupID);
                        $data['account_group_parent'][$key] = $this->Company_Model->account_group_parent($value->GroupID);
                        if (count($data['account_group_parent'][$key]) > 0) {
                            foreach ($data['account_group_parent'][$key] as $key1 => $value1) {
                               if ($strSubGroupId != $value1->GroupID && $value1->GroupParentID != 0) {
                                   $data['account_group_sub_branch'][$key][$key1] = $this->Company_Model->account_group_sub_branch($value1->GroupID);
                               }
                            }
                        }

                    }
                }
            }
            $this->load->view('backend/finance/account_head_cmpny',$data);
        }else{
            redirect("../backend/finance/finance_account");
        }
    }
	public function company_add() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        if ($_REQUEST['id']=="") {
	     $data = $this->Company_Model->insert_new_company($_REQUEST);
	     redirect("../backend/finance/company?n");
	    }else{
	      	$data = $this->Company_Model->insert_update_company($_REQUEST);
	      	redirect("../backend/finance/company?u");
	    }
	      
	}
	public function copmany_select() {
        $compdata = $this->Company_Model->company_select_getdata($_REQUEST['id']);
        echo json_encode($compdata[0]);
    }
    public function copmany_dlete() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $compdata = $this->Company_Model->delete_company($_REQUEST['id']);
        redirect("../backend/finance/company?d");
    }
    public function head_add() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        if ($_REQUEST['group_id']!="") {
          $data = $this->Company_Model->update_head($_REQUEST);
        }else{
          $data['new_id'] = $this->Company_Model->head_max_id();
          $data = $this->Company_Model->insert_new_head($_REQUEST,$data['new_id']);
        }
        redirect("../backend/finance/account_head?id=".$_REQUEST['company_id']);
	}
	public function head_select() {
        $compdata = $this->Company_Model->head_select_getdata($_REQUEST['id']);
        $compdata[0]->date = date("Y-m-d", strtotime($compdata[0]->Fah_OpeningDate)); 
        echo json_encode($compdata);
    }
    public function delete_head() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data = $this->Company_Model->detete_head($_REQUEST);
        redirect("../backend/finance/account_head?id=".$_REQUEST['company_id']);
    }
    public function group_select() {
        $compdata = $this->Company_Model->group_select_getdata($_REQUEST['id']);
        echo json_encode($compdata);
    }
    public function group_add_update() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        if ($_REQUEST['group_id']!="") {
          $data = $this->Company_Model->update_group($_REQUEST);
        } else {
          $data['new_id'] = $this->Company_Model->group_max_id();
          $data = $this->Company_Model->insert_new_group($_REQUEST,$data['new_id']);
        }
        redirect("../backend/finance/account_group?id=".$_REQUEST['company_id']);
    }
    public function delete_group() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data = $this->Company_Model->detete_group($_REQUEST);
        redirect("../backend/finance/account_group?id=".$_REQUEST['company_id']);
    }
    public function voucher_type() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $this->load->view('backend/finance/voucher_type');
    }
    public function voucher_type_add() {
        if ($_REQUEST['voucher_id']!="") {
            $data = $this->Company_Model->voucher_type_update($_REQUEST);
        } else {
            $data = $this->Company_Model->voucher_type_add($_REQUEST);
        }
        echo json_encode(true);
    }
    public function voucher_type_list() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data = array();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $voucher_type_list = $this->Company_Model->voucher_type_list();
        
        foreach($voucher_type_list->result() as $key => $r) {
            if ($r->Fvt_Disable=="1") {
                $status = '<span class="text-success">Active</span>';
            } else {
                $status = '<span class="text-danger">Inactive</span>';
            }
            $data[] = array(
                $key+1,
                $r->Fvt_TypeName,
                $r->Fvt_NoStatFrom,
                $status,
                '<a href="#" onclick="edit_voucher_type_fun('.$r->Fvt_ID.');" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="#" onclick="delete_voucher_type_fun('.$r->Fvt_ID.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red fa fa-trash-o" aria-hidden="true"></i></a>',
            );
        }
        $output = array(
            "draw" => $draw,
             "recordsTotal" => $voucher_type_list->num_rows(),
             "recordsFiltered" => $voucher_type_list->num_rows(),
             "data" => $data
        );
      echo json_encode($output);
      exit();
    }
    public function voucher_type_delete() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $result = $this->Company_Model->voucher_type_delete($_REQUEST['delete_id']);
        if ($result==true) {
            $Return['error'] = "Deleted Successfully";
            $Return['color'] = 'green';
            $Return['status'] = '1';
        } else {
            $Return['error'] = "Deleted Unsuccessfully!";
            $Return['color'] = 'red';
        }
        echo json_encode($Return);
    }
    public function voucher_type_detail_get() {
        $data = $this->Company_Model->voucher_type_detail_get($_REQUEST['id']);
        echo json_encode($data);
    }
    public function voucher_entry() {
        $voucher_type_list = $this->Company_Model->voucher_type_list();
        $data['voucher_type'] = $voucher_type_list->result();
        $data['main_account_head'] = $this->Company_Model->account_head_list("3");
        $this->load->view('backend/finance/voucher_entry',$data);
    }
    public function sub_accounts_get() {
        $sub_accounts_get = $this->Company_Model->sub_accounts_get($_REQUEST['id']);
        echo json_encode($sub_accounts_get);
    }
    public function voucher_entry_add() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data = $this->Company_Model->voucher_entry_add($_REQUEST);
        redirect("../backend/finance/voucher_entry");
    }
    public function financial_transaction() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $voucher_type_list = $this->Company_Model->voucher_type_list();
        $data['voucher_type'] = $voucher_type_list->result();
        $data['main_account_head'] = $this->Company_Model->account_head_list("3");
        $this->load->view('backend/finance/fin_transaction',$data);
    }
    public function financial_transaction_list() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data = array();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $from_date = "";
        if (isset($_REQUEST['from_date'])) {
           $from_date = $_REQUEST['from_date'];
        }
        $to_date = "";
        if (isset($_REQUEST['to_date'])) {
           $to_date = $_REQUEST['to_date'];
        }
        $account = "";
        if (isset($_REQUEST['account'])) {
           $account = $_REQUEST['account'];
        }
        $voucher = "";
        if (isset($_REQUEST['voucher'])) {
           $voucher = $_REQUEST['voucher'];
        }
        $financial_transaction_list = $this->Company_Model->financial_transaction_list($_REQUEST['filter'],$from_date,$to_date,$account,$voucher);
        // print_r($financial_transaction_list->result());
        foreach($financial_transaction_list->result() as $key => $r) {
            $data[] = array(
                $key+1,
                $r->Fve_Date,
                "<strong class='text-bold text-primary'>".$r->tah2_Fah_Name."</strong>",
                $r->Fvt_TypeName,
                $r->Fvt_Numbering,
                $r->Fve_Amount,
                $r->Fve_Amount,
                $r->Fve_ChequeNo,
                $r->Fve_ChequeDate,
                $r->Fve_ByUser,
                $r->Fve_Description,
                '<a href="#" onclick="edit_voucher_entry_fun('.$r->Fve_GroupID.');" data-toggle="modal" data-target="#fin_acc_modal" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="#" onclick="delete_voucher_entry_fun('.$r->Fve_GroupID.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red fa fa-trash-o" aria-hidden="true"></i></a>',
            );
        }
        $output = array(
            "draw" => $draw,
             "recordsTotal" => $financial_transaction_list->num_rows(),
             "recordsFiltered" => $financial_transaction_list->num_rows(),
             "data" => $data
        );
      echo json_encode($output);
      exit();
    }
    public function financial_transaction_modal() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $voucher_type_list = $this->Company_Model->voucher_type_list();
        $data['voucher_type'] = $voucher_type_list->result();
        $data['main_account_head'] = $this->Company_Model->account_head_list("3");
        $data['view'] = $this->Company_Model->financial_transaction_data_get($_REQUEST['group_id']);
        $this->load->view('backend/finance/fin_tansaction_modal',$data);
    }
    public function voucher_entry_update() {
        $data = $this->Company_Model->voucher_entry_update($_REQUEST);
        echo json_encode(true);
    }
    public function voucher_account_update() {
        $data = $this->Company_Model->voucher_account_update($_REQUEST);
        echo json_encode($data);
    }
    public function financial_transaction_delete() {
        $data = $this->Company_Model->voucher_entry_delete($_REQUEST['delete_id']);
        if ($data==true) {
            $Return['error'] = "Deleted Successfully";
            $Return['color'] = 'green';
            $Return['status'] = '1';
            $Return['table'] = 'fin_transaction_table';
        } else {
            $Return['error'] = "Deleted Unsuccessfully!";
            $Return['color'] = 'red';
            $Return['table'] = 'fin_transaction_table';
        }
        echo json_encode($Return);
    }
    public function voucher_settings() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $voucher_type_list = $this->Company_Model->voucher_type_list();
        $data['voucher_type'] = $voucher_type_list->result();
        $account_head = $this->Company_Model->account_head_list("3");
        foreach ($account_head as $key => $value) {
            $insert = $this->Company_Model->voucher_settings_insert($value->Fah_ID);
        }
        $voucher_settings_list = $this->Company_Model->voucher_settings_list();
        $data['voucher_settings_list'] = $voucher_settings_list->result();
        $this->load->view('backend/finance/voucher_settings',$data);
    }
    public function voucher_settings_list() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data = array();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $voucher_settings_list = $this->Company_Model->voucher_settings_list();
        foreach($voucher_settings_list->result() as $key => $r) {
            if ($_REQUEST['filter']==$r->Vtl_FvtID) {
               if ($r->Vtl_AllowDr==0) {
                    $allowdr = '<div class="switch">
                            <label>
                              <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs">
                              <span class="lever"></span>
                            </label>
                          </div>';
                } else {
                    $allowdr = '<div class="switch">
                                <label>
                                  <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs" checked>
                                  <span class="lever"></span>
                                </label>
                              </div>';
                }
                if ($r->Vtl_AllowCr==0) {
                    $allowcr = '<div class="switch">
                                <label>
                                  <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs">
                                  <span class="lever"></span>
                                </label>
                              </div>';
                } else {
                    $allowcr = '<div class="switch">
                                <label>
                                  <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs" checked>
                                  <span class="lever"></span>
                                </label>
                              </div>';
                }
            } else {
                $allowdr = '<div class="switch">
                            <label>
                              <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs">
                              <span class="lever"></span>
                            </label>
                          </div>';
                $allowcr = '<div class="switch">
                                <label>
                                  <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs">
                                  <span class="lever"></span>
                                </label>
                              </div>';
            }
            
            $data[] = array(
                $r->Fah_Name.'<input type="hidden" name="voc_set_id['.$key.']" value="'.$r->Vtl_ObjectID.'"/>',
                $allowdr,
                $allowcr,
            );
        }
        $output = array(
            "draw" => $draw,
             "recordsTotal" => $voucher_settings_list->num_rows(),
             "recordsFiltered" => $voucher_settings_list->num_rows(),
             "data" => $data
        );
      echo json_encode($output);
      exit();
    }
    public function voucher_settings_update() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        foreach ($_REQUEST['voc_set_id'] as $key => $value) {
            $voc_set_id[$key] =  $value;
            if (isset($_REQUEST['voc_set_dr'][$key])) {
                $allowdr = '1';
            } else {
                $allowdr = '0';
            }
            if (isset($_REQUEST['voc_set_cr'][$key]) && $_REQUEST['voc_set_cr'][$key]!="") {
                $allowcr = '1';
            } else {
                $allowcr = '0';
            }

            $update = $this->Company_Model->voucher_settings_update($_REQUEST['voc_set_id'][$key],$_REQUEST['voucher_type_id'], $allowdr,$allowcr);
        }
        redirect("../backend/finance/voucher_settings?filter=".$_REQUEST['voucher_type_id']);
    }
    public function opening_balance() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data['account_head'] = $this->Company_Model->account_head_list_with_child("3");
        $this->load->view('backend/finance/opening_balance',$data);
    }
    public function opening_balance_update() {
        if ($_REQUEST['bal_id']!="") {
            $data = $this->Company_Model->opening_balance_update($_REQUEST);
            echo json_encode('update');
        } else {
            $data = $this->Company_Model->opening_balance_insert($_REQUEST);
            echo json_encode($data);
        }
    }
    public function opening_balance_list() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }

        $data = array();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $opening_balance_list = $this->Company_Model->opening_balance_list($_REQUEST['filter']);
        foreach ($opening_balance_list->result() as $key => $r) {
            $child_name[$key] = $this->Company_Model->opening_balance_child_name_get($r->Fob_FahID,$r->Fob_ChildID);
            $data[] = array(
                $key+1,
                $child_name[$key],
                $r->Fob_OpenBal,
                $r->Fob_OpenDate,
                '<a href="#" onclick="edit_opening_balance_fun('.$r->Fob_ID.');" data-toggle="modal" data-target="#fin_acc_modal" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="#" onclick="delete_opening_balance_fun('.$r->Fob_ID.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red fa fa-trash-o" aria-hidden="true"></i></a>',
            );
        }
        $output = array(
            "draw" => $draw,
             "recordsTotal" => $opening_balance_list->num_rows(),
             "recordsFiltered" => $opening_balance_list->num_rows(),
             "data" => $data
        );
      echo json_encode($output);
      exit();
    }
    public function opening_balance_edit() {
        $data =  $this->Company_Model->opening_balance_details($_REQUEST['id']);
        $nice_date =  date("Y-m-d", strtotime($data[0]->Fob_OpenDate)); 
        $output = array(
                        'bal_id' => $data[0]->Fob_ID,
                        'head' => $data[0]->Fob_FahID,
                        'child' => $data[0]->Fob_ChildID,
                        'balance' => $data[0]->Fob_OpenBal,
                        'deb_credit' => $data[0]->Fob_IsDebit,
                        'date' => $nice_date, );
        echo json_encode($output);
    }
    public function cost_center() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $data['cost_center'] = $this->Company_Model->cost_center_list();
        $data['main_account_head'] = $this->Company_Model->account_head_list("3");
        $data['max_id'] = $this->Company_Model->cost_center_max_id();
        $this->load->view('backend/finance/cost_center',$data);
    }
    public function company_cost_center(){
        $companydata = $this->Company_Model->company_cost_center_getdata($_REQUEST['id']);
        echo json_encode($companydata[0]);

    }
    public function ledger() {
        $data['main_account_head'] = $this->Company_Model->account_head_list("3");
        $data['cost_center'] = $this->Company_Model->cost_center_list();
        $this->load->view('backend/finance/ledger',$data);
    }
    public function ledger_list() {
        $data = array();
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $debit = array();
        $credit = array();
        $main_head = $_REQUEST['head'];
        if (isset($_REQUEST['child']) && $_REQUEST['child']!="" && $_REQUEST['child']!="null") {
            $child_head = $_REQUEST['child'];
        } else{
            $child_head = "";
        }
        $cost_center = $_REQUEST['cost'];
        $from_date = date('d-m-Y', strtotime($_REQUEST['from_date']));
        $to_date = date('d-m-Y', strtotime($_REQUEST['to_date']));

        $ledger_from_view = $this->Company_Model->ledger_view_from_details($main_head,$child_head,$from_date,$to_date,$cost_center);
        foreach ($ledger_from_view->result() as $key => $r) {
            $particular[$key] = $this->Company_Model->particular_from_details($r->Fve_GroupID);
            $debit[$key] = $r->Fve_Amount;
            $data[] = array(
                date("d-M-Y", strtotime($r->Fve_Date)), 
                "To ".$particular[$key],
                $r->Fve_Amount,
                '',
                $r->Fve_Description,
                $r->Fve_ChequeNo,
                date("d-M-Y", strtotime($r->Fve_ChequeDate)), 
                $r->Fve_ReceiptNo,
                $r->Fvt_TypeName.":".$r->Fve_VoucherType
            );
        }
        $transactionledger_from_view = $this->Company_Model->transactionledger_view_to_details($main_head,$child_head,$_REQUEST['from_date'],$_REQUEST['to_date'],$cost_center);
        foreach ($transactionledger_from_view->result() as $key => $r) {
            $particular[$key] =  $this->Company_Model->particular_from_Transactiondetails($r->Fte_FahID,$r->Fte_ChildID);
            $debit[$key] = $r->Fte_DrAmt;
            $data[] = array(
                date("d-M-Y", strtotime($r->Fte_Date)), 
                "To ".$particular[$key],
                $r->Fte_DrAmt,
                '',
                $r->Fte_Desc,
                '',
                '', 
                '',
                ''
            );
        }


        $ledger_to_view = $this->Company_Model->ledger_view_to_details($main_head,$child_head,$from_date,$to_date,$cost_center);
        foreach ($ledger_to_view->result() as $key => $r) {
            $particular[$key] = $this->Company_Model->particular__to_details($r->Fve_GroupID);
            $credit[$key] = $r->Fve_Amount;
            $data[] = array(
                date("d-M-Y", strtotime($r->Fve_Date)), 
                "By ".$particular[$key],
                '',
                $r->Fve_Amount,
                $r->Fve_Description,
                $r->Fve_ChequeNo,
                date("d-M-Y", strtotime($r->Fve_ChequeDate)), 
                $r->Fve_ReceiptNo,
                $r->Fvt_TypeName.":".$r->Fve_VoucherType
            );
        }

        $transactionledger_to_view = $this->Company_Model->transactionledger_view_to_details($main_head,$child_head,$_REQUEST['from_date'],$_REQUEST['to_date'],$cost_center);
        foreach ($transactionledger_to_view->result() as $key => $r) {
            $particular[$key] = $this->Company_Model->particular_from_Transactiondetails($r->Fte_FahID,$r->Fte_ChildID);
            $credit[$key] = $r->Fte_CrAmt;
            $data[] = array(
                date("d-M-Y", strtotime($r->Fte_Date)), 
                "By ".$particular[$key],
                '',
                $r->Fte_CrAmt,
                $r->Fte_Desc,
                '',
                '', 
                '',
                '',
            );
        }

        if ($child_head!="") {
            $childopening_balance = $this->Company_Model->child_opening_balance_in_ledger($main_head,$child_head);
            $opening_date = $childopening_balance['openingDate'];
            $is_debit = $childopening_balance['isdebit'];
            $open_bal = $childopening_balance['openingBalance'];
        } else {
            $opening_balance = $this->Company_Model->opening_balance_in_ledger($main_head);
            $opening_date = $opening_balance[0]->Fah_OpeningDate;
            $is_debit = $opening_balance[0]->Fah_IsDebit;
            $open_bal = $opening_balance[0]->Fah_OpeningBal;
        }
        
        $from_open_date = date("d-m-Y", strtotime($opening_date));
        $to_open_date =  date('d-m-Y', strtotime($to_date .' -1 day'));

        if ($is_debit==0) {
            $opening_balance_amount = $this->Company_Model->opening_balance_in_cr_dr_ledger($main_head,$child_head,$from_open_date,$to_open_date,"dr",$cost_center);

            $debit_open = $open_bal+$opening_balance_amount[0]->amount;
            $credit_open = '';
        } else {
            $opening_balance_amount = $this->Company_Model->opening_balance_in_cr_dr_ledger($main_head,$child_head,$from_open_date,$to_open_date,"cr",$cost_center);
            $debit_open = '';
            $credit_open = $open_bal+$opening_balance_amount[0]->amount;
        }
        // print_r($opening_balance_amount);
        // exit();
        $dr_total = array_sum($debit)+$debit_open;
        $cr_total = array_sum($credit)+$credit_open;
        if ($dr_total > $cr_total) {
            $dr_net = $dr_total-$cr_total;
            $cr_net = "";
        } else {
            $dr_net = "";
            $cr_net = $cr_total-$dr_total;
        }
        $data[] = array(
                '', 
                '<strong>Opening Balance:</strong>',
                $debit_open=="0" ? "0.00" : $debit_open,
                $credit_open=="0" ? "0.00" : $credit_open,
                '',
                '',
                '',
                '',
                '',
            );
        $data[] = array(
                '', 
                '<strong>Current Total:</strong>',
                array_sum($debit)=="0" ? "0.00" : array_sum($debit),
                array_sum($credit)=="0" ? "0.00" : array_sum($credit),
                '',
                '',
                '',
                '',
                '',
            );


        $data[] = array(
                '', 
                '<strong>Closing Balance:</strong>',
                $dr_net,
                $cr_net,
                '',
                '',
                '',
                '',
                '',
            );
        $output = array(
            "draw" => $draw,
             "recordsTotal" => $ledger_from_view->num_rows()+$ledger_to_view->num_rows()+$transactionledger_to_view->num_rows(),
             "recordsFiltered" => $ledger_from_view->num_rows()+$ledger_to_view->num_rows()+$transactionledger_to_view->num_rows(),
             "data" => $data
        );
      echo json_encode($output);
      exit();

    }
    public function cost_center_dlete() {
        if ($this->session->userdata('name')=="") {
            redirect("/logout");
    }
        $companydata = $this->Company_Model->delete_cost_center($_REQUEST['id']);
        redirect("../backend/finance/cost_center");
    }
    public function cost_center_save(){
        $max_id = $this->Company_Model->cost_center_max_id();
        $data= $this->Company_Model->cost_center_update($_REQUEST,$max_id);
        redirect("../backend/finance/cost_center");
    }
}	
