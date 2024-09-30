<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_departement extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication_departement_model', "Departement");
        $this->redirect = "departement";
	}

    public function index()
    {
        $departementData  =  $this->Departement->getAllData();
        $data  = [
            'title'  => 'Data departement',
            'desc'   => 'Melihat data departement',
            'departementData'   => $departementData->result()
        ];
        $page = 'departement/index';
        template($page, $data);
    }

    public function create()
    {
        $this->_validation();  // Memanggil fungsi _validation
    
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Tambah Data departement',
                'desc' => 'Menambah data departement',
            ];
            $page = 'departement/create';
            template($page, $data);
        } else {
            $this->db->set("id", "UUID()", false);
            $dataInsert = [
                'departement_name' => $this->input->post("name")
            ];
            $insert = $this->Departement->insert($dataInsert);
    
            if ($insert > 0) {
                $this->session->set_flashdata("success", "Data berhasil disimpan");
            } else {
                $this->session->set_flashdata("error", "Server sedang sibuk, silahkan coba lagi");
            }
    
            redirect($this->redirect);
        }
    }
    
    public function delete($id)
    {
        $cek = $this->Departement->getDataBy(['id' => $id]);
        if ($cek->num_rows() > 0) {
            $delete = $this->Departement->delete(['id' => $id]);
            if ($delete > 0) {
                $this->session->set_flashdata("success", "Data berhasil di hapus");
            } else {
                $this->session->set_flashdata("error", "Server sedang sibuk, silahkan coba lagi nanti");
            }
        } else {
            $this->session->set_flashdata("error", "Data Tidak Ada");
        }
        redirect($this->redirect);
    }

    public function update($id)
{
    $cek = $this->Departement->getDataBy(['id' => $id]);
    
    if ($cek->num_rows() > 0) {
        $row = $cek->row();
        $oldName = $row->departement_name;
        
        $this->_validation($oldName);

        if ($this->form_validation->run() == false) {
            $data = [
                'title'         => 'Ubah Data Departemen',
                'desc'          => 'Berfungsi Untuk Mengubah Data Departemen',
                'departement'   => $row
            ];
            
            $page = 'departement/update';
            template($page, $data);
        } else {
            $dataUpdate = [
                'departement_name'  => htmlspecialchars($this->input->post("name")), // Ganti pos dengan post
                'updated_at'        => date("Y-m-d H:i:s"),
            ];

            $where = [
                'id'    => $id
            ];

            // Bagian update pada metode update
            $update = $this->Departement->update($dataUpdate, $where);

            // Periksa jumlah baris yang terpengaruh setelah update
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("success", "Data Berhasil di Update");
            } else {
                $this->session->set_flashdata("error", "Server sedang sibuk, silahkan coba lagi nanti");
            }


            redirect($this->redirect);
        }
    } else {
        $this->session->set_flashdata("error", "Data Tidak Ada");
        redirect($this->redirect);
    }
}


    private function _validation($name = null)
    {
        $postName = $this->input->post("name");

        if ($postName !== $name) {
            $is_unique = '|is_unique[m_departement.departement_name]';
        } else {
            $is_unique = '';
        }
        
        var_dump($is_unique);
        
        $this->form_validation->set_rules(
            'name',
            'Nama Departement',
            'trim|required' . $is_unique,
            [
                'required' => '%s Wajib Diisi',
                'is_unique' => '%s Sudah Ada'
            ]
        );
        
    }
    
  

}
