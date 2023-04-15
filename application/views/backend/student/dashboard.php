 <!--row -->
 <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4><?php 
                                         $this->db->where('penghuni_id_kosan', $this->session->userdata('id_kosan'));
                                         $this->db->where('penghuni_id !='.$this->session->userdata('student_id'));
                                         $this->db->from('tb_penghuni');
                          
                                         echo $this->db->count_all_results();
                                    ?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Teman Kosan');?></span>
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
                              
                                    $expense_amount           =   $this->crud_model->get_tagihanku($this->session->userdata('student_id'));
                                  
                                    
                                    ?>
                                    

                                    <h4><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?><?php echo number_format($expense_amount,0,",",".");?></h4>
                                    <span class="text-muted"><?php echo get_phrase('Tagihan');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
               
</div>