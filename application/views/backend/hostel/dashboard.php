 <!--row -->
            <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-home bg-megna"></i>
                                <div class="bodystate">
                                   
                                    <h4><?php 
                                   
                                    echo $jumlahkamar = $this->db->where('kamarkosan_id_kosan', $this->session->userdata('id_kosan'))->count_all_results('tb_kamarkosan');

                                    ?></h4>

                                    <span class="text-muted"><?php echo get_phrase('Kamar Kosan');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4><?php 
                                    
                                   
                                    $this->db->where('penghuni_id_kosan', $this->session->userdata('id_kosan'));
                                    $this->db->from('tb_penghuni');
                                    $this->db->join('tb_kosan', 'id_kosan = penghuni_id_kosan', 'inner');
                                    
                                    echo $this->db->count_all_results();

                                    ?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Jumlah Penghuni');?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-inverse"></i>
                                    <div class="bodystate">
                                    
                                    <?php
                                    $this->db->select_sum('t.total_tagihan');
                                    $this->db->from('tb_tagihan t');
                                    $this->db->where('t.status', 'bl');
                                    $this->db->join('tb_penghuni p', 't.tagihan_id_penghuni = p.penghuni_id', 'left');
                                    $this->db->group_by('p.penghuni_id_kosan');
                                    $this->db->having('penghuni_id_kosan', $this->session->userdata('id_kosan'));
                                    $query = $this->db->get();
                                    $income_amount = $query->row()->total_tagihan; ?>

                                    <h4>
                                    <?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?><?php echo number_format($income_amount,0,",",".");?>
                                    </h4>
                                  
                                    <span class="text-muted"><?php echo get_phrase('Total Tagihan');?></span>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
                <!--/row -->
             
               
                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Penghuni Kosan Terbaru');?></h3>
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
                                    foreach ($get_student_from_model as $key => $student):
                                        if($student['penghuni_id_kosan'] == $this->session->userdata('id_kosan') ){
                                    ?>
                                       
                                            <td>
                                            <img src="<?php echo $this->crud_model->get_image_url('student', $student['penghuni_id']);?>" class="img-circle" width="40" height="40">
                                            </td>
                                            <td><?php echo $student['nama_penghuni'];?></td>
                                            <td><?php echo $student['email'];?></td>
                                            <td><?php echo $student['no_hp_penghuni'];?></td>
                                        </tr>
                                    <?php 
                                        }
                                    endforeach;
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->