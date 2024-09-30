<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_departement_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table            = 'm_departement';
    }
    
    public function getAllData()
    {
        return $this->db->get($this->table);
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->affected_rows();
        } else {
            $error = $this->db->error();
            return $error['salahhhhhhhhhhhhhhhhhhhh']; // Atau melakukan sesuatu dengan pesan kesalahan
        }
    }

    public function getDataBy($data)
    {
        return $this->db->get_where($this->table, $data);
    }

    public function delete($data)
    {
        $this->db->delete($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update($data, $where)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}
