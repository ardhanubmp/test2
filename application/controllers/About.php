<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
        $this->load->model('About_model');
    }

	public function index()
	{	
		// $this->load->model('About_model');
		$data=$this->About_model->getAbout();

		$comp=array(
			"content"=>$this->load->view('about/content',array('data'=>$data),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri('about'),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);
	}

	public function ubah(){
		// $this->load->model('About_model');
		$data=$this->About_model->getAbout();
		$comp=array(
			"content"=>$this->load->view('about/edit',array(
				'data'=>$data),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri('about'),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);
	}

	public function aksi_ubah(){
				$config['upload_path']          = './assets/uploads/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar'))
                {
                        $report =  $this->upload->display_errors();
                        $gambar = $this->input->post('gambar_temp');
                }
                else
                {
                		unlink($config['upload_path'].$this->input->post('gambar_temp'));
                        $report = "Gambar Berhasil di Upload";
                        $gambar = $this->upload->data('file_name'); 
                }
			
         	$id=$this->input->post('id');
			$data= array(
			"deskripsi"=>$this->input->post('deskripsi'),
			"gambar"=>$gambar
			);
			if ($this->About_model->updateAbout($id,$data)) {
				$status_query="Data Gagal Disimpan";
			}else{
				$status_query="Data Berhasil Disimpan";
			}
         
			$data=$this->About_model->getAbout();
			$comp=array(
			"content"=>$this->load->view('about/edit',array(
				'data'=>$data,
				"status"=>$report,
				"status_query"=>$status_query),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri('about'),
			"control_sidebar"=>$this->control_sidebar(),
			);
			$this->load->view('template/base',$comp);		
		
	}

	public function header(){
		return $this->load->view('template/header',array(),true);
	}
	public function menu_kiri($menu){

		return $this->load->view('template/menu_kiri',array("menu"=>$menu),true);
	}
	public function control_sidebar(){
		return $this->load->view('template/control_sidebar',array(),true);
	}
}
