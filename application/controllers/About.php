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
			"menu_kiri"=>$this->menu_kiri(),
			"control_sidebar"=>$this->control_sidebar(),
			);
		$this->load->view('template/base',$comp);
	}

	public function ubah(){
		// $this->load->model('About_model');
		$data=$this->About_model->getAbout();

		$comp=array(
			"content"=>$this->load->view('about/edit',array('data'=>$data),true),
			"header"=>$this->header(),
			"menu_kiri"=>$this->menu_kiri(),
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
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                       //$this->load->view('about/upload_form', $error);
                }
                else
                {
                        $report = array('upload_data' => $this->upload->data());
                        print_r($report);
                        //$this->load->view('about/upload_success', $data);
                }
                
		$id=$this->input->post('id');
		$data= array(
			"deskripsi"=>$this->input->post('deskripsi'),
			"gambar"=>$this->input->post('gambar')
			);
		//$this->About_model->updateAbout($id,$data);
		//$this->index();
		// print_r($report);


	}

		public function do_upload()
        {
                $config['upload_path']          = './assets/uploads/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                
                if ( ! $this->upload->do_upload('gambar'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                       //$this->load->view('about/upload_form', $error);
                }
                else
                {
                        $report = array('upload_data' => $this->upload->data());
                        print_r($report);
                        //$this->load->view('about/upload_success', $data);
                }
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
