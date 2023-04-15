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



            <li> <a href="<?php echo base_url();?>hostel/dashboard" class="waves"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Dashboard') ;?></span></a> </li>

            <li> <a href="#" class="waves"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('informasi_kosan');?><span class="fa arrow"></span></span></a>
            <ul class=" nav nav-second-level<?php
            if ($page_name == 'dormitory' ||
                    $page_name == 'room_type' ||
                    $page_name == 'hostel_room' )
                echo 'opened active';
            ?>">

                <li class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>hostel/dormitory">
                <i class="fa fa-angle-double-right p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('kelola_kosan'); ?></span>
                </a>
            </li>

                    <li class="<?php if ($page_name == 'hostel_room') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>hostel/hostel_room">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('kamar_kos'); ?></span>
                        </a>
                    </li>
     
                 </ul> 
                </li>
                
             
            <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>hostel/invoice/<?php echo $this->session->userdata('id_kosan'); ?>">
                    <i class="fa fa-paypal p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('Tagihan'); ?></span>
                </a>
            </li>     

            <li class="<?php if ($page_name == 'informasi') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>hostel/informasi/">
                    <i class="ti-info p-r-10"></i>
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