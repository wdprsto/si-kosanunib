<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dormitory_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

     // The function below insert into dormitory table //
     function createDormitoryFunction(){
        $page_data = array(
            'nama_kosan'                  => html_escape($this->input->post('name')),
            'alamat_kosan'               => html_escape($this->input->post('address')),
            'deskripsi_kosan'           => html_escape($this->input->post('description'))
		);

        $this->db->insert('tb_kosan', $page_data);
    }

// The function below update dormitory table //
    function updateDormitoryFunction($param2){
        $page_data = array(
            'nama_kosan'                  => html_escape($this->input->post('name')),
            'alamat_kosan'               => html_escape($this->input->post('address')),
            'deskripsi_kosan'           => html_escape($this->input->post('description'))
		);

        $this->db->where('id_kosan', $param2);
        $this->db->update('tb_kosan', $page_data);
    }

    // The function below delete from dormitory table //
    function deleteDormitoryFunction($param2){
        $this->db->where('id_kosan', $param2);
        $this->db->delete('tb_kosan');
    }



// The function below insert into hostel room table //
         function createHostelRoomFunction(){
            $page_data = array(
                'kamarkosan_id_kosan'       => html_escape($this->input->post('dormitory_id')),
                'nama_kamar'                => html_escape($this->input->post('name')),
                'kapasitas_total'           => html_escape($this->input->post('num_bed')),
                'biaya_kamar'               => html_escape($this->input->post('cost_bed')),
                'deskripsi'                 => html_escape($this->input->post('description'))
                 //kapasitas terhuni diset default 0
            );
    
            $this->db->insert('tb_kamarkosan', $page_data);
        }
    
    // The function below update hostel room table //
        function updateHostelRoomFunction($param2){
            $page_data = array(
                'nama_kamar'                => html_escape($this->input->post('name')),
                'kapasitas_total'           => html_escape($this->input->post('num_bed')),
                'biaya_kamar'               => html_escape($this->input->post('cost_bed')),
                'deskripsi'                 => html_escape($this->input->post('description'))
               
            );
    
            $this->db->where('id_kamarkosan', $param2);
            $this->db->update('tb_kamarkosan', $page_data);
        }
    
        // The function below delete from hostel room table //
        function deleteHostelRoomFunction($param2){
            $this->db->where('id_kamarkosan', $param2);
            $this->db->delete('tb_kamarkosan');
        }
	


	
	
}

