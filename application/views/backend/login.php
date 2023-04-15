<?php 
$system_name = $this->db->get_where('tb_setting', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('tb_setting', array('type' => 'system_title'))->row()->description;
?>

<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
        <title><?php echo $system_title;?></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme"  rel="stylesheet">
<link href="<?php echo base_url();?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	 
	
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
  <br><br><br>
    <div class="white-box">
	 <h4 class="box-title m-b-20" align="center">
					<img src="<?php echo base_url() ?>uploads/logo.png" class="img-circle" width="70" height="70"/></h4>
					<h5 align="center"><a href=""><?php echo $system_name;?></a></h5>
					
					<br><br>
					
	<form method="post" role="form" id="loginform" class="form-horizontal form-material" action="<?php echo base_url();?>login/validate_login">

       <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="<?php echo get_phrase('Email');?>" style="width:100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12" >
                            <input class="form-control" type="password" name="password" required="" placeholder="<?php echo get_phrase('Password');?>" style="width:100%">
                        </div>
                    </div>
    

       <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
		
		  
<button class="btn btn-info btn-rounded btn-sm btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
<?php echo get_phrase('log_in');?>
</button>
                    <div align="center"><img id="install_progress" src="<?php echo base_url() ?>assets/images/preloader.gif" style="margin-left: 20px; display: none"/></div>

                        </div>
                    </div>
					<br><br><br><br><br><br><br><br><br><br>
                 <?php echo form_close();?>
 
	
    </section>
<script src="js/index.js"></script>	


<!-- jQuery -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>


<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>optimum/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

<?php if (($this->session->flashdata('error_message')) !=''):?>
<script type="text/javascript">
$(document).ready(function(){
  $.toast({
    heading: 'Error Message',
    text: '<?php echo $this->session->flashdata('error_message');?>',
    position: 'top-right',
    loaderBg: '#ff6849',
    icon:'warning',
    hideAfter: '3500',
    stack: 6

  });

});


</script>



<?php endif;?>




</body>

</html>
