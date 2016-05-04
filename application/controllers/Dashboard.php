<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	public function index()
	{
		$comp=array(
			"content"=>$this->load->view('template/content',array(),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri('dashboard'),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);
	}

	public function header(){
		return $this->load->view('template/header',array(),true);
	}
	public function menu_kiri($menu){
		return $this->load->view('template/menu_kiri',array('menu'=>$menu),true);
	}
	public function control_sidebar(){
		return $this->load->view('template/control_sidebar',array(),true);
	}
}
