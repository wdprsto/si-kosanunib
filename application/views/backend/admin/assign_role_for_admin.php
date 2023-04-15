
<?php $select_admin_informtion_from_admin_table = $this->db->get_where('tb_admin', array('admin_id' => $param2))->result_array();
        foreach ($select_admin_informtion_from_admin_table as $key => $selected_admin):?>
<div class="col-sm-12">
	<div class="panel panel-info">
    <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('Atur Role untuk:');?>  <?php echo $selected_admin['nama_admin'];?></div>
        <div class="panel-body table-responsive">
        <?php echo form_open(base_url() . 'admin/updateAdminRole/'. $param2, array('class' => 'form-horizontal form-goups-bordered validate'));?>

            <table class="display nowrap" cellspacing="0" width="100%">
                <tr>
                    <td>Dashboard</td>
                    <td>Kelola Pengelola </td>
                    <td>Kelola Penghuni </td>
                    <td>Kelola Kosan </td>
                    <td>Kelola Tagihan </td>
                </tr>
                <tr>
                    <td><input class="check" name="dashboard" value="1" <?php if($this->db->get_where('tb_roleadmin', array('admin_id' => $param2))->row()->dashboard) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_employee" value="1"  <?php if($this->db->get_where('tb_roleadmin', array('admin_id' => $param2))->row()->kelola_pengelola) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_student" value="1" <?php if($this->db->get_where('tb_roleadmin', array('admin_id' => $param2))->row()->kelola_penghuni) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_hostel" value="1"  <?php if($this->db->get_where('tb_roleadmin', array('admin_id' => $param2))->row()->kelola_kosan) echo 'checked';?> type="checkbox"></td>
                    <td><input class="check" name="manage_invoice" value="1" <?php if($this->db->get_where('tb_roleadmin', array('admin_id' => $param2))->row()->kelola_tagihan) echo 'checked';?> type="checkbox"></td>
                </tr>
   
            </table>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm "><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update');?></button>
			</div>
            <?php echo form_close();?>
        </div>
	</div>
</div>
        <?php endforeach;?>