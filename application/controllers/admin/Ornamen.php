<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ornamen extends MY_controller {

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
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Faq_model');
        $this->has_permission('admin');
    }

	public function index()
	{	
	
		// $this->load->model('Faq_model');
		$data=$this->Faq_model->getFaq();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('faq/content',array('data'=>$data));
		$this->load->view('template/footer');		
	}

	

}
