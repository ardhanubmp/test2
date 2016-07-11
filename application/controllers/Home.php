<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model('Harga_model');
        $this->load->model('Banner_promo_model');
		$this->load->library('template_front');
	}
	public function index()
	{
		// $this->load->view('front/home/');
		$harga=$this->Harga_model->getHarga();
		$bannerpromo=$this->Banner_promo_model->getBannerPromo();
		$this->template_front->display(
			array('content'=>'front/home/content'),
			array('arr_harga'=>$harga,'arr_banner'=>$bannerpromo)
		);
	}
}
