<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Teman Kosan');?></div>
				<div class="panel-body table-responsive">
 					<table id="example23" class="display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
							
								<th><div><?php echo get_phrase('Kamar Kosan');?></div></th>
								<th><div><?php echo get_phrase('Nama Penghuni');?></div></th>
								<th><div><?php echo get_phrase('Tanggal Lahir');?></div></th>
								<th><div><?php echo get_phrase('Agama');?></div></th>
								<th><div><?php echo get_phrase('Goldar');?></div></th>
							</tr> 
						</thead>
                    <tbody>
					
						<?php 

							
						foreach($datakosan as $key => $row):?>
						
                        <tr>
					
								<td><?php echo $row['nama_kamar'];?></td>
					            <td><?php echo $row['nama_penghuni'];?></td>
								<td><?php echo date_create($row['tgl_lahir'])->format('d F Y');?></td>
								<td><?php echo $row['agama'];?></td>
								<td><?php echo $row['goldar'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

		