<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('TAGIHAN BELUM DIBAYAR');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                				<th>#</th>
								<th><div><?php echo get_phrase('Nama Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Nama Penghuni');?></div></th>
								<th><div><?php echo get_phrase('Kosan - Kamar');?></div></th>
								<th><div><?php echo get_phrase('No. HP');?></div></th>
								<th><div><?php echo get_phrase('Total Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Status');?></div></th>
								<th><div><?php echo get_phrase('Jatuh Tempo');?></div></th>
								<th><div><?php echo get_phrase('Aksi');?></div></th>
						</tr>
					</thead>
                    <tbody>  
                    	<?php
                    		$count = 1;
							$this->db->where('status' , 'bl');
							$this->db->or_where('status' , 'mk');
                    		$this->db->order_by('creation_timestamp' , 'desc');
                    		$invoices = $this->db->get('tb_tagihan')->result_array();
                    		foreach($invoices as $key => $datatagihan):
                    	?>
                        <tr>
                        	<td><?php echo $count++;?></td>
							<td><?php echo $datatagihan['nama_tagihan'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('student', $datatagihan['tagihan_id_penghuni']);?></td>
							<td><?php echo $this->crud_model->get_kosan_dan_kamar_dari_id_penghuni($datatagihan['tagihan_id_penghuni']);?></td>
							<td><?php echo $this->crud_model->get_data_penghuni($datatagihan['tagihan_id_penghuni'], 'no_hp_penghuni');?></td>
							<td><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($datatagihan['total_tagihan'],2,".",",");?></td>
							<td>
								 <?php 
									if($datatagihan['status']=='bl'){ ;?>
									 	<span class="label label-danger"><?php echo get_phrase('Belum Dibayar');?></span>
									<?php }else if($datatagihan['status']=='mk'){ ;?>
										<span class="label label-warning"><?php echo get_phrase('Menunggu Konfirmasi');?></span> 
									<?php } ?>
                             </td>
							 <td><?php echo (date_create($datatagihan['jatuh_tempo'])->format('d M Y')).' ('.date_diff(date_create($datatagihan['jatuh_tempo']),date_create(date('Y-m-d')))->format('H%R%a').')';?></td>

							<td>
							<?php if ($datatagihan['due'] == 'mk'):?>
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_take_payment/<?php echo $row['invoice_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-credit-card"></i></button></a>
							<?php endif;?>
							 
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_view_invoice/<?php echo $datatagihan['tagihan_id'];?>');"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-print"></i></button></a>
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_invoice/<?php echo $datatagihan['tagihan_id'];?>');"><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>
							<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/student_payment/delete_invoice/<?php echo $datatagihan['tagihan_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
							
                           
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
					
				</div>
				</div>
				</div>
				</div>
				</div>
				
		
				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Riwayat Pembayaran');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

<table id="tabel_laporanku" class="display nowrap" cellspacing="0" width="100%">
					    <thead>
					        <tr>
					            <th><div>#</div></th>
					            <th><div><?php echo get_phrase('Nama Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Tanggal Bayar');?></div></th>
								<th><div><?php echo get_phrase('Nama Penghuni');?></div></th>
								<th><div><?php echo get_phrase('Kosan - Kamar');?></div></th>
								
								<th><div><?php echo get_phrase('Total Tagihan');?></div></th>
								<th><div><?php echo get_phrase('Status');?></div></th>
						
								<th><div><?php echo get_phrase('Aksi');?></div></th>
					        </tr>
					    </thead>
					    <tbody>
							<?php 
					        	$count = 1;
								$this->db->where('status' , 'l');
								$this->db->order_by('tgl_bayar' , 'desc');
								$invoices = $this->db->get('tb_tagihan')->result_array();
					        	foreach ($invoices as $key => $row):
					        ?>
					        <tr>
							<td><?php echo $count++;?></td>
								<td><?php echo $row['nama_tagihan'];?></td>
								<td><?php echo (date_create($row['tgl_bayar'])->format('d/m/Y'));?></td>
								<td><?php echo $this->crud_model->get_type_name_by_id('student', $row['tagihan_id_penghuni']);?></td>
								<td><?php echo $this->crud_model->get_kosan_dan_kamar_dari_id_penghuni($row['tagihan_id_penghuni']);?></td>
								
								<td><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['total_tagihan'],2,".",",");?></td>
								<td>
											<span class="label label-success"><?php echo get_phrase('Lunas');?></span>
										
								</td>
								<td >
			                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_view_invoice/<?php echo $row['tagihan_id'];?>');"> <button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-print"></i></button></a>	            	
					            </td>
					        </tr>
					        <?php endforeach;?>
					    </tbody>
					</table>
						
			
</div>
				</div>
				</div>
				</div>
				</div>


<script>

//fungsi untuk filtering data berdasarkan tanggal 
var start_date;
 var end_date;
 var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
    //nama depan = 0
    //nama belakang = 1
    //tanggal terdaftar =2
    var evalDate= parseDateValue(aData[2]);
      if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
           ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
           ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
           ( dateStart <= evalDate && evalDate <= dateEnd ) )
      {
          return true;
      }
      return false;
});

// fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
function parseDateValue(rawDate) {
    var dateArray= rawDate.split("/");
    var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
    return parsedDate;
}    

$( document ).ready(function() {
//konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
 	var $dTable = $('#tabel_laporanku').DataTable({
  	"dom": "<'row'<'col-sm-3'<'datesearchbox'>><'col-sm-3'B><'col-sm-6'f>>" +
    "<'row'<'col-sm-12'tr>>" +
	"<'row'<'col-sm-5'i><'col-sm-7'p>>",
	buttons: [
                {
                    extend: 'print',
                    messageTop: 'Laporan Sistem Informasi Kosan'
                    
                }
            ]
});

 //menambahkan daterangepicker di dalam datatables
 $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Cari berdasarkan interval..."> </div>');

 document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

 //konfigurasi daterangepicker pada input dengan id datesearch
 $('#datesearch').daterangepicker({
    autoUpdateInput: false
  });

 //menangani proses saat apply date range
  $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
     $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
     start_date=picker.startDate.format('DD/MM/YYYY');
     end_date=picker.endDate.format('DD/MM/YYYY');
     $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
     $dTable.draw();
  });

  $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    start_date='';
    end_date='';
    $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
    $dTable.draw();
  });
});

</script>