    <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    
                    <li class="user-pro">

                        <?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/user.jpg';                                 
                            }
                            ?>

                    <a href="#" class="waves"><img src="<?php echo base_url() . $face_file;?>" alt="user-img" class="img-circle" height="30" width="30"> <span class="hide-menu">

                       <?php 
                                $account_type   =   $this->session->userdata('login_type');
                                $account_id     =   $account_type.'_id';
                                $name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id));
                                echo $name;
                        ?>


                        
                    
                    </a>
                        
                    </li>
    

     <!---  Permission for Admin Dashboard starts here ------>
        <?php $check_admin_permission = $this->db->get_where('tb_roleadmin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->dashboard;?>
        <?php if($check_admin_permission == '1'):?>
            <li> <a href="<?php echo base_url();?>admin/dashboard" class="waves"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Dashboard') ;?></span></a> </li>
        <?php endif;?> 
    <!---  Permission for Admin Dashboard ends here ------>
    

    <!---  Permission for Admin Manage Employee starts here ------>
    <?php $check_admin_permission = $this->db->get_where('tb_roleadmin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->kelola_pengelola;?>
    <?php if($check_admin_permission == '1'):?> 

        
        <li class="<?php if ($page_name == 'hostel') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/hostel">
                        <i class="fa fa-user p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('Kelola Pengelola'); ?></span>
                        </a>
        </li>

    <?php endif;?> <!---  Permission for Admin Manage Employee ends here ------>


     <!---  Permission for Admin Manage Student starts here ------>
     <?php $check_admin_permission = $this->db->get_where('tb_roleadmin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->kelola_penghuni;?>
    <?php if($check_admin_permission == '1'):?>          
                
        <li class="student"> <a href="#" class="waves"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Kelola Penghuni');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'new_student' ||
                   
                    $page_name == 'student_information' )
                  
                echo 'opened active has-sub';
            ?> ">


                        
                    <li class="<?php if ($page_name == 'new_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/new_student">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('Penghuni Baru'); ?></span>
                        </a>
                    </li>


                    
                     <li class="<?php if ($page_name == 'student_information' || $page_name == 'student_information' || $page_name == 'view_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_information">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('Daftar Penghuni'); ?></span>
                        </a>
                    </li>


        
     
                 </ul>
    </li>
    <?php endif;?> <!---  Permission for Admin Manage Student ends here ------>

    
    <!---  Permission for Admin Manage Kosan starts here ------>
    <?php $check_admin_permission = $this->db->get_where('tb_roleadmin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->kelola_kosan;?>
    <?php if($check_admin_permission == '1'):?>          

    <li> <a href="#" class="waves"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Informasi Kosan');?><span class="fa arrow"></span></span></a>
            <ul class=" nav nav-second-level<?php
            if ($page_name == 'dormitory' ||
                    $page_name == 'kamar_kosan' )
                echo 'opened active';
            ?>">

                <li class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/dormitory">
                <i class="fa fa-angle-double-right p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('Kelola Kosan'); ?></span>
                </a>
            </li>
                    
                    <li class="<?php if ($page_name == 'kamar_kosan') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/kamar_kosan">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('Kelola Kamar Kosan'); ?></span>
                        </a>
                    </li>
     
            </ul>
    </li>
    <?php endif;?> <!---  Permission for Admin Manage Kosan ends here ------>        

<!---  Permission for Admin Manage Tagihan starts here ------>
<?php $check_admin_permission = $this->db->get_where('tb_roleadmin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->kelola_tagihan;?>
    <?php if($check_admin_permission == '1'):?>          
    <li class="collect_fee"> <a href="#" class="waves"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('informasi_tagihan');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'income' ||
                        $page_name == 'student_payment'||
                        $page_name == 'view_invoice_details'||
                        $page_name == 'daftar_tagihan_penghuni')
                echo 'opened active';
            ?>">

                 <li class="<?php if ($page_name == 'student_payment') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_payment">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('Buat Tagihan'); ?></span>
                        </a>
                    </li>
                    
                     <li class="<?php if ($page_name == 'daftar_tagihan_penghuni') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/daftar_tagihan_penghuni">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('Kelola Tagihan'); ?></span>
                            
                        </a>
                    </li>
     
        </ul>
    </li>
    <?php endif;?> <!---  Permission for Admin Manage Tagihan ends here ------>        

    
        <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>systemsetting/system_settings">
                        <i class="fa fa-gears p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('Pengaturan Sistem'); ?></span>
                        </a>
        </li>        
         

        <?php $checking_level = $this->db->get_where('tb_admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->level;?>
        <?php if($checking_level == '1'):?>
        <li> <a href="#" class="waves"><i data-icon="&#xe006;" class="fa fa-cubes p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Manajemen Admin');?><span class="fa arrow"></span></span></a>
        
            <ul class=" nav nav-second-level<?php
                        if ($page_name == 'newAdministrator') echo 'opened active'; ?>">

                        <li class="<?php if ($page_name == 'admin_add') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/newAdministrator">
                            <i class="fa fa-angle-double-right p-r-10"></i>
                                 <span class="hide-menu"><?php echo get_phrase('Admin Baru'); ?></span>
                            </a>
                        </li>

     
                 </ul>
            </li>
        <?php endif;?>
 
      

    
            
                <li class="<?php if ($page_name == 'informasi') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/informasi">
                        <i class="fa fa-info-circle p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('Informasi'); ?></span>
                        </a>
                </li>

                <li class="">
                        <a href="<?php echo base_url(); ?>login/logout">
                        <i class="fa fa-sign-out p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('Logout'); ?></span>
                        </a>
                </li>
                  
                  
                </ul>
            </div>
        </div>
<!-- Left navbar-header end -->