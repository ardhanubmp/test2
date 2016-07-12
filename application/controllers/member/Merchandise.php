<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Merchandise extends MY_Controller {

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

	function __construct(){
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('Keranjang_model');
		$this->load->helper('text');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$this->template_front->display(
			array('content'=>'front/merchandise/content')
		);
	}

	public function keranjang(){

		//konfigutasi file upload
		$config['upload_path']          = './assets/uploads/orders/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 400;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;
		$this->load->library('upload', $config);
		
		$lokasi_upload=$config['upload_path'];

		// konfigurasi validasi form
		if (empty($_FILES['gambar']['name']))
		{
		    $this->form_validation->set_rules('gambar', 'Foto', 'required', array('required' => '%s Perlu diisi'));
		}
		$config = array(
		        array(
		                'field' => 'ucapan_atas',
		                'label' => 'Ucapan atas',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'ucapan_bawah',
		        		'label'=>'Ucapan bawah',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        )
		);
		$this->form_validation->set_rules($config);

		// exception untuk validasi form
		if ($this->form_validation->run() == FALSE) {
			$this->template_front->display(
				array('content'=>'front/merchandise/content')
			);
		}else{
			// sudah melewati validasi
				// proses upload foto
			if ($this->upload->do_upload('gambar')) {
				# code...
				// jika berhasil upload foto maka selanjutnya insert data ke database
				$data=array(
					'ucapan_atas'=>$this->input->post('ucapan_atas'),
					'ucapan_bawah'=>$this->input->post('ucapan_bawah'),
					'gambar'=>$this->upload->data('file_name'),
					'id_user'=>$this->id_user
				);
				
				$this->Keranjang_model->insertKeranjang($data);
				$this->session->set_flashdata('msg_success',"Data Berhasil dimasukkan keranjang");
					redirect('member/keranjang');
			}else{
				// jika gagal upload foto maka diredirect ke halaman merchandise
				$this->session->set_flashdata('msg_error_upload',$this->upload->display_errors());
				redirect('member/merchandise');
			}
				
			
			
		}
	}
}
