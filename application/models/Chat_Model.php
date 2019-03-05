<?php

class Chat_Model extends CI_Model
{

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    //put your code here

    public function get_chat_messages($id, $deleted)
    {
        $this->db->select('tbl_private_chat_messages.*', FALSE);
        $this->db->select('hotel_tbl_user.id', FALSE);
        $this->db->from('tbl_private_chat_messages');
        $this->db->join('hotel_tbl_user', 'hotel_tbl_user.id = tbl_private_chat_messages.user_id', 'left');
        $this->db->where("tbl_private_chat_messages.private_chat_id", $id);
        $this->db->where("tbl_private_chat_messages.private_chat_messages_id >", $deleted);
//        $this->db->limit($limit);
        $this->db->order_by("tbl_private_chat_messages.private_chat_messages_id", "DESC");
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function get_open_chats($to_user_id = null)
    {
        $this->db->select('tbl_private_chat_users.*', FALSE);
        $this->db->select('tbl_private_chat.chat_title,tbl_private_chat.time', FALSE);
        $this->db->from('tbl_private_chat_users');
        $this->db->join('tbl_private_chat', 'tbl_private_chat.private_chat_id = tbl_private_chat_users.private_chat_id', 'left');
        $this->db->where("tbl_private_chat_users.user_id", $this->session->userdata('id'));
        $this->db->where("tbl_private_chat_users.active != ", 2);
        if (!empty($to_user_id)) {
            $this->db->where("tbl_private_chat_users.to_user_id", $to_user_id);
        }
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    function check_total_chat($id)
    {
        $this->db->select('*');
        $this->db->group_by('user_id');
        $this->db->from('tbl_private_chat_messages');
        $this->db->where('private_chat_id', $id);
//        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function get_requests($admin_id)
    {
        $return['agent_id'] = '';
        $return['id'] = '';
        $this->db->select('*');
        $this->db->from('tbl_chat_requests');
        $this->db->where('flag', 0);
        $this->db->where('FIND_IN_SET("'.$admin_id.'", cancelled) = 0');
        $query = $this->db->get()->result();

        $return['count'] = count($query);
        if (count($query)!=0) {
            $aid=$query[0]->agent_id;
            $this->db->select('*');
            $this->db->from('hotel_tbl_agents');
            $this->db->where('id',$aid);
            $query2 = $this->db->get()->result();
            $return['name']=$query2[0]->First_Name." ".$query2[0]->Last_Name;
            $return['agent_id'] = $query[0]->agent_id;
            $return['id'] = $query[0]->id;
        }
        return $return;
    }
    function get_chat_details($agent_id,$admin_id)
    {
        $this->db->select('private_chat_id');
        $this->db->where('user_id', $admin_id);
        $this->db->where('to_user_id',$agent_id);
        $this->db->from("tbl_private_chat_users");
        $query=$this->db->get()->result();
        return $query;
        
    }
    function update_request($request_id,$pid,$aid)
    {
        $data=array("flag" => 1,"private_chat_id" => $pid );
        $this->db->where('id', $request_id);
        $this->db->update("tbl_chat_requests",$data);
        
        $data1=array("private_chat_id" => $pid );
        $this->db->where('agent_id', $aid);
        $this->db->where('private_chat_id', 0);
        $this->db->update("tbl_private_chat_messages",$data1);
        return true;      
    }
    function update_request_cancel_status($request_id,$admin_id){
        $canId = '';
        $data = $this->db->query('SELECT cancelled FROM tbl_chat_requests where FIND_IN_SET('.$admin_id.',cancelled) = 0 and id = '.$request_id.'')->result();
        if (count($data)!=0) {
            $canId = $data[0]->cancelled;
        } 
        if ($canId=='') {
            $canId = $admin_id;
        } else {
            $canId = $canId.','.$admin_id;
        }

        $arry=array('cancelled'=>$canId);
        $this->db->where('id',$request_id);
        $this->db->update("tbl_chat_requests",$arry);
        return true;
    }
    function get_request_details($request_id)
    {
        $this->db->select('private_chat_id');
        $this->db->where('id', $request_id);
        $this->db->from("tbl_chat_requests");
        $query=$this->db->get()->result();
        return $query;
        
    }
}
