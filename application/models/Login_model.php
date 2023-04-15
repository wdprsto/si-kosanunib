<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    function loginFunctionForAllUsers (){
        
        $email = html_escape($this->input->post('email'));			
        $password = html_escape($this->input->post('password'));	
        $credential = array('email' => $email, 'password' => sha1($password));	
  
        $query = $this->db->get_where('tb_admin', $credential); 
        if ($query->num_rows() > 0) {
            $row = $query->row();
  
            $this->session->set_userdata('login_type', 'admin');
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);

            /** MENGUPDATE DATA LOGIN_STATUS DARI ADMIN DI DATABASE */
            return  $this->db->set('login_status', ('1'))
                    ->where('admin_id', $this->session->userdata('admin_id'))
                    ->update('tb_admin');
        }

        
        $query = $this->db->get_where('tb_pengelola', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
  
            $this->session->set_userdata('login_type', 'hostel');
            $this->session->set_userdata('hostel_login', '1');
            $this->session->set_userdata('hostel_id', $row->pengelola_id);
            $this->session->set_userdata('login_user_id', $row->pengelola_id);
            $this->session->set_userdata('name', $row->nama_pengelola);
            $this->session->set_userdata('id_kosan', $row->pengelola_id_kosan);

            return  $this->db->set('login_status', ('1'))
                    ->where('pengelola_id', $this->session->userdata('hostel_id'))
                    ->update('tb_pengelola');
        }


        $query = $this->db->get_where('tb_penghuni', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
  
            $this->session->set_userdata('login_type', 'student');
            $this->session->set_userdata('student_login', '1');
            $this->session->set_userdata('student_id', $row->penghuni_id);
            $this->session->set_userdata('login_user_id', $row->penghuni_id);
            $this->session->set_userdata('name', $row->nama_penghuni);
            $this->session->set_userdata('id_kosan', $row->penghuni_id_kosan);


            return  $this->db->set('login_status', ('1'))
                    ->where('penghuni_id', $this->session->userdata('student_id'))
                    ->update('tb_penghuni');
        }

    }


    function logout_model_for_admin(){
        return  $this->db->set('login_status', ('0'))
                    ->where('admin_id', $this->session->userdata('admin_id'))
                    ->update('tb_admin');
    }


    function logout_model_for_hostel(){
        return  $this->db->set('login_status', ('0'))
                    ->where('pengelola_id', $this->session->userdata('hostel_id'))
                    ->update('tb_pengelola');
    }

    function logout_model_for_student(){
        return  $this->db->set('login_status', ('0'))
                    ->where('penghuni_id', $this->session->userdata('student_id'))
                    ->update('tb_penghuni');
    }
	
	
	


	
	
}
