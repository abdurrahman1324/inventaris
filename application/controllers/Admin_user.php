<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Admin_user_model', "User");
        //$this->redirect = "user";
	}

    public function index()
    {
        //$unitData   =  $this->Unit->getAllData();
        $data       = [
            'title'             => 'Data User',
            'desc'              => 'Berfungsi Untuk Melihat Data User',
            //'unitData'             => $unitData->result()
        ];
        $page = 'user/index';
        template($page, $data);
    }
}