<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends MY_controller {

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
	var $id_user;
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kota_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_pengiriman = $this->Kota_model->getKota();
		$this->template_back->display(
			array(
				'content'=>'back/pengiriman/content',
				'stylesheet'=>'back/pengiriman/custom_css',
				'javascript'=>'back/pengiriman/custom_js'
			),
			array(
				'arr_pengiriman'=>$arr_pengiriman
			)
		);	
	}

}
