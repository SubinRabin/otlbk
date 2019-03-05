<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chat extends MY_Controller
{
    public $view = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->helper('common');
    }

    public function open_chat_box()
    {
        $user_id = $this->input->get("user_id");
        // Check for multiple user_ids
        $user_id_old = $user_id;
        $user_id_old = explode(",", $user_id_old);
        $user_ids = array();
        foreach ($user_id_old as $u) {
            $u = trim($u);
            $user_ids[] = $u;
        }

        if (count($user_ids) > 1) {
            // Validate all users
            $users = array();
            foreach ($user_ids as $u) {
                // Get user
                $user = $this->db->where('id', $u)->get('hotel_tbl_agents')->row();
                if ($user->num_rows() == 0) {
                    //$this->template->jsonError(lang("error_161"));
                }
                $user = $user->row();
                $users[] = $user->user_id;
            }

            $users = array_unique($users);

            if (empty($title)) {
                //$title = lang("ctn_1394");
            }

            // Create Chat
            $chatid = $this->chat_model->add_new_chat(array(
                    "userid" => $this->user->info->ID,
                    "timestamp" => time(),
                    "title" => $title
                )
            );

            // Add all users
            // Add current user
            $this->chat_model->add_chat_user(array(
                    "userid" => $this->user->info->ID,
                    "chatid" => $chatid,
                    "title" => $title
                )
            );

            foreach ($users as $uid) {
                $this->chat_model->add_chat_user(array(
                        "userid" => $uid,
                        "chatid" => $chatid,
                        "unread" => 1
                    )
                );
            }

        } else {
            // open single chat get user details and put it into title
            $user = profile_agent($user_id);
            if (!empty($user)) {
                $c_data['user_id'] = $this->session->userdata('id');
                // check the chat already run or not
                // if run means already have data into database then no need to save data open the previous chatbox
                $check_chat = get_row('tbl_private_chat_users', array('user_id' => $c_data['user_id'], 'to_user_id' => $user_id));
                if (empty($check_chat)) {
                    $title = "<span class='circle circle-warning circle-lg'></span> <strong>" . $user->First_Name . "</strong><span class='fa fa-angle-up pull-right'></span>";
                    $title2 = " <strong>" . $this->session->userdata('name') . "</strong>";

                    // Create Chat into tbl_private_chat
                    /*$this->chat_model->_table_name = 'tbl_private_chat';
                    $this->chat_model->_primary_key = 'private_chat_id';
                    $private_chat_id = $this->chat_model->save($c_data);*/
                    $this->db->insert('tbl_private_chat',$c_data);
                     $private_chat_id = $this->db->insert_id();
                    // insert into tbl_private_chat_users title 1
                    $cu_data['private_chat_id'] = $private_chat_id;
                    $cu_data['user_id'] = $c_data['user_id'];
                    $cu_data['to_user_id'] = $user->id;
                    $cu_data['active'] = 1;
                    $cu_data['sender'] = 'admin';
                    $cu_data['receiver'] = 'agent';
                    $cu_data['title'] = $title;
                   /* $this->chat_model->_table_name = 'tbl_private_chat_users';
                    $this->chat_model->_primary_key = 'private_chat_users_id';
                    $this->chat_model->save($cu_data);*/
                    
                    $this->db->insert('tbl_private_chat_users',$cu_data);


                    // insert into tbl_private_chat_users with title 2
                    $cu__data['private_chat_id'] = $private_chat_id;
                    $cu__data['user_id'] = $user->id;
                    $cu__data['to_user_id'] = $c_data['user_id'];
                    $cu__data['title'] = $title2;
                    $cu__data['sender'] = 'agent';
                    $cu__data['receiver'] = 'admin';
                    $cu__data['active'] = 2;
                    $cu__data['unread'] = 1;
                    /*$this->chat_model->_table_name = 'tbl_private_chat_users';
                    $this->chat_model->_primary_key = 'private_chat_users_id';
                    $this->chat_model->save($cu__data);*/
                    $this->db->insert('tbl_private_chat_users',$cu__data);

                    $data = array(
                        "success" => 1,
                        "chatid" => $private_chat_id,
                    );
                } else {
                    $data = array(
                        "exist" => 1,
                        "chatid" => $check_chat->private_chat_id,
                    );
                }
            } else {
                $data = [
                    "error" => 'Invalid user',
                    "chatid" => $user_id,
                ];
            }
        }
        echo json_encode($data);
        exit();
    }

    public function active_chat_box($id)
    {
        // get private chat info and check it already exist or not
        $check_chat = get_row('tbl_private_chat', array('private_chat_id' => $id));
        if (empty($check_chat)) {
            // check the private_chat_id is exist
            $data = array(
                "chatid" => $id,
                "error" => 'Invalid Chat',
            );
        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));

            if (empty($check_user)) {
                $data = array(
                    "chatid" => $id,
                    "error" => 'Something Wrong',
                );
            } else {
                $uc_data['active'] = 1;
                $this->db->where('private_chat_users_id',$check_user->private_chat_users_id);
                $this->db->update('tbl_private_chat_users',$uc_data);             
                if (!empty($check_chat->chat_title)) {
                    $check_user->title = $check_chat->chat_title;
                }
                if (get_online_users_single($check_user->to_user_id)==1) {
                    $status = '<span class="circle circle-success circle-lg"></span>';
                } else {
                    $status = '<span class="circle circle-warning circle-lg"></span>';
                }
                $data = array(
                    "chatid" => $id,
                    "title" => $status.$check_user->title,
                );
            }

        }
        echo json_encode($data);
        exit();
    }


    public function all_chat_messages()
    {
        // open the chat with message
        $open_chats = $this->chat_model->get_open_chats();

        $chat_windows = array();
        if (!empty($open_chats)) {
            foreach ($open_chats as $chats) {
                $c_data = array();
                // mark chat read if window is active
                if ($chats->unread && $chats->active == 1) {
                    $chats->unread = 0;
                    $uc_data['unread'] = 0;
                    $this->db->where('private_chat_users_id',$chats->private_chat_users_id);
                    $this->db->update('tbl_private_chat_users',$uc_data);   
                  /*  $this->chat_model->_table_name = 'tbl_private_chat_users';
                    $this->chat_model->_primary_key = 'private_chat_users_id';
                    $this->chat_model->save($uc_data, $chats->private_chat_users_id);*/
                }
                // If a chat title is set then replace with the user title in tbl_private_chat_users
                if (!empty($chats->chat_title)) {
                    $chats->title = $chats->chat_title;
                }
                if (get_online_users_single($chats->to_user_id)==1) {
                    $status = '<span class="circle circle-success circle-lg"></span>';
                } else {
                    $status = '<span class="circle circle-warning circle-lg"></span>';
                }
                $c_data['title'] = $status.$chats->title.'<span class="fa fa-angle-up pull-right"></span>';
                $c_data['chatid'] = $chats->private_chat_id;
                $c_data['unread'] = $chats->unread;
                $c_data['active'] = $chats->active;
                $c_data['to_user_id'] = $chats->user_id;

                // get all message by private chat id
                $messages = array();
                $limit = 5;
                $last_reply_id = 0;
                $all_messages = $this->chat_model->get_chat_messages($chats->private_chat_id, $chats->deleted);

                foreach ($all_messages as $message) {
                    array_push($messages, $message);
                    if ($last_reply_id == 0) {
                        $last_reply_id = $message->private_chat_messages_id;
                    }
                }
                $messages = array_reverse($messages);

                $template = $this->load->view("backend/chat/chat_body.php", array(
                    "messages" => $messages,
                    "chat" => $chats,
                    "last_reply_id" => $last_reply_id
                ), TRUE);
                // Store template
                $c_data['messages_template'] = $template;

                // Chat chat_badge
                $c_data['chat_badge'] = $this->load->view("backend/chat/chat_badge.php", array(
                    "chats" => $chats,
                ), TRUE);
                // Add Chat to array
                $chat_windows[] = $c_data;
            }
        }
        echo json_encode(array("chats" => $chat_windows));
        exit();
    }

    public function get_chat_messages($id)
    {
        $check_chat = get_row('tbl_private_chat', array('private_chat_id' => $id));
        if (empty($check_chat)) {
            // check the private_chat_id is exist
            $c_data = array(
                "chatid" => $id,
                "error" => 'Invalid chat',
            );
        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));
            if (empty($check_user)) {
                $c_data = array(
                    "chatid" => $id,
                    "error" => 'something_wrong',
                );
            } else {

                // Only mark chat unread if window is active
                if ($check_user->unread && $check_user->active == 1) {
                    $uc_data['unread'] = 1;
                    $this->db->where('private_chat_users_id',$check_user->private_chat_users_id);
                    $this->db->update('tbl_private_chat_users',$uc_data);  
                   /* $this->chat_model->_table_name = 'tbl_private_chat_users';
                    $this->chat_model->_primary_key = 'private_chat_users_id';
                    $this->chat_model->save($uc_data, $check_user->private_chat_users_id);*/
                }

                if (!empty($check_chat->chat_title)) {
                    $check_user->title = $check_chat->chat_title;
                }

                $c_data['title'] = $check_user->title;
                $c_data['chatid'] = $check_user->private_chat_id;
                $c_data['unread'] = $check_user->unread;
                $c_data['active'] = $check_user->active;
                $c_data['to_user_id'] = $check_user->to_user_id;

                // get all message by private chat id
                $messages = array();
                $limit = 5;
                $last_reply_id = 0;
                $all_messages = $this->chat_model->get_chat_messages($check_user->private_chat_id, $check_user->deleted);

                foreach ($all_messages as $message) {
                    array_push($messages, $message);
                    if ($last_reply_id == 0) {
                        $last_reply_id = $message->private_chat_messages_id;
                    }
                }
                $messages = array_reverse($messages);

                $template = $this->load->view("backend/chat/chat_body.php", array(
                    "messages" => $messages,
                    "chat" => $check_user,
                    "last_reply_id" => $last_reply_id
                ), TRUE);
                // Store template
                $c_data['messages_template'] = $template;
            }

        }
        echo json_encode($c_data);
        exit();
    }

    public function send_message($id)
    {

        $check_chat = get_row('tbl_private_chat', array('private_chat_id' => $id));
        if (empty($check_chat)) {
            // check the private_chat_id is exist
            $c_data = array(
                "chatid" => $id,
                "error" => 'Invalid Chat',
            );
        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));
            if (empty($check_user)) {
                $c_data = array(
                    "chatid" => $id,
                    "error" => 'Something wrong',
                );
            } else {

                $message = $this->input->get("message");

                $cm_data['private_chat_id'] = $id;
                $cm_data['user_id'] = $this->session->userdata('id');
                $cm_data['message'] = $message;
               
                $this->db->insert('tbl_private_chat_messages',$cm_data);
                // Update all chat users of unread message
                $uac_data['unread'] = 1;
                $uac_data['active'] = 1;
                $this->db->where("private_chat_id", $id);
                $this->db->update("tbl_private_chat_users", $uac_data);

                $c_data = array(
                    "success" => 1,
                    "chatid" => $id,
                    "user_id" => $check_user->to_user_id,
                    "sound" => true
                );

            }
        }
        echo json_encode($c_data);
        exit();
    }

    public function minimize_chat_box($id)
    {
        $check_chat = get_row('tbl_private_chat', array('private_chat_id' => $id));
        if (empty($check_chat)) {
            // check the private_chat_id is exist
            $data = array(
                "chatid" => $id,
                "error" => 'Invalid data',
            );
        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));
            if (empty($check_user)) {
                $data = array(
                    "chatid" => $id,
                    "error" => 'something_wrong',
                );
            } else {
                $uc_data['active'] = 0;
                $this->db->where("private_chat_users_id", $check_user->private_chat_users_id);
                $this->db->update("tbl_private_chat_users", $uc_data);
                

                if (!empty($check_chat->chat_title)) {
                    $check_user->title = $check_chat->chat_title;
                }


                $data = array(
                    "chatid" => $id,
                    "title" => '<span class="circle circle-warning circle-lg"></span>'.$check_user->title.'<span class="fa fa-angle-up pull-right"></span>',
                    "unread" => $check_user->unread
                );
            }

        }
        echo json_encode($data);
        exit();
    }

    public function close_chat_box($id)
    {
        $check_chat = get_row('tbl_private_chat', array('private_chat_id' => $id));
        if (empty($check_chat)) {
            // check the private_chat_id is exist
            $data = array(
                "chatid" => $id,
                "error" => 'Invalid data',
            );
        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));
            if (empty($check_user)) {
                $data = array(
                    "chatid" => $id,
                    "error" => 'Something wrong',
                );
            } else {
                $uc_data['active'] = 2;
                $this->db->where("private_chat_users_id", $check_user->private_chat_users_id);
                $this->db->update("tbl_private_chat_users", $uc_data);
                

                if (!empty($check_chat->chat_title)) {
                    $check_user->title = $check_chat->chat_title;
                }

                $data = array(
                    "chatid" => $id,
                    "title" => $check_user->title,
                    "unread" => $check_user->unread
                );
            }

        }
        echo json_encode($data);
        exit();
    }

    public function delete_chat_box($id)
    {
        $check_chat = get_row('tbl_private_chat', array('private_chat_id' => $id));

        if (empty($check_chat)) {
            // check the private_chat_id is exist
            $data = array(
                "chatid" => $id,
                "error" => 'Invalid Chat',
            );
        } else {
            // check user validation is the user who chat to other
            $check_user = get_row('tbl_private_chat_users', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));
            if (empty($check_user)) {
                $data = array(
                    "chatid" => $id,
                    "error" => 'something_wrong',
                );
            } else {
                // check how many user is deleted the chat
                // if all user delete the conversation except you then deleted all message
                // else keep all message just chat the deleted flag by user id
                $check_total_chat = count($this->chat_model->check_total_chat($id));

                if ($check_total_chat == 1) {
                    delete('tbl_private_chat_messages', array('private_chat_id' => $id, 'user_id' => $this->session->userdata('id')));
                    delete('tbl_private_chat_users', array('private_chat_id' => $id));
                    delete('tbl_private_chat', array('private_chat_id' => $id));
                } else {
                    $last_id = $this->db->where('private_chat_id', $id)->order_by('private_chat_messages_id', 'desc')->limit(1)->get('tbl_private_chat_messages')->row('private_chat_messages_id');
                    $udata['deleted'] = $last_id;
                    $udata['active'] = 2;
                    update('tbl_private_chat_users', array('private_chat_users_id' => $check_user->private_chat_users_id), $udata);
                }
                if (!empty($check_chat->chat_title)) {
                    $check_user->title = $check_chat->chat_title;
                }
                $data = array(
                    "chatid" => $id,
                    "title" => $check_user->title,
                    "unread" => $check_user->unread
                );
            }

        }
        echo json_encode($data);
        exit();
    }


    public function open_chats_boxes()
    {
        $open_chats = $this->chat_model->get_open_chats();

        $view = $this->load->view("backend/chat/open_chats", array(
            "all_chats" => $open_chats
        ),
            TRUE);
       
        $open_chats = array();
        foreach ($open_chats as $v_chat) {
            $open_chats[] = $v_chat->private_chat_id;
        }

        $data = array(
            "view" => $view,
            "open_chats" => $open_chats
        );
        echo json_encode($data);
        exit();
    }


    public function change_title($chat_user_id, $group = null)
    {
        $title = $this->input->post('title', true);
        if (!empty($title)) {
            $c_title['title'] = $title;
            update('tbl_private_chat_users', array('private_chat_users_id' => $chat_user_id), $c_title);
            echo json_encode($title);
        } else {
            $data['group'] = $group;
            $data['chat_details'] = get_row('tbl_private_chat_users', array('private_chat_users_id' => $chat_user_id));
            $data['modal_subview'] = $this->load->view('chat/change_title', $data, FALSE);
            $this->load->view($this->view . '_layout_modal', $data);
        }
    }

    public function conversations($to_user_id = null)
    {
        $data['breadcrumbs'] = lang('private') . ' ' . lang('chat');
        $profile = profile();
        if (empty($to_user_id)) {
            if ($profile->role_id == 2) {
                $where = array('user_id !=' => $profile->user_id, 'role_id !=' => 2, 'role_id !=' => 5);
            } else {
                $where = array('user_id !=' => $profile->user_id);
            }
            $to_user_id = get_row('tbl_users', $where, 'user_id');
        }
        if ($profile->role_id == 2 && !empty($to_user_id)) {
            $user_info = get_row('tbl_users', array('user_id' => $to_user_id));
            if ($user_info->role_id == 2) {
                redirect('chat/conversations');
            }
        }
        $data['user_id'] = $to_user_id;
        $data['chats'] = get_row('tbl_private_chat_users', array('to_user_id' => $to_user_id, 'user_id' => $this->session->userdata('user_id')));
        $data['title'] = lang('conversation') . ' ' . lang('with') . ' ' . fullname($to_user_id);
        if (!empty($data['chats'])) {
            $data['all_messages'] = $this->chat_model->get_chat_messages($data['chats']->private_chat_id, $data['chats']->deleted);
        }
        $data['subview'] = $this->load->view('chat/full_conversations', $data, true);

        $this->load->view($this->view . '_layout_main', $data);
    }

    public function all_conversations($to_user_id)
    {
        // open the chat with message
        $open_chats = $this->chat_model->get_open_chats($to_user_id);

        $chat_windows = array();
        if (!empty($open_chats)) {
            foreach ($open_chats as $chats) {
                $c_data = array();
                // mark chat read if window is active
                if ($chats->unread && $chats->active == 1) {
                    $chats->unread = 0;
                    $uc_data['unread'] = 0;
                    $this->chat_model->_table_name = 'tbl_private_chat_users';
                    $this->chat_model->_primary_key = 'private_chat_users_id';
                    $this->chat_model->save($uc_data, $chats->private_chat_users_id);
                }
                // If a chat title is set then replace with the user title in tbl_private_chat_users
                if (!empty($chats->chat_title)) {
                    $chats->title = $chats->chat_title;
                }
                $c_data['title'] = $chats->title;
                $c_data['chatid'] = $chats->private_chat_id;
                $c_data['unread'] = $chats->unread;
                $c_data['active'] = $chats->active;
                $c_data['to_user_id'] = $chats->user_id;

                // get all message by private chat id
                $messages = array();
                $limit = 5;
                $last_reply_id = 0;
                $all_messages = $this->chat_model->get_chat_messages($chats->private_chat_id, $chats->deleted);

                foreach ($all_messages as $message) {
                    array_push($messages, $message);
                    if ($last_reply_id == 0) {
                        $last_reply_id = $message->private_chat_messages_id;
                    }
                }
                $messages = array_reverse($messages);

                $template = $this->load->view("backend/chat/conversations_body.php", array(
                    "all_messages" => $messages,
                    "chat" => $chats,
                    "last_reply_id" => $last_reply_id
                ), TRUE);
                // Store template
                $c_data['messages_template'] = $template;
                // Add Chat to array
                $chat_windows[] = $c_data;
            }
        }
        echo json_encode(array("chats" => $chat_windows));
        exit();
    }
    public function chatRequestCheck() {
        $admin_id =$this->session->userdata('id');
        $request_details=$this->chat_model->get_requests($admin_id);
        echo json_encode($request_details);
    }
    public function accept_request($agent_id,$request_id) {
        $admin_id =$this->session->userdata('id');
        $user = profile_agent($agent_id);
        $chat_details=$this->chat_model->get_chat_details($agent_id,$admin_id);
        $request_details=$this->chat_model->get_request_details($request_id);
        if($request_details[0]->private_chat_id==0){
            if(empty($chat_details)){
                $title2 = " <strong>" . $user->First_Name . "</strong>";
                $title = " <strong>" . $this->session->userdata('name') . "</strong";
                $c_data['user_id'] = $this->session->userdata('id');
                $this->db->insert('tbl_private_chat',$c_data);
                $private_chat_id = $this->db->insert_id();
                $cu__data['private_chat_id'] = $private_chat_id;
                $cu__data['user_id'] = $admin_id;
                $cu__data['to_user_id'] = $agent_id;
                $cu__data['title'] = $title2;
                $cu__data['sender'] = 'admin';
                $cu__data['receiver'] = 'agent';
                $cu__data['active'] = 2;
                $cu__data['unread'] = 1;    
                $this->db->insert('tbl_private_chat_users',$cu__data); 

                $cu_data['private_chat_id'] = $private_chat_id;
                $cu_data['user_id'] = $agent_id;
                $cu_data['to_user_id'] = $admin_id;
                $cu_data['active'] = 1;
                $cu_data['sender'] = 'agent';
                $cu_data['receiver'] = 'admin';
                $cu_data['title'] = $title;
                $this->db->insert('tbl_private_chat_users',$cu_data);
            }else{
                $private_chat_id=$chat_details[0]->private_chat_id;
            }
            $request_details=$this->chat_model->update_request($request_id,$private_chat_id,$agent_id);
            $c_data = array(
                        "success" => 1,
                        "chatid" => $private_chat_id,
                        "user_id" => $agent_id,
                        "sound" => true
                    );
            echo json_encode($c_data);
        }else{
            $return['success'] = 0;
            $return['error'] = "Request already accepted";
            $return['color'] = 'green';
            echo json_encode($return);
        }       
    }
    public function cancel_request($request_id) {
        $admin_id =$this->session->userdata('id');
        $request_details=$this->chat_model->update_request_cancel_status($request_id,$admin_id);
        $c_data = array(
                    "success" => 1,  
                );
        echo json_encode($c_data);
    }

}
