
<table id="example24" class="table display">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                            <th><div><?php echo get_phrase('Foto');?></div></th>
                            <th><div><?php echo get_phrase('Nama Penghuni');?></div></th>
                    		<th><div><?php echo get_phrase('Kamar');?></div></th>
                    		<th><div><?php echo get_phrase('Jenis Kelamin');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('No. HP');?></div></th>
                    		<th><div><?php echo get_phrase('Aksi');?></div></th>
						</tr>
					</thead>
                    <tbody>
    
                    <?php $counter = 1; $students =  $this->db->get_where('tb_penghuni', array('penghuni_id_kosan' => $id_kosan))->result_array();
                    foreach($students as $key => $student):?>         
                        <tr>
                            <td><?php echo $counter++;?></td>
                            <td>
                                <img src="<?php echo $this->crud_model->get_image_url('student', $student['penghuni_id']);?>" class="img-circle" width="30">
                            </td>
                
                            <td><?php 
                                if(strlen($student['nama_penghuni'])>20){
                                    echo substr($student['nama_penghuni'], 0, 20)."...";
                                }else{
                                    echo $student['nama_penghuni'];
                                }
                                    ;?></td>
                            <td><?php echo $this->crud_model->get_kamar_dari_kosan($student['penghuni_id'], $student['penghuni_id_kamarkosan']);?></td>
                            <td><?php 
                                if($student['jk_penghuni']=='lk'){
                                    echo 'Laki-laki';
                                }else if($student['jk_penghuni']=='pr'){
                                    echo 'Perempuan';
                                };
                            
                            ?></td>
                            <td><?php echo $student['email'];?></td>
                            <td><?php echo $student['no_hp_penghuni'];?></td>
							<td>
							
                                <a href="<?php echo base_url();?>admin/edit_student/<?php echo $student['penghuni_id'];?>/<?php echo $student['penghuni_id_kosan'];?>/<?php echo $student['penghuni_id_kamarkosan'];?>" ><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/new_student/delete/<?php echo $student['penghuni_id'];?>/<?php echo $student['penghuni_id_kosan'];?>/<?php echo $student['penghuni_id_kamarkosan'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
                                <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/resetstudentPassword/<?php echo $student['penghuni_id'];?>')" class="btn btn-success btn-circle btn-xs"><i class="fa fa-key"></i></a>

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