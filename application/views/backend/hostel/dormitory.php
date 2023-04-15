<div class="row">
                    <div class="col-sm-12">
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
                    		<th><div><?php echo get_phrase('Alamat');?></div></th>
							<th><div><?php echo get_phrase('Deskripsi');?></div></th>
							<th><div><?php echo get_phrase('Aksi');?></div></th>
                           
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $dormitories =  $this->db->get('tb_kosan')->result_array();
                    foreach($dormitories as $key => $dormitory):?> 
					<?php
									if($dormitory['id_kosan']==$this->session->userdata('id_kosan')){
								?>        
                        <tr>
                            <td><?php echo $counter++;?></td>
							<td><?php echo $dormitory['nama_kosan'];?></td>
							<td><?php 
							
								$this->db->select_sum('kapasitas_total');
                                $this->db->from('tb_kamarkosan');
                                $this->db->where('kamarkosan_id_kosan', $dormitory['id_kosan']);
                                $query = $this->db->get();
								$kapasitastotal = $query->row()->kapasitas_total;

						
                                
								$jumlahkamar = $this->db->where('kamarkosan_id_kosan', $dormitory['id_kosan'])->count_all_results('tb_kamarkosan');
								
								echo $jumlahkamar.' Kamar, '.$kapasitastotal.' Orang';
								?></td>
                            <td><?php echo $dormitory['alamat_kosan'];?></td>
                            <td><?php echo $dormitory['deskripsi_kosan'];?></td>
							<td>
								
				    			<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_dormitory/<?php echo $dormitory['id_kosan'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
								
			
                           
        					</td>
                          
                        </tr>
						<?php
									}
								?>
    <?php endforeach;?>
                    </tbody>
                </table>
				</div>
			</div>
		</div>
	</div>
</div>
			
            <!----TABLE LISTING ENDS--->
            