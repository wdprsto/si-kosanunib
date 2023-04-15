<?php
$select_hostel = $this->db->get_where('tb_pengelola', array('pengelola_id' => $param2))->result_array();
foreach ($select_hostel as $key => $hostel):  ?>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
				<?php echo get_phrase('Edit Pengelola');?></div>
                        <div class="panel-body">

                        <?php echo form_open(base_url() . 'admin/hostel/update/'. $hostel['pengelola_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
               
 					<div class="form-group"> 
                    <span style="color: red;"><?php echo validation_errors(); ?></span>
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama');?></label>

                    <div class="col-sm-12">
                            <input type="text" name="name" value="<?php echo $hostel['nama_pengelola'];?>" class="form-control">
                        </div>
                    </div>

                    <input type="hidden" name="pengelola_id" value="<?php echo $hostel['pengelola_id'];?>" class="form-control">

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Tanggal Lahir');?></label>
                    <div class="col-sm-12">
                    <input class="form-control m-r-10" name="birthday" type="date" value="<?php echo $hostel['tgl_lahir'];?>" id="example-date-input" max="<?php
                            $date=date_create(date('Y-m-d'));
                            date_sub($date,date_interval_create_from_date_string("10 years"));
                            echo date_format($date,"Y-m-d"); ?>" 
                    required>
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Jenis Kelamin');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="sex">

                    <option value="lk"<?php if ($hostel['jk_pengelola'] == 'lk') {
                            echo 'selected;';
                        } ?>><?php echo get_phrase('Laki-laki');?></option>
                     <option value="pr"<?php if ($hostel['jk_pengelola'] == 'pr') {
                            echo 'selected;';
                        } ?>><?php echo get_phrase('Perempuan');?></option>
                    </select>

                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Agama');?></label>
                     <div class="col-sm-12">
							<select name="religion" class="form-control select" style="width:100%" 
							data-message-required="<?php echo get_phrase('Agama dibutuhkan');?>"
							required>
                              <option value="Islam"<?php if($hostel['agama']== 'Islam') echo 'selected';?>><?php echo get_phrase('Islam');?></option>
                              <option value="Protestan"<?php if($hostel['agama']== 'Protestan') echo 'selected';?>><?php echo get_phrase('Protestan');?></option>
                              <option value="Katolik"<?php if($hostel['agama']== 'Katolik') echo 'selected';?>><?php echo get_phrase('Katolik');?></option>
							  <option value="Hindu"<?php if($hostel['agama']== 'Hindu') echo 'selected';?>><?php echo get_phrase('Hindu');?></option>
							  <option value="Buddha"<?php if($hostel['agama']== 'Buddha') echo 'selected';?>><?php echo get_phrase('Buddha');?></option>
							  <option value="Konghucu"<?php if($hostel['agama']== 'Konghucu') echo 'selected';?>><?php echo get_phrase('Konghucu');?></option>
                          </select>
						</div> 
					</div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Golongan Darah');?></label>
                     <div class="col-sm-12">
							<select name="blood_group" class="form-control select" style="width:100%" 
							data-message-required="<?php echo get_phrase('Goldar dibutuhkan');?>"
							required>
                              <option value="A"<?php if($hostel['goldar']== 'A') echo 'selected';?>><?php echo get_phrase('A');?></option>
                              <option value="B"<?php if($hostel['goldar']== 'B') echo 'selected';?>><?php echo get_phrase('B');?></option>
							  <option value="O"<?php if($hostel['goldar']== 'O') echo 'selected';?>><?php echo get_phrase('O');?></option>
                              <option value="AB"<?php if($hostel['goldar']== 'AB') echo 'selected';?>><?php echo get_phrase('AB');?></option>
                          </select>
						</div> 
					</div>

					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Email');?></label>
                    <div class="col-sm-12">

                            <input type="email" name="email" value="<?php echo $hostel['email'];?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('No. HP');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="phone" value="<?php echo $hostel['no_hp_pengelola'];?>" class="form-control" >
                        </div>
                    </div>



                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Alamat');?></label>
                    <div class="col-sm-12">

                            <textarea class="form-control" name="address"><?php echo $hostel['alamat_pengelola'];?></textarea>

                        </div>
                    </div>



                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kosan');?></label>
                        <div class="col-sm-12">
                            <select name="dormitory_id" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('Pilih Kosan');?></option>

                                <?php $dormitory =  $this->db->get('tb_kosan')->result_array();
                                foreach($dormitory as $key => $dormitory):?>

                                <option value="<?php echo $dormitory['id_kosan'];?>"<?php if($dormitory['id_kosan']== $hostel['pengelola_id_kosan']) echo 'selected';?>><?php echo $dormitory['nama_kosan'];?></option>
                    
                                <?php endforeach;?>
                                </select>

                        </div>
                    </div>

    
                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('Foto');?></label>
                        <div class="col-sm-12">
                        

                        <!-- agar bisa melihat perubahannya, harus diberi onchange = readurl pada input dan img diberi id 'blah' untuk javascripnya-->
                        <input type='file' class="form-control" name="userfile" onChange="readURL(this);">
                            
                                <img id='blah' src="<?php echo  $this->crud_model->get_image_url('hostel', $hostel['pengelola_id']) ;?>" width="200">
                        
                            
                        </div>
                    </div>


                    <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Simpan</button>
					</div>
			<?php echo form_close();?>
            </div>
		</div>
    </div>
</div>

<?php endforeach;?>
