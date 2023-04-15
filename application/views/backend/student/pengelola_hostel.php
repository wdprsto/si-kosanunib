<div class="row">
<div class="col-md-12 col-sm-12">
    <div class="white-box">
        <div class="r-icon-stats">
            <i class="ti-home bg-success"></i>
            <div class="bodystate">
					<!-- DATA KOSAN DIBAWA DARI CONTROLLER/STUDENT/PENGELOLA_HOSTEL BDSKN ID KOSAN-->
                	
					<h4><?php echo "Nama Kosan - ".$datakosan[1]['nama_kosan'].' (Kamar '.$this->crud_model->get_kamar_dari_kosan($this->session->userdata('student_id'), $datakosan[1]['id_kamarkosan']).')'?></h4>
				
					<span class="label label-success"><?php echo get_phrase('Alamat');?></span>
					<span><?php echo $datakosan[1]['alamat_kosan'];?></span>
					
					<span class="label label-success"><?php echo get_phrase('Deskripsi');?></span>
					<span><?php echo $datakosan[1]['deskripsi_kosan'];?></span>
					
           	 </div>
        </div>
    </div>                    
</div>
</div>					 
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Pengelola Kosan');?></div>
				<div class="panel-body table-responsive">
 					<table id="example23" class="display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
							
								<th><div><?php echo get_phrase('Nama Pengelola');?></div></th>
								<th><div><?php echo get_phrase('Tanggal Lahir');?></div></th>
								<th><div><?php echo get_phrase('Agama');?></div></th>
								<th><div><?php echo get_phrase('Goldar');?></div></th>
								<th><div><?php echo get_phrase('No HP');?></div></th>
							</tr> 
						</thead>
                    <tbody>
					
						<?php 
						foreach($datakosan as $key => $row):?>
                        <tr>
					
							<td><?php echo $row['nama_pengelola'];?></td>
							<td><?php echo date_create($row['tgl_lahir'])->format('d F Y');?></td>
							<td><?php echo $row['agama'];?></td>
							<td><?php echo $row['goldar'];?></td>
							<td><?php echo $row['no_hp_pengelola'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

		