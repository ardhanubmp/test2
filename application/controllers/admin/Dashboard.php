<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Dashboard extends MY_controller {

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
		// if ($this->session->userdata('username')=="") {
		// 	redirect('auth');
		// }
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}


}