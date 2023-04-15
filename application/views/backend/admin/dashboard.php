 <!--row -->
            <div class="row">
                     <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('tb_admin');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Admin');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('tb_pengelola');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Pengelola');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('tb_penghuni');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Penghuni');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-home bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('tb_kosan');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Kosan');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-home bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('tb_kamarkosan');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Kamar');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   

                    
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-money bg-info"></i>
                                <div class="bodystate">

                                <?php
                                $this->db->select_sum('total_tagihan');
                                $this->db->from('tb_tagihan');
                                $this->db->where('status', 'l');
                                $query = $this->db->get();
                                $income_amount = $query->row()->total_tagihan; ?>
                                    <h4>
                                    <?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?><?php echo number_format($income_amount,0,",",".");?>
                                    </h4>

                                    <span class="text-muted"><?php echo get_phrase('Pendapatan');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-money bg-info"></i>
                                <div class="bodystate">

                                <?php
                                $this->db->select_sum('total_tagihan');
                                $this->db->from('tb_tagihan');
                                $this->db->where('status', 'bl');
                                $this->db->or_where('status', 'mk');
                                $query = $this->db->get();
                                $income_amount = $query->row()->total_tagihan; ?>
                                    <h4>
                                    <?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?><?php echo number_format($income_amount,0,",",".");?>
                                    </h4>

                                    <span class="text-muted"><?php echo get_phrase('Tagihan Tertunda');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  
                    

            </div>
                <!--/row -->
                <!-- .row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Pengelola Baru');?></h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                            <?php $get_teacher_from_model = $this->crud_model->list_semua_pengelola();
                                    foreach ($get_teacher_from_model as $key => $teacher):?>
                                            <td><img src="<?php echo $teacher['face_file'];?>" class="img-circle" width="40px" height="40"></td>
                                            <td><?php echo $teacher['nama_pengelola'];?></td>
                                            <td><?php echo $teacher['email'];?></td>
                                            <td><?php echo $teacher['no_hp_pengelola'];?></td>
                                        </tr>
                                    <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Penghuni Baru');?></h3>
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                            <?php $get_student_from_model = $this->crud_model->list_semua_penghuni();
                                    foreach ($get_student_from_model as $key => $student):?>
                                             <td>
                                                
                                                <img src="<?php echo $this->crud_model->get_image_url('student', $student['penghuni_id']);?>" class="img-circle" width="40" height="40">

                                            </td>
                                            <td><?php echo $student['nama_penghuni'];?></td>
                                            <td><?php echo $student['email'];?></td>
                                            <td><?php echo $student['no_hp_penghuni'];?></td>
                                        </tr>
                                    <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
