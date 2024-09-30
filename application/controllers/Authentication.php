<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication_model', "Auth");

		$this->redirect =  'auth';
	}

	public function index()
	{
		$this->_validation("login");
		if ($this->form_validation->run() == false) {
			$data =  [
				'title'  => 'Login'
			];
			$page = 'index';
			$this->_template($page, $data);
		} else {
			$dataInput = [
				'user'      => $this->input->post('user'),
				'password'  => $this->input->post('password'),
			];

			$this->_login($dataInput);
		}
	}

	public function forgot()
	{
		$this->_validation('forgot');
		if ($this->form_validation->run() == false) {
			$data =  [
				'title'  => 'Forgot Password'
			];
			$page = 'forgot';
			$this->_template($page, $data);
		} else {
			//kirim email reset password
			$this->_sendEmailForgotPassword();
		}
	}
	public function forgotpasssword($email, $token)
	{
		$cek 	= $this->Auth->getDataTokenBy(['email' => $email, 'token' => $token]);
		if ($cek->num_rows() > 0) {
			$this->_validation('form-reset');
			if ($this->form_validation->run() === false) {
				$data = [
					'title' => 'Reset Password'
				];
				$page = 'formnewpassword';
				$this->_template($page, $data);
			} else {
				$dataUpdate  = [
					'password'		=> password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT),
					'updated_at'	=> date('Y-m-d H:i:s')
				];

				$where 	= [
					'email' 	=> $email

				];

				$update = $this->Auth->update($dataUpdate, $where);
				if ($update > 0) {
					$deleteToken =  $this->Auth->deleteToken(['email' => $email]);
					if ($deleteToken > 0) {
						$this->session->set_flashdata('success', 'Password berhasil di perbarui, silahkan login');
					}else{
						$this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
					}
				} else {
					$this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
				}
				redirect($this->redirect);
			}
		} else {
			$this->session->set_flashdata('error', 'Data tidak ditemukan di sistem kami'); // Perbaikan typo
			redirect($this->redirect);
		}
	}
	private function _sendEmailForgotPassword()
	{
		$email = $this->input->post('email');
		$token = random_string('alnum', 100);
		$cek = $this->Auth->getDataBy(['a.is_active' => '1', 'email' => $email]);

		if ($cek->num_rows() > 0) {
			$data = [
				'email' => $email,
				'token' => $token
			];

			$insertToken = $this->Auth->insertToken($data);

			if ($insertToken > 0) {
				$config = configemail();
				$this->email->initialize($config);
				$this->email->from('support@inventory.com', 'Tim Support Aplikasi Inventory');
				$this->email->to($email);
				$this->email->subject('Lupa Password');
				$body = $this->load->view('auth/email', $data, TRUE);
				$this->email->message($body);

				if ($this->email->send()) {
					$this->session->set_flashdata('success', 'Silahkan cek emailmu, link lupa password sudah dikirim');
					redirect($this->redirect);
				} else {
					echo $this->email->print_debugger();
					die;
				}
			} else {
				$this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba kembali');
				redirect('forgot');
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak ada di data kami, silahkan coba kembali');
			redirect('forgot');
		}
	}

	public function _login($data)
	{
		$user     = $data['user'];
		$password = $data['password'];

		$cekEmail = $this->Auth->getDataBy(['a.email' => $user]);

		if ($cekEmail->num_rows() == 0) {
			$cekNpp  = $this->Auth->getDataBy(['a.npp' => $user]);
			if ($cekNpp->num_rows() == 0) {
				$this->session->set_flashdata('error', 'User tidak ditemukan');
				redirect($this->redirect);
			} else {
				$cekUser  = 1;
				$dataUser = $cekNpp->row();
			}
		} else {
			$cekUser  = 1;
			$dataUser = $cekEmail->row();
		}

		if ($cekUser == 1) {
			if (password_verify($password, $dataUser->password)) {
				$cekAkctive = $this->Auth->getDataBy(['a.is_active' => '1', 'a.email' => $dataUser->email]);
				if ($cekAkctive->num_rows() == 1) {
					//USER BERHASIL LOGIN
					$this->session->set_userdata('user', $dataUser);

					if ($dataUser->user_role_id == '22d2f70c-b740-11eb-a91e-0cc47abcfuu7') {
						redirect('dashboard');
					} else {
						echo 'Dashboard Member';
					}
				} else {
					$this->session->set_flashdata('error', 'User sudah tidak aktif');
					redirect($this->redirect);
				}
			} else {
				$this->session->set_flashdata('error', 'Password salah');
				redirect($this->redirect);
			}
		}
	}


	private function _validation($type)
	{
		if ($type == 'login') {
			$this->form_validation->set_rules(
				'user',
				'Email Atau NPP',
				'trim|required',
				[
					'required'  => '%s wajib diisi'
				]
			);

			$this->form_validation->set_rules(
				'password',
				'Password',
				'trim|required|min_length[8]',
				[
					'required'    => '%s wajib diisi',
					'min_length'  => '%s wajib 8 karakter'
				]
			);
		}

		if ($type == 'form-reset') {
			$this->form_validation->set_rules(
				'newpassword',
				'Password baru',
				'trim|required|min_length[8]',
				[
					'required'  => '%s wajib diisi',
					'min_length' => '%s wajib 8 karakter'
				]
			);
		
			$this->form_validation->set_rules(
				'confirmnewpassword',
				'Konfirmasi Password baru',
				'trim|required|matches[newpassword]',
				[
					'required'  => '%s wajib diisi',
					'matches'   => '%s tidak cocok'
				]
			);
		}

		if($type == 'forgot'){
			$this->form_validation->set_rules(
				'email',
				'Email',
				'trim|required|valid_email',
				[
					'required'		=> 'Kolom %s wajib diisi.',
					'valid_email'	=> 'Format %s tidak valid.'
				]
			);
		}
		
	}

	private function _template($page = null, $data = null)
	{
		$this->load->view('auth/template/header', $data);
		$this->load->view('auth/' . $page, $data);
		$this->load->view('auth/template/footer', $data);
	}
}
