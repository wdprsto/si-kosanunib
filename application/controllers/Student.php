<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Student extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                                //Load Databse Class
                $this->load->library('session');					    //Load library for session
                $this->load->model('student_payment_model');   
                 
  
    }

     /*student dashboard code to redirect to student page if successfull login** */
     function dashboard() {
        if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('Dashboard Penghuni');
        $this->load->view('backend/index', $page_data);
    }
	/******************* / student dashboard code to redirect to student page if successfull login** */

    function manage_profile($param1 = null, $param2 = null, $param3 = null){
        if ($this->session->userdata('student_login') != 1) redirect(base_url(), 'refresh');
        if ($param1 == 'update') {
    
     
            $data['nama_penghuni']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
    
            $this->form_validation->set_rules('email','Email','is_unique[tb_penghuni.penghuni_id <> '.$param2.' and email=]|is_unique[tb_admin.email]|is_unique[tb_pengelola.email]');

            if ($this->form_validation->run()==true)
            {
                $this->db->where('penghuni_id', $this->session->userdata('student_id'));
                $this->db->update('tb_penghuni', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $this->session->userdata('student_id') . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('Data Berhasil Diubah!'));
                redirect(base_url() . 'student/manage_profile', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }


        }
    
        if ($param1 == 'change_password') {
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               
               $this->db->where('penghuni_id', $this->session->userdata('student_id'));
               $this->db->update('tb_penghuni', array('password' => $data['new_password']));
               $this->session->set_flashdata('flash_message', get_phrase('Password diubah'));
            }
    
            else{
                $this->session->set_flashdata('error_message', get_phrase('Masukkan Password yang Sama!'));
            }
            redirect(base_url() . 'student/manage_profile', 'refresh');
        }
    
            $page_data['page_name']     = 'manage_profile';
            $page_data['page_title']    = get_phrase('pengaturan_profil');
            $page_data['edit_profile']  = $this->db->get_where('tb_penghuni', array('penghuni_id' => $this->session->userdata('student_id')))->result_array();
            $this->load->view('backend/index', $page_data);
        }


        function invoice($param1 = null, $param2 = null, $param3 = null){
           

            $student_profile = $this->db->get_where('tb_penghuni', array('penghuni_id' => $this->session->userdata('student_id')))->row();
            $student_profile = $student_profile->penghuni_id;

            $page_data['invoices']     = $this->db->get_where('tb_tagihan', array('tagihan_id_penghuni' => $student_profile))->result_array();
            $page_data['page_name']     = 'invoice';
            $page_data['page_title']    = get_phrase('Semua Tagihan');
            $this->load->view('backend/index', $page_data);
        }

        function payment_history(){

            $student_profile = $this->db->get_where('tb_penghuni', array('penghuni_id' => $this->session->userdata('student_id')))->row();
            $student_profile = $student_profile->student_id;

            $page_data['invoices']     = $this->db->get_where('tb_pembayaran', array('student_id' => $student_profile))->result_array();
            $page_data['page_name']     = 'payment_history';
            $page_data['page_title']    = get_phrase('Riwayat Pembayaran');
            $this->load->view('backend/index', $page_data);


        }

        function informasi ($param1 = null, $param2 = null, $param3 = null){
    
            $page_data['page_name']     = 'informasi';
            $page_data['page_title']    = get_phrase('Informasi');
            $this->load->view('backend/index', $page_data);
    
        }

        function pengelola_hostel($param1 = '', $param2 = null, $param3 = null){
            
            //param1 = id kosan si penghuni kosan

            
            $this->db->select('*');
            $this->db->from('tb_pengelola pl'); 
            $this->db->join('tb_kosan k', 'k.id_kosan=pl.pengelola_id_kosan', 'right');
            $this->db->having('id_kosan', $param1);
            $invoices = $this->db->get()->result_array();

            $page_data['datakosan']     =  $invoices;
            $page_data['page_name']     = 'pengelola_hostel';
            $page_data['page_title']    = get_phrase('Informasi Kosan');
            $this->load->view('backend/index', $page_data);
        }
        function teman_hostel($param1 = '', $param2 = null, $param3 = null){
            
            //param1 = id kosan si penghuni kosan

     
            $this->db->select('*');
            $this->db->from('tb_penghuni'); 
            $this->db->join('tb_kamarkosan', 'penghuni_id_kamarkosan=id_kamarkosan and penghuni_id_kosan = kamarkosan_id_kosan', 'inner');
            $this->db->where('penghuni_id_kosan ='.$param1);
            $this->db->where('penghuni_id !='.$this->session->userdata('student_id'));
            $invoices = $this->db->get()->result_array();

            $page_data['datakosan']     =  $invoices;
            $page_data['page_name']     = 'teman_hostel';
            $page_data['page_title']    = get_phrase('Teman Kosan');
            $this->load->view('backend/index', $page_data);
        }

        /***********  The function below add, update and delete student payment table ***********************/
    function student_payment ($param1 = null, $param2 = null, $param3 = null){


        if($param1 == 'update_invoice'){
            $this->student_payment_model->updateStudentPaymentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'student/invoice', 'refresh');
        }

    }    


} 