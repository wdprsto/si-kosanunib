

<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            
            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('Buat Tagihan Tunggal');?></div>
                    <div class="panel-body table-responsive">
  
    <!----CREATION FORM STARTS----> 
 
    <?php echo form_open(base_url() . 'admin/student_payment/single_invoice' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            
            <input type="hidden" class="form-control" name="tagihan_id_admin" value='<?php echo $this->session->userdata('admin_id');?>'>
            <input type="hidden" class="form-control" name="tagihan_id_penghuni" value='<?php echo $param2 //berasal dari inputan di student payment, dibawa ke kontroller pop up, datanya sampai di sini;?>'>
            <input type="hidden" class="form-control" name="creation_timestamp" value='<?php echo date('Y-m-d');?>'>

            <div class="form-group">
            <span style="color: red;"><?php echo validation_errors(); ?></span>
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nomor Tagihan');?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="invoice_number" value="<?php echo date('Ymd').'INV'.rand(10000,100000);?>" / required>
                </div> 
            </div>


            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Tagihan');?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="title" value='<?php 
                    if(strlen($this->crud_model->get_data_penghuni($param2, 'nama_penghuni'))<20){
                        echo strtoupper('Pembayaran '.($this->crud_model->get_data_penghuni($param2, 'nama_penghuni')).' '.(date('F Y')));
                    } else {
                        echo strtoupper('Pembayaran '.substr($this->crud_model->get_data_penghuni($param2, 'nama_penghuni'), 0, 20).' '.(date('F Y')));
                    } ?>
                    '/ required>
                </div>
            </div>

            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kosan - Kamar');?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" value='<?php echo ($this->crud_model->get_kosan_dan_kamar_dari_id_penghuni($param2)) ;?>'/ readonly>
                </div>
            </div>

            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Deskripsi');?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="description"></textarea>
                </div>
            </div>
            
            

            
            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Durasi Kos');?></label>
                    <div class="col-sm-12">
                    <select name="durasi_kos"  class="form-control select2" style="width:100%" 
                    data-message-required="<?php echo get_phrase('Durasi dibutuhkan');?>"
                    onchange="update_tagihan()" required>
                            <option value="" ><?php echo get_phrase('Pilih Durasi Kos');?></option>
                            <option value="6" ><?php echo get_phrase('6 Bulan');?></option>
                            <option value="12"><?php echo get_phrase('1 Tahun');?></option>
                            <option value="18"><?php echo get_phrase('1 Tahun 6 Bulan');?></option>
                            <option value="24"><?php echo get_phrase('2 Tahun');?></option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Total Tagihan');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="amount" value=""  required readonly/>
                    </div>
                </div>
                
                
                <div class="form-group">
                
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Jatuh Tempo');?></label>
                    <div class="col-sm-12">
                
                    <?php if($this->crud_model->tgl_berlakusd_dari_id($param2)!=null){?>
						<input class="form-control m-r-10" name="due" type="date" value="<?php echo date_add(date_create($this->crud_model->tgl_berlakusd_dari_id($param2)), date_interval_create_from_date_string("10 days"))->format('Y-m-d'); ?>" id="example-date-input" required readonly>
                    <?php }else{?>
                        <input class="form-control m-r-10" name="due" type="date" value="<?php echo date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string("10 days"))->format('Y-m-d'); ?>" id="example-date-input" required>
                    <?php } ?>
                    </div>

                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-12">
                        <select name="status" class="form-control select2" style="width:100%">
                            <option value="l" ><?php echo get_phrase('Lunas');?></option>
                            <option value="bl" selected><?php echo get_phrase('Belum Lunas');?></option>
                        </select>
                    </div>
                </div>

            
                <input type="hidden" class="form-control" name="biaya_tagihan_penghuni" value="<?php echo $this->crud_model->get_biaya_kosan_dan_kamar_dari_id_penghuni($param2);?>"/>


           
            <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Buat Tagihan');?></button>
			</div>
							
    </form>                
		</div>
	</div>
</div>
			<!----CREATION FORM ENDS-->

            <!----TABLE LISTING ENDS--->


<script>
function update_tagihan(){
    var durasi = document.getElementsByName("durasi_kos")[0].value;
    var biaya = document.getElementsByName("biaya_tagihan_penghuni")[0].value;
    document.getElementsByName("amount")[0].value = durasi*biaya;
}
</script>