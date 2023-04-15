<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

 
    function createNewAdministrator(){

        $page_data['nama_admin']  = html_escape($this->input->post('name'));
        $page_data['email']  = html_escape($this->input->post('email'));
        $page_data['no_hp_admin']  = html_escape($this->input->post('phone'));
        $page_data['password']  = sha1($this->input->post('password'));
        $page_data['level']     = html_escape($this->input->post('level'));
        $this->db->insert('tb_admin', $page_data);
        $admin_id = $this->db->insert_id();
        move_uploaded_file($_FILES['admin_image']['tmp_name'], 'uploads/admin_image/' . $admin_id . '.jpg');

        $page_data2['admin_id'] =  $admin_id;
        if($this->input->post('level') == 1){
            $page_data2['dashboard'] = '1';
            $page_data2['kelola_pengelola'] =  '1';
            $page_data2['kelola_penghuni'] =  '1';
            $page_data2['kelola_kosan'] =  '1';
            $page_data2['kelola_tagihan'] =  '1';
        }
        $this->db->insert('tb_roleadmin', $page_data2);


    }

    function deleteAdministrator($param2){
        
        $this->db->where('admin_id', $param2);
        $this->db->delete('tb_admin');
    }

    function select_all_the_administrator_from_admin_table(){
        $all_selected_administrator = $this->db->get('tb_admin');
        return $all_selected_administrator->result_array();

    }

    function updateAllDetailsForAdminRole($param2){
        $page_data['dashboard']  = html_escape($this->input->post('dashboard'));
        $page_data['kelola_pengelola']   = html_escape($this->input->post('manage_employee'));
        $page_data['kelola_penghuni']    = html_escape($this->input->post('manage_student'));
        $page_data['kelola_kosan']   = html_escape($this->input->post('manage_hostel'));
        $page_data['kelola_tagihan']    = html_escape($this->input->post('manage_invoice'));

        $this->db->where('admin_id', $param2);
        $this->db->update('tb_roleadmin', $page_data);


    }

    
}