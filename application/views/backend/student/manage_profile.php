<div class="row">

	<div class="col-sm-7">
		<div class="panel panel-info">

			<div class="panel-heading"><i class="fa fa-gear"></i>  <?php echo get_phrase('Ubah Profil');?></div>
			<div class="panel-body table-responsive">

				<?php 
 
				foreach ($edit_profile as $key => $row):
				

				?>

				<?php echo form_open(base_url(). 'student/manage_profile/update/'.$row['penghuni_id'].'/', array('class' => 'form-horizontal form-groups-bordered', 'enctype'=> 'multipart/form-data'));?>

				<div class="form-group">
				<span style="color: red;"><?php echo validation_errors(); ?></span>
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="name" value="<?php echo $row['nama_penghuni'];?>" maxlength='50'>
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Email');?></label>
					<div class="col-sm-12">
						<input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>">
					</div>
				</div>


				<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('Gambar Penghuni');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile" onChange="readURL(this);">
					 <img id="blah" src="<?php echo $this->crud_model->get_image_url('student', $row['penghuni_id']); ?>" alt="" height="200" width="200"/>
					</div>
					</div>	

	

				<div class="form-group">
					<button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i>  <?php echo get_phrase('Simpan');?></button>
				</div>



				<?php echo form_close();?>


				<?php endforeach;?>




			</div>

		</div>

	</div>


<div class="col-sm-5">
<div class="panel panel-info">
<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Ubah Password'); ?></div>
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body table-responsive">

<?php echo form_open(base_url() . 'student/manage_profile/change_password', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'));
        ?>			
					<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Password');?></label>
					<div class="col-sm-12">
						<input type="password" class="form-control" name="new_password" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Konfirmasi Password');?></label>
					<div class="col-sm-12">
						<input type="password" class="form-control" name="confirm_new_password" required>
					</div>
				</div>
					
				<div class="form-group">
                     <button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Ubah Password');?></button>
                
                </div>
		
				<?php echo form_close(); ?>

</div>
</div>

</div>
</div>

</div>