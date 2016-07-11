<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_controller {

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

	public function editFaq(){
		$data=$this->Faq_model->getFaq();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('faq/edit',array('data'=>$data));
		$this->load->view('template/footer');		
	}

	public function editFaqProses(){
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
			if ($this->Faq_model->editFaq($id,$data)) {
				$status_query="Data Gagal Disimpan";
			}else{
				$status_query="Data Berhasil Disimpan";
			}
         
			$data_html=$this->Faq_model->getFaq();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('faq/edit',array(
				'data'=>$data_html,
				"status"=>$report,
				"status_query"=>$status_query));
		$this->load->view('template/footer');				
		
	}

}
