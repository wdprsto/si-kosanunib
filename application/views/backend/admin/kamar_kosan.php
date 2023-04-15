<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
				<?php echo get_phrase('Kamar Kosan Baru');?>
	<div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah <?php echo get_phrase('Kamar Baru');?></a> <a href="#" data-perform="panel-dismiss"></a> </div></div>
    <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
<!----CREATION FORM STARTS---->

                <?php echo form_open(base_url() . 'admin/kamar_kosan/create/' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                      
                 	
                <div class="form-group">
                <span style="color: red;"><?php echo validation_errors(); ?></span>     
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kosan');?></label>
                        <div class="col-sm-12">
                            <select name="dormitory_id" class="form-control select2" 
                            data-message-required="<?php echo get_phrase('Durasi dibutuhkan');?>"
                            required>
                                <option value=""><?php echo get_phrase('Pilih Kosan');?></option>

                                <?php $dormitory =  $this->db->get('tb_kosan')->result_array();
                                foreach($dormitory as $key => $dormitory):?>
                                <option value="<?php echo $dormitory['id_kosan'];?>"><?php echo $dormitory['nama_kosan'];?></option>
                              
                                <?php endforeach;?>
                            </select>

                        </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Kamar');?></label>
                    <div class="col-sm-12">
                                   <input type="text" class="form-control" name="name" / required>
                                </div>
                            </div>

                    
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Kapasitas Total');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="num_bed"/ min = "0" required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Biaya Kamar (per Bulan)');?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="cost_bed"/ min = "0" required>
                    </div>
                </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Dekripsi');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>


							
                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Tambah Kamar');?></button>
					</div>
                    <?php echo form_close();?>			
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->

<div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('List Kamar Kosan');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                    
                                <div class="form-group">
                    <div class="col-sm-12">
                    <select id="dormitory_id" class="form-control">
                        <option value=""><?php echo get_phrase('Pilih Kosan');?></option>

                        <?php $class =  $this->db->get('tb_kosan')->result_array();
                        foreach($class as $key => $class):?>
                        <option value="<?php echo $class['id_kosan'];?>"
                        <?php if($dormitory_id == $class['id_kosan']) echo 'selected';?>><?php echo $class['nama_kosan'];?></option>
                        <?php endforeach;?>
                   </select>

                  </div>
                 </div>
                 <!-- <button type="button" id="find" class="btn btn-success btn-rounded btn-sm btn-block">Tampilkan Kamar Kosan</button> -->
                 <hr>
				
 				<!-- PHP that includes table for subject starts here  ------>
                <div id="data">
                <?php include 'showHostelRoomwise.php';?>
                </div>
                <!-- PHP that includes table for subject ends here  ------>


				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#dormitory_id').select2();
		// $('#find').on('click', function() 
		// {
		// 	var dormitory_id = $('#dormitory_id').val();
		// 	 if (dormitory_id == "") {
        //    $.toast({
        //     text: 'Pilih kosan sebelum menekan tombol cari kamar kosan',
        //     position: 'top-right',
        //     loaderBg: '#f56954',
        //     icon: 'warning',
        //     hideAfter: 3500,
        //     stack: 6
        // })
        //     return false;
        // }
		// 	$.ajax({
		// 		url: '</?php echo site_url('admin/getHostelRoomwise/');?>' + dormitory_id
		// 	}).done(function(response) {
		// 		$('#data').html(response);
		// 	});
		// });
        $('#dormitory_id').on('change', function() 
		{
			var dormitory_id = $('#dormitory_id').val();
			if (dormitory_id == "") {
                $.toast({
                    text: 'Pilih kosan sebelum menekan tombol cari kamar kosan',
                    position: 'top-right',
                    loaderBg: '#f56954',
                    icon: 'warning',
                    hideAfter: 3500,
                    stack: 6
                })
            return false;
            }
            $.ajax({
                url: '<?php echo site_url('admin/getHostelRoomwise/');?>' + dormitory_id
            }).done(function(response){
                $('#data').html(response);
            });
		});

	});


</script>

            <!----TABLE LISTING ENDS--->
            