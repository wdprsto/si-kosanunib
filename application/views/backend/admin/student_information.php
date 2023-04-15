<div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Daftar Penghuni');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                    
                                <div class="form-group">
                    <div class="col-sm-12">
                    <select id="id_kosan" class="form-control">
                    <option value=""><?php echo get_phrase('Pilih Kosan');?></option>

                    <?php $class =  $this->db->get('tb_kosan')->result_array();
                        foreach($class as $key => $class):?>
                        <option value="<?php echo $class['id_kosan'];?>"
                    <?php if($id_kosan == $class['id_kosan']) echo 'selected';?>><?php echo $class['nama_kosan'];?></option>
                    <?php endforeach;?>
                   </select>
  
                  </div>
                 </div>
                 <button type="button" id="find" class="btn btn-success btn-rounded btn-sm btn-block">Cari Penghuni</button>
                 <hr>
				
 				<!-- PHP that includes table for subject starts here  ------>
                <div id="data">
                <?php include 'showStudentClasswise.php';?>
                </div>
                <!-- PHP that includes table for subject ends here  ------>


				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#id_kosan').select2();
		$('#find').on('click', function() 
		{
			var id_kosan = $('#id_kosan').val();
			 if (id_kosan == "") {
           $.toast({
            text: 'Pilih kosan dulu sebelum menekan tombol cari penghuni',
            position: 'top-right',
            loaderBg: '#f56954',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
            return false;
        }
			$.ajax({
				url: '<?php echo site_url('admin/getStudentClasswise/');?>' + id_kosan
			}).done(function(response) {
				$('#data').html(response);
			});
        });
        
        

    });


</script>