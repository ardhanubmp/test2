<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model.php','',TRUE);
	}
	public function index()
	{
		//untuk validasi form
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if ($this->form_validation->run() == FALSE) {
			//jika terdapat error
			$this->load->view('login/login_view');
		}else{
			//menuju ke dashboard
			redirect('Dashboard','refresh');
		}
	}

	public function check_database($password){

		$username = $this->input->post('username');

		//query database
		$result = $this->login->cek($username, $password);

		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->username
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}else{
			$this->form_validation->set_message('check_database','Username atau password salah');
			return false;
		}
	}
}
?>