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
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/assets/css/font-awesome.min.css" media="screen" />
	<!-- Load jQuery -->
	<script src="<?php echo base_url(); ?>skin/assets/js/jquery.v2.0.3.js"></script>
    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 

    <style>
    	body {
    		font-family: 'Open Sans',Helvetica;
    		background-color: #f2f2f2;
    	}
    	.box-blue {
    		padding: 3em 3em 2em;
    		border-radius: 10px;
    		background: #329ac4;
    	}
    	.margtop40 {
    		margin-top: 40px;
    	}
    	.text-green {
    		color: #76d87b;
    	}
    	.text-white {
    		color: white;
    	}
    	.text-light {
    		color: rgba(255, 255, 255, 0.7);
    	}
    </style>
  </head>
<body>
	<div class="container">
		<div class="margtop40">
			<div class="col-md-offset-3 col-md-6 box-blue">
				<div class="row">
					<h1 class="text-white text-center">Password Reseted</h1>
				</div>
				<div class="row">
					<h2 class="text-center text-white"><i class="fa fa-check-circle fa-fw fa-4x text-green"></i></h2>
					<h4 class="text-center text-white margtop40"><b class="text-green">Check Your E-mail!</b> Your Password is reseted successful</h4>
					<p class="text-center text-white">We have send you e-mail to Your current  password</p>
				</div>
				<div class="row margtop40 text-white">
					<p class="text-center text-light" style="margin: 0">Please check your email </p>
				</div>
			</div>
		</div>
		<div class="col-md-offset-3 col-md-6 margtop40">
			<div class="row">
				<p class="text-center"><a href="<?php echo base_url(); ?>" class="lblue">Back to Login</a></p>
			</div>
		</div>
	</div>
</body>