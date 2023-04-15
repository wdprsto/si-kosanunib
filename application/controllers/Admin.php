<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                                //Load Databse Class
                $this->load->library('session');					    //Load library for session
                $this->load->model('student_model');                    // Load Apllication Model Here
                $this->load->model('student_payment_model');            // Load Apllication Model Here
                $this->load->model('admin_model');                      // Load Apllication Model Here
    }

    /**default functin, redirects to login page if no admin logged in yet***/
    public function index() 
	{
    if ($this->session->userdata('admin_login') != 1) redirect(base_url() . 'login', 'refresh');
    if ($this->session->userdata('admin_login') == 1) redirect(base_url() . 'admin/dashboard', 'refresh');
    }
	  /************* / default functin, redirects to login page if no admin logged in yet***/

    /*Admin dashboard code to redirect to admin page if successfull login** */
    function dashboard() {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(), 'refresh');
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard_utama');
        $this->load->view('backend/index', $page_data);
    }
	/******************* / Admin dashboard code to redirect to admin page if successfull login** */


    function manage_profile($param1 = null, $param2 = null, $param3 = null){
    if ($this->session->userdata('admin_login') != 1) redirect(base_url(), 'refresh');
    if ($param1 == 'update') {



        $data['nama_admin']      =   $this->input->post('name');
        $data['no_hp_admin']     =   $this->input->post('no_hp_admin');
        $data['email']           =   $this->input->post('email');

        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_admin.admin_id <> '. $this->session->userdata('admin_id').' and email=]|is_unique[tb_penghuni.email]|is_unique[tb_pengelola.email]');
        $this->form_validation->set_rules('no_hp_admin', 'Nomor HP','required|is_unique[tb_admin.admin_id <> '. $this->session->userdata('admin_id').' and no_hp_admin=]');
 
        if ($this->form_validation->run()==true)
        {
        $this->db->where('admin_id', $this->session->userdata('admin_id'));
        $this->db->update('tb_admin', $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
        $this->session->set_flashdata('flash_message', get_phrase('Data Berhasil Diubah!'));
        redirect(base_url() . 'admin/manage_profile', 'refresh');
         }else{
        $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
         }
    }

    if ($param1 == 'change_password') { 
        $data['new_password']           =   sha1($this->input->post('new_password'));
        $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));

        if ($data['new_password'] == $data['confirm_new_password']) {
           
           $this->db->where('admin_id', $this->session->userdata('admin_id'));
           $this->db->update('tb_admin', array('password' => $data['new_password']));
           $this->session->set_flashdata('flash_message', get_phrase('Password diubah'));
        }
 
        else{
            $this->session->set_flashdata('error_message', get_phrase('Masukkan Password yang Sama!'));
        }
        redirect(base_url() . 'admin/manage_profile', 'refresh');
    }

        $page_data['page_name']     = 'manage_profile';
        $page_data['page_title']    = get_phrase('Manage Profile');
        $page_data['edit_profile']  = $this->db->get_where('tb_admin', array('admin_id' => $this->session->userdata('admin_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    function hostel($param1 = null, $param2 = null, $param3 = null){

        if ($param1 == 'insert'){
            
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_pengelola.email]|is_unique[tb_admin.email]|is_unique[tb_penghuni.email]');    
            $this->form_validation->set_rules('phone', 'Nomor HP','required|is_unique[tb_pengelola.no_hp_pengelola]');

            if ($this->form_validation->run()==true)
            {
            $this->crud_model->insert_hostel(); 

            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
            redirect(base_url(). 'admin/hostel', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }
        }


        if($param1 == 'update'){
            

            $this->form_validation->set_rules('email', 'Email','required|is_unique[tb_pengelola.pengelola_id <> '.$param2.' and email=]|is_unique[tb_admin.email]|is_unique[tb_penghuni.email]');
            $this->form_validation->set_rules('phone', 'Nomor HP','required|is_unique[tb_pengelola.pengelola_id <> '.$param2.' and no_hp_pengelola=]');

            if ($this->form_validation->run()==true)
            {
            $this->crud_model->update_hostel($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'admin/hostel', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_hostel($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'admin/hostel', 'refresh');

        }

        $page_data['page_name']         = 'hostel';
        $page_data['page_title']        = get_phrase('Kelola Pengelola');
        $page_data['select_hostel']     = $this->db->get('tb_pengelola')->result_array();
        $this->load->view('backend/index', $page_data);
    }



    /***********  The function manages school dormitory  ***********************/
    function dormitory ($param1 = null, $param2 = null, $param3 = null){

    if($param1 == 'create'){

        $this->form_validation->set_rules('name','Nama Kosan','required|is_unique[tb_kosan.nama_kosan]');
		if ($this->form_validation->run()==true)
        {

        $this->dormitory_model->createDormitoryFunction();
        $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
        redirect(base_url(). 'admin/dormitory', 'refresh');

        
        }
            else
        {
            $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));		
        } 
    }

    if($param1 == 'update'){
        $this->form_validation->set_rules('name','Nama Kosan', 'required|is_unique[tb_kosan.id_kosan <> '.$this->input->post('id_kosan').' and nama_kosan=]');
        
		if ($this->form_validation->run()==true)
        {
        $this->dormitory_model->updateDormitoryFunction($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
        redirect(base_url(). 'admin/dormitory', 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));		
        }
    }


    if($param1 == 'delete'){
        $this->dormitory_model->deleteDormitoryFunction($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
        redirect(base_url(). 'admin/dormitory', 'refresh');

    }

    $page_data['page_name']     = 'dormitory';
    $page_data['page_title']    = get_phrase('Kelola Kosan');
    $this->load->view('backend/index', $page_data);

    } 


    /***********  The function manages hostel room  ***********************/
    function kamar_kosan ($param1 = null, $param2 = null, $param3 = null){

    if($param1 == 'create'){
        $param2 = html_escape($this->input->post('dormitory_id'));
        $this->form_validation->set_rules('name','Nama Kamar','required|is_unique[tb_kamarkosan.kamarkosan_id_kosan = '.$param2.' and nama_kamar=]');
        if ($this->form_validation->run()==true)
        {
            $this->dormitory_model->createHostelRoomFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
            redirect(base_url(). 'admin/kamar_kosan', 'refresh');
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
            redirect(base_url(). 'admin/kamar_kosan', 'refresh');
        }else{
            $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
        }

    }


    if($param1 == 'delete'){
        $this->dormitory_model->deleteHostelRoomFunction($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
        redirect(base_url(). 'admin/kamar_kosan', 'refresh');

    }

    $page_data['page_name']     = 'kamar_kosan';
    $page_data['page_title']    = get_phrase('Kelola Kamar Kosan');
    $this->load->view('backend/index', $page_data);

    }

 


    function get_hostel_room ($dormitory_id){
        //$sections = $this->db->get_where('tb_kamarkosan', array('kamarkosan_id_kosan' => $dormitory_id))->result_array();
        
        //$query = $this->db->query('select kamarkosan_id_kosan , id_kamarkosan , nama_kamar, COUNT(*) AS terhuni FROM tb_penghuni LEFT JOIN tb_kamarkosan ON (penghuni_id_kosan = kamarkosan_id_kosan AND penghuni_id_kamarkosan = id_kamarkosan) GROUP BY kamarkosan_id_kosan, id_kamarkosan');

        $sections = $this->db->where('kamarkosan_id_kosan ='.$dormitory_id)
        ->where('kapasitas_terhuni < kapasitas_total')
        ->get('tb_kamarkosan')->result_array();
        
        
            foreach($sections as $key => $section)
            {
               // foreach($query->result_array() as $getquery){
                    //if(!($section['id_kamarkosan'] == $getquery['ikk'] and $section['kapasitas_total'] > $getquery['terhuni'])){
                        echo '<option value="'.$section['id_kamarkosan'].'">'.$section['nama_kamar'].'</option>';
                    //}
                //}
            }
 
    }
    /***********  The function below add, update and delete student from students' table ***********************/
    function new_student ($param1 = null, $param2 = null, $param3 = null,$param4 = null){

        if($param1 == 'create'){

            $this->form_validation->set_rules('no_ktp','Nomor KTP','required|is_unique[tb_penghuni.no_ktp]');
            $this->form_validation->set_rules('email','Email','is_unique[tb_penghuni.email]|is_unique[tb_admin.email]|is_unique[tb_pengelola.email]');
            $this->form_validation->set_rules('phone','No. HP Penghuni','is_unique[tb_penghuni.no_hp_penghuni]');
            $this->form_validation->set_rules('no_hp_ortu','No. HP Orang Tua','is_unique[tb_penghuni.no_hp_ortu]');

            if ($this->form_validation->run()==true) 
            {
            $this->student_model->createNewStudent();
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
            redirect(base_url(). 'admin/new_student', 'refresh');
            }
        }

        if($param1 == 'update'){ 
            $this->form_validation->set_rules('no_ktp','Nomor KTP','required|is_unique[tb_penghuni.penghuni_id <> '.$param2.' and no_ktp=]');
            $this->form_validation->set_rules('email','Email','is_unique[tb_penghuni.penghuni_id <> '.$param2.' and email=]|is_unique[tb_admin.email]|is_unique[tb_pengelola.email]');
            $this->form_validation->set_rules('phone','No. HP Penghuni','is_unique[tb_penghuni.penghuni_id <> '.$param2.' and no_hp_penghuni=]');
            $this->form_validation->set_rules('no_hp_ortu','No. HP Orang Tua','is_unique[tb_penghuni.penghuni_id <> '.$param2.' and no_hp_ortu=]');

            if ($this->form_validation->run()==true)
            {
            //param3 = id kosan lama, param 4 = id kamarkosanlama
            $this->student_model->updateNewStudent($param2,$param3,$param4);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'admin/student_information', 'refresh');
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));		
            }
        }

        if($param1 == 'delete'){
            $this->student_model->deleteNewStudent($param2,$param3,$param4);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'admin/student_information', 'refresh');

        }

        $page_data['page_name']     = 'new_student';
        $page_data['page_title']    = get_phrase('Tambah Penghuni Baru');
        $this->load->view('backend/index', $page_data);

    }


    function student_information(){

        $page_data['page_name']     = 'student_information';
        $page_data['page_title']    = get_phrase('Daftar Semua Penghuni');
        $this->load->view('backend/index', $page_data);
    }


    /**************************  search student function with ajax starts here   ***********************************/
    function getStudentClasswise($id_kosan){

        $page_data['id_kosan'] = $id_kosan;
        $this->load->view('backend/admin/showStudentClasswise', $page_data);
    }

    function getHostelRoomwise($dormitory_id){

        $page_data['dormitory_id'] = $dormitory_id;
        $this->load->view('backend/admin/showHostelRoomwise', $page_data);
    }
    /**************************  search student function with ajax ends here   ***********************************/


    function edit_student($id_penghuni,$id_kosanlama,$id_kamarlama){

        //data student_id disini bisa dipanggil sebagai $sutend_id di bagian views
        $page_data['id_penghuni']      = $id_penghuni;
        $page_data['id_kosanlama']      = $id_kosanlama;
        $page_data['id_kamarlama']      = $id_kamarlama;
        $page_data['page_name']     = 'edit_student';
        $page_data['page_title']    = get_phrase('Ubah Data Penghuni');
        $this->load->view('backend/index', $page_data);
    }


    function resetStudentPassword ($student_id) {
        $password['password']                       =   sha1($this->input->post('new_password'));
        $confirm_password['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
        if ($password['password'] == $confirm_password['confirm_new_password']) {
           $this->db->where('penghuni_id', $student_id);
           $this->db->update('tb_penghuni', $password);
           $this->session->set_flashdata('flash_message', get_phrase('Password diubah'));
        }
        else{
            $this->session->set_flashdata('error_message', get_phrase('Masukkan Password yang Sama!'));
        }
        redirect(base_url() . 'admin/student_information', 'refresh');
    }

    /***********  The function below add, update and delete student payment table ***********************/
    function student_payment ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'single_invoice'){
            $this->form_validation->set_rules('invoice_number', 'Nomor Tagihan', 'required|is_unique[tb_tagihan.no_tagihan]');
            if ($this->form_validation->run()==true)
            {
            $this->student_payment_model->createStudentSinglePaymentFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
            redirect(base_url(). 'admin/daftar_tagihan_penghuni', 'refresh');
            }else{
            $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
    }

        }
   

        if($param1 == 'update_invoice'){
            $this->student_payment_model->updateStudentPaymentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
            redirect(base_url(). 'admin/daftar_tagihan_penghuni', 'refresh');
        }


        if($param1 == 'delete_invoice'){
            $this->student_payment_model->deleteStudentPaymentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'admin/daftar_tagihan_penghuni', 'refresh');
        }

        $page_data['page_name']     = 'student_payment';
        $page_data['page_title']    = get_phrase('Buat Tagihan');
        $this->load->view('backend/index', $page_data);
    }   

    
    function daftar_tagihan_penghuni(){

        $page_data['page_name']     = 'daftar_tagihan_penghuni';
        $page_data['page_title']    = get_phrase('Pembayaran Tagihan');
        $this->load->view('backend/index', $page_data);

    }
    /***********  / Student payment ends here ***********************/
    
    function get_class_student($class_id){
        $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
            foreach($students as $key => $student)
            {
                echo '<option value="'.$student['student_id'].'">'.$student['name'].'</option>';
            }
    }


    function get_class_mass_student($class_id){

        $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
        foreach($students as $key => $student)
        {
            echo '<div class="">
            <label><input type="checkbox" class="check" name="student_id[]" value="' . $student['student_id'] . '">' . '&nbsp;'. $student['name'] .'</label></div>';
        }

        echo '<br><button type ="button" class="btn btn-success btn-sm btn-rounded" onClick="select()">'.get_phrase('Select All').'</button>';
        echo '<button type ="button" class="btn btn-primary btn-sm btn-rounded" onClick="unselect()">'.get_phrase('Unselect All').'</button>';
    }


    /***********  The function below manages new admin ***********************/
    function newAdministrator ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){

            
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_admin.email]|is_unique[tb_penghuni.email]|is_unique[tb_pengelola.email]');
            $this->form_validation->set_rules('phone', 'Nomor HP','required|is_unique[tb_admin.no_hp_admin]');

            if ($this->form_validation->run()==true)
            {
            $this->admin_model->createNewAdministrator();
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil disimpan'));
                redirect(base_url(). 'admin/newAdministrator', 'refresh');
            }else{
                $this->session->set_flashdata('error_message', get_phrase('Data gagal disimpan'));
            }
        }

        if($param1 == 'update'){
                //lari ke manage profile -> update
                $this->admin_model->updateAdministrator($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
                redirect(base_url(). 'admin/newAdministrator', 'refresh');
           
        }

        if($param1 == 'delete'){
            $this->admin_model->deleteAdministrator($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data berhasil dihapus'));
            redirect(base_url(). 'admin/newAdministrator', 'refresh');
        }

        $page_data['page_name']     = 'newAdministrator';
        $page_data['page_title']    = get_phrase('New Administrator');
        $this->load->view('backend/index', $page_data);
    }
    /***********  The function that manages administrator ends here ***********************/

    function updateAdminRole($param2){
        $this->admin_model->updateAllDetailsForAdminRole($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data berhasil diubah'));
        redirect(base_url(). 'admin/newAdministrator', 'refresh');
    }

    function informasi ($param1 = null, $param2 = null, $param3 = null){
    
        $page_data['page_name']     = 'informasi';
        $page_data['page_title']    = get_phrase('Informasi');
        $this->load->view('backend/index', $page_data);

    }

}
