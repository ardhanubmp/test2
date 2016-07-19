<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends MY_controller {

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
        $this->load->model('Penduduk_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_penduduk = $this->Penduduk_model->getPendudukKK();
		$this->template_back->display(
			array(
				'content'=>'back/penduduk/content',
				'stylesheet'=>'back/penduduk/custom_css',
				'javascript'=>'back/penduduk/custom_js'
			),
			array(
				'arr_penduduk'=>$arr_penduduk
			)
		);	
	}

	public function tambah(){

		$config = array(
		        array(
		                'field' => 'nik',
		                'label' => 'Nomor Induk Kependudukan',
		                'rules' => 'required|callback_namapenduduk_check',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		);
		$this->form_validation->set_rules($config);			

		if ($this->form_validation->run()==false) {
			//jika gagal
			$this->index();
		}else{
			// jika berhasil
			$data = array(
				'nama_penduduk'=>$this->input->post('nama_penduduk'),
				'nomerkk'=>$this->input->post('nomerkk'),
				'umur'=>$this->input->post('umur'),
				'status'=>$this->input->post('status'),
				'nik'=>$this->input->post('nik')
			);
			$this->Penduduk_model->insertPenduduk($data);
			$this->session->set_flashdata('msg_success','Penduduk berhasil ditambahkan');
			redirect('admin/penduduk');
		}
	}

	public function ubah(){
		$id = $this->input->post('id');

		$data = array(
			'nama_penduduk'=>$this->input->post('nama_penduduk'),
			'nomerkk'=>$this->input->post('nomerkk'),
				'umur'=>$this->input->post('umur'),
				'status'=>$this->input->post('status'),
				'nik'=>$this->input->post('nik')
		);
		$this->Penduduk_model->updatePenduduk($id,$data);
		$this->session->set_flashdata('msg_success','Penduduk '.$this->input->post('nama_penduduk').' berhasil diubah');
		redirect('admin/penduduk/tampil_anggota/'.$this->input->post('nomerkk'));
	}

	public function hapus($id){
		$this->Penduduk_model->deletePenduduk($id);
		$this->session->set_flashdata('msg_success','id Penduduk = '.$id.' berhasil dihapus');
		redirect('admin/penduduk');
	}
	public function hapus_kk($nomerkk){
		$this->Penduduk_model->deletePendudukbyKK($nomerkk);
		$this->session->set_flashdata('msg_success','nomer kartu keluarga Penduduk = '.$nomerkk.' berhasil dihapus');
		redirect('admin/penduduk');
	}

	public function namapenduduk_check($str){
		$cek_data=array(
			'nik'=>$this->input->post('nik')
		);
        $hasil = $this->Penduduk_model->checkPenduduk($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('namapenduduk_check', ' {field} : '.set_value('nik').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}

	public function tampil_anggota($nomerkk,$id=null)
	{
		// if (!empty($id)) {
		// 	# code...
		// 	// echo $id;
		// 	$arr_penduduk_edit = $this->Penduduk_model->getPendudukKKbyId($id);

		// }else{
		// 	$arr_penduduk_edit = "";

		// }
		$arr_penduduk = $this->Penduduk_model->getPendudukKKbynomerkk($nomerkk);
		$this->template_back->display(
			array(
				'content'=>'back/penduduk/view_detail',
				'stylesheet'=>'back/penduduk/custom_css',
				'javascript'=>'back/penduduk/custom_js'
			),
			array(
				'arr_penduduk'=>$arr_penduduk,
				// 'arr_penduduk_edit'=>$arr_penduduk_edit,
			)
		);	
	}

	public function edit_detail($id)
	{

		$arr_penduduk = $this->Penduduk_model->getPendudukKKbyId($id);
						$this->template_back->display(
							array(
								'content'=>'back/penduduk/view_detail_edit',
								'stylesheet'=>'back/penduduk/custom_css',
								'javascript'=>'back/penduduk/custom_js'
							),
							array(
								'arr_penduduk'=>$arr_penduduk
							)
						);	
	}

	public function lihat($id)
	{
		$arr_penduduk = $this->Penduduk_model->getPendudukKKbyId($id);
				$this->template_back->display(
					array(
						'content'=>'back/penduduk/view_detail_detail',
						'stylesheet'=>'back/penduduk/custom_css',
						'javascript'=>'back/penduduk/custom_js'
					),
					array(
						'arr_penduduk'=>$arr_penduduk
					)
				);	
	}

}
