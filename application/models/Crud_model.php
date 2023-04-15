<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crud_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    function get_tagihan_menunggu_konfirmasi(){
        $this->db->where('status', 'mk');
        $this->db->from('tb_tagihan');
        echo $this->db->count_all_results();
    }

	 function get_type_name_by_id($type, $type_id = '', $field = 'nama') {
        if($type=='hostel'){
            $type = 'pengelola';
        }else if($type == 'student'){ 
            $type = 'penghuni';
        }
        
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get('tb_'.$type);
        $result = $query->result_array();
        foreach ($result as $row)
        return $row[$field.'_'.$type];
    }

    function get_kosan_dan_kamar_dari_id_penghuni($idpenghuni) {
      
        $this->db->select('*');
        $this->db->from('tb_penghuni'); 
        $this->db->join('tb_kamarkosan', 'penghuni_id_kosan = kamarkosan_id_kosan and penghuni_id_kamarkosan = id_kamarkosan', 'left');
        $this->db->join('tb_kosan', 'kamarkosan_id_kosan = id_kosan', 'left');
        $this->db->where('penghuni_id', $idpenghuni);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $row)
        return $row['nama_kosan'].' - '.$row['nama_kamar'];
    }

    function tgl_berlakusd_dari_id($idpenghuni) {
      
        $this->db->select('*');
        $this->db->from('tb_tagihan'); 
        $this->db->where('tagihan_id_penghuni', $idpenghuni);
        $this->db->where('status', 'l');
        $this->db->order_by('tgl_berlakusd', 'desc');
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $row)
        return $row['tgl_berlakusd'];
    }
              

    function get_biaya_kosan_dan_kamar_dari_id_penghuni($idpenghuni) {
      
        $this->db->select('*');
        $this->db->from('tb_penghuni'); 
        $this->db->join('tb_kamarkosan', 'penghuni_id_kosan = kamarkosan_id_kosan and penghuni_id_kamarkosan = id_kamarkosan', 'left');
        $this->db->join('tb_kosan', 'kamarkosan_id_kosan = id_kosan', 'left');
        $this->db->where('penghuni_id', $idpenghuni);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $row)
        return $row['biaya_kamar'];
    }

    function get_data_dari_kolom($namaTabel, $kolomPenentu, $nilaiPenentu = '', $kolomOutput) {
      
        $this->db->where($kolomPenentu, $nilaiPenentu);
        $query = $this->db->get($namaTabel);
        $result = $query->result_array();
        foreach ($result as $row)
        return $row[$kolomOutput];
    }

    function get_data_penghuni($id_penghuni, $nama_kolom) {
      
    $this->db->where('penghuni_id', $id_penghuni);
        $query = $this->db->get('tb_penghuni');
        $result = $query->result_array();
        foreach ($result as $row)
        return $row[$nama_kolom];
    }

    function get_kamar_dari_kosan($idpenghuni, $idkamarkosan) {
      
        $this->db->select('*');
        $this->db->from('tb_penghuni'); 
        $this->db->join('tb_kamarkosan', 'penghuni_id_kosan = kamarkosan_id_kosan and penghuni_id_kamarkosan = id_kamarkosan', 'left');
        $this->db->where('penghuni_id', $idpenghuni);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $row)
        return $row['nama_kamar'];
    }


     function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;

    }

    function get_subject_name_by_id ($subject_id){
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
            return $query->name;
    }

    function get_class_name ($class_id){
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $result = $query->result_array();
        foreach ($result as $key => $row)
                return $row['name'];

    }

    function get_teachers() {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

 
    function get_teacher_name($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_admin_name($admin_id) {
        $query = $this->db->get_where('tb_admin', array('admin_id' => $admin_id));
        $resi = $query->result_array();
        foreach ($resi as $row)
            return $row['name'];
    }

    function get_teacher_info($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        return $query->result_array();
    }


    function get_invoice_info() {
        $query = $this->db->get('invoice');
        return $query->result_array();
    }

    /***********  Subjects  *******************/
    function get_subjects() {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id) {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }


    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes() {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_tagihanku($user_id){
    

        $this->db->select_sum('total_tagihan');
        $this->db->from('tb_tagihan');
        $this->db->where('status', 'bl');
        $this->db->where('tagihan_id_penghuni', $this->session->userdata('student_id'));
        $query = $this->db->get();
        $total_tagihan = $query->row()->total_tagihan;



        return $total_tagihan;
    }

    /***********  Exams  *******************/
    function get_exams() {
        $query = $this->db->get('exam');
        return $query->result_array();
    }

    function get_exam_info($exam_id) {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

    /***********  Grades  *******************/
    function get_grades() {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id) {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_students($class_id){
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function list_semua_pengelola(){

        $data = array();
        $sql = "select * from tb_pengelola order by pengelola_id desc limit 0, 5";
        $all_student_selected = $this->db->query($sql)->result_array();

        foreach($all_student_selected as $key => $selected_students_from_student_table){
            $student_id = $selected_students_from_student_table['pengelola_id'];
            $face_file = 'uploads/hostel_image/'. $student_id . '.jpg';
            if(!file_exists($face_file)){
                $face_file = 'uploads/user.jpg';
            }

            $selected_students_from_student_table['face_file'] = base_url() . $face_file;
            array_push($data, $selected_students_from_student_table);
        }

        return $data;
    }

    function list_semua_penghuni(){

        $data = array();
        $sql = "select * from tb_penghuni order by penghuni_id desc limit 0,5";
        $all_student_selected = $this->db->query($sql)->result_array();

        foreach($all_student_selected as $key => $selected_students_from_student_table){
            $student_id = $selected_students_from_student_table['penghuni_id'];
            $face_file = 'uploads/student_image/'. $student_id . '.jpg';
            if(!file_exists($face_file)){
                $face_file = 'uploads/user.jpg';
            }

            $selected_students_from_student_table['face_file'] = base_url() . $face_file;
            array_push($data, $selected_students_from_student_table);
        }

        return $data;
    }

    function list_penghuni_sesuai_kosan($kosanuser){

        $data = array();
        $sql = "select count(*) from tb_penghuni where penghuni_id_kosan = ".$kosanuser;
        $all_teacher_selected = $this->db->query($sql)->result_array();

        foreach($all_teacher_selected as $key => $selected_teachers_from_teacher_table){
            $teacher_id = $selected_teachers_from_teacher_table['hostel_id'];
            $face_file = 'uploads/hostel_image/'. $teacher_id . '.jpg';
            if(!file_exists($face_file)){
                $face_file = 'uploads/hostel_image/default_image.jpg/';
            }

            $selected_teachers_from_teacher_table['face_file'] = base_url() . $face_file;
            array_push($data, $selected_teachers_from_teacher_table);
        }

        return $data;
    }


    function list_all_hostel_and_order_with_hostel_id(){

        $data = array();
        $sql = "select * from hostel order by hostel_id desc limit 0, 5";
        $all_teacher_selected = $this->db->query($sql)->result_array();

        foreach($all_teacher_selected as $key => $selected_teachers_from_teacher_table){
            $teacher_id = $selected_teachers_from_teacher_table['hostel_id'];
            $face_file = 'uploads/hostel_image/'. $teacher_id . '.jpg';
            if(!file_exists($face_file)){
                $face_file = 'uploads/hostel_image/default_image.jpg/';
            }

            $selected_teachers_from_teacher_table['face_file'] = base_url() . $face_file;
            array_push($data, $selected_teachers_from_teacher_table);
        }

        return $data;
    }


    function enquiry_category(){

        $page_data['category']  =   $this->input->post('category');
        $page_data['purpose']   =   $this->input->post('purpose');
        $page_data['whom']      =   $this->input->post('whom');
        $this->db->insert('enquiry_category', $page_data);
    }

    function update_category($param2){
        $page_data['category']  =   $this->input->post('category');
        $page_data['purpose']   =   $this->input->post('purpose');
        $page_data['whom']      =   $this->input->post('whom');
        $this->db->where('enquiry_category_id', $param2);
        $this->db->update('enquiry_category', $page_data);

    }

    function delete_category($param2){
        $this->db->where('enquiry_category_id', $param2);
        $this->db->delete('enquiry_category');

    }

    function delete_enquiry($param2){
        $this->db->where('enquiry_id', $param2);
        $this->db->delete('enquiry');
    }

    function insert_club(){

        $page_data['club_name']     =   $this->input->post('club_name');
        $page_data['desc']          =   $this->input->post('desc');
        $page_data['date']          =   $this->input->post('date');

        $this->db->insert('club', $page_data);
    }

    function update_club($param2){

        $page_data['club_name']     =   $this->input->post('club_name');
        $page_data['desc']          =   $this->input->post('desc');
        $page_data['date']          =   $this->input->post('date');

        $this->db->where('club_id', $param2);
        $this->db->update('club', $page_data);
    }


    function delete_club($param2){
        $this->db->where('club_id', $param2);
        $this->db->delete('club');
    }


    function insert_circular(){

        $page_data['title']         =   $this->input->post('title');
        $page_data['reference']     =   $this->input->post('reference');
        $page_data['content']       =   $this->input->post('content');
        $page_data['date']          =   $this->input->post('date');

        $this->db->insert('circular', $page_data);

    }

    function update_circular($param2){
        $page_data['title']         =   $this->input->post('title');
        $page_data['reference']     =   $this->input->post('reference');
        $page_data['content']       =   $this->input->post('content');
        $page_data['date']          =   $this->input->post('date');

        $this->db->where('circular_id', $param2);
        $this->db->update('circular', $page_data);
    }


    function delete_circular($param2){
        $this->db->where('circular_id', $param2);
        $this->db->delete('circular');
    }


    function insert_parent(){

        $page_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password')),
			'phone' => $this->input->post('phone'),
        	'address' => $this->input->post('address'),
        	'profession' => $this->input->post('profession')
			);

        $this->db->insert('parent', $page_data);
    }

    function insert_librarian(){
        $page_data = array(		// array data that postulate the input fileds
            'name' 				=> $this->input->post('name'),
            'librarian_number' 	=> $this->input->post('librarian_number'),
            'birthday' 			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status'	=> $this->input->post('marital_status'),
            'password' 			=> sha1($this->input->post('password'))
            );
            
        $page_data['file_name'] = $_FILES["file_name"]["name"];
		$page_data['email'] = $this->input->post('email');
		$check_email = $this->db->get_where('librarian', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
		if($check_email != null) 
		{
		$this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        redirect(base_url() . 'admin/librarian/', 'refresh');
		}
		else
		{
        $this->db->insert('librarian', $page_data);
        $librarian_id = $this->db->insert_id();
		
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/librarian_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $librarian_id . '.jpg');			// image with user ID
		    //$this->email_model->account_opening_email('librarian', $data['email']); //Send email to receipient email adddrress upon account opening
            }
    }

    function update_librarian($param2){
        $page_data = array(			// array starts from here
            'name'				=> $this->input->post('name'),
            'birthday'			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'email' 			=> $this->input->post('email'),
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status' 	=> $this->input->post('marital_status')
            );

                $this->db->where('librarian_id', $param2);
                $this->db->update('librarian', $page_data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $param2 . '.jpg');            
    }

    function delete_librarian($param2){
        $this->db->where('librarian_id', $param2);
        $this->db->delete('librarian');
    }



    function insert_accountant(){
        $page_data = array(		// array data that postulate the input fileds
            'name' 				=> $this->input->post('name'),
            'accountant_number' 	=> $this->input->post('accountant_number'),
            'birthday' 			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status'	=> $this->input->post('marital_status'),
            'password' 			=> sha1($this->input->post('password'))
            );
            
        $page_data['file_name'] = $_FILES["file_name"]["name"];
		$page_data['email'] = $this->input->post('email');
		$check_email = $this->db->get_where('accountant', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
		if($check_email != null) 
		{
		$this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        redirect(base_url() . 'admin/accountant/', 'refresh');
		}
		else
		{
        $this->db->insert('accountant', $page_data);
        $accountant_id = $this->db->insert_id();
		
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/accountant_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $accountant_id . '.jpg');			// image with user ID
		    //$this->email_model->account_opening_email('accountant', $data['email']); //Send email to receipient email adddrress upon account opening
            }
    }




    function update_accountant($param2){
        $page_data = array(			// array starts from here
            'name'				=> $this->input->post('name'),
            'birthday'			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'email' 			=> $this->input->post('email'),
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status' 	=> $this->input->post('marital_status')
            );

                $this->db->where('accountant_id', $param2);
                $this->db->update('accountant', $page_data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $param2 . '.jpg');            
    }

    function delete_accountant($param2){
        $this->db->where('accountant_id', $param2);
        $this->db->delete('accountant');
    }




    function insert_hostel(){
        $page_data = array(		// array data that postulate the input fileds
            //pengelola_id diinput secara otomatis karena auto increment
            'nama_pengelola' 			=> $this->input->post('name'),
            'tgl_lahir' 			    => $this->input->post('birthday'),
            'jk_pengelola' 				=> $this->input->post('sex'),
            'agama' 			        => $this->input->post('religion'),
            'goldar' 		            => $this->input->post('blood_group'),
            'alamat_pengelola' 		    => $this->input->post('address'),
            'no_hp_pengelola' 			=> $this->input->post('phone'),
            'password' 			        => sha1($this->input->post('password')),
            'pengelola_id_kosan'        => $this->input->post('dormitory_id')
            );
        
        $page_data['email'] = $this->input->post('email');
        //$page_data['file_name'] = $_FILES["file_name"]["name"];
		
		$check_email = $this->db->get_where('tb_pengelola', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
		if($check_email != null) 
		{
		$this->session->set_flashdata('error_message', get_phrase('email_sudah_tersedia'));
        redirect(base_url() . 'admin/hostel/', 'refresh');
		}
		else
		{
        $this->db->insert('tb_pengelola', $page_data);
        $hostel_id = $this->db->insert_id();
		
            //move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/hostel_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hostel_image/' . $hostel_id . '.jpg');			// image with user ID
		    //$this->email_model->account_opening_email('hostel', $data['email']); //Send email to receipient email adddrress upon account opening
            }
    }

    
    function update_hostel($param2){
        $page_data = array(			// array starts from here
            'nama_pengelola' 			=> $this->input->post('name'),
            'tgl_lahir' 			    => $this->input->post('birthday'),
            'jk_pengelola' 				=> $this->input->post('sex'),
            'email' 				    => $this->input->post('email'),
            'agama' 			        => $this->input->post('religion'),
            'goldar' 		            => $this->input->post('blood_group'),
            'alamat_pengelola' 		    => $this->input->post('address'),
            'no_hp_pengelola' 			=> $this->input->post('phone'),
            'pengelola_id_kosan'        => $this->input->post('dormitory_id')
            );

                $this->db->where('pengelola_id', $param2);
                $this->db->update('tb_pengelola', $page_data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hostel_image/' . $param2 . '.jpg');            
    }

    function delete_hostel($param2){
        $this->db->where('pengelola_id', $param2);
        $this->db->delete('tb_pengelola');
    }


    function system_logo(){

        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
    }


    function update_settings(){

        $data['description']    =   $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('tb_setting', $data);

        $data['description']    =   $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('tb_setting', $data);

        $data['description']    =   $this->input->post('address');
        $this->db->where('type', 'address');
        $this->db->update('tb_setting', $data);

        $data['description']    =   $this->input->post('phone');
        $this->db->where('type', 'phone');
        $this->db->update('tb_setting', $data);

        $data['description']    =   $this->input->post('currency');
        $this->db->where('type', 'currency');
        $this->db->update('tb_setting', $data);

        $data['description']    =   $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('tb_setting', $data);

    }


    function update_theme(){

        $data['description']    =   $this->input->post('skin_colour');
        $this->db->where('type', 'skin_colour');
        $this->db->update('tb_setting', $data);
    }

    function get_settings($type){
        $get_settings = $this->db->get_where('tb_setting', array('type' => $type))->row()->description;
        return $get_settings;
    }


    function stripe_settings (){
        $stripe_info = array();

        $stripe['stripe_active']    = html_escape($this->input->post('stripe_active'));
        $stripe['testmode']         = html_escape($this->input->post('testmode'));
        $stripe['secret_key']       = html_escape($this->input->post('secret_key'));
        $stripe['public_key']       = html_escape($this->input->post('public_key'));
        $stripe['secret_live_key']  = html_escape($this->input->post('secret_live_key'));
        $stripe['public_live_key']  = html_escape($this->input->post('public_live_key'));

        array_push($stripe_info, $stripe);

        $data['description'] = json_encode($stripe_info);
        $this->db->where('type', 'stripe_setting');
        $this->db->update('tb_setting', $data);

    }

    function paypal_settings(){
        $paypal_info = array();

        $stripe['paypal_active']    = html_escape($this->input->post('paypal_active'));
        $stripe['paypal_mode']         = html_escape($this->input->post('paypal_mode'));
        $stripe['sandbox_client_id']       = html_escape($this->input->post('sandbox_client_id'));
        $stripe['production_client_id']       = html_escape($this->input->post('production_client_id'));
        
        array_push($paypal_info, $stripe);

        $data['description'] = json_encode($paypal_info);
        $this->db->where('type', 'paypal_setting');
        $this->db->update('tb_setting', $data);


    }


    


	
	
}

