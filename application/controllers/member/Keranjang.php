<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keranjang extends MY_Controller {

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
		$this->load->model('Harga_model');
		$this->load->model('Kota_model');
		$this->load->model('User_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Transaksi_Detail_model');
		$this->load->model('Voucher_model');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$arr_keranjang = $this->Keranjang_model->getKeranjangByIdUser($this->id_user);
		$arr_kota = $this->Kota_model->getKota();
		$arr_harga = $this->Harga_model->getHarga();
		$arr_user = $this->User_model->getUserById($this->id_user);

		foreach ($arr_harga as $harga) {
			$harga_value = $harga->harga;
		}
		foreach ($arr_user as $user) {
			$alamat_user = $user->alamat;
		}
		$this->template_front->display(
			array(
				'content'=>'front/keranjang/content',
				'javascript'=>'front/keranjang/custom_js',
				'stylesheet'=>'front/keranjang/custom_css'
			),
			array(
				'arr_keranjang'=>$arr_keranjang,
				'arr_kota'=>$arr_kota,
				'harga'=>$harga_value,
				'alamat_user'=>$alamat_user
			)
		);
	}

	public function hapus($id_keranjang){
		$this->Keranjang_model->deleteKeranjang($id_keranjang);
		$this->session->set_flashdata('msg_success','Data Berhasil dihapus');
		redirect('member/keranjang');
	}

	public function proses_pesan(){
		// konfigurasi file validasion untuk proses pesan
		$config = array(
		        array(
		                'field' => 'id_kota',
		                'label' => 'Kota',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		        		'field'=>'pil_alamat',
		        		'label'=>'jenis Alamat',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        ),
		        array(
		        		'field'=>'alamat',
		        		'label'=>'Kolom Alamat',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        ),
		        array(
		        		'field'=>'tranfer_ke',
		        		'label'=>'Pilihan Tranfer',
		        		'rules'=>'required',
		        		'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		                
		        )
		);
		$this->form_validation->set_rules($config);
		// exception untuk mengecek apakah formnya sudah valid
		if ($this->form_validation->run() == FALSE) {

			$arr_keranjang = $this->Keranjang_model->getKeranjangByIdUser($this->id_user);
			$arr_kota = $this->Kota_model->getKota();
			$arr_harga = $this->Harga_model->getHarga();
			$arr_user = $this->User_model->getUserById($this->id_user);

			foreach ($arr_harga as $harga) {
				$harga_value = $harga->harga;
			}
			foreach ($arr_user as $user) {
				$alamat_user = $user->alamat;
			}
			$this->template_front->display(
				array(
					'content'=>'front/keranjang/content',
					'javascript'=>'front/keranjang/custom_js',
					'stylesheet'=>'front/keranjang/custom_css'
				),
				array(
					'arr_keranjang'=>$arr_keranjang,
					'arr_kota'=>$arr_kota,
					'harga'=>$harga_value,
					'alamat_user'=>$alamat_user
				)
			);
		}else{
			// jika form sudah valid

			// exception juga vouchernya diisi
			$kode_voucher=$this->input->post('kode_voucher');
			if (!empty($kode_voucher)) {
				// jika vouchernya diisi
				$cek_voucher = $this->Voucher_model->cek_voucher(array('kode'=>$kode_voucher));
				// exception apakah vouchernya ada atau tidak
				if ($cek_voucher->num_rows() ==1) {
					// jika vouchernya ada dan benar

				}else{
					// echo "voucher salah";
					$this->session->set_flashdata('msg_error_upload','Voucher yang anda masukkan salah');
					redirect('member/keranjang');
				}
			}else{
				// jika vouchernya tidak diisi				

				// proses insert transaksi dan mengembalikan id_transaksi
				$insert_id= $this->insert_transaksi();

				// insert transaksi detail setelah mendapat id transaksi terakhir
				$this->insert_transaksi_detail($insert_id);
				// echo "sukses simpan";
				$this->session->set_flashdata('msg_success','Pemesanan berhasil dilakukan');
				// redirect('member/keranjang/berhasil_pesan');
				$this->berhasil_pesan($insert_id);
			}
		}
	}

	public function berhasil_pesan($id_transaksi){
		//mengecek transaksi yang tidak ada vouchernya
		$cek_transaksi = $this->Transaksi_model->cek_transaksi(array(
			'id_transaksi'=>$id_transaksi,
			'id_voucher'=>null
		));
		if ($cek_transaksi->num_rows()>=1) {
			// transaksi yang tidak ada vouchernya
			$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
			$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_detailByTran($id_transaksi);

			$this->template_front->display(
				array(
					'content'=>'front/keranjang/berhasil_pesan',
					'stylesheet'=>'front/keranjang/custom_css'
				),
				array(
					'arr_transaksi_detail'=>$arr_transaksi_detail,
					'arr_transaksi'=>$arr_transaksi,
				)
			);
		}else{
			// transaksi yang ada vouchernya
		}
			
	}

	public function harga(){
		$arr_harga = $this->Harga_model->getHarga();

		foreach ($arr_harga as $harga) {
			$harga_value = $harga->harga;
		}
		return $harga_value;
	}

	public function insert_transaksi(){
		$query_jml=$this->Keranjang_model->cek_keranjang(array('id_user'=>$this->id_user));
		$jml_keranjang=$query_jml->num_rows();
				
		$harga=$this->harga();
		$total_bayar=$harga*$jml_keranjang;
		// $this->insert_transaksi_detail();
		
		$data_transaksi=array(
					'tgl_pesan'=>date("Y-m-d H:i:s"),
					'status'=>'pending',
					'total_bayar'=>$total_bayar,
					'tranfer_ke'=>$this->input->post('tranfer_ke'),
					'alamat_kirim'=>$this->input->post('alamat'),
					'id_user'=>$this->id_user,
					'id_kota'=>$this->input->post('id_kota'),
					);
		$insert_id = $this->Transaksi_model->insertTransaksi($data_transaksi);
		return $insert_id;
	}
	public function insert_transaksi_detail($id_transaksi){
		$arr_keranjang =$this->Keranjang_model->getKeranjangByIdUser($this->id_user);

		foreach ($arr_keranjang as $keranjang) {
			$data=array(
				'ucapan_atas'=>$keranjang->ucapan_atas,
				'ucapan_bawah'=>$keranjang->ucapan_bawah,
				'gambar'=>$keranjang->gambar,
				'ornamen_atas'=>$keranjang->ornamen_atas,
				'ornamen_bawah'=>$keranjang->ornamen_bawah,
				'ornamen_kiri_1'=>$keranjang->ornamen_kiri_1,
				'ornamen_kiri_2'=>$keranjang->ornamen_kiri_2,
				'ornamen_kiri_3'=>$keranjang->ornamen_kiri_3,
				'ornamen_kanan_1'=>$keranjang->ornamen_kanan_1,
				'ornamen_kanan_2'=>$keranjang->ornamen_kanan_2,
				'ornamen_kanan_3'=>$keranjang->ornamen_kanan_3,
				'sub_total'=>$this->harga(),
				'id_transaksi'=>$id_transaksi
				);
			//insert ke tabel transaksi detail
			$this->Transaksi_Detail_model->insertTransaksi_Detail($data);
		}
		// mengkosongkan data keranjang berdasarkan id user
		$this->Keranjang_model->deleteKeranjangByIdUser($this->id_user);
	}
}
