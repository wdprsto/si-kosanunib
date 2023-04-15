
				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Daftar Penghuni');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

<table id="example25" class="display nowrap" cellspacing="0" width="100%">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
								<th><div><?php echo get_phrase('Nama Penghuni');?></div></th>
								<th><div><?php echo get_phrase('Kosan - Kamar');?></div></th>
								<th><div><?php echo get_phrase('No. HP');?></div></th>
                                <th><div><?php echo get_phrase('Berlaku Sampai');?></div></th>
								<th><div><?php echo get_phrase('Keterangan');?></div></th>
								<th><div><?php echo get_phrase('Aksi');?></div></th>
					        </tr>
					    </thead>
					    <tbody>
							<?php 
                                $count = 1;
                                
                                $query = "select penghuni_id, nama_penghuni, tgl_berlakusd , no_hp_penghuni
                                FROM tb_penghuni p
                                LEFT JOIN (
                                    SELECT MAX(tagihan_id) AS tagihan_baru, tagihan_id_penghuni
                                    FROM tb_tagihan
                                    GROUP BY tagihan_id_penghuni
                                    ) t_max ON (t_max.tagihan_id_penghuni = p.penghuni_id)
                                LEFT JOIN tb_tagihan tg ON (tg.tagihan_id = t_max.tagihan_baru) ORDER BY tgl_berlakusd
                                ";
								
								$invoices = $this->db->query($query)->result_array();
					        	foreach ($invoices as $key => $row):
					        ?>
					        <tr>
							<td><?php echo $count++;?></td>
                                <td><?php echo $row['nama_penghuni'];?></td>
                                <td><?php echo $this->crud_model->get_kosan_dan_kamar_dari_id_penghuni($row['penghuni_id']);?></td>
                                <td><?php echo $row['no_hp_penghuni'];?></td>
                                <td><?php 
                                    if($this->crud_model->tgl_berlakusd_dari_id($row['penghuni_id'])==null){
                                    echo (date_create($row['tgl_berlakusd'])->format('d F Y'));
                                } else {
                                    echo date_create($this->crud_model->tgl_berlakusd_dari_id($row['penghuni_id']))->format('d F Y');
                                }
                                ?></td>
                                
                                
                                <td><?php 
							
                                    $date1 = date_create($row['tgl_berlakusd']);

                                    //bentuk lain:date_create('now'); . tapi kurang cocok untuk countdown hari, karena memperhitungkan jam
                                    $date2 = date_create(date('Y-m-d')); 
                                    $diff = date_diff($date1,$date2); //date2 - date1
                                    
                                    
                                    if($diff->format('%R%a')=='+0'){
                                        if($this->crud_model->tgl_berlakusd_dari_id($row['penghuni_id'])==null){
                                        ?>
                                        <span class="label label-danger"><?php echo 'Jatuh tempo hari ini';?></span>
                                    <?php 
                                        }else{;?>
                                        <span class="label label-warning"><?php echo 'Ada Tagihan, '.(date_diff(date_create($this->crud_model->tgl_berlakusd_dari_id($row['penghuni_id'])),date_create(date('Y-m-d')))->format('H%R%a'));?></span>     
                                    <?php 
                                        }
                                    }else if($diff->format('%R')=='-'){
                                        ?>
                                        <span class="label label-success" ><?php echo $diff->format('%a hari lagi');?></span>
                                    <?php
                                        }else{
                                    ?>
                                        <span class="label label-danger"><?php echo $diff->format('Lewat %a hari');?></span>

                                    <?php
                                        }
                                ;?></td>
								
								<td>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_buat_tagihan_penghuni/<?php echo $row['penghuni_id'];?>');"><button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-paypal"></i> Buat Tagihan</button></a>							  
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

		
<script>
$(document).ready(function() {
$('#example25').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'pdf', 'print'
        ]
    });
});
</script>