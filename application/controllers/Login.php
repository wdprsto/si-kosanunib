<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
    }

    //***************** The function below redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login')== 1) redirect (base_url(). 'admin/dashboard');
       
        if ($this->session->userdata('hostel_login')== 1) redirect (base_url(). 'hostel/dashboard');
       
        if ($this->session->userdata('student_login')== 1) redirect (base_url(). 'student/dashboard'); 
        $this->load->view('backend/login');
    }
  //***************** / The function below redirects to logged in user area

  //********************************** the function below validating user login request 
    function validate_login() {
      
        $login_check_model = $this->login_model->loginFunctionForAllUsers();
        $login_user = $this->session->userdata('login_type');
        if(!$login_check_model){
          // Here, if the above conditions are not meant, the user will be redirected to login page again.
          $this->session->set_flashdata('error_message', get_phrase('Wrong email or password'));
          redirect(base_url() . 'login', 'refresh');
        }
        if($login_user == 'admin') {
          $this->session->set_flashdata('flash_message', get_phrase('Login Berhasil!'));
          redirect(base_url() . 'admin/dashboard', 'refresh');
        }


        if($login_user == 'hostel') {
          $this->session->set_flashdata('flash_message', get_phrase('Login Berhasil!'));
          redirect(base_url() . 'hostel/dashboard', 'refresh');
        }

        if($login_user == 'student') {
          $this->session->set_flashdata('flash_message', get_phrase('Login Berhasil!'));
          redirect(base_url() . 'student/dashboard', 'refresh');
        }
     }

 
    function logout(){
      $login_user = $this->session->userdata('login_type');
      if($login_user == 'admin'){
          $this->login_model->logout_model_for_admin();
      }
      
      if($login_user == 'hostel'){
        $this->login_model->logout_model_for_hostel();
      }
     
      if($login_user == 'student'){
        $this->login_model->logout_model_for_student();
      }
      $this->session->sess_destroy();
      redirect('login', 'refresh');

     }


    
}
