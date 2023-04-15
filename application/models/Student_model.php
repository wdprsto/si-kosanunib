<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }



    // The function below insert into student house //
    function createStudentHouse(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'description'      => html_escape($this->input->post('description'))
	    );

        $this->db->insert('house', $page_data);
    }

// The function below update student house //
    function updateStudentHouse($param2){
        $page_data = array(
            'name'         => html_escape($this->input->post('name')),
            'description'  => html_escape($this->input->post('description'))
	    );

        $this->db->where('house_id', $param2);
        $this->db->update('house', $page_data);
    }

    // The function below delete from student house table //
    function deleteStudentHouse($param2){
        $this->db->where('house_id', $param2);
        $this->db->delete('house');
    }

 

    // The function below insert into student category //
    function createstudentCategory(){

        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );
        $this->db->insert('student_category', $page_data);
    }

// The function below update student category //
    function updatestudentCategory($param2){
        $page_data = array(
            'name'        => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
	    );

        $this->db->where('student_category_id', $param2);
        $this->db->update('student_category', $page_data);
    }

    // The function below delete from student category table //
    function deletestudentCategory($param2){
        $this->db->where('student_category_id', $param2);
        $this->db->delete('student_category');
    }




    //  the function below insert into student table
    function createNewStudent(){

        $page_data = array(
            'nama_penghuni'         => html_escape($this->input->post('name')),
            'tgl_lahir'             => html_escape($this->input->post('birthday')),
            'tempat_lahir'          => html_escape($this->input->post('place_birth')),
            'jk_penghuni'           => html_escape($this->input->post('sex')),
            'agama'                 => html_escape($this->input->post('religion')),
            'goldar'                => html_escape($this->input->post('blood_group')),
            'alamat_asal'           => html_escape($this->input->post('address')),
            'no_hp_penghuni'        => html_escape($this->input->post('phone')),
            'email'                 => html_escape($this->input->post('email')),
            'password'              => sha1($this->input->post('password')),
            'nama_ayah'             => html_escape($this->input->post('nama_ayah')),
            'nama_ibu'              => html_escape($this->input->post('nama_ibu')),
            'no_hp_ortu'            => html_escape($this->input->post('no_hp_ortu')),
            'no_ktp'                => html_escape($this->input->post('no_ktp')),
            'tgl_masuk'             => html_escape($this->input->post('tgl_masuk')),
            'penghuni_id_kosan'             => html_escape($this->input->post('dormitory_id')),
            'penghuni_id_kamarkosan'        => html_escape($this->input->post('hostel_room_id')),
        );
        
  
    $this->db->insert('tb_penghuni', $page_data);
    $student_id = $this->db->insert_id();
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');			// image with user ID

        
    $id_kosan = $page_data['penghuni_id_kosan'];
    $id_kamarkosan = $page_data['penghuni_id_kamarkosan'];
    $this->db->query('update tb_kamarkosan SET kapasitas_terhuni = (SELECT COUNT(*) AS terhuni FROM tb_penghuni LEFT JOIN tb_kamarkosan ON (penghuni_id_kosan = kamarkosan_id_kosan AND penghuni_id_kamarkosan = id_kamarkosan) GROUP BY kamarkosan_id_kosan, id_kamarkosan HAVING kamarkosan_id_kosan = '.$id_kosan.'  and id_kamarkosan = '.$id_kamarkosan.') WHERE kamarkosan_id_kosan = '.$id_kosan.' and id_kamarkosan = '.$id_kamarkosan);
    }


    //the function below update student
    function updateNewStudent($param2, $param3, $param4){
        $page_data = array(
            'nama_penghuni'         => html_escape($this->input->post('name')),
            'tgl_lahir'             => html_escape($this->input->post('birthday')),
            'tempat_lahir'          => html_escape($this->input->post('place_birth')),
            'jk_penghuni'           => html_escape($this->input->post('sex')),
            'agama'                 => html_escape($this->input->post('religion')),
            'goldar'                => html_escape($this->input->post('blood_group')),
            'alamat_asal'           => html_escape($this->input->post('address')),
            'no_hp_penghuni'        => html_escape($this->input->post('phone')),
            'email'                 => html_escape($this->input->post('email')),
            'nama_ayah'             => html_escape($this->input->post('nama_ayah')),
            'nama_ibu'              => html_escape($this->input->post('nama_ibu')),
            'no_hp_ortu'            => html_escape($this->input->post('no_hp_ortu')),
            'no_ktp'                => html_escape($this->input->post('no_ktp')),
            'tgl_masuk'             => html_escape($this->input->post('tgl_masuk')),
            'penghuni_id_kosan'             => html_escape($this->input->post('dormitory_id'))

        );
        
        if($this->input->post('hostel_room_id') == NULL){
            $page_data['penghuni_id_kamarkosan'] = $param4;
        }else{
            $page_data['penghuni_id_kamarkosan'] = html_escape($this->input->post('hostel_room_id'));
        }

        $this->db->where('penghuni_id', $param2);
        $this->db->update('tb_penghuni', $page_data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param2 . '.jpg');

        $idkosanlama = $param3;
        $idkamarkosanlama = $param4;

        if(!($idkosanlama == $page_data['penghuni_id_kosan'] and $idkamarkosanlama == $page_data['penghuni_id_kamarkosan'])){
            $this->db->query('update tb_kamarkosan SET kapasitas_terhuni = (SELECT COUNT(*) AS terhuni FROM tb_penghuni LEFT JOIN tb_kamarkosan ON (penghuni_id_kosan = kamarkosan_id_kosan AND penghuni_id_kamarkosan = id_kamarkosan) GROUP BY kamarkosan_id_kosan, id_kamarkosan HAVING kamarkosan_id_kosan = '.$idkosanlama.'  and id_kamarkosan = '.$idkamarkosanlama.') WHERE kamarkosan_id_kosan = '.$idkosanlama.' and id_kamarkosan = '.$idkamarkosanlama);
        }

        $id_kosan = $page_data['penghuni_id_kosan'];
        $id_kamarkosan = $page_data['penghuni_id_kamarkosan'];
        $this->db->query('update tb_kamarkosan SET kapasitas_terhuni = (SELECT COUNT(*) AS terhuni FROM tb_penghuni LEFT JOIN tb_kamarkosan ON (penghuni_id_kosan = kamarkosan_id_kosan AND penghuni_id_kamarkosan = id_kamarkosan) GROUP BY kamarkosan_id_kosan, id_kamarkosan HAVING kamarkosan_id_kosan = '.$id_kosan.'  and id_kamarkosan = '.$id_kamarkosan.') WHERE kamarkosan_id_kosan = '.$id_kosan.' and id_kamarkosan = '.$id_kamarkosan);
    }

    // the function below deletes from student table
    function deleteNewStudent($param2,$param3,$param4){
        $this->db->where('penghuni_id', $param2);
        $this->db->delete('tb_penghuni');

        $id_kosan = $param3;
        $id_kamarkosan = $param4;
        $this->db->query('update tb_kamarkosan SET kapasitas_terhuni = (SELECT COUNT(*) AS terhuni FROM tb_penghuni LEFT JOIN tb_kamarkosan ON (penghuni_id_kosan = kamarkosan_id_kosan AND penghuni_id_kamarkosan = id_kamarkosan) GROUP BY kamarkosan_id_kosan, id_kamarkosan HAVING kamarkosan_id_kosan = '.$id_kosan.'  and id_kamarkosan = '.$id_kamarkosan.') WHERE kamarkosan_id_kosan = '.$id_kosan.' and id_kamarkosan = '.$id_kamarkosan);
    }

	


	
	
}

