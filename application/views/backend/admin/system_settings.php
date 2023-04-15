<div class="row">

	<div class="col-sm-7">
		<div class="panel panel-info">

			<div class="panel-heading"><i class="fa fa-gear"></i>  <?php echo get_phrase('Pengaturan Sistem');?></div>
			<div class="panel-body table-responsive">

				<?php echo form_open(base_url(). 'systemsetting/system_settings/do_update', array('class' => 'form-horizontal form-groups-bordered', 'enctype'=> 'multipart/form-data'));?>



				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Sistem');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="system_name" value="<?php echo $this->db->get_where('tb_setting', array('type' => 'system_name'))->row()->description;?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Judul Sistem');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="system_title" value="<?php echo $this->db->get_where('tb_setting', array('type' => 'system_title'))->row()->description;?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Alamat Sistem');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="address" value="<?php echo $this->db->get_where('tb_setting', array('type' => 'address'))->row()->description;?>">
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('No. HP');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="phone" value="<?php echo $this->db->get_where('tb_setting', array('type' => 'phone'))->row()->description;?>">
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Satuan Mata Uang');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="currency" value="<?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description;?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('Email Sistem');?></label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="system_email" value="<?php echo $this->db->get_where('tb_setting', array('type' => 'system_email'))->row()->description;?>">
					</div>
				</div>



				<div class="form-group">
					<button type="submit" class="btn btn-success btn-rounded btn-block btn-sm"><i class="fa fa-save"></i>  <?php echo get_phrase('save');?></button>
				</div>



				<?php echo form_close();?>







			</div>

		</div>

	</div>


<div class="col-sm-5">
<div class="panel panel-info">
<div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('System Logo'); ?></div>
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body table-responsive">

<?php echo form_open(base_url() . 'systemsetting/system_settings/upload_logo', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'));
        ?>			
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile" onChange="readURL(this);" /required>
       				 <img id="blah" src="<?php echo base_url(); ?>uploads/logo.png" alt="" height="200" width="200"/>
					</div>
					</div>	
					
				<div class="form-group">
                     <button class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Update Logo');?></button>
                
                </div>
		
				<?php echo form_close(); ?>




				THEME SETTINGS
				<hr>
				
				<?php echo form_open(base_url() . 'systemsetting/system_settings/themeSettings', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'));
        ?>
                
				<div class="radio radio-custom">
                  <input type="radio" <?php if($skin = $this->db->get_where('tb_setting' , array('type'=>'skin_colour'))->row()->description == 'default') echo 'checked';?> name="skin_colour" id="radio2" value="default">
                  <label for="radio2"> Default </label>
				</div>

				<div class="radio radio-success">
                  <input type="radio" <?php if($skin = $this->db->get_where('tb_setting' , array('type'=>'skin_colour'))->row()->description == 'green') echo 'checked';?> name="skin_colour" id="radio3" value="green">
                  <label for="radio3"> Green </label>
				</div>

				<div class="radio radio-gray">
                  <input type="radio" <?php if($skin = $this->db->get_where('tb_setting' , array('type'=>'skin_colour'))->row()->description == 'gray') echo 'checked';?> name="skin_colour" id="radio4" value="gray">
                  <label for="radio4"> Gray </label>
				</div>

				<div class="radio radio-black">
                  <input type="radio" <?php if($skin = $this->db->get_where('tb_setting' , array('type'=>'skin_colour'))->row()->description == 'black') echo 'checked';?> name="skin_colour" id="radio5" value="black">
                  <label for="radio5"> Black </label>
				</div>

				<div class="radio radio-purple">
                  <input type="radio" <?php if($skin = $this->db->get_where('tb_setting' , array('type'=>'skin_colour'))->row()->description == 'purple') echo 'checked';?> name="skin_colour" id="radio6" value="purple">
                  <label for="radio6"> Purple </label>
				</div>

				<div class="radio radio-info">
                  <input type="radio" <?php if($skin = $this->db->get_where('tb_setting' , array('type'=>'skin_colour'))->row()->description == 'blue') echo 'checked';?> name="skin_colour" id="radio7" value="blue">
                  <label for="radio7"> Blue </label>
				</div>
				
				
               
				
		<br>		
				
                <div class="form-group">
                          <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('change_theme');?></button>
                    </div>
                    <?php echo form_close();?>

</div>
</div>

</div>
</div>

</div>