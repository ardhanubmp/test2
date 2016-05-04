<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

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
        $this->load->model('Galeri_model');
    }
	public function index()
	{
		$data=$this->Galeri_model->getGaleri();

		$comp=array(
			"content"=>$this->load->view('galeri/content',array('data'=>$data),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri(),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);
	}

	public function addGaleri()
	{
		$comp=array(
			"content"=>$this->load->view('galeri/addgaleri',array(),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri(),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);
	}

	public function addGaleriProses(){
		$config['upload_path']          = './assets/uploads/galeri/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar'))
                {
                        $report_err =  $this->upload->display_errors();
                        //$gambar = $this->input->post('gambar_temp');
                }
                else
                {
                		// unlink($config['upload_path'].$this->input->post('gambar_temp'));
                        $report_done = "Gambar Berhasil di Upload";
                        $data=array(
                        	'judul'=>$this->input->post('judul'),
                        	'deskripsi'=>$this->input->post('deskripsi'),
                        	'gambar'=>$this->upload->data('file_name')
                        	);
                        $this->Galeri_model->insertGaleri($data);
                }
        if (isset($report_err)) {
        	$redirect='galeri/addgaleri';
        	$status=$report_err;
        	$data="";
        }else{
        	$redirect='galeri/content';
        	$status=$report_done;
        	$data=$this->Galeri_model->getGaleri();
        }
       	$comp=array(
			"content"=>$this->load->view($redirect,array(
				"status"=>$status,
				"data"=>$data),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri(),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);

	}

	public function header(){
		return $this->load->view('template/header',array(),true);
	}
	public function menu_kiri(){
		return $this->load->view('template/menu_kiri',array(),true);
	}
	public function control_sidebar(){
		return $this->load->view('template/control_sidebar',array(),true);
	}
}
