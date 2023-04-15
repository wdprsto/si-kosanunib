<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
				<?php echo get_phrase('Pengelola Baru');?>
	<div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah <?php echo get_phrase('Pengelola Baru');?><i class="btn btn-primary btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div></div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">

                        <?php echo form_open(base_url() . 'admin/hostel/insert/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                        <span style="color: red;"><?php echo validation_errors(); ?></span>
 					
                     
                    <div class="form-group">
                 	    <label class="col-md-12" for="example-text"><?php echo get_phrase ('Nama');?></label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                    </div>

                   

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Tanggal Lahir');?></label>
                    <div class="col-sm-12">
                    <input class="form-control m-r-10" name="birthday" type="date" id="example-date-input" 
                        max="<?php
                            $date=date_create(date('Y-m-d'));
                            date_sub($date,date_interval_create_from_date_string("10 years"));
                            echo date_format($date,"Y-m-d"); ?>" 
                    required>
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Jenis Kelamin');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="sex" required>
                        <option value="lk">Laki-Laki</option>
                        <option value="pr">Perempuan</option>
                    </select>

                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Agama');?></label>
                    <div class="col-sm-12">
							<select name="religion" class="form-control select" style="width:100%" 
							data-message-required="<?php echo get_phrase('Agama dibutuhkan');?>"
							required>
                              <option value="Islam"><?php echo get_phrase('Islam');?></option>
                              <option value="Protestan"><?php echo get_phrase('Protestan');?></option>
                              <option value="Katolik"><?php echo get_phrase('Katolik');?></option>
							  <option value="Hindu"><?php echo get_phrase('Hindu');?></option>
							  <option value="Buddha"><?php echo get_phrase('Buddha');?></option>
							  <option value="Konghucu"><?php echo get_phrase('Konghucu');?></option>
                          </select>
						</div> 
					</div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Golongan Darah');?></label>
                     <div class="col-sm-12">
							<select name="blood_group" class="form-control select" style="width:100%" 
							data-message-required="<?php echo get_phrase('Goldar dibutuhkan');?>"
							required>
                              <option value=""><?php echo get_phrase('Golongan Darah');?></option>
                              <option value="A"><?php echo get_phrase('A');?></option>
                              <option value="B"><?php echo get_phrase('B');?></option>
							  <option value="O"><?php echo get_phrase('O');?></option>
                              <option value="AB"><?php echo get_phrase('AB');?></option>
                          </select>
						</div> 
					</div>
					
					
                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('No. HP');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="phone" class="form-control" required>
                        </div> 
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Alamat');?></label>
                    <div class="col-sm-12">

                            <textarea class="form-control" name="address" maxlength = '100' required></textarea>
                           
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Email');?></label>
                    <div class="col-sm-12">

                            <input type="email" name="email" class="form-control" required >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Password');?></label>
                    <div class="col-sm-12">

                            <input type="password" name="password" class="form-control" required >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kosan');?></label>
                        <div class="col-sm-12">
                            <select name="dormitory_id" class="form-control select2" required >
                                <option value=""><?php echo get_phrase('Select Dormitory');?></option>

                                <?php $dormitory =  $this->db->get('tb_kosan')->result_array();
                                foreach($dormitory as $key => $dormitory):?>
                                <option value="<?php echo $dormitory['id_kosan'];?>"><?php echo $dormitory['nama_kosan'];?></option>
                                <?php endforeach;?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                      
                        <label class="col-md-12" for="example-text"><?php echo get_phrase ('Foto');?></label>
                         <div class="col-sm-12">

                                <input type='file' name="userfile" onChange="readURL(this);" style="color:red">
                                <img id="blah"  src="<?php echo base_url();?>uploads/default_avatar.png" alt="your image" height="150" width="150"/ style="border:1px dotted red"> 
                        
                        </div>
                    </div>
                    


                    <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
					</div>
			<?php echo form_close();?>
                </div>
            </div>
		</div>
    </div>
</div>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Daftar Pengelola');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('Foto');?></div></th>
                            <th><div><?php echo get_phrase('Nama');?></div></th>
                            <th><div><?php echo get_phrase('Email');?></div></th>
                            <th><div><?php echo get_phrase('Jenis Kelamin');?></div></th>
                     
                            <th><div><?php echo get_phrase('Kosan');?></div></th>
                            <th><div><?php echo get_phrase('Aksi');?></div></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($select_hostel as $key => $hostel):	?>	
                               
                        <tr>
                            <td>
                             <img src="<?php echo  $this->crud_model->get_image_url('hostel', $hostel['pengelola_id']) ;?>" class="img-circle" width="30" height="30">
                            </td>
                            <!-- QUERY SELECT_HOSTEL YANG ALIAS HOSTEL MENYIMPAN ROW DATA DARI TABEL HOSTEL.
                            PADA KODE DIBAWAH INI, KITA INGIN MENGAMBIL DATA PADA KOLOM TERTENU, SESUAI DENGAN NAMA
                            KOLOM YANG ADA DI DATABAASE.-->
                            <td><?php echo $hostel['nama_pengelola'];?></td>
                            <td><?php echo $hostel['email'];?></td>
                            <td><?php 
                                if($hostel['jk_pengelola']=='lk'){
                                    echo get_phrase("Laki-laki");
                                }else if($hostel['jk_pengelola']=="pr"){
                                    echo get_phrase("Perempuan");
                                }
                          
                            
                            
                            
                            ?></td>
                     
                            <td>
                                <?php $dormitory =  $this->db->get('tb_kosan')->result_array();
                                foreach($dormitory as $key => $dormitory):?>
                                    <?php if ($dormitory['id_kosan'] == $hostel['pengelola_id_kosan']):  
                                    echo $dormitory['nama_kosan'];?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            
                            
                            </td>
                            
                            
                            
                            <td>
                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_hostel/<?php echo $hostel['pengelola_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <a onclick="confirm_modal('<?php echo base_url();?>admin/hostel/delete/<?php echo $hostel['pengelola_id'];?>')" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
				
			
				
				
</div>


</div>
</div>
</div>
</div
></div>
