<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

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
        $this->load->model('Voucher_model');
    }

	public function index()
	{	
		// $this->load->model('Voucher_model');
		$data=$this->Voucher_model->getVoucher();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('voucher/content',array('data'=>$data));
		$this->load->view('template/footer');		
	}

	public function ubah(){
		$data=$this->Voucher_model->getVoucher();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('about/edit',array('data'=>$data));
		$this->load->view('template/footer');		
	}	

	public function addvoucher(){
		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('voucher/add');
		$this->load->view('template/footer');			
	}

	public function addvoucherproses(){
		$kodevoucher=$this->input->post('kodevoucher');
		$status=$this->input->post('status');
		$persentase=$this->input->post('persentase');

		$data=array(
			'kode_voucher'=>$this->input->post('kodevoucher'),
			'status'=>$this->input->post('status'),
			'persentase'=>$this->input->post('persentase')
			);
		if ($this->Voucher_model->addVoucher($data)) {
			$msg="data berhasil dimasukkan";
		}else{
			$msg="data gagal diinput";
		}

		$data=$this->Voucher_model->getVoucher();

		$konten=array(
			'data'=>$data,
			'status'=>$msg
			);
		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('voucher/content',$konten);
		$this->load->view('template/footer');	
	}

	public function aksi_ubah(){
				
			
         	$id=$this->input->post('id');
			$data= array(
			"deskripsi"=>$this->input->post('deskripsi'),
			"gambar"=>$gambar
			);
			if ($this->Voucher_model->updateAbout($id,$data)) {
				$status_query="Data Gagal Disimpan";
			}else{
				$status_query="Data Berhasil Disimpan";
			}
         
			$data_html=$this->Voucher_model->getVoucher();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('about/edit',array(
				'data'=>$data_html,
				"status"=>$report,
				"status_query"=>$status_query));
		$this->load->view('template/footer');				
		
	}

	public function deletevoucher($id){
		
		if ($this->Voucher_model->deleteVoucher($id)) {
			echo "done";	# code...
		}else{
			echo "fail";
		}
		// $this->Voucher_model->deleteVoucher($id);
		
	}

}
