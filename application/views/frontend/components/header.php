<?php  
 $this->load->helper('common');
 $data = title();
 ?>

<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <title><?php echo $data[0]->Title ?></title>
       <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico">
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>skin/dist/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>skin/assets/css/custom.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>skin/examples/carousel/carousel.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>skin/updates/update1/css/style01.css" rel="stylesheet" media="screen">   
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
          <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        <!-- Fonts -->  
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>   
        <!-- Font-Awesome -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/assets/css/font-awesome.min.css" media="screen" />
        <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/css/fullscreen.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/rs-plugin/css/settings.css" media="screen" />
        <!-- Picker --> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/assets/css/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/assets/css/daterangepicker.min.css">
        <!-- bin/jquery.slider.min.css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.round.css" type="text/css">    
        <!-- jQuery --> 
        <script src="<?php echo base_url(); ?>skin/js/custom.js"></script>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>skin/js/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>skin/assets/js/jquery.v2.0.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>skin/assets/js/jquery.daterangepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>skin/assets/js/sweet-alert.js"></script>
        <script src="<?php echo base_url(); ?>skin/js/common.js"></script>
        <!-- Sweet-Alert Custom Style -->
        <style>
            .swal2-popup .swal2-styled {
                padding: 3px 15px !important;
            }
            .swal2-popup .swal2-title {
                color: #d03328 !important;
            }
            .swal2-popup .swal2-styled:focus {
                box-shadow: none !important;
            }
        </style>
        <!-- end -->
        <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>system/currency/script/ajax.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>system/currency/script/validation.min.js"></script> -->
</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
Tawk_API.visitor = {
name : '<?php echo $this->session->userdata('agent_name'); ?>',
email : '<?php echo $this->session->userdata('agent_email'); ?>',
hash : '<?php echo hash_hmac("sha256",$this->session->userdata('agent_email'),"46148dd63113048bfce0dc7000660245ee7a822d"); ?>'
};
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be3cfb370ff5a5a3a712774/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->