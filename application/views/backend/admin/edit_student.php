<!-- $ID PENGHUNI DIBAWWA DARI CONTROLLER ADMIN USERDATA[ID_PENGHUNI]-->
<?php $students = $this->db->get_where('tb_penghuni', array('penghuni_id' => $id_penghuni))->result_array();
        foreach($students as $key => $student):?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-info">
                          
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
								
				  	<div class="row panel-body">
                    <div class="col-sm-6">
						
					<div class="alert alert-success"><?php echo get_phrase('FORMULIR PENGHUNI'); ?>&nbsp;-&nbsp;PART A</div>

				
                <?php echo form_open(base_url() . 'admin/new_student/update/' .$id_penghuni.'/'.$id_kosanlama.'/'.$id_kamarlama , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'id'=>'form1'));?>
				<div class="form-group"> 
					<div class="col-sm-12">
					<span style="color: red;"><?php echo validation_errors(); ?></span>
  		  			<input type='file' name="userfile" onChange="readURL(this);" style="color:red">
					 		<img id="blah" src="<?php echo $this->crud_model->get_image_url('student', $id_penghuni); ?>" alt="Foto" height="150" width="150"/ style="border:1px dotted red"/>
					</div>
				</div>	
					
		
				
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Lengkap');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['nama_penghuni'];?>" name="name" required autofocus>
						</div>
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('No. KTP');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['no_ktp'];?>" name="no_ktp" required>
						</div>
					</div>
					

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Tanggal Lahir');?></label>
                    <div class="col-sm-12">
	
							<input type="date" value="<?php echo $student['tgl_lahir'];?>" id="example-date-input" class="form-control datepicker" name="birthday" max="<?php
                            $date=date_create(date('Y-m-d'));
                            date_sub($date,date_interval_create_from_date_string("10 years"));
                            echo date_format($date,"Y-m-d"); ?>" 
							required>
						</div> 
					</div>
					
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Tempat Lahir');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['tempat_lahir'];?>" name="place_birth" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Jenis Kelamin');?></label>
                    <div class="col-sm-12">
							<select name="sex" id='sex' class="form-control" style="width:100%"
							data-message-required="<?php echo get_phrase('Durasi dibutuhkan');?>"
							autofocus="true" required="required">
                              <option value=""><?php echo get_phrase('Pilih Jenis Kelamin');?></option>
                              <option value="lk"<?php if($student['jk_penghuni']== 'lk') echo 'selected';?>><?php echo get_phrase('Laki-laki');?></option>
                              <option value="pr" value="lk"<?php if($student['jk_penghuni']== 'pr') echo 'selected';?>><?php echo get_phrase('Perempuan');?></option>
                          </select>
						</div> 
					</div>
					 
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Agama');?></label>
					<div class="col-sm-12">
							<select name="religion" class="form-control select" style="width:100%" 
							data-message-required="<?php echo get_phrase('Agama dibutuhkan');?>"
							required>
                              <option value="Islam"<?php if($student['agama']== 'Islam') echo 'selected';?>><?php echo get_phrase('Islam');?></option>
                              <option value="Protestan"<?php if($student['agama']== 'Protestan') echo 'selected';?>><?php echo get_phrase('Protestan');?></option>
                              <option value="Katolik"<?php if($student['agama']== 'Katolik') echo 'selected';?>><?php echo get_phrase('Katolik');?></option>
							  <option value="Hindu"<?php if($student['agama']== 'Hindu') echo 'selected';?>><?php echo get_phrase('Hindu');?></option>
							  <option value="Buddha"<?php if($student['agama']== 'Buddha') echo 'selected';?>><?php echo get_phrase('Buddha');?></option>
							  <option value="Konghucu"<?php if($student['agama']== 'Konghucu') echo 'selected';?>><?php echo get_phrase('Konghucu');?></option>
                          </select>
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Golongan Darah');?></label>
					<div class="col-sm-12">
							<select name="blood_group" class="form-control select" style="width:100%" 
							data-message-required="<?php echo get_phrase('Goldar dibutuhkan');?>"
							required>
                              <option value="A"<?php if($student['goldar']== 'A') echo 'selected';?>><?php echo get_phrase('A');?></option>
                              <option value="B"<?php if($student['goldar']== 'B') echo 'selected';?>><?php echo get_phrase('B');?></option>
							  <option value="O"<?php if($student['goldar']== 'O') echo 'selected';?>><?php echo get_phrase('O');?></option>
                              <option value="AB"<?php if($student['goldar']== 'AB') echo 'selected';?>><?php echo get_phrase('AB');?></option>
                          </select>
						</div> 
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Alamat Asal');?></label>
                    <div class="col-sm-12">
					<textarea name="address" cols="" class="form-control" rows=""><?php echo $student['alamat_asal'];?></textarea>
						</div> 
					</div>
				
			</div>
					
					
					<div class="col-sm-6">
					
					<div class="alert alert-success"><?php echo get_phrase('FORMULIR PENGHUNI'); ?>&nbsp;-&nbsp;PART B</div>
				
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('No. HP');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['no_hp_penghuni'];?>" name="phone" value="" >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Email');?></label>
                    <div class="col-sm-12">
							<input type="email" class="form-control" value="<?php echo $student['email'];?>" name="email" value="" required>
						</div>
					</div>
					

						<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Kosan');?></label>
                    <div class="col-sm-12">
							<select name="dormitory_id" class="form-control select2" style="width:100%"id="dormitory_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_hostel_room(this.value)">
                              
	                              <?php 
	                              	$dormitories = $this->db->get('tb_kosan')->result_array();
	                              	foreach($dormitories as $dormitory):
	                              ?>
                              		<option value="<?php echo $dormitory['id_kosan'];?>"<?php if($student['penghuni_id_kosan'] == $dormitory['id_kosan']) echo 'selected';?>><?php echo $dormitory['nama_kosan'];?></option>
                          		<?php endforeach;?>
                          </select>
						  </div> 
					</div>


					<div class="form-group">
					 <label class="col-md-9" for="example-text">
					 	<?php echo get_phrase('Kamar Kosan  '); 

							$dormitory = $this->db->query('select * from tb_kosan')->result_array();
							foreach($dormitory as $dormitory):
								if($student['penghuni_id_kosan'] == $dormitory['id_kosan']){
									echo get_phrase('(Current Room: ');
									echo $dormitory['nama_kosan'];

								} 
								
							endforeach;
							$hostel_room = $this->db->get('tb_kamarkosan')->result_array();
							foreach($hostel_room as $hostel_room):
								if($student['penghuni_id_kamarkosan'] == $hostel_room['id_kamarkosan']){
									echo get_phrase(' - ');
									echo $hostel_room['nama_kamar'];
									echo get_phrase(')');

								} 
							endforeach;
						?>
					 </label>
					 </div>

                    <div class="col-sm-12">
							
		                        <select disabled="disabled" name="hostel_room_id" class="form-control select2" style="width:100%" id="section_selector_holder2" required>
		                            
									<?php

										$dormitory = $this->db->query('select * from tb_kamarkosan')->result_array();
										foreach($dormitory as $dormitory):
											if($student['penghuni_id_kosan'] == $dormitory['kamarkosan_id_kosan']){	
									?>

										<option value="<?php echo $dormitory['id_kamarkosan'];?>"<?php if($student['penghuni_id_kamarkosan'] == $dormitory['id_kamarkosan']) echo 'selected';?>><?php echo $dormitory['nama_kamar'];?></option>
												
									<?php
											} 
										endforeach;
									?>
			                    </select>
								
			        </div>
					
					<br>

					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Tanggal Masuk');?></label>
                    <div class="col-sm-12">
							<input type="date" value="<?php echo $student['tgl_masuk'];?>" id="example-date-input" class="form-control datepicker" name="tgl_masuk" min="<?php
                            $date=date_create(date('Y-m-d'));
                            date_sub($date,date_interval_create_from_date_string("1 years"));
                            echo date_format($date,"Y-m-d"); ?>" 
							>

						</div> 
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('nama_ayah');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['nama_ayah'];?>" name="nama_ayah" required>
						</div>
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('nama_ibu');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['nama_ibu'];?>" name="nama_ibu" required>
						</div>
					</div>

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('No. HP Ortu');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $student['no_hp_ortu'];?>" name="no_hp_ortu" required>
						</div>
					</div>

					</div>

					
					
					</div>
					
					


 <div class="form-group">
						
			<button type="submit" id="submit" class="btn btn-success btn-sm btn-rounded btn-block"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Ubah Data Penghuni');?></button>
			<img id="install_progress" src="<?php echo base_url() ?>assets/images/loader-2.gif" style="margin-left: 20px; display: none"/>
						
					</div>
					
					
                <?php echo form_close();?>
	
				</div>
			</div>		
		</div>	
    </div> 
</div>

<?php endforeach;?>



<script type="text/javascript">

	function get_hostel_room(dormitory_id) {
		
    	$.ajax({
            url: '<?php echo base_url();?>admin/get_hostel_room/' + dormitory_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder2').html(response);
            }
		});
		$('#section_selector_holder2').prop('disabled',false);

    }
	

</script>

<script type="text/javascript">

	function CheckPasswordStrength(password) {
	var password_strength = document.getElementById("password_strength");

        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }

        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.

        var passed = 0;

        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }

        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
            case 2:
                strength = "Weak";
                color = "red";
                break;
            case 3:
                 strength = "Medium";
                color = "orange";
                break;
            case 4:
                 strength = "Strong";
                color = "green";
                break;
               
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;

if(passed <= 2){
         document.getElementById('show').disabled = true;
        }else{
            document.getElementById('show').disabled = false;
        }

    }

</script>


