<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index() {
        // Logout user
        $this->session->unset_userdata('logged_in');
        
        // Redirect to login page or any other page you want
        redirect('auth');
    }
}