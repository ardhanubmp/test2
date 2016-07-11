<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends MY_controller {

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
        $this->load->model('Harga_model');

    }

	public function index()
	{	
		// $this->load->model('Harga_model');
		$data=$this->Harga_model->getHarga();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('harga/edit',array('data'=>$data));
		$this->load->view('template/footer');		
	}


	public function aksi_ubah(){
			
         	$id=$this->input->post('id');
			$data= array(
			"deskripsi"=>$this->input->post('deskripsi'),
			"harga"=>$this->input->post('harga')
			);
			if ($this->Harga_model->updateHarga($id,$data)) {
				$status_query="Data Gagal Disimpan";
			}else{
				$status_query="Data Berhasil Disimpan";
			}
         
			$data_html=$this->Harga_model->getHarga();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('harga/edit',array(
				'data'=>$data_html,
				"status_query"=>$status_query));
		$this->load->view('template/footer');				
		
	}

}
