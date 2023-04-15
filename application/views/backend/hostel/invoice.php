<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Tagihan Belum Dibayar');?></div>
				<div class="panel-body table-responsive">
 					<table id="example23" class="display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><div>#</div></th>
								<th><div><?php echo get_phrase('Nama Penghuni');?></div></th>
								<th><div><?php echo get_phrase('Asal Kamar');?></div></th>
								<th><div><?php echo get_phrase('Nama Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Total Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Jatuh Tempo');?></div></th>
								<th><div><?php echo get_phrase('Keterangan');?></div></th>
							</tr> 
						</thead>
                    <tbody>
					
						<?php 
							$count = 1;
							foreach($invoices as $key => $row):?> 
						<!-- Data invoices yang kemudian di alias jadi row ini didapat dari inputan bagian anvigation, diarahkan ke controller hostel/ fungsi invoice-->
                        <tr>
						<td><?php echo $count++;?></td>
							<td><?php echo $row['nama_penghuni'];?></td>
							<?php 
								$cekkamar = $this->db->get_where('tb_kamarkosan', array('kamarkosan_id_kosan'=>$row['penghuni_id_kosan']))->result_array();
								foreach($cekkamar as $key => $cek):
									if($cek['id_kamarkosan']==$row['penghuni_id_kamarkosan']){;
							?>
							<td><?php echo $cek['nama_kamar'];?></td>
							<?php } endforeach; ?>

							<td><?php echo $row['nama_tagihan'];?></td>
							<td>
							<?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?><?php echo number_format($row['total_tagihan'],2,".",",");?>
							</td>
							<td><?php echo date_format(date_create($row['jatuh_tempo']), ' d M Y');?></td>
							<td><?php 
							
								$date1 = date_create($row['jatuh_tempo']);

								//bentuk lain:date_create('now'); . tapi kurang cocok untuk countdown hari, karena memperhitungkan jam
								$date2 = date_create(date('Y-m-d')); 
								$diff = date_diff($date1,$date2); //date2 - date1
								
								if($diff->format('%R%d')=='+0'){
									?>
									<span class="label label-danger"><?php echo 'Jatuh tempo hari ini';?></span>
								<?php 
									}else if($diff->format('%R')=='-'){
									?>
									<span class="label label-success"><?php echo $diff->format('%d hari lagi');?></span>
								<?php
									}else{
								?>
									<span class="label label-danger"><?php echo $diff->format('Lewat %d hari');?></span>

								<?php
									}
							;?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

