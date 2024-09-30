<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
	}

    public function index()
    {
        $data  = [
            'title'  => 'Dashboard',
            'desc'   => 'Melihat Data Dashboard'
        ];
        $page = 'dashboard/index';
        template($page, $data);
    }
}