<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class Company_Model extends CI_Model {

    public function __construct() {
          parent::__construct();
          $this->load->database();
    }
    public function company_getdata() {
    	$this->db->select('*');
    	$this->db->from('tbl_fin_company');
    	$this->db->where('delflg',1);
    	$this->db->order_by('Com_ID','desc');
        $compdata=$this->db->get();
    	return $compdata->result();
    }
    public function company_select_getdata($id) {
      $this->db->select('*');
      $this->db->from('tbl_fin_company');
      $this->db->where('delflg',1);
      $this->db->where('Com_ID',$id);
      $this->db->order_by('Com_ID','desc');
        $compdata=$this->db->get();
      return $compdata->result();
    }
    public function insert_new_company($data) {
      $datas= array(
                'Com_Name'        =>$data['c_name'],
                'Com_Address'     =>$data['c_address'],
                'Com_TinNo'       =>$data['c_tin'],
                'Com_FinYearFrom' =>$data['date-picker'],
                'Com_City'        =>$data['c_city'],
                'Com_State'       =>$data['c_state'],
                'Com_PIN'         =>$data['c_pin'],
                'Com_OfficeNo'    =>$data['c_office_num'],
                'Com_Fax'         =>$data['c_fax'],
                'Com_Mob1'        =>$data['c_mob1'],
                'Com_Mob2'        =>$data['c_mob2'],
                'Com_MailID'      =>$data['c_mail'],
                'Com_Type'        =>$data['firm'],
                'Com_CST'         =>$data['cst_num'],
                'Com_CEN'         =>$data['c_cen'],
                'Com_SysDate'     => date('Y-m-d h:i:s a', time()),

              );
          $this->db->insert('tbl_fin_company',$datas);
          $company_id = $this->db->insert_id();
      return $company_id;
     }
    public function insert_update_company($data) {
    $datas= array(
              'Com_Name'        =>$data['c_name'],
              'Com_Address'     =>$data['c_address'],
              'Com_TinNo'       =>$data['c_tin'],
              'Com_FinYearFrom' =>$data['date-picker'],
              'Com_City'        =>$data['c_city'],
              'Com_State'       =>$data['c_state'],
              'Com_PIN'         =>$data['c_pin'],
              'Com_OfficeNo'    =>$data['c_office_num'],
              'Com_Fax'         =>$data['c_fax'],
              'Com_Mob1'        =>$data['c_mob1'],
              'Com_Mob2'        =>$data['c_mob2'],
              'Com_MailID'      =>$data['c_mail'],
              'Com_Type'        =>$data['firm'],
              'Com_CST'         =>$data['cst_num'],
              'Com_CEN'         =>$data['c_cen'],
              'Com_SysDate'     => date('Y-m-d h:i:s a', time()),

            );
      $this->db->where('Com_ID',$data['id']);
      $this->db->update('tbl_fin_company',$datas);
    return $company_id;
  }
  public function delete_company($data){
    $datas= array(
              'delflg' => 0,);
    $this->db->where('Com_ID',$data);
    $this->db->update('tbl_fin_company',$datas);
    return true;
  }
  public function company_tree_data($company) {
    $this->db->select('*');
    $this->db->from('tbl_fin_company');
    $this->db->where('delflg',1);
    $this->db->where('Com_ID',$company);
      $compdata=$this->db->get();
    return $compdata->result();
    }
  public function company_tree_data_branch($company) {
    $this->db->select('tbl_fin_company.*,tbl_fin_accountgroup.*');
    $this->db->from('tbl_fin_company');
    $this->db->join('tbl_fin_accountgroup', 'tbl_fin_accountgroup.Fag_Object_ID = tbl_fin_company.Com_ID', 'left');
    $this->db->where('tbl_fin_company.delflg',1);
    $this->db->where('tbl_fin_company.Com_ID',$company);
      $compdata=$this->db->get();
    return $compdata->result();
  }
  public function company_tree_data_sub_branch($company) {
    $this->db->select('Fag_ID AS f_id, Fag_ParentID AS p_id,Fag_Name AS names');
    $this->db->from('tbl_fin_accountgroup');
    // $this->db->where('Fag_ID','Fag_ParentID');
    $this->db->where('Fag_ParentID',$company);
    $this->db->order_by('Fag_ID','desc');
      $compdata=$this->db->get();
    return $compdata->result();
  }
  public function sub_branch() {
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->order_by('Fah_ID','desc');
      $compdata=$this->db->get();
    return $compdata->result();
  }
  public function branch_select_getdata($id) {
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ParentID',$id);
    $this->db->order_by('Fah_ID','desc');
      $compdata=$this->db->get();
    return $compdata->result();
  }
  public function p_grp_names() {
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->order_by('Fah_ID','desc');
      $compdata=$this->db->get();
    return $compdata->result();
  }
  public function insert_new_head($data,$id) {
    $nice_date = date('d-m-Y', strtotime( $data['open_date'] ));
    $datas= array(
            'Fah_ID'              => $id,
            'Fah_ComID'           => $data['company_id'],
            'Fah_FagID'           => $data['account_group'],
            'Fah_Name'            => $data['group_name'], 
            'Fah_Address'         => $data['address'],
            'Fah_ContactPerson'   => $data['con_person'],
            'Fah_Description'     => $data['description'],
            'Fah_Nature'          => $data['acc_nature'],
            'Fah_Phone'           => $data['phn_no'],
            'Fah_Email'           => $data['email'],
            'Fah_Type'            => $data['acc_type'],
            'Fah_OpeningBal'      => $data['open_bal'],
            'Fah_IsDebit'         => $data['bal_type'],
            'Fah_OpeningDate'     => $nice_date,
            'Fah_Category'        => $data['category'],
            'Fah_ReverseHeadID'   => $data['reverse_head'],
            'Fah_AmountSQL'       => $data['amount_sql'],
            'Fah_DataSQL'         => $data['data_sql'],
            'Fah_TransactionSQL'  => $data['transaction_sql'],
            'Fah_SQLTable'        => $data['ref_table_name'],
            'Fah_SQLID'           => $data['data_id_field'],
            'Fah_SQLName'         => $data['data_name_field'],
          );
    $this->db->insert('tbl_fin_accounthead',$datas);
    $company_id = $this->db->insert_id();
    return $company_id;
  }
  public function update_head($data) {
    $nice_date = date('d-m-Y', strtotime( $data['open_date'] ));
   
    $datas= array(
            'Fah_FagID'         => $data['account_group'],
            'Fah_Name'          => $data['group_name'], 
            'Fah_Address'       => $data['address'],
            'Fah_ContactPerson' => $data['con_person'],
            'Fah_Description'   => $data['description'],
            'Fah_Nature'        => $data['acc_nature'],
            'Fah_Phone'         => $data['phn_no'],
            'Fah_Email'         => $data['email'],
            'Fah_Type'          => $data['acc_type'],
            'Fah_OpeningBal'    => $data['open_bal'],
            'Fah_IsDebit'       => $data['bal_type'],
            'Fah_OpeningDate'   => $nice_date,
            'Fah_Category'      => $data['category'],
            'Fah_ReverseHeadID' => $data['reverse_head'],
            'Fah_AmountSQL'     => $data['amount_sql'],
            'Fah_DataSQL'       => $data['data_sql'],
            'Fah_TransactionSQL'=> $data['transaction_sql'],
            'Fah_SQLTable'      => $data['ref_table_name'],
            'Fah_SQLID'         => $data['data_id_field'],
            'Fah_SQLName'       => $data['data_name_field'],
          );
    $this->db->where('Fah_ID',$data['group_id']);
    $this->db->update('tbl_fin_accounthead',$datas);
    return true;
  }
  public function account_head_tree($companyID) {
    $ExpenseOnly =  "0";
    // $companyID = "3";
    $drop = 'DROP TABLE IF EXISTS
          tblAccountHead';
    $query3 = $this->db->query($drop);
    $drop1 = 'DROP TABLE IF EXISTS
          tblAccountGroup';
    $query3 = $this->db->query($drop1);
    $sql = "CREATE TABLE tblAccountHead (
        GroupID INT(11), 
        GroupName VARCHAR(100),
        GroupParentID INT(11),
        AccountID INT(11),
        AccountName VARCHAR(100),
        AccountDepth INT(11)
        )";
    $query = $this->db->query($sql);

    $sql1 = "CREATE TABLE tblAccountGroup (
        GrpID INT(11), 
        GrpName VARCHAR(100),
        GrpParentID INT(11),
        GrpDepth INT(11)
        )";
    $query1 = $this->db->query($sql1);
    if ($ExpenseOnly==0) {
      $this->db->query('INSERT INTO tblAccountHead SELECT tbl_Fin_AccountGroup.Fag_ID, tbl_Fin_AccountGroup.Fag_Name, tbl_Fin_AccountGroup.Fag_ParentID, tbl_Fin_AccountHead.Fah_ID, tbl_Fin_AccountHead.Fah_Name, tbl_Fin_AccountHead.Fah_Depth  FROM tbl_Fin_AccountHead INNER JOIN tbl_Fin_AccountGroup ON tbl_Fin_AccountGroup.Fag_ID = tbl_Fin_AccountHead.Fah_FagID WHERE tbl_Fin_AccountGroup.Fag_ComID = '.$companyID.'');
    } else {
      $this->db->query('INSERT INTO tblAccountHead SELECT tbl_Fin_AccountGroup.Fag_ID, tbl_Fin_AccountGroup.Fag_Name, tbl_Fin_AccountGroup.Fag_ParentID, tbl_Fin_AccountHead.Fah_ID, tbl_Fin_AccountHead.Fah_Name, tbl_Fin_AccountHead.Fah_Depth FROM tbl_Fin_AccountHead INNER JOIN tbl_Fin_AccountGroup ON tbl_Fin_AccountGroup.Fag_ID = tbl_Fin_AccountHead.Fah_FagID WHERE tbl_Fin_AccountHead.Fah_Nature = 2 AND tbl_Fin_AccountGroup.Fag_ComID ='.$companyID.'');
    }
    if ($ExpenseOnly==0) {
      $this->db->select('Det.Fag_ID');
      $this->db->from('tbl_Fin_AccountGroup Mst');
      $this->db->join('tbl_Fin_AccountGroup Det', 'Mst.Fag_ID = Det.Fag_ParentID', 'inner');
      $where = 'Det.Fag_ID IN (SELECT Fah_FagID FROM tbl_Fin_AccountHead) AND Det.Fag_ParentID NOT IN (SELECT Fah_FagID FROM tbl_Fin_AccountHead) AND Mst.Fag_ComID = '.$companyID.'';
      $this->db->where($where);
      $query_include=$this->db->get();
      $IncludeGroupCursor = $query_include->result();
    } else {
      $this->db->select('Det.Fag_ID');
      $this->db->from('tbl_Fin_AccountGroup Mst');
      $this->db->join('tbl_fin_accountgroup Det', 'Mst.Fag_ID = Det.Fag_ParentID', 'inner');
      $where = 'Det.Fag_ID IN (SELECT Fah_FagID FROM tbl_Fin_AccountHead WHERE Fah_Nature = 2) AND Det.Fag_ParentID NOT IN (SELECT Fah_FagID FROM tbl_Fin_AccountHead WHERE Fah_Nature = 2) AND Mst.Fag_ComID ='.$companyID.'';
      $this->db->where($where);
      $query_include=$this->db->get();

      $IncludeGroupCursor = $query_include->result();
    }
    if (count($IncludeGroupCursor)!=0) {
      foreach ($IncludeGroupCursor as $key => $value) {
         $this->db->select('*');
         $this->db->from('tbl_Fin_AccountGroup');
         $this->db->where('Fag_ID',$value->Fag_ID);
         $IncGrp=$this->db->get();
         $IncGrp_out[$key] = $IncGrp->result();

         
      }
      foreach ($IncGrp_out as $key1 => $value1) {
        $data = array('GrpID' =>  $value1[0]->Fag_ID,
                       'GrpName' => $value1[0]->Fag_Name,
                       'GrpParentID' =>  $value1[0]->Fag_ParentID,
                       'GrpDepth' =>   $value1[0]->Fag_Depth,);
         $this->db->insert('tblAccountGroup',$data);
      }
    }
    $this->db->query('DELETE FROM tblAccountGroup WHERE GrpID IN (SELECT DISTINCT GroupID FROM tblAccountHead)');
   

    $sql_union = 'SELECT GroupID, GroupName, GroupParentID, AccountID, AccountName, AccountDepth
         FROM tblAccountHead GROUP BY GroupID UNION SELECT GrpID, GrpName, GrpParentID, NULL, NULL, GrpDepth
         FROM tblAccountGroup GROUP BY GrpID ORDER BY GroupParentID, GroupName, AccountDepth, AccountName';
    $compdata = $this->db->query($sql_union);
    return $compdata->result();
  }
  public function account_group_branch($GroupID) {
    $sql_union = 'SELECT GroupID, GroupName, GroupParentID, AccountID, AccountName, AccountDepth
                FROM tblAccountHead WHERE  GroupID = '.$GroupID.' UNION SELECT GrpID, GrpName, GrpParentID, NULL, NULL, GrpDepth
                FROM tblAccountGroup  ORDER BY GroupParentID, GroupName, AccountDepth, AccountName';
     $compdata = $this->db->query($sql_union);
    return $compdata->result();
  }
  public function account_group_parent($GroupParentID) {
    $sql_union = 'SELECT GroupID, GroupName, GroupParentID, AccountID, AccountName, AccountDepth
         FROM tblAccountHead WHERE  GroupParentID = '.$GroupParentID.' GROUP BY GroupID UNION SELECT GrpID, GrpName, GrpParentID, NULL, NULL, GrpDepth
         FROM tblAccountGroup GROUP BY GrpID ORDER BY GroupParentID, GroupName, AccountDepth, AccountName';
     $compdata = $this->db->query($sql_union);
    return $compdata->result();
  }
  public function account_group_sub_branch($GroupID) {
    $sql_union = 'SELECT GroupID, GroupName, GroupParentID, AccountID, AccountName, AccountDepth
                FROM tblAccountHead WHERE  GroupID = '.$GroupID.' UNION SELECT GrpID, GrpName, GrpParentID, NULL, NULL, GrpDepth
                FROM tblAccountGroup  ORDER BY GroupParentID, GroupName, AccountDepth, AccountName';
     $compdata = $this->db->query($sql_union);
    return $compdata->result();
  }
  public function account_group_list($company_id) {
    $this->db->select('Fag_ID,Fag_Name');
    $this->db->from('tbl_fin_accountgroup');
    $this->db->where('Fag_ComID',$company_id);
    $this->db->order_by('Fag_Object_ID','desc');
    $query=$this->db->get();
    return $query->result();
  }
  public function account_head_list($company_id) {
    $this->db->select('Fah_ID,Fah_Name');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ComID',$company_id);
    $this->db->order_by('Fah_Object_ID','asc');
    $query=$this->db->get();
    return $query->result();
  }
  public function head_select_getdata($id) {
    $this->db->select('tbl_fin_accounthead.*,tbl_fin_accountgroup.*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->join('tbl_fin_accountgroup', 'tbl_fin_accountgroup.Fag_ID = tbl_fin_accounthead.Fah_FagID', 'left');
    $this->db->where('Fah_ID',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function detete_head($data) {
    $this->db->where('Fah_ID',$data['group_id']);
    $this->db->delete('tbl_fin_accounthead');
    return true;
  }
  public function account_group_tree($company_id) {
    $sql = 'SELECT Fag_ParentID,Fag_Name,Fag_ID FROM tbl_Fin_AccountGroup WHERE Fag_ComID = '.$company_id.'  ORDER BY Fag_Depth,Fag_Name';
    $query = $this->db->query($sql);
    return $query->result();
  }
  public function sub_account_group_tree($company_id,$Fag_ID) {
    $sql = 'SELECT distinct Fag_ParentID,Fag_Name,Fag_ID FROM tbl_Fin_AccountGroup WHERE Fag_ComID = '.$company_id.'  AND Fag_ParentID = '.$Fag_ID.'';
    $query = $this->db->query($sql);
    return $query->result();
  }
  public function group_select_getdata($id) {
    $this->db->select('*');
    $this->db->from('tbl_fin_accountgroup');
    $this->db->join('tbl_fin_accounthead', 'tbl_fin_accounthead.Fah_FagID = tbl_fin_accountgroup.Fag_ID', 'left');
    $this->db->where('Fag_ID',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function update_group($data) {
    if (isset($data['group_disabled'])) {
      $group_disabled = 1;
    } else {
      $group_disabled = 0;
    }
    $datas= array(
            'Fag_ComID'       => $data['company_id'],
            'Fag_Name'     => $data['group_name'],
            'Fag_ParentID' => $data['Parent_group'],
            'Fag_Description' => $data['b_description'],
            'Fag_Disable' => $group_disabled,
          );
    $this->db->where('Fag_ID',$data['group_id']);
    $this->db->update('tbl_fin_accountgroup',$datas);
    return true;
  }
  public function detete_group($data) {
    $this->db->where('Fag_ID',$data['group_id']);
    $this->db->delete('tbl_fin_accountgroup');
    return true;
  }
  public function group_max_id() {
    $this->db->select_max('Fag_ID');
    $this->db->from('tbl_fin_accountgroup');
    $query=$this->db->get();
    $final =  $query->result();
    $max_id =  $final[0]->Fag_ID;
    return $max_id+1;
  }
  public function insert_new_group($data,$id) {
    if (isset($data['group_disabled'])) {
      $group_disabled = 1;
    } else {
      $group_disabled = 0;
    }
    $datas= array(
            'Fag_ID'        => $id,
            'Fag_ComID'     => $data['company_id'],
            'Fag_Name'      => $data['group_name'],
            'Fag_ParentID' => $data['Parent_group'],
            'Fag_Description' => $data['b_description'],
            'Fag_Disable' => $group_disabled,
          );
    $this->db->insert('tbl_fin_accountgroup',$datas);
    return true;
  }
  public function head_max_id() {
    $this->db->select_max('Fah_ID');
    $this->db->from('tbl_fin_accounthead');
    $query=$this->db->get();
    $final =  $query->result();
    $max_id =  $final[0]->Fah_ID;
    return $max_id+1;
  }
  public function voucher_type_add($data) {
    $datas= array(
              'Fvt_TypeName'        =>$data['Voucher_name'],
              'Fvt_Disable'     => $data['disable'],
              'Fvt_Numbering'       =>$data['numbering'],
              'Fvt_NoStatFrom' => $data['starts_from'],
              'Fvt_RestartNo'        =>$data['restarts_on'],
              'Fvt_InitDr'       =>$data['is_debit'],
              'Fvt_DisplayInJournal' => $data['dis_journal'],
            );
        $this->db->insert('tbl_Fin_VoucherType',$datas);
    return true;
  }
  public function voucher_type_list() {
    $this->db->select('*');
    $this->db->from('tbl_Fin_VoucherType');
    $this->db->order_by('Fvt_ID','desc');
    $query=$this->db->get();
    return $query;
  }
  public function voucher_type_delete($id) {
    $this->db->where('Fvt_ID',$id);
    $this->db->delete('tbl_Fin_VoucherType');
    return true;
  }
  public function voucher_type_detail_get($id) {
    $this->db->select('*');
    $this->db->from('tbl_Fin_VoucherType');
    $this->db->where('Fvt_ID',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function voucher_type_update($data) {
    $datas= array(
              'Fvt_TypeName'        => $data['Voucher_name'],
              'Fvt_Disable'         => $data['disable'],
              'Fvt_Numbering'       => $data['numbering'],
              'Fvt_NoStatFrom'      => $data['starts_from'],
              'Fvt_RestartNo'       => $data['restarts_on'],
              'Fvt_InitDr'          => $data['is_debit'],
              'Fvt_DisplayInJournal'=> $data['dis_journal'],
            );
    $this->db->where('Fvt_ID',$data['voucher_id']);
    $this->db->update('tbl_Fin_VoucherType',$datas);
  return true;
  }
  public function sub_accounts_get($id) {
    $final1 = array();
    $data = array();
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ID',$id);
    $query=$this->db->get();
    $final  = $query->result();
    if (count($final) > 0) {
      if ($final[0]->Fah_DataSQL!="NULL" && $final[0]->Fah_DataSQL!="") {
        $sql    = $final[0]->Fah_DataSQL;
        $query1 = $this->db->query($sql);
        $final1 = $query1->result();
      } 
      foreach ($final1 as $key => $value) {
        $Fah_SQLName = $final[0]->Fah_SQLName;
        $Fah_SQLID = $final[0]->Fah_SQLID;
        $data[$key]['name'] = $value->$Fah_SQLName;
        $data[$key]['id'] = $value->$Fah_SQLID;
      }
    }
    return $data;
  }
  public function voucher_entry_add($data) {
    $this->db->select_max('Fve_GroupID');
    $this->db->from('tbl_Fin_VoucherEntry');
    $query1 = $this->db->get();
    $final = $query1->result();
    if (count($final)!="") {
      $group_max = $final[0]->Fve_GroupID;
      $group_id = $group_max+1;
    } else {
      $group_id = 1; 
    }
    if (isset($data['from_sub_account'])) {
      $from_sub_account = $data['from_sub_account'];
    } else {
      $from_sub_account = 0;
    }
    if (isset($data['to_sub_head'])) {
      $to_sub_head = $data['to_sub_head'];
    } else {
      $to_sub_head = 0;
    }
    $newDate = date("d-m-Y", strtotime($data['date']));
    $datas= array(
                'Fve_Date'        => $newDate,
                'Fve_Description'     => $data['narration'],
                'Fve_VoucherType'       =>$data['voucher_type'],
                'Fve_Amount' => $data['amount'],
                'Fve_FrmTransID'        =>$data['from_main_account'],
                'Fve_FrmTransChildID'       =>$from_sub_account,
                'Fve_ByUser' => $_SESSION['name'],
                'Fve_GroupID' => $group_id,
              );
    $this->db->insert('tbl_Fin_VoucherEntry',$datas);
    $datas1= array(
                'Fve_Date'        => $newDate,
                'Fve_Description'     => $data['narration'],
                'Fve_VoucherType'       =>$data['voucher_type'],
                'Fve_Amount' => $data['amount'],
                'Fve_ToTransID' => $data['to_main_head'],
                'Fve_ToTransChildID' => $to_sub_head,
                'Fve_ByUser' => $_SESSION['name'],
                'Fve_GroupID' => $group_id,
              );
    $this->db->insert('tbl_Fin_VoucherEntry',$datas1);
  return true;
  }
  public function financial_transaction_list($filter,$from_date,$to_date,$account,$voucher) {
      if ($filter==5) {
        $real_from_date = date('d-m-Y', strtotime($from_date));
        $real_to_date = date('d-m-Y', strtotime($to_date));
        $where = 'tbl_Fin_VoucherEntry.Fve_Date <= "'.$real_to_date.'" AND tbl_Fin_VoucherEntry.Fve_Date >= "'.$real_from_date.'"';
          $this->db->select('tbl_Fin_VoucherEntry.*,tbl_Fin_VoucherType.*,tah1.Fah_Name as tah1_Fah_Name,tah2.Fah_Name as tah2_Fah_Name');
          $this->db->from('tbl_Fin_VoucherEntry');
          $this->db->join('tbl_Fin_VoucherType','tbl_Fin_VoucherEntry.Fve_VoucherType = tbl_Fin_VoucherType.Fvt_ID','left');
          $this->db->join('tbl_fin_accounthead tah1','tbl_Fin_VoucherEntry.Fve_FrmTransID = tah1.Fah_ID','left');
          $this->db->join('tbl_fin_accounthead tah2','tbl_Fin_VoucherEntry.Fve_ToTransID = tah2.Fah_ID','left');
          $this->db->where($where);
          if ($account!="") {
            $whereor = 'tbl_Fin_VoucherEntry.Fve_FrmTransID = '.$account.' OR tbl_Fin_VoucherEntry.Fve_ToTransID = '.$account.'';
            $this->db->where($whereor);
          } 
          if ($voucher!="") {
            $this->db->where('tbl_Fin_VoucherEntry.Fve_VoucherType', $voucher);
          }
          $this->db->group_by('tbl_Fin_VoucherEntry.Fve_GroupID');
          $query=$this->db->get();
      } else {

        if ($filter==1) {
          $date = date('d-m-Y');
          $where = 'tbl_Fin_VoucherEntry.Fve_Date = "'.$date.'"';
        } else if ($filter==2) {
          $date = date('d-m-Y');
          $date1 = date('d-m-Y', strtotime('-1 week'));
          $where = 'tbl_Fin_VoucherEntry.Fve_Date <= "'.$date.'" AND tbl_Fin_VoucherEntry.Fve_Date >= "'.$date1.'"';
        } else if ($filter==3) {
          $date = date('d-m-Y');
          $date1 = date('d-m-Y', strtotime('-1 day last month'));
          $where = 'tbl_Fin_VoucherEntry.Fve_Date <= "'.$date.'" AND tbl_Fin_VoucherEntry.Fve_Date >= "'.$date1.'"';
        } else {
          $date = date('d-m-Y');
          $where = 'tbl_Fin_VoucherEntry.Fve_Date = "'.$date.'"';
        }

        $this->db->select('tbl_Fin_VoucherEntry.*,tbl_Fin_VoucherType.*,tah1.Fah_Name as tah1_Fah_Name,tah2.Fah_Name as tah2_Fah_Name');
        $this->db->from('tbl_Fin_VoucherEntry');
        $this->db->join('tbl_Fin_VoucherType','tbl_Fin_VoucherEntry.Fve_VoucherType = tbl_Fin_VoucherType.Fvt_ID','left');
        $this->db->join('tbl_fin_accounthead tah1','tbl_Fin_VoucherEntry.Fve_FrmTransID = tah1.Fah_ID','left');
        $this->db->join('tbl_fin_accounthead tah2','tbl_Fin_VoucherEntry.Fve_ToTransID = tah2.Fah_ID','left');
        if ($filter!=4) {
          $this->db->where($where);
        }
          $this->db->group_by('tbl_Fin_VoucherEntry.Fve_GroupID');
        $query=$this->db->get();
      }
    return $query;
  }
  public function financial_transaction_data_get($group_id) {
    $this->db->select('*');
    $this->db->from('tbl_Fin_VoucherEntry');
    $this->db->where('Fve_GroupID',$group_id);
    $query=$this->db->get();
    return $query->result();
  }
  public function voucher_entry_update($data) {
    $cash_bank =  0; 
    $cheque_no = "";
    $cheque_date = " ";
    if (isset($data['cheque_no'])) {
      $cheque_no = $data['cheque_no'];
      $cash_bank= 1;
    }
    if (isset($data['cheque_date'])) {
      $cheque_date =  date("d-m-Y", strtotime($data['cheque_date'])); 
    }
    $newDate = date("d-m-Y", strtotime($data['voucher_date']));
    $datas= array(
                'Fve_Date'        => $newDate,
                'Fve_Description'     => $data['narration'],
                'Fve_VoucherType'       =>$data['voucher_type'],
                'Fve_IsCheque' => $cash_bank,
                'Fve_ChequeNo' => $cheque_no,
                'Fve_ChequeDate' => $cheque_date,
                'Fve_ByUser' => $_SESSION['name'],
                'Fve_CurSysUser' => $_SESSION['name'],
                'Fve_CurDtTime' => date('d-m-Y')
              );
    $this->db->where('Fve_GroupID',$data['voucher_id']);
    $this->db->update('tbl_Fin_VoucherEntry',$datas);
  return true;
  }
  public function voucher_account_update($data) {
    $result = false;
    if (isset($data['dr_account'])) {
      $datas= array(
                  'Fve_FrmTransID'        => $data['dr_account'],
                );
      $this->db->where('Fve_ID',$data['dr_id']);
      $this->db->update('tbl_Fin_VoucherEntry',$datas);
      $result = true;
    }
    if (isset($data['cr_account'])) {
      $datas1= array(
                  'Fve_ToTransID'        => $data['cr_account'],
                );
      $this->db->where('Fve_ID',$data['cr_id']);
      $this->db->update('tbl_Fin_VoucherEntry',$datas1);
      $result = true;
    }
    return $result;
  }
  public function voucher_entry_delete($group_id) {
    $this->db->where('Fve_GroupID',$group_id);
    $this->db->delete('tbl_Fin_VoucherEntry');
    return true;
  }
  public function voucher_settings_list() {
    $this->db->select('tbl_Fin_VoucherTypeLink.*,tbl_fin_accounthead.*');
    $this->db->from('tbl_Fin_VoucherTypeLink');
    $this->db->join('tbl_fin_accounthead','tbl_Fin_VoucherTypeLink.Vtl_FahID = tbl_fin_accounthead.Fah_ID','left');
    return $query=$this->db->get();
  }
  public function voucher_settings_insert($fah_id) {
    $this->db->select('*');
    $this->db->from('tbl_Fin_VoucherTypeLink');
    $this->db->where('Vtl_FahID',$fah_id);
    $query=$this->db->get();
    if(count($query->result())==0) {
      $datas= array(
          'Vtl_FahID'=> $fah_id,
        );
      $this->db->insert('tbl_Fin_VoucherTypeLink',$datas );
    }
    return true;
  }
  public function voucher_settings_update($object_id,$voucher_id,$allowdr,$allowcr) {
      $datas= array(
          'Vtl_FvtID'  => $voucher_id,
          'Vtl_AllowDr'  => $allowdr,
          'Vtl_AllowCr'  => $allowcr,
        );
      $this->db->where('Vtl_ObjectID',$object_id);
      $this->db->update('tbl_Fin_VoucherTypeLink',$datas );
    return true;
  }
  public function account_head_list_with_child($company_id) {
    $this->db->select('Fah_ID,Fah_Name');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ComID',$company_id);
    $this->db->where('Fah_DataSQL !=',"");
    $this->db->where('Fah_DataSQL !=','NULL' );
    $this->db->order_by('Fah_Object_ID','asc');
    $query=$this->db->get();
    return $query->result();
  }
  public function opening_balance_insert($request) {
    $nice_date =  date("d-m-Y", strtotime($request['open_date'])); 
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ID',$request['acc_head']);
    $query=$this->db->get();
    $final  = $query->result();
    $sql = $final[0]->Fah_DataSQL;
    $datas= array(
          'Fob_FahID'  => $request['acc_head'],
          'Fob_ChildID'  => $request['child_acc_head'],
          'Fob_OpenBal'  => $request['open_bal'],
          'Fob_OpenDate'  => $nice_date,
          'Fob_IsDebit' => $request['deb_credit'],
          'Fob_SQLTable' => $sql,
          'Fob_CurSysUser' => $_SESSION['name'],
          'Fob_CurDtTime' => date('Y-m-di:m:s'),
        );
      $this->db->insert('tbl_Fin_AccountOpeningBalance',$datas );
    return true;
  }
  public function opening_balance_list($filter) {
    $this->db->select('*');
    $this->db->from('tbl_Fin_AccountOpeningBalance');
    $this->db->where('Fob_FahID',$filter);
    return $query=$this->db->get();
  }
  public function opening_balance_child_name_get($parent_head,$child_head) {
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ID',$parent_head);
    $query=$this->db->get();
    $final  = $query->result();

    $sql = $final[0]->Fah_DataSQL;
    $SQLID = $final[0]->Fah_SQLID;
    $SQLName = $final[0]->Fah_SQLName;
    // $this->db->where($final[0]->Fah_SQLID,$child_head);
    $query1 = $this->db->query($sql);
    $final1  = $query1->result();
    foreach ($final1 as $key => $value) {
        if ($value->$SQLID==$child_head) {
          $name = $value->$SQLName;
        }
    }
    return $name;
  }
  public function opening_balance_details($id) {
    $this->db->select('*');
    $this->db->from('tbl_Fin_AccountOpeningBalance');
    $this->db->where('Fob_ID',$id);
    $query = $this->db->get();
    return $query->result();
  }
  public function opening_balance_update($request) {
    $nice_date =  date("d-m-Y", strtotime($request['open_date'])); 
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ID',$request['acc_head']);
    $query=$this->db->get();
    $final  = $query->result();
    $sql = $final[0]->Fah_DataSQL;
    $datas= array(
          'Fob_FahID'  => $request['acc_head'],
          'Fob_ChildID'  => $request['child_acc_head'],
          'Fob_OpenBal'  => $request['open_bal'],
          'Fob_OpenDate'  => $nice_date,
          'Fob_IsDebit' => $request['deb_credit'],
          'Fob_SQLTable' => $sql,
          'Fob_CurSysUser' => $_SESSION['name'],
          'Fob_CurDtTime' => date('Y-m-di:m:s'),
        );
      $this->db->where('Fob_ID',$request['bal_id']);
      $this->db->update('tbl_Fin_AccountOpeningBalance',$datas );
    return true;
  }
  public function cost_center_list() {
    $this->db->select('*');
    $this->db->from('tbl_Fin_CostCenter');
    $query = $this->db->get();
    return $query->result();
  }
  public function ledger_view_from_details($main_head,$child_head,$from_date,$to_date,$cost_center) {
    $checkin_date=date_create($from_date);
    $checkout_date=date_create($to_date);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    for($i = 0; $i <= $tot_days; $i++) {
        $date[] = date('d-m-Y', strtotime($from_date. ' + '.$i.'  days'));
    }
    $implode = implode("','", $date);

    $this->db->select('tbl_fin_voucherentry.*,tbl_fin_vouchertype.*');
    $this->db->from('tbl_fin_voucherentry');
    $this->db->join('tbl_fin_vouchertype', 'tbl_fin_voucherentry.Fve_VoucherType = tbl_fin_vouchertype.Fvt_ID', 'left');
    $this->db->where('tbl_fin_voucherentry.Fve_FrmTransID',$main_head);
    $this->db->where('tbl_fin_voucherentry.Fve_FrmTransChildID',$child_head);
    // if ($cost_center!="") {
    //     $this->db->where('tbl_fin_voucherentry.Fve_FccID',$cost_center);
    // }
    $where = "tbl_fin_voucherentry.Fve_Date IN ('".$implode."')";
    $this->db->where($where);
    // $query = $this->db->get();
    // print_r($this->db->last_query());
    // exit();
    return $query = $this->db->get();
  }
  public function ledger_view_to_details($main_head,$child_head,$from_date,$to_date,$cost_center) {
    $checkin_date=date_create($from_date);
    $checkout_date=date_create($to_date);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    for($i = 0; $i <= $tot_days; $i++) {
        $date[] = date('d-m-Y', strtotime($from_date. ' + '.$i.'  days'));
    }
    $implode = implode("','", $date);

    $this->db->select('tbl_fin_voucherentry.*,tbl_fin_vouchertype.*');
    $this->db->from('tbl_fin_voucherentry');
    $this->db->join('tbl_fin_vouchertype', 'tbl_fin_voucherentry.Fve_VoucherType = tbl_fin_vouchertype.Fvt_ID', 'left');
    $this->db->where('tbl_fin_voucherentry.Fve_ToTransID',$main_head);
    $this->db->where('tbl_fin_voucherentry.Fve_ToTransChildID',$child_head);
    // if ($cost_center!="") {
    //     $this->db->where('tbl_fin_voucherentry.Fve_FccID',$cost_center);
    // }
    $where = "tbl_fin_voucherentry.Fve_Date IN ('".$implode."')";
    $this->db->where($where);
    return $query = $this->db->get();
    // $query = $this->db->get();
    // print_r($this->db->last_query());
    // exit();
  }
  public function particular_from_details($group_id) {
     $this->db->select('tbl_fin_voucherentry.*,tbl_fin_accounthead.*');
    $this->db->from('tbl_fin_voucherentry');
    $this->db->join('tbl_fin_accounthead', 'tbl_fin_voucherentry.Fve_ToTransID = tbl_fin_accounthead.Fah_ID', 'left');
    $this->db->where('tbl_fin_voucherentry.Fve_GroupID',$group_id);
    $query = $this->db->get();
    $final = $query->result();
    return $final[0]->Fah_Name;
  }
  public function particular__to_details($group_id) {
    $this->db->select('tbl_fin_voucherentry.*,tbl_fin_accounthead.*');
    $this->db->from('tbl_fin_voucherentry');
    $this->db->join('tbl_fin_accounthead', 'tbl_fin_voucherentry.Fve_FrmTransID = tbl_fin_accounthead.Fah_ID', 'left');
    $this->db->where('tbl_fin_voucherentry.Fve_GroupID',$group_id);
    $query = $this->db->get();
    $final = $query->result();
    return $final[0]->Fah_Name;
  }
  public function opening_balance_in_ledger($id) {
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ID',$id);
    $query = $this->db->get();
    return $query->result();
  }

  public function company_cost_center_getdata($id) {
      $this->db->select('*');
      $this->db->from('tbl_fin_costcenter');
      $this->db->where('Fcc_ID',$id);
      $companydata=$this->db->get();
      return $companydata->result();
    }
  public function delete_cost_center($id) {
    $this->db->where('Fcc_ID',$id);
    $this->db->delete('tbl_fin_costcenter');
    return true;
  }
  public function cost_center_max_id() {
     $this->db->select_max('Fcc_ID');
     $this->db->from('tbl_fin_costcenter');
     $companydata=$this->db->get();
     return $companydata->result();
  }
  public function cost_center_update($request,$max_id){
    $this->db->select('*');
    $this->db->from('tbl_fin_costcenter');
    $this->db->where('Fcc_ID',$request['cost_id']);
    $query=$this->db->get();
    $final = $query->result();
    if(count($final) != 0 )
    {
      $data= array(
          'Fcc_ID'  => $request['cost_id'],
          'Fcc_Name' =>$request['cost_center_name']
          );
      $this->db->where('Fcc_ID',$request['cost_id']);
      $this->db->update('tbl_fin_costcenter',$data);
      return true;
    } else {
      $data2= array(
          'Fcc_ID'  => $request['cost_id'],
          'Fcc_Name' =>$request['cost_center'],
          'Fcc_Name' =>$request['cost_center_name']
      );
          $this->db->insert('tbl_fin_costcenter',$data2);
         
    }
     return true;
  }
  public function child_opening_balance_in_ledger($main_head,$child_head) {
    $this->db->select('*');
    $this->db->from('tbl_fin_accountopeningbalance');
    $this->db->where ('Fob_FahID',$main_head);
    $this->db->where ('Fob_ChildID',$child_head);
    $query = $this->db->get();
   
    if (count($query->result())!=0) {
      $result = $query->result();
      $data['openingDate'] = $result[0]->Fob_OpenDate;
      $data['isdebit'] = $result[0]->Fob_IsDebit;
      $data['openingBalance'] = $result[0]->Fob_OpenBal;
    } else {
      $this->db->select('*');
      $this->db->from('tbl_fin_accounthead');
      $this->db->where ('Fah_ID',$main_head);
      $query1 = $this->db->get();
      $result1 = $query1->result();
      $data['openingDate'] = $result1[0]->Fah_OpeningDate;
      $data['isdebit'] = $result1[0]->Fah_IsDebit;
      $data['openingBalance'] = $result1[0]->Fah_OpeningBal;
    }
    return $data;
  }
  public function opening_balance_in_cr_dr_ledger($main_head,$child_head,$from_date,$to_date,$status,$cost_center) {
    $this->db->select('SUM(tbl_fin_voucherentry.Fve_Amount) as amount');
    $this->db->from('tbl_fin_voucherentry');
    $this->db->join('tbl_fin_vouchertype', 'tbl_fin_voucherentry.Fve_VoucherType = tbl_fin_vouchertype.Fvt_ID', 'left');
    if ($status=="dr") {
      $this->db->where('tbl_fin_voucherentry.Fve_FrmTransID',$main_head);
      if ($child_head!="") {
        $this->db->where('tbl_fin_voucherentry.Fve_FrmTransChildID',$child_head);
      }
    } else {
      $this->db->where('tbl_fin_voucherentry.Fve_ToTransID',$main_head);
      if ($child_head!="") {
        $this->db->where('tbl_fin_voucherentry.Fve_ToTransChildID',$child_head);
      }
    }
    $this->db->where('tbl_fin_voucherentry.Fve_Date >=',$from_date);
    $this->db->where('tbl_fin_voucherentry.Fve_Date <',$to_date);
    $this->db->where('tbl_fin_voucherentry.Fve_FccID',$cost_center);
    $query = $this->db->get();
    return $query->result();
  } 
  public function transactionledger_view_to_details($main_head,$child_head,$from_date,$to_date,$cost_center) {
    $this->db->select('*');
    $this->db->from('tbl_fin_transactionentry');
    $this->db->where('Fte_FahID',$main_head);
    if ($child_head!="") {
      $this->db->where('Fte_ChildID',$child_head);
    }
    if ($cost_center!="") {
      $this->db->where('Fte_FccID',$cost_center);
    }
    $where = "Fte_Date BETWEEN '".$from_date."' AND '".$to_date."'";
    $this->db->where($where);
    return $query = $this->db->get();
  }
  public function particular_from_Transactiondetails($head,$child) {
    $this->db->select('*');
    $this->db->from('tbl_fin_accounthead');
    $this->db->where('Fah_ID',$head);
    $query = $this->db->get()->result();
    if ($query[0]->Fah_DataSQL!="") {
      $result = $this->db->query($query[0]->Fah_DataSQL." WHERE ".$query[0]->Fah_SQLID."= ".$child)->result();
      $SQLName = $query[0]->Fah_SQLName;
      return $query[0]->Fah_Name." (".$result[0]->$SQLName.")";
    } else {
      return $query[0]->Fah_Name;
    }
    
  }
}    
