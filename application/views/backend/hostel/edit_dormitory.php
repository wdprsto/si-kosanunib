<?php $dormitories = $this->db->get_where('tb_kosan', array('id_kosan' => $param2))->result_array();
foreach($dormitories as $key => $dormitory):?>

<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('update');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive"> 
			 
<!----CREATION FORM STARTS---->

                	<?php echo form_open(base_url() . 'hostel/dormitory/update/' . $param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
               
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Nama Kosan');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" value="<?php echo $dormitory['nama_kosan'];?>" name="name" / required readonly>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Alaman Kosan');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control"  name="address"><?php echo $dormitory['alamat_kosan'];?></textarea>
                    </div>
                </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Deskripsi');?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"><?php echo $dormitory['deskripsi_kosan'];?></textarea>
                    </div>
                </div>


                    <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update');?></button>
					</div>
							
                    </form>                
                </div>                
			</div>
			</div>
			</div>
			<!----CREATION FORM ENDS-->
<?php endforeach;?>