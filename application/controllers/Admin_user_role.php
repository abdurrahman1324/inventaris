<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user_role extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_user_role_model', "Role");
        $this->redirect = "role";
	}

    public function index()
    {
        $userrole  =  $this->Role->getAllData();
        $data  = [
            'title'             => 'Data User Role',
            'desc'              => 'Melihat Data User Role',
            'userrole'          => $userrole->result()
        ];
        $page = 'userrole/index';
        template($page, $data);
    }

    public function create()
    {
        $this->_validation();  // Memanggil fungsi _validation
    
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Tambah Data User Role',
                'desc' => 'Menambah data User Role',
            ];
            $page = 'userrole/create';
            template($page, $data);
        } else {
            $this->db->set("id", "UUID()", false);
            $dataInsert = [
                'role_name' => $this->input->post("name")
            ];
            $insert = $this->Role->insert($dataInsert);
    
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
        $cek = $this->Role->getDataBy(['id' => $id]);
        
        if ($cek->num_rows() > 0) {
            $delete = $this->Role->delete(['id' => $id]);
            
            if ($delete > 0) {
                $this->session->set_flashdata("success", "Data berhasil dihapus");
            } else {
                $this->session->set_flashdata("error", "Gagal menghapus data");
            }
        } else {
            $this->session->set_flashdata("error", "Data tidak ditemukan");
        }
        
        redirect($this->redirect);
    }
    

    public function update($id)
    {
        $cek = $this->Role->getDataBy(['id' => $id]);
        
        if ($cek->num_rows() > 0) {
            $row = $cek->row();
            $oldName = $row->role_name;
            
            $this->_validation($oldName);

            if ($this->form_validation->run() == false) {
                $data = [
                    'title'         => 'Ubah Data User Role',
                    'desc'          => 'Berfungsi untuk mengubah Data User Role',
                    'role'   => $row
                ];
                
                $page = 'userrole/update';
                template($page, $data);
            } else {
                $dataUpdate = [
                    'role_name'         => htmlspecialchars($this->input->post("name")), // Ganti pos dengan post
                    'updated_at'        => date("Y-m-d H:i:s"),
                ];

                $where = [
                    'id'    => $id
                ];

                // Bagian update pada metode update
                $update = $this->Role->update($dataUpdate, $where);

                // Periksa jumlah baris yang terpengaruh setelah update
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata("success", "Data Berhasil di Update");
                } else {
                    $this->session->set_flashdata("error", "Server sedang sibuk, Silahkan coba lagi nanti");
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
            $is_unique = '|is_unique[m_user_role.role_name]';
        } else {
            $is_unique = '';
        }
        
        var_dump($is_unique);
        
        $this->form_validation->set_rules(
            'name',
            'Nama User Role',
            'trim|required' . $is_unique,
            [
                'required' => '%s Wajib Diisi',
                'is_unique' => '%s Sudah Ada'
            ]
        );
        
    }
    
  

}
