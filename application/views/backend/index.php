<?php 
$system_name    = $this->db->get_where('tb_setting', array('type' => 'system_name'))->row()->description;
$system_address = $this->db->get_where('tb_setting', array('type' => 'address'))->row()->description;
$loginType      = $this->session->userdata('login_type');
?>
<?php include 'css.php'; ?>

    <!-- Preloader -->


    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">


	<?php include 'header.php'; ?>
	<?php include $loginType.'/navigation.php';?>
	<?php include 'page_info.php';?>
	<?php include $loginType.'/'.$page_name.'.php';?>
		
     
		
               
            </div>
            <!-- /.container-fluid -->

		
        </div>
        <!-- /#page-wrapper -->
    </div>
 <?php include 'modal.php'; ?>
 <?php include 'js.php'; ?>