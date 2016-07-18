<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ornamen extends MY_controller {

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
        $this->load->model('OrnamenAtas_model');
        $this->load->model('OrnamenBawah_model');
        $this->load->model('OrnamenKonten_model');
        $this->load->model('Keranjang_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_ornamen_atas = $this->OrnamenAtas_model->getOrnamenAtas();
		$arr_ornamen_bawah = $this->OrnamenBawah_model->getOrnamenBawah();
		$arr_ornamen_konten = $this->OrnamenKonten_model->getOrnamenKonten();

		$this->template_back->display(
			array(
				'content'=>'back/ornamen/content',
				'javascript'=>'back/ornamen/custom_js',
				'stylesheet'=>'back/ornamen/custom_css'
			),
			array(
				'arr_ornamen_atas'=>$arr_ornamen_atas,
				'arr_ornamen_bawah'=>$arr_ornamen_bawah,
				'arr_ornamen_konten'=>$arr_ornamen_konten,
			)
		);	
	}

	public function ubah(){
		$jenis_ornamen = $this->input->post('type');
		$id_ornamen = $this->input->post('id');
		// konfigurasi validasi gambar
		// if (empty($_FILES['gambar']['name']))
		// {
		//     $this->form_validation->set_rules('gambar', 'Gambar Ornamen', 'required', array('required' => '%s Perlu diisi'));
		// }
		$config = array(
		        array(
		                'field' => 'kode',
		                'label' => 'Kode',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'id',
		        		'label'=>'Id',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        )
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			//jika form tidak valid
			$this->index();
		}else{
			//jika form valid


			if ($jenis_ornamen=='ornamen_atas') {
				// jika  yang diupdate yang ornamen atas
				//jika gambar tidak diubah
				if (!empty($_FILES['gambar']['name'])) {
					$this->upload_ubah('./assets/ornamen/atas/');
				}
				$data=array(
					'kode'=>$this->input->post('kode'),
					'gambar'=>$this->input->post('gambar_temp')
				);
				$this->OrnamenAtas_model->updateOrnamenAtas($id_ornamen,$data);
				$this->session->set_flashdata('msg_success','Ornamen Atas berhasil diubah');
				redirect('admin/ornamen');
			}elseif ($jenis_ornamen=='ornamen_konten') {
				//jika yang diupdate yang ornamen konten
				//jika gambar tidak diubah
				if (!empty($_FILES['gambar']['name'])) {
					$this->upload_ubah('./assets/ornamen/konten/');
				}
				$data=array(
					'kode'=>$this->input->post('kode'),
					'gambar'=>$this->input->post('gambar_temp')
				);
				$this->OrnamenKonten_model->updateOrnamenKonten($id_ornamen,$data);
				$this->session->set_flashdata('msg_success','Ornamen Konten berhasil diubah');
				redirect('admin/ornamen');
			}elseif ($jenis_ornamen=='ornamen_bawah') {
				//jika yang diupdate yang ornamen Bawah
				if (!empty($_FILES['gambar']['name'])) {
					$this->upload_ubah('./assets/ornamen/bawah/');
				}
				$data=array(
					'kode'=>$this->input->post('kode'),
					'gambar'=>$this->input->post('gambar_temp')
				);
				$this->OrnamenBawah_model->updateOrnamenBawah($id_ornamen,$data);
				$this->session->set_flashdata('msg_success','Ornamen Bawah berhasil diubah');
				redirect('admin/ornamen');
			}
		}
	}

	public function tambah(){
		$jenis_ornamen = $this->input->post('type');
		// konfigurasi validasi gambar
		if (empty($_FILES['gambar']['name']))
		{
		    $this->form_validation->set_rules('gambar', 'Gambar Ornamen', 'required', array('required' => '%s Perlu diisi'));
		}
		$config = array(
		        array(
		                'field' => 'kode',
		                'label' => 'Kode',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			//JIKA VALIDATION NYA GAGAL
			$this->index();
		}else{
			// jika validation nya sukses maka diproses
			if ($jenis_ornamen == 'ornamen_atas') {
				// jika jenis yang ditambah ornamen atas 
				$file_name = $this->upload_tambah('./assets/ornamen/atas/');
				$data = array(
					'kode'=>$this->input->post('kode'),
					'gambar'=>$file_name
					);
				$this->OrnamenAtas_model->insertOrnamenAtas($data);
				$this->session->set_flashdata('msg_success','Ornamen atas berhasil ditambah');
				redirect('admin/ornamen');

			}elseif ($jenis_ornamen == 'ornamen_konten') {
				// jika jenis yang ditambah ornamen konten 
				$file_name = $this->upload_tambah('./assets/ornamen/konten/');
				$data = array(
					'kode'=>$this->input->post('kode'),
					'gambar'=>$file_name
					);
				$this->OrnamenKonten_model->insertOrnamenKonten($data);
				$this->session->set_flashdata('msg_success','Ornamen Konten berhasil ditambah');
				redirect('admin/ornamen');
			}elseif ($jenis_ornamen == 'ornamen_bawah') {
				// jika jenis yang ditambah ornamen bawah 
				$file_name = $this->upload_tambah('./assets/ornamen/bawah/');
				$data = array(
					'kode'=>$this->input->post('kode'),
					'gambar'=>$file_name
					);
				$this->OrnamenBawah_model->insertOrnamenBawah($data);
				$this->session->set_flashdata('msg_success','Ornamen Bawah berhasil ditambah');
				redirect('admin/ornamen');
			}
		}

	}

	public function hapus_ornamen_atas($id){
		$arr_ornamen = $this->OrnamenAtas_model->getOrnamenAtasById($id);
		foreach ($arr_ornamen as $ornamen) {
			$file_name = $ornamen->gambar;
		}
		// echo $file_name;
		unlink('./assets/ornamen/atas/'.$file_name);
		$this->OrnamenAtas_model->deleteOrnamenAtas($id);
		// echo "berhasil";
		$this->session->set_flashdata('msg_success','ornamen Atas berhasil dihapus');
		redirect('admin/ornamen');
	}

	public function hapus_ornamen_konten($id){
		$arr_ornamen = $this->OrnamenKonten_model->getOrnamenKontenById($id);
		foreach ($arr_ornamen as $ornamen) {
			$file_name = $ornamen->gambar;
		}
		// echo $file_name;
		unlink('./assets/ornamen/konten/'.$file_name);
		$this->OrnamenKonten_model->deleteOrnamenKonten($id);
		// echo "berhasil";
		$this->session->set_flashdata('msg_success','ornamen Konten berhasil dihapus');
		redirect('admin/ornamen');
	}	

	public function hapus_ornamen_bawah($id){
		$arr_ornamen = $this->OrnamenBawah_model->getOrnamenBawahById($id);
		foreach ($arr_ornamen as $ornamen) {
			$file_name = $ornamen->gambar;
		}
		// echo $file_name;
		unlink('./assets/ornamen/Bawah/'.$file_name);
		$this->OrnamenBawah_model->deleteOrnamenBawah($id);
		// echo "berhasil";
		$this->session->set_flashdata('msg_success','ornamen Bawah berhasil dihapus');
		redirect('admin/ornamen');
	}	

	public function upload_ubah($location){	
		//konfigutasi file upload
			// $config['upload_path']          = 'assets/ornamen/atas/';
			$file_name = $this->input->post('gambar_temp');
			$config['upload_path']          = $location;
			$config['file_name'] 			= $file_name;
			$config['overwrite'] 			= true;
	        $config['allowed_types']        = 'gif|jpg|png';
	        // $config['encrypt_name']        	= TRUE;
	        $config['max_size']             = 200;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload', $config);

			$lokasi_upload=$config['upload_path'];
			

			// proses upload 
				// unlink($location.$file_name);
				if (!$this->upload->do_upload('gambar')) {
					// $name_file=$this->upload->data('file_name');
					// echo "berhasil upload";
					$this->session->set_flashdata('msg_error',$this->upload->display_errors());
					redirect('admin/ornamen');
				}
	}

	public function upload_tambah($location){	
		//konfigutasi file upload
			// $config['upload_path']          = 'assets/ornamen/atas/';
			$file_name = $_FILES['gambar']['name'];
			$config['upload_path']          = $location;
			$config['file_name'] 			= $file_name;
			$config['overwrite'] 			= false;
	        $config['allowed_types']        = 'gif|jpg|png';
	        // $config['encrypt_name']        	= TRUE;
	        $config['max_size']             = 200;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload', $config);

			$lokasi_upload=$config['upload_path'];
			

			// proses upload 
				// unlink($location.$file_name);
				if (!$this->upload->do_upload('gambar')) {
					// $name_file=$this->upload->data('file_name');
					// echo "berhasil upload";
					//jika tidak berhasl upload
					$this->session->set_flashdata('msg_error',$this->upload->display_errors());
					redirect('admin/ornamen');
				}else{
					return $file_name;
				}
	}

	public function coba_keranjang_baru(){
		$query = $this->Keranjang_model->cek_keranjang(array('id_keranjang'=>'6'));
		for ($i=1; $i <= 6; $i++) {

			// $query2 = $this->OrnamenKonten_model->cek_ornamen_konten(array('id_ornamen_konten'=>$query->row($i)));
			// echo $query2->row(0)."<br>";
			// $keranjang= $query->row();
			//  echo $keranjang['gambar'];
		}
			$row = $query->row(3);

			if (isset($row))
			{
			        echo $row->gambar;
			        // echo $row->name;
			        // echo $row->body;
			}
	}
}
