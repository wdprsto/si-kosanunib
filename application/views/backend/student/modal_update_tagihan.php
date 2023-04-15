<?php 
$invoices	=	$this->db->get_where('tb_tagihan' , array('tagihan_id' => $param2) )->result_array();
foreach($invoices as $key => $row):?>

 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Ubah Tagihan');?></div>
                                <div class="panel-body table-responsive">
       
        <?php echo form_open(base_url() . 'student/student_payment/update_invoice/'. $row['tagihan_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', "id"=>"form1", 'enctype' => 'multipart/form-data'));?>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nomor Tagihan');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="nomor_tagihan" value="<?php echo $row['no_tagihan'];?>" readonly/>
                    </div>
                    </div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Tagihan');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['nama_tagihan'];?>" readonly/>
                    </div>
                    </div>
                
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Deskripsi Tagihan');?></label>
                    <div class="col-sm-12">
					<textarea type="text" rows="5" class="form-control" name="description" readonly><?php echo $row['deskripsi_tagihan'];?></textarea>
                    </div>
                </div>

                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Durasi Kos');?></label>
                    <div class="col-sm-12">
                    <select name="durasi_kos"  class="form-control select2" style="width:100%" onchange="update_tagihan()">
                            <option value="6" <?php if($row['durasi_kos']== '6')echo 'selected';?>><?php echo get_phrase('6 Bulan');?></option>
                            <option value="12" <?php if($row['durasi_kos']== '12')echo 'selected';?>><?php echo get_phrase('1 Tahun');?></option>
                            <option value="18" <?php if($row['durasi_kos']== '18')echo 'selected';?>><?php echo get_phrase('1 Tahun 6 Bulan');?></option>
                            <option value="24" <?php if($row['durasi_kos']== '24')echo 'selected';?>><?php echo get_phrase('2 Tahun');?></option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Total Tagihan');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="amount" value="<?php echo $row['total_tagihan'];?>"  required readonly/>
                    </div>
                </div>
                
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Jatuh Tempo');?></label>
                    <div class="col-sm-12">
							<input class="form-control m-r-10" name="due" type="date" value="<?php echo $row['jatuh_tempo']; ?>" id="example-date-input" required readonly>
                    </div>

                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-12"> 
                        <select name="status" id="status" class="form-control select2" style="width:100%">
                            <option value="l" <?php if($row['status']== 'l') echo 'selected';?>><?php echo get_phrase('Lunas');?></option>
                            <option value="bl" <?php if($row['status']== 'bl') echo 'selected';?>><?php echo get_phrase('Belum Lunas');?></option>
                            
                            <?php if($row['status'] == 'mk'){ ?>
                                <option value="mk" selected><?php echo get_phrase('Menunggu Konfirmasi');?></option> 
                            <?php }; ?>
                        </select>
                    </div> 
                </div>
                <input type="hidden" class="form-control" name="tagihan_id_admin" value="<?php echo $row['tagihan_id_admin'];
            
                ?>
                "/>
                
                <input type="hidden" class="form-control" name="tagihan_id_penghuni" value="<?php echo $this->crud_model->get_biaya_kosan_dan_kamar_dari_id_penghuni($row['tagihan_id_penghuni']);?>"/>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Pilih Dokumen Pembayaran');?></label>
                    <div class="col-sm-12">
                            <input type="file" name="nama_file" class="dropify">
                            <?php if($row['status']!= 'bl' AND $row['nama_file'] != null){;?>
                            <br>
                            <a href="<?php echo base_url().'uploads/bukti_pembayaran/'. $row['nama_file'];?>" rel="noopener noreferrer" target="_blank"><span>(Lihat lampiran sebelumnya di sini)</span></a>
                          
                        <?php }; ?>
                    </div></div> 
                
                

                <div class="form-group">
                 
                      <button type="submit" class="btn btn-block  btn-info btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Ubah Data');?></button>
            
                </div>
                <?php echo form_close();?>	
                <br>
				</div>
				</div>
				</div>
				</div>
                <?php endforeach;?>



<script type="text/javascript">
   
    $('#status').prop('disabled', true);
    $('#form1').on('submit', function() {
        $('#status').prop('disabled', false);
    });

</script>

<script>
function update_tagihan(){
    var durasi = document.getElementsByName("durasi_kos")[0].value;
    var biaya = document.getElementsByName("tagihan_id_penghuni")[0].value;
    document.getElementsByName("amount")[0].value = durasi*biaya;
}
</script>