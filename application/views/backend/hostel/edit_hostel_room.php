<?php $hostel_room = $this->db->get_where('tb_kamarkosan', array('id_kamarkosan' => $param2, 'kamarkosan_id_kosan' => $param3))->result_array();
foreach($hostel_room as $key => $hostel_room):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('update');?></div>
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'hostel/hostel_room/update/'.$param2.'/'.$param3.'/' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <span style="color: red;"><?php echo validation_errors(); ?></span>
                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Kamar');?></label>
                    <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" value="<?php echo $hostel_room['nama_kamar'];?>" / maxlength = '11' required>
                     </div>
                </div>

                    
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kapasitas Total');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" value="<?php echo $hostel_room['kapasitas_total'];?>" name="num_bed"/ min='0' required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Biaya Kamar');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" value="<?php echo $hostel_room['biaya_kamar'];?>" name="cost_bed"/ min='0' required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Deskripsi');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"><?php echo $hostel_room['deskripsi'];?></textarea>
                    </div>
                </div>


				        
                <input type="hidden" class="form-control" name="dormitory_id" value="<?php echo $this->session->userdata('id_kosan'); ?>" required>
                    				
							
                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update');?></button>
					</div>
							
                    </form>                 
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->
<?php endforeach;?>