 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$ci =& get_instance();
$sess = array();
$sess_id=$ci->session->userdata('id');
$sess_email=$ci->session->userdata('id');
$last_action = $ci->session->userdata('last_action');
if (date('YmdHis') > $last_action+40000) {
	redirect(base_url()."backend");
}
if ($sess_id=="" && $sess_email=="") {
	redirect(base_url()."backend");
}

