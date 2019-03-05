<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       

    }
    public function authorize($uname, $password) {
    	$this->db->select('id,Email,First_Name,Last_Name,Sex,Category');
    	$this->db->where('Email',$uname);
    	$this->db->where('Password',$password);
    	$this->db->where('Del_Flag',"1");
    	$this->db->from('hotel_tbl_user');
    	$this->db->limit('1');
    	$query = $this->db->get();
    	if (count($query->result())!=0) {
    		return $query->result();
    	} else {
    		return "failed";
    	}
    }
    // public function authorizeagent($user_name, $password,$agent_code) {
    //     $this->db->select('id,Email,First_Name,Last_Name,Sex');
    //     $this->db->where('Username',$user_name);
    //     $this->db->where('password',$password);
    //     $this->db->where('Agent_Code',$agent_code);
    //     $this->db->where('delflg',"1");
    //     $this->db->from('hotel_tbl_agents');
    //     $this->db->limit('1');
    //     $query = $this->db->get();
    //     if (count($query->result())!=0) {
    //         return $query->result();
    //     } else {
    //         return "failed";
    //     }
    // }
    public function authorizeagent($user_name, $password,$agent_code) {
        /*Main Agent authorization start*/
        $this->db->select('id,Email,First_Name,Last_Name,Sex');
        $this->db->where('Username',$user_name);
        $this->db->where('password',$password);
        $this->db->where('Agent_Code',$agent_code);
        $this->db->where('delflg',"1");
        $this->db->from('hotel_tbl_agents');
        $this->db->limit('1');
        $query = $this->db->get();
        /*Main Agent authorization end*/
        /*Accounts Agent authorization start*/


        $this->db->select('id,Email,First_Name,Last_Name,Sex');
        $this->db->where('First_Name_Accounts',$user_name);
        $this->db->where('Password_Accounts',$password);
        $this->db->where('Agent_Code',$agent_code);
        $this->db->where('delflg',"1");
        $this->db->from('hotel_tbl_agents');
        $this->db->limit('1');
        $query1 = $this->db->get();

        /*Accounts Agent authorization end*/
        /*Reservation Agent authorization start*/

        $this->db->select('id,Email,First_Name,Last_Name,Sex');
        $this->db->where('First_Name_Reservation',$user_name);
        $this->db->where('Password_Reservation',$password);
        $this->db->where('Agent_Code',$agent_code);
        $this->db->where('delflg',"1");
        $this->db->from('hotel_tbl_agents');
        $this->db->limit('1');
        $query2 = $this->db->get();

        /*Reservation Agent authorization end*/
        /*Management Agent authorization start*/

        $this->db->select('id,Email,First_Name,Last_Name,Sex');
        $this->db->where('First_Name_Management',$user_name);
        $this->db->where('Password_Management',$password);
        $this->db->where('Agent_Code',$agent_code);
        $this->db->where('delflg',"1");
        $this->db->from('hotel_tbl_agents');
        $this->db->limit('1');
        $query3 = $this->db->get();

        /*Management Agent authorization end*/

        if (count($query->result())!=0) {
            return $query->result();
        } else if (count($query1->result())!=0) {
            return $query1->result();
        } if (count($query2->result())!=0) {
            return $query2->result();
        } else if (count($query3->result())!=0) {
            return $query3->result();
        } else {
            return "failed";
        }
    }
    public function update_login_record($data,$id) {
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_user',$data);
        return true;
    }
    public function update_login_record_agent($data,$id) {
        $this->db->insert('hotel_tbl_agent_log',$data);
        $id = $this->db->insert_id();
        return $id;
    }
    public function update_agent_login_record($last_data,$id,$logged_id) {
        $this->db->where('id',$logged_id);
        $this->db->update('hotel_tbl_agent_log',$last_data);
        return true;
    }
    public function update_record($data,$id) {
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_user',$data);
        return true;
    }
    public function insert($data) {
         $data= array(
        'First_Name' => $data['first_name'],
        'Last_Name' => $data['last_name'],
        'Email' => $data['email'],
        'Password' => md5($data['password']),
        'Date_Of_Birth' => $data['date'],
        'Sex' => $data['sex'],
        'Category' => $data['category'],
        'Address' => $data['address'],
        'City' => $data['city'],
        'Country' => $data['country'],
        'Phone_Num' => $data['phone'],
        'Created_Date' => date("Y-m-d H:i:s"),
        'Created_By' =>  $this->session->userdata('id'),
        'Updated_Date' => date("Y-m-d H:i:s"),
        'Updated_By' =>  $this->session->userdata('id'),
        'CurrencyType'=>$data['preferred_currency'],

    );
      $this->db->insert('hotel_tbl_user',$data);
      $user_id = $this->db->insert_id();
      return $user_id;
    }
    public function select($filter) {    
      $this->db->select('hotel_tbl_user.*,hoteltableroles.*,hotel_tbl_user.id as id');
      $this->db->from('hotel_tbl_user');
      $this->db->join('hoteltableroles','hoteltableroles.id = hotel_tbl_user.Category','left');
      $this->db->where('hotel_tbl_user.Del_Flag',$filter);
      $this->db->order_by('hotel_tbl_user.id','desc');
        $query=$this->db->get();
      return $query;
    }
    public function delete_user($id) {
      $data = array('Del_Flag' => '0');
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_user',$data);
        return true;
    }
    public function eidt_view($data) {
        $this->db->select('*');
        $this->db->from('hotel_tbl_user');
        $this->db->where('id',$id);
        $query=$this->db->get();
         $final= $query->result();
        return $final;
    }
    public function edit($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_user');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $final= $query->result();
      return $final;
    }
    public function update($data,$id){
        if ($data['pass_change']==1) {
            if (isset($data['category'])) {
                $data= array(
                    'First_Name' => $data['first_name'],
                    'Last_Name' => $data['last_name'],
                    'Email' => $data['email'],
                    'Date_Of_Birth' => $data['date'],
                    'Sex' => $data['sex'],
                    'Category' => $data['category'],
                    'Address' => $data['address'],
                    'City' => $data['city'],
                    'Country' => $data['country'],
                    'Phone_Num' => $data['phone'],
                    'Updated_Date' => date("Y-m-d H:i:s"),
                    'Updated_By' =>  $this->session->userdata('id'),
                    'CurrencyType'=>$data['preferred_currency'],

                );
            } else {
                $data= array(
                    'First_Name' => $data['first_name'],
                    'Last_Name' => $data['last_name'],
                    'Email' => $data['email'],
                    'Date_Of_Birth' => $data['date'],
                    'Sex' => $data['sex'],
                    'Address' => $data['address'],
                    'City' => $data['city'],
                    'Country' => $data['country'],
                    'Phone_Num' => $data['phone'],
                    'Updated_Date' => date("Y-m-d H:i:s"),
                    'Updated_By' =>  $this->session->userdata('id'),
                    'CurrencyType'=>$data['preferred_currency'],

                );
            }
            
            $this->db->where('id',$id);
            $this->db->update('hotel_tbl_user',$data);
            return true;
        } else {
            if (isset($data['category'])) {
                $data= array(
                'First_Name' => $data['first_name'],
                'Last_Name' => $data['last_name'],
                'Email' => $data['email'],
                'Password' => md5($data['password']),
                'Date_Of_Birth' => $data['date'],
                'Sex' => $data['sex'],
                'Category' => $data['category'],
                'Address' => $data['address'],
                'City' => $data['city'],
                'Country' => $data['country'],
                'Phone_Num' => $data['phone'],
                'Updated_Date' => date("Y-m-d H:i:s"),
                'Updated_By' =>  $this->session->userdata('id'),
                 // 'CurrencyType'=>$data['preferred_currency'],

                );
            } else {
                $data= array(
                'First_Name' => $data['first_name'],
                'Last_Name' => $data['last_name'],
                'Email' => $data['email'],
                'Password' => md5($data['password']),
                'Date_Of_Birth' => $data['date'],
                'Sex' => $data['sex'],
                // 'Category' => $data['category'],
                'Address' => $data['address'],
                'City' => $data['city'],
                'Country' => $data['country'],
                'Phone_Num' => $data['phone'],
                'Updated_Date' => date("Y-m-d H:i:s"),
                'Updated_By' =>  $this->session->userdata('id'),
                 // 'CurrencyType'=>$data['preferred_currency'],
                );
            }
            $this->db->where('id',$id);
            $this->db->update('hotel_tbl_user',$data);
            return true;
        }
    }
    public function users_permission($request) {
      $data= array(
              'Del_Flag' => $request['flag'],
              'Updated_Date' => date('Y-m-d'),
              'Updated_By' =>  $this->session->userdata('id'),);
      $this->db->where('id',$request['id']);
      $this->db->update('hotel_tbl_user',$data);
      return true;
    }
    public function  getRole(){
        $this->db->select('*');
        $this->db->from('hoteltableroles');
        $query=$this->db->get();
        return $query->result();
    }
    public function currency(){
        $this->db->select('*');
        $this->db->from('currency_update');
        $query=$this->db->get();
        return $query->result();
    }
    public function update_agent_active_status($agent_id,$data){
        $this->db->where('id',$agent_id);
        $this->db->update('hotel_tbl_agents',$data);
        return true;
    }   
    public function update_admin_active_status($admin_id,$data){
        $this->db->where('id',$admin_id);
        $this->db->update('hotel_tbl_user',$data);
        return true;
    }    
}
    
?>
