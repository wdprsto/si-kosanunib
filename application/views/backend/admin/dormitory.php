<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('Tambah Data Kosan');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'admin/dormitory/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
               
                <div class="form-group">
                <span style="color: red;"><?php echo validation_errors(); ?></span>
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Kosan');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" / required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Alamat');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Deskripsi Kosan');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                </div>


                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS--> 

                    <div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('list');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
				
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Nama Kosan');?></div></th>
                    		<th><div><?php echo get_phrase('Kapasitas Total');?></div></th>
                            <th><div><?php echo get_phrase('Terhuni');?></div></th>
                    		<th><div><?php echo get_phrase('Alamat');?></div></th>
							<th><div><?php echo get_phrase('Deskripsi');?></div></th>
							<th><div><?php echo get_phrase('Aksi');?></div></th>
                           
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $dormitories =  $this->db->get('tb_kosan')->result_array();
                    foreach($dormitories as $key => $dormitory):?>         
                        <tr>
                        <td><?php echo $counter++;?></td>
							<td><?php echo $dormitory['nama_kosan'];?></td>
							<td><?php 
							
								$this->db->select_sum('kapasitas_total');
                                $this->db->from('tb_kamarkosan');
                                $this->db->where('kamarkosan_id_kosan', $dormitory['id_kosan']);
                                $query = $this->db->get();
                                $kapasitastotal = $query->row()->kapasitas_total;
                                if($kapasitastotal == NULL){
                                    $kapasitastotal = 0;
                                }

								$jumlahkamar = $this->db->where('kamarkosan_id_kosan', $dormitory['id_kosan'])->count_all_results('tb_kamarkosan');
								
								echo $jumlahkamar.' Kamar, '.$kapasitastotal.' Orang';
								?>
                            </td>
                            <td><?php
                                $this->db->where('penghuni_id_kosan', $dormitory['id_kosan']);
                                    $this->db->from('tb_penghuni');
                                    $this->db->join('tb_kosan', 'id_kosan = penghuni_id_kosan', 'inner');  
                                    echo $this->db->count_all_results()." Orang";?>
                            </td>
                            <td><?php echo $dormitory['alamat_kosan'];?></td>
                            <td><?php echo $dormitory['deskripsi_kosan'];?></td>
                            <td>
							
				    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_dormitory/<?php echo $dormitory['id_kosan'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/dormitory/delete/<?php echo $dormitory['id_kosan'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 
			
                           
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
            