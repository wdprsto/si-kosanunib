
<table id="example24" class="table display" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Nama');?></div></th>
                    		<th><div><?php echo get_phrase('Kapasitas');?></div></th>
                    		<th><div><?php echo get_phrase('Biaya');?></div></th>
                    		<th><div><?php echo get_phrase('Deskripsi');?></div></th>
                            <th><div><?php echo get_phrase('Penghuni');?></div></th>
                    		<th><div><?php echo get_phrase('Aksi');?></div></th>
						</tr>
					</thead>
                    <tbody>
 
                     <?php $counter = 1; $hostel_rooms =  $this->db->get_where('tb_kamarkosan', array('kamarkosan_id_kosan' => $dormitory_id))->result_array();
                     foreach($hostel_rooms as $key => $hostel_room):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
                            <td><?php echo $hostel_room['nama_kamar']; ?></td>
                            <td><?php echo 'Terhuni : '.$hostel_room['kapasitas_terhuni'].'<br> Kapasitas : '.$hostel_room['kapasitas_total'];?></td>
							<td><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($hostel_room['biaya_kamar'],2,".",",");?></td>
							<td><?php echo $hostel_room['deskripsi'];?></td>
                            <td>
                                
                                <?php 
                                    //$penghuni = $this->db->get_where('tb_penghuni', array('penghuni_id_kamarkosan' => $hostel_room['id_kamarkosan']))->result_array();
                                    $penghuni = $this->db->select('*')->from('tb_penghuni')->where('penghuni_id_kamarkosan', $hostel_room['id_kamarkosan'])
                                    ->where('penghuni_id_kosan', $hostel_room['kamarkosan_id_kosan'])->get()->result_array();
                                    foreach($penghuni as $key => $penghuni):
                                ?>
                                        <span><?php echo '&#8226; '.$penghuni['nama_penghuni'].'<br>';?></span>
                                <?php endforeach;?> 
                                
                               
                            
                            </td>

							
							<td>
							
				    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_hostel_room/<?php echo $hostel_room['id_kamarkosan'];?>/<?php echo $hostel_room['kamarkosan_id_kosan'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
					 <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/kamar_kosan/delete/<?php echo $hostel_room['id_kamarkosan'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
					 

			
                           
        					</td>
                        </tr>
    <?php endforeach;?>





                    </tbody>
                </table>

<script type="text/javascript">

$('#example24').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });

</script>