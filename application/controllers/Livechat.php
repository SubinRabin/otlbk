<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Livechat extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('Livechat_Model');
          $this->load->helper('common');
     }
  public function load_chat($agent_id,$ch_id) {
    	$chat_details=$this->Livechat_Model->load_details($agent_id,$ch_id);
        if(!empty($chat_details)){
        foreach($chat_details as $chat){
          if($chat->user_id!=0){
            $adminid=$chat->user_id;
            $admin_details=$this->Livechat_Model->load_admin_details($adminid);
            echo '<div class="chat-message clearfix" id="chat_support_msg">
                  <div class="chat-message-content"> 
                  <h5>'.$admin_details[0]->First_Name.' '.$admin_details[0]->Last_Name.'<span class="chat-time">'.date("G:i",strtotime($chat->message_time)).'</span></h5>  
                  <p>'.$chat->message.'</p>
                  </div> 
                  </div> 
                  <hr>';
          }
          else if($chat->agent_id!=0){
           
            echo '<div class="chat-message clearfix">
                  <div class="chat-message-content right">              
                  <h5>You<span class="chat-time">'.date("G:i",strtotime($chat->message_time)).'</span></h5>
                  <p>'.$chat->message.'</p>
                  </div> 
                  </div>
                  <hr>';
          } else if($chat->type=='agent'){
            
            echo '<div class="chat-message clearfix">
                  <div class="chat-message-content right">              
                  <h5>You<span class="chat-time">'.date("G:i",strtotime($chat->message_time)).'</span></h5>
                  <p>'.$chat->message.'</p>
                  </div> 
                  </div>
                  <hr>';
          }
        }
  
     // echo '<input type="hidden" id="chatid" value='.$chat_details[0]['private_chat_id'].'>';
  } else {
    echo '<div class="chat-message-content Welcome-msg">
            <p>Welcome to Otelseasy support, how can we help you today?</p>
          </div>';
  }
}
  public function send_message($message,$id,$chat_id)
    {

        $check_chat = get_row('tbl_chat_requests', array('agent_id' => $id, 'created_date' => date('Y-m-d'),'private_chat_id'=>$chat_id,'flag'=>0));

        if ($chat_id==0) {
            // check the private_chat_id is exist
            if (count($check_chat)==0) {
              $c_data = array(
                  "agent_id" => $id,
                  "flag" => 0,
                  "private_chat_id" => 0,
                  "created_date" => date('Y-m-d')
              );
              $this->db->insert('tbl_chat_requests',$c_data);
            }

            $cm_data['private_chat_id'] = 0;
            $cm_data['agent_id'] = $this->session->userdata('agent_id');
            $cm_data['message'] = $message;  
            $cm_data['agent_read'] = 1;
            $this->db->insert('tbl_private_chat_messages',$cm_data);
            $c_data = array(
                "success" => 1,
                "chatid" => 0,
                "user_id" => $this->session->userdata('agent_id'),
                "message" => $message
            );

        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('user_id' => $this->session->userdata('agent_id'),'private_chat_id' => $chat_id));
            if (empty($check_user)) {
                $c_data = array(
                    "chatid" => $chat_id,
                    "error" => 'Something wrong',
                );
            } else {
                $cm_data['private_chat_id'] = $chat_id;
                $cm_data['agent_id'] = $this->session->userdata('agent_id');
                $cm_data['message'] = $message;
                $cm_data['agent_read'] = 1;
                $this->db->insert('tbl_private_chat_messages',$cm_data);
                // Update all chat users of unread message
                $uac_data['unread'] = 1;
                $uac_data['active'] = 1;
                $this->db->where("private_chat_id", $chat_id);
                $this->db->update("tbl_private_chat_users", $uac_data);

                $c_data = array(
                    "success" => 1,
                    "chatid" => $chat_id,
                    "user_id" => $check_user->to_user_id,
                    "message" => $message
                );

            }
        }
        echo json_encode($c_data);
        exit();
    }
    public function get_pr_chat_id($agent_id){
        $output=$this->Livechat_Model->get_pr_chat_details($agent_id);
        $data['output']=$output;
        $data['unread']=$this->Livechat_Model->get_unread_count($output);
        echo json_encode($data);
    }	
}


