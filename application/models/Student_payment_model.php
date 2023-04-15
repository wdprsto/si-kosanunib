<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_payment_model extends CI_Model { 
	
	function __construct(){
        parent::__construct();
         
    }



        function createStudentSinglePaymentFunction (){

            $page_data['no_tagihan']            =   html_escape($this->input->post('invoice_number'));
            $page_data['tagihan_id_penghuni']   =   html_escape($this->input->post('tagihan_id_penghuni'));
            $page_data['nama_tagihan']          =   html_escape($this->input->post('title'));
            $page_data['deskripsi_tagihan']     =   html_escape($this->input->post('description'));
            $page_data['total_tagihan']         =   html_escape($this->input->post('amount'));
            $page_data['jatuh_tempo']           =   html_escape($this->input->post('due'));
            $page_data['creation_timestamp']    =   html_escape($this->input->post('creation_timestamp'));
            $page_data['status']                =   html_escape($this->input->post('status'));
            $page_data['durasi_kos']            =   html_escape($this->input->post('durasi_kos'));
            $page_data['tagihan_id_admin']      =   html_escape($this->input->post('tagihan_id_admin'));
            
            if($page_data['status']=='l'){
                $page_data['tgl_bayar']          =   html_escape(date('Y-m-d'));
                $page_data['tgl_berlakusd']      =   html_escape(date_add(date_create($page_data['jatuh_tempo']), date_interval_create_from_date_string($page_data['durasi_kos']." months"))->format('Y-m-d'));
            }

            $this->db->insert('tb_tagihan', $page_data);
            $tagihan_id = $this->db->insert_id();
        }


        function updateStudentPaymentFunction($param2){

            $page_data['nama_tagihan']          =   html_escape($this->input->post('title'));
            $page_data['deskripsi_tagihan']     =   html_escape($this->input->post('description'));
            $page_data['total_tagihan']         =   html_escape($this->input->post('amount'));
            $page_data['jatuh_tempo']           =   html_escape($this->input->post('due'));
            $page_data['status']                =   html_escape($this->input->post('status'));
            $page_data['durasi_kos']            =   html_escape($this->input->post('durasi_kos'));
            $page_data['tagihan_id_admin']      =   html_escape($this->input->post('tagihan_id_admin'));
                        
            //uploading file using codeigniter upload library

            //userdata bisa dipakai di models juga waw
            if($this->session->userdata('login_type')!='admin'){
                $this->load->library('upload');    
                $files = $_FILES['nama_file'];
               
                $config['upload_path'] = 'uploads/bukti_pembayaran/';
                $config['allowed_types'] = '*';
                $_FILES['nama_file']['name'] = 'bukti_'.date('Y_m_d_His_').$files['name'];
                $_FILES['nama_file']['type'] = $files['type'];
                $_FILES['nama_file']['tmp_name'] = $files['tmp_name'];
                $_FILES['nama_file']['error']= $files['nama_file']['error'];
                $_FILES['nama_file']['size'] = $files['size'];
                $this->upload->initialize($config);
                $this->upload->do_upload('nama_file');

            $page_data['nama_file'] = $_FILES['nama_file']['name'];
                
            
                if($page_data['nama_file'] != null){
                    $page_data['status']          =   html_escape('mk');
                };

            };

            
            if($page_data['status']=='l'){
                $page_data['tgl_bayar']          =   html_escape(date('Y-m-d'));
                $page_data['tgl_berlakusd']      =   html_escape(date_add(date_create($page_data['jatuh_tempo']), date_interval_create_from_date_string($page_data['durasi_kos']." months"))->format('Y-m-d'));
            };
            
            $this->db->where('tagihan_id', $param2);
            $this->db->update('tb_tagihan', $page_data);


        }

        function deleteStudentPaymentFunction($param2){
            $this->db->where('tagihan_id', $param2);
            $this->db->delete('tb_tagihan');

        }

    



}