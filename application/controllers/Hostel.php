<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Hostel extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                                //Load Databse Class
                $this->load->library('session');					    //Load library for session
                $this->load->model('dormitory_model');
                
    }

     /*hostel dashboard code to redirect to hostel page if successfull login** */
     function dashboard() {
        if ($this->session->userdata('hostel_login') != 1) redirect(base_url(), 'refresh');
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('Dashboard Pengelola');
        $this->load->view('backend/index', $page_data);
    }
    /******************* / hostel dashboard code to redirect to hostel page if successfull login** */


    function manage_profile($param1 = null, $param2 = null, $param3 = null){
        if ($this->session->userdata('hostel_login') != 1) redirect(base_url(), 'refresh');
        if ($param1 == 'update') {
    
            $data['nama_pengelola']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
            $data['no_hp_pengelola']  =   $this->input->post('no_hp_pengelola');

            $this->form_validation->set_rules('email', 'Email','required|is_unique[tb_pengelola.pengelola_id <> '.$param2.' and email=]|is_unique[tb_admin.email]|is_unique[tb_penghuni.email]');
            $this->form_validation->set_rules('no_hp_pengelola', 'Nomor HP','required|is_unique[tb_pengelola.pengelola_id <> '.$param2.' and no_hp_pengelola=]');

            if ($this->form_validation->run()==true)
            {
                $this->db->where('pengelola_id', $this->session->userdata('hostel_id'));
                $this->db->update('tb_pengelola', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hostel_image/' . $this->session->userdata('hostel_id') . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('Data Berhasil Diubah!'));
                redirect(base_url() . 'hostel/manage_profile', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }
        }
    
        if ($param1 == 'change_password') {
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               
               $this->db->where('pengelola_id', $this->session->userdata('hostel_id'));
               $this->db->update('tb_pengelola', array('password' => $data['new_password']));
               $this->session->set_flashdata('flash_message', get_phrase('Password diubah'));
            }
    
            else{
                $this->session->set_flashdata('error_message', get_phrase('Masukkan Password yang Sama!'));
            }
            redirect(base_url() . 'hostel/manage_profile', 'refresh');
        }
    
            $page_data['page_name']     = 'manage_profile';
            $page_data['page_title']    = get_phrase('Pengaturan Profil');
            $page_data['edit_profile']  = $this->db->get_where('tb_pengelola', array('pengelola_id' => $this->session->userdata('hostel_id')))->result_array();
            $this->load->view('backend/index', $page_data);
        }


         /***********  The function manages school dormitory  ***********************/
    function dormitory ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){
            $this->dormitory_model->createDormitoryFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'hostel/dormitory', 'refresh');
        }
    
        if($param1 == 'update'){
            $this->dormitory_model->updateDormitoryFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'hostel/dormitory', 'refresh');
        }
    
    
        if($param1 == 'delete'){
            $this->dormitory_model->deleteDormitoryFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'hostel/dormitory', 'refresh');
    
        }
    
        $page_data['page_name']     = 'dormitory';
        $page_data['page_title']    = get_phrase('Kelola Kosan');
        $this->load->view('backend/index', $page_data);
    
        }
    
    
        /***********  The function manages hostel room  ***********************/
        function hostel_room ($param1 = null, $param2 = null, $param3 = null){
    
        if($param1 == 'create'){
            $param2 = html_escape($this->input->post('dormitory_id'));
            $this->form_validation->set_rules('name','Nama Kamar','required|is_unique[tb_kamarkosan.kamarkosan_id_kosan = '.$param2.' and nama_kamar=]');
            if ($this->form_validation->run()==true)
            {
                $this->dormitory_model->createHostelRoomFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
                redirect(base_url(). 'hostel/hostel_room', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }
        }
    
        if($param1 == 'update'){ 
        
            $this->form_validation->set_rules('name','Nama Kamar','required|is_unique[tb_kamarkosan.kamarkosan_id_kosan = '.$param3.' and nama_kamar=]');
            if ($this->form_validation->run()==true)
            {
            $this->dormitory_model->updateHostelRoomFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'hostel/hostel_room', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }
        }
    
     
        if($param1 == 'delete'){
            $this->dormitory_model->deleteHostelRoomFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'hostel/hostel_room', 'refresh');
    
        }
    
        $page_data['page_name']     = 'hostel_room';
        $page_data['page_title']    = get_phrase('Kamar Kosan');
        $this->load->view('backend/index', $page_data);
    
        }
    
    
        /***********  The function manages hostel category  ***********************/
        function hostel_category ($param1 = null, $param2 = null, $param3 = null){
    
        if($param1 == 'create'){
            $this->dormitory_model->createHostelCategoryFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
            redirect(base_url(). 'hostel/hostel_category', 'refresh');
        }
    
        if($param1 == 'update'){
            $this->dormitory_model->updateHostelCategoryFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'hostel/hostel_category', 'refresh');
        }
    
    
        if($param1 == 'delete'){
            $this->dormitory_model->deleteHostelCategoryFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'hostel/hostel_category', 'refresh');
    
        }
    
        $page_data['page_name']     = 'hostel_category';
        $page_data['page_title']    = get_phrase('Kategori Kosan');
        $this->load->view('backend/index', $page_data);
        }

        function informasi ($param1 = null, $param2 = null, $param3 = null){
     
            $page_data['page_name']     = 'informasi';
            $page_data['page_title']    = get_phrase('Informasi');
            $this->load->view('backend/index', $page_data);
    
        }

        function invoice($param1 = '', $param2 = null, $param3 = null){
            
            //param1 = id kosan si pegnelola kosan
            
            $this->db->select('*');
            $this->db->from('tb_tagihan t'); 
            $this->db->join('tb_penghuni p', 't.tagihan_id_penghuni=p.penghuni_id', 'left');
            $this->db->where('t.status', 'bl');
            $this->db->where('p.penghuni_id_kosan', $param1);
            $this->db->order_by('creation_timestamp','desc');         
            $invoices = $this->db->get()->result_array();

            $page_data['invoices']     =  $invoices;
            $page_data['page_name']     = 'invoice';
            $page_data['page_title']    = get_phrase('Semua Tagihan');
            $this->load->view('backend/index', $page_data);
        }

}