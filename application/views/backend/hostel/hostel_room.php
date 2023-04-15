<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('Tambah');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'hostel/hostel_room/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    
                <div class="form-group">
                    <span style="color: red;"><?php echo validation_errors(); ?></span>
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama_Kamar');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" / maxlength = '11' required>
                     </div>
                 </div>
                              
                <input type="hidden" class="form-control" name="dormitory_id" value="<?php echo $this->session->userdata('id_kosan'); ?>" required>
                    
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kapasitas_total');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="num_bed"/ min ='0' required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('biaya_kamar');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="cost_bed"/ min ='0' required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('deskripsi');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>


								
							
                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->

                    <div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
				
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Nama');?></div></th>
                    		<th><div><?php echo get_phrase('Kapasitas Total');?></div></th>
                    		<th><div><?php echo get_phrase('Biaya');?></div></th>
                    		<th><div><?php echo get_phrase('Deskripsi');?></div></th>
                            <th><div><?php echo get_phrase('Penghuni');?></div></th>
                    		<th><div><?php echo get_phrase('Aksi');?></div></th>
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $hostel_rooms =  $this->db->where('kamarkosan_id_kosan', $this->session->userdata('id_kosan'))->get('tb_kamarkosan')->result_array();
                    foreach($hostel_rooms as $key => $hostel_room):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
							<td><?php echo $hostel_room['nama_kamar']; ?></td>
                            <td><?php echo $hostel_room['kapasitas_total'];?></td>
							<td><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($hostel_room['biaya_kamar'],2,".",",");?></td>
							<td><?php echo $hostel_room['deskripsi'];?></td>

                            <td>
                                <ul>
                                <?php 
                                    
                                    $penghuni = $this->db->select('*')->from('tb_penghuni')->where('penghuni_id_kamarkosan', $hostel_room['id_kamarkosan'])
                                    ->where('penghuni_id_kosan', $hostel_room['kamarkosan_id_kosan'])->get()->result_array();
                                    foreach($penghuni as $key => $penghuni):
                                ?>
                                        <li><?php echo$penghuni['nama_penghuni'];?></li>
                                <?php endforeach;?> 
                                </ul>
                                
                            
                            </td>


							<td>
							
				    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_hostel_room/<?php echo $hostel_room['id_kamarkosan'];?>/<?php echo $hostel_room['kamarkosan_id_kosan'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>hostel/hostel_room/delete/<?php echo $hostel_room['id_kamarkosan'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 
			
                           
        					</td>
                        </tr>
    <?php endforeach;?>
                    </tbody>
                </table>
				</div>
			</div>
		</div>
	</div>
</div>
			
            <!----TABLE LISTING ENDS--->
            