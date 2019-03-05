<?php  
$autoload['config'] = array('email');

defined('BASEPATH') OR exit('No direct script access allowed');
$ci =& get_instance();
$ci->db->select('*');
$ci->db->from('hotel_tbl_mail_setting');
$ci->db->where('id','1');
$query=$ci->db->get();
$output = $query->result();
$config["multipart"]="related"; 
    $config['protocol'] = $output[0]->protocol;
    $config['smtp_host'] = $output[0]->smtp_host; //change this
    $config['smtp_port'] = $output[0]->smtp_port;
    $config['smtp_user'] = $output[0]->smtp_user; //change this
    $config['smtp_pass'] = $output[0]->smtp_password; //change this
    $config['mailtype'] = $output[0]->mailtype;
    $config['charset'] = $output[0]->smtp_charset;
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
?>




