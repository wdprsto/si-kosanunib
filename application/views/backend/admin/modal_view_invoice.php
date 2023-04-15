<?php
$invoices = $this->db->get_where('tb_tagihan', array('tagihan_id' => $param2))->result_array();
foreach ($invoices as $key => $row):
?>

	<button onClick="PrintElem('#invoice_print')" class="btn btn-rounded btn-success btn-sm"><i class="fa fa-print"></i>&nbsp;print</button>
<hr>
    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
			<td align="left" valign="top">
					
                   <strong>PEMBAYARAN KEPADA</strong><br> <?php echo $this->db->get_where('tb_setting', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('tb_setting', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('tb_setting', array('type' => 'phone'))->row()->description; ?><br>            
                </td>
                <td align="right">
                    
					<h5><?php echo get_phrase('Tanggal Tagihan'); ?> : <?php echo date_create($row['creation_timestamp'])->format('d M Y');?></h5>
                    <h5><?php echo get_phrase('Nama Tagihan'); ?> : <?php echo $row['nama_tagihan'];?></h5>
                    <h5><?php echo get_phrase('Deskripsi'); ?> : <?php echo $row['deskripsi_tagihan'];?></h5>
                    <h5><?php echo get_phrase('Status Pembayaran'); ?> : <span class="label label-<?php if($row['status']=='l')echo 'success'; elseif ($row['status']=='bl') echo 'danger'; else echo 'warning';?>">
                                                                                                    <?php if($row['status'] == 'l'): ?>
                                                                                                    <?php echo 'Dibayar';?>
                                                                                                    <?php endif;?>
                                                                                                    <?php if($row['status'] == 'bl'): ?>
                                                                                                    <?php echo 'Belum Dibayar';?>
                                                                                                    <?php endif;?>    
                                                                                                    <?php if($row['status'] == 'mk'): ?>
                                                                                                    <?php echo 'Menunggu Konfirmasi';?>
                                                                                                    <?php endif;?>                    
                                                                                                    </span></h5>
                </td>
				 
            </tr>
        </table>
        <br>
        <table width="100%" border="0">    
            <tr>
               
                <td align="right" valign="top">
                   <?php echo get_phrase("Nama Penghuni"); ?> : <?php echo $this->db->get_where('tb_penghuni', array('penghuni_id' => $row['tagihan_id_penghuni']))->row()->nama_penghuni; ?><br><?php 
                        $class_id = $this->db->get_where('tb_penghuni' , array('penghuni_id' => $row['tagihan_id_penghuni']))->row()->penghuni_id_kosan;
                        echo get_phrase("Kosan Penghuni").':' . ' ' . $this->db->get_where('tb_kosan', array('id_kosan' => $class_id))->row()->nama_kosan;
                    ?><br>
                     
                </td>
            </tr>
        </table>
        
        <br>

        <!-- payment history -->
        <h4><?php echo get_phrase('Riwayat Tagihan'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo get_phrase('Tanggal Bayar'); ?></th>
                    <th><?php echo get_phrase('Total Tagihan'); ?></th>
                 
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td><?php echo date_format(date_create($row['tgl_bayar']), ' d M Y');?></td>
                        <td><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['total_tagihan'],2,".",",");?></td>
                       
                    </tr>
             
            </tbody>
            <tbody>
        </table>
		
		<br>

        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('Total Pembayaran'); ?> :</td>
                <td align="right"><?php echo $this->db->get_where('tb_setting', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['total_tagihan'],2,".",",");?></td>
            </tr>
            
        </table>

		<br><br>
    </div>
<?php endforeach; ?>

<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Tagihan Kosan', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Struk Tagihan Kosan</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>