<div class="row">
<div class="col-sm-12">
<div class="panel panel-info">
                          
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
								
				  	<div class="row panel-body">
                    <div class="col-sm-6">
						
					<div class="alert alert-success"><?php echo get_phrase('FORMULIR PENGHUNI BARU'); ?>&nbsp;-&nbsp;PART A</div>

				
                <?php echo form_open(base_url() . 'admin/new_student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'id' => 'form1'));?>
				<div class="form-group"> 
					
					<div class="col-sm-12">
					<span style="color: red;"><?php echo validation_errors(); ?></span>
  		  			<input type='file' name="userfile" onChange="readURL(this);" style="color:red">
       				 <img id="blah"  src="<?php echo base_url();?>uploads/default_avatar.png" alt="your image" height="150" width="150"/ style="border:1px dotted red">
					 
					</div>
					</div>	
					
					
						<div class="form-group">
						
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Lengkap');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="name" required autofocus>
						</div>
					</div>

					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('No. KTP');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="no_ktp" required autofocus>
						</div>
					</div>			

					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Tanggal Lahir');?></label>
                    <div class="col-sm-12">
							<input type="date" id="example-date-input" class="form-control datepicker" name="birthday" max="<?php
                            $date=date_create(date('Y-m-d'));
                            date_sub($date,date_interval_create_from_date_string("10 years"));
                            echo date_format($date,"Y-m-d"); ?>" 
					 required>
						</div> 
					</div>
					
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Tempat Lahir');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="place_birth" required >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Jenis Kelamin');?></label>
                    <div class="col-sm-12">
							<select name="sex" class="form-control select2" style="width:100%" 
							data-message-required="<?php echo get_phrase('Durasi dibutuhkan');?>"
							required>
                              <option value=""><?php echo get_phrase('Jenis Kelamin');?></option>
                              <option value="lk"><?php echo get_phrase('Laki-laki');?></option>
                              <option value="pr"><?php echo get_phrase('Perempuan');?></option>
                          </select>
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Agama');?></label>
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
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Golongan Darah');?></label>
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
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Alamat Asal');?></label>
                    <div class="col-sm-12">
					<textarea name="address" cols="" class="form-control" required></textarea>
						</div> 
					</div>
				
					
					</div>
					
					
					<div class="col-sm-6">
					
					<div class="alert alert-success"><?php echo get_phrase('FORMULIR PENGHUNI BARU'); ?>&nbsp;-&nbsp;PART B</div>
					
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('No. HP');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="phone"  >
						</div> 
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
							<input type="email" class="form-control" name="email" value="" required>
						</div>
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('password');?></label>
                    <div class="col-sm-12">
					<input type="password" class="form-control" name="password" value="" onkeyup="CheckPasswordStrength(this.value)" required>
					<strong id="password_strength"></strong>
						</div> 
					</div>

						
					<!----//////////////////////////////////-->


					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kosan');?></label>
                    <div class="col-sm-12">
							<select name="dormitory_id" class="form-control select2" style="width:100%"id="dormitory_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_hostel_room(this.value)" required>
                              <option value=""><?php echo get_phrase('Pilih Kosan');?></option>
                              <?php 
								$classes = $this->db->get('tb_kosan')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['id_kosan'];?>">
											<?php echo $row['nama_kosan'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
                          </select>
		<a href="<?php echo base_url();?>admin/dormitory/"  target="_blank"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button></a>


						</div> 
					</div>





					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Kamar Kosan');?></label>
                    <div class="col-sm-12">
		                        <select name="hostel_room_id" class="form-control select2" style="width:100%" id="section_selector_holder2" required>
		                            <option value=""><?php echo get_phrase('Pilih Kosan Dulu');?></option>
			                        
			                    </select>
					<a href="<?php echo base_url();?>admin/kamar_kosan/"  target="_blank"><button type="button" class="btn btn-info btn-circle btn-xs" ><i class="fa fa-plus"></i></button></a>
			                </div>
					</div>
					
					<div class="form-group">
                 	<label class="col-md-9" for="example-text"><?php echo get_phrase('Tanggal Masuk');?></label>
                    <div class="col-sm-12">
							<input type="date" id="example-date-input" class="form-control datepicker" name="tgl_masuk" min="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>"required>

						</div> 
					</div>

					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Ayah');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="nama_ayah" required autofocus>
						</div>
					</div>

					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Ibu');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="nama_ibu" required autofocus>
						</div>
					</div>

					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('No. HP Ortu');?></label>
                    <div class="col-sm-12">
					<input type="text" class="form-control" name="no_hp_ortu" required autofocus>
						</div>
					</div>


					<!--<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php //echo get_phrase('documents');?>&nbsp;(Student's Documents)</label>
                    <div class="col-sm-12">
             	<input type="file" name="file_name" class="form-control" required>
			 
			  <p style="color:red">Accept zip, pdf, word, excel, rar and others</p>
			  
					</div>
					</div> -->
					
					</div>
					</div>
					
					


 <div class="form-group">
						
			<button type="submit" class="btn btn-success btn-sm btn-rounded btn-block"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Simpan Penghuni Baru');?></button>
			<img id="install_progress" src="<?php echo base_url() ?>assets/images/loader-2.gif" style="margin-left: 20px; display: none"/>
						
					</div>
					
					
                <?php echo form_close();?>
	
				</div>
			</div>		
		</div>	
    </div> 
</div>


<script type="text/javascript">
	$(document).ready(function () {
		$('#section_selector_holder2').prop('disabled', true);
		$('#dormitory_id').change(function () {
            
			$('#section_selector_holder2').prop('disabled', false);
			$('#dormitory_id').prop('disabled', true);
   		 });
	});

	$('#form1').on('submit', function() {
        $('#dormitory_id').prop('disabled', false);
    });
	$('#submit').click(function(){
		if($.trim($('#sex').val()) == ''){
			alert('Input can not be left blank');
			return false;
  		 }
	});

</script>

<script type="text/javascript">

	function get_hostel_room(dormitory_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_hostel_room/' + dormitory_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder2').html(response);
            }
        });

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

