<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Tagihan');?></div>
				<div class="panel-body table-responsive">
 					<table id="example23" class="display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
							
								<th><div><?php echo get_phrase('Nama Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Deskripsi');?></div></th>
								<th><div><?php echo get_phrase('Total Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Status');?></div></th>
								<th><div><?php echo get_phrase('Jatuh Tempo');?></div></th>
								<th><div><?php echo get_phrase('Aksi');?></div></th>
							</tr> 
						</thead>
                    <tbody>
						<?php
							$count = 1;
							$this->db->where("(status = 'bl' or status = 'mk') and tagihan_id_penghuni = ".$this->session->userdata('student_id'));
                    		$this->db->order_by('creation_timestamp' , 'desc');
                    		$invoices = $this->db->get('tb_tagihan')->result_array();
                    	
                    	?>
						<?php foreach($invoices as $key => $row):?>
						
                        <tr>
					
							<td><?php echo $row['nama_tagihan'];?></td>
							<td><?php echo $row['deskripsi_tagihan'];?></td>
							<td>
							<?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?><?php echo number_format($row['total_tagihan'],2,".",",");?>
							</td>
                         
                             <td>
								 <?php 
									if($row['status']=='bl'){ ;?>
									 	<span class="label label-danger"><?php echo get_phrase('Belum Dibayar');?></span>
									<?php }else if($row['status']=='mk'){ ;?>
										<span class="label label-warning"><?php echo get_phrase('Menunggu Konfirmasi');?></span>
									<?php } ?>

							
                             </td>
                       

							<td><?php echo date_format(date_create($row['jatuh_tempo']), ' d M Y').' ('.date_diff(date_create($row['jatuh_tempo']),date_create(date('Y-m-d')))->format('H%R%a').')';?></td>
							<td>
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_view_invoice/<?php echo $row['tagihan_id'];?>');"> <button type="button" class="btn btn-lihat btn-sm"><i class="ti ti-eye"></i> Lihat</button></a>	      
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_update_tagihan/<?php echo $row['tagihan_id'];?>');"><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-paypal"></i> Bayar Tagihan</button></a>	
							</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

		
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Riwayat Pembayaran');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

<table id="example24" class="display nowrap" cellspacing="0" width="100%">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
					            <th><div><?php echo get_phrase('Nama Tagihan');?></div></th>
					            <th><div><?php echo get_phrase('Deskripsi');?></div></th>
					            <th><div><?php echo get_phrase('Total Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Status');?></div></th>
					            <th><div><?php echo get_phrase('Tanggal Bayar');?></div></th>
					            <th><div><?php echo get_phrase('Aksi');?></div></th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php 
					        	$count = 1;
								$this->db->where('tagihan_id_penghuni' , $this->session->userdata('student_id'));
								$this->db->where('status' , 'l');
					        	$this->db->order_by('tgl_bayar' , 'desc');
					        	$payments = $this->db->get('tb_tagihan')->result_array();
					        	foreach ($payments as $key => $row):
					        ?>
					        <tr>
					            <td><?php echo $count++;?></td>
					            <td><?php echo $row['nama_tagihan'];?></td>
					            <td><?php echo $row['deskripsi_tagihan'];?></td>
					            <td><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['total_tagihan'],2,".",",");?></td>
					            
									<td>
										<span class="label label-success"><?php echo get_phrase('Dibayar');?></span>
									</td>
								
								
								<td><?php echo date_format(date_create($row['tgl_bayar']), ' d M Y');?></td>
					            <td >
			                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_view_invoice/<?php echo $row['tagihan_id'];?>');"> <button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-print"></i></button></a>	            	
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

				