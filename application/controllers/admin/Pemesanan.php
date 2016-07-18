<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends MY_controller {

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
        $this->load->model('Transaksi_model');
        $this->load->model('Transaksi_Detail_model');
        $this->load->model('Konfirmasi_model');
        $this->load->model('Voucher_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
    }

	public function index()
	{	
		$arr_transaksi = $this->Transaksi_model->getTransaksiKotaPelanggan();
		$this->template_back->display(
			array(
				'content'=>'back/pemesanan/content',
				'stylesheet'=>'back/pemesanan/custom_css',
				'javascript'=>'back/pemesanan/custom_js'
			),
			array(
				'arr_transaksi'=>$arr_transaksi
			)
		);	
	}

	public function detail($id_transaksi){
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);
		$arr_konfirmasi = $this->Konfirmasi_model->getKonfirmasiByTran($id_transaksi);
		//cek dulu apakah transaksi pakai voucher atau tidak
		$cek_transaksi = $this->Transaksi_model->cek_transaksi(array(
			'id_transaksi'=>$id_transaksi,
			'id_voucher'=>NULL
			));
		if ($cek_transaksi->num_rows()==1) {
			//transasksi tanpa voucher
			$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
			$total = $this->total_no_vou($id_transaksi);
		}else{
			//transaksai dengan voucher
			$arr_transaksi = $this->Transaksi_model->getTransaksiAll($id_transaksi);
			$total = $this->total_with_vou($id_transaksi);
		}

		$this->template_back->display(
			array(
				'content'=>'back/pemesanan/content_detail',
				'javascript'=>'back/pemesanan/custom_js'
			),
			array(
				'arr_transaksi'=>$arr_transaksi,
				'arr_transaksi_detail'=>$arr_transaksi_detail,
				'arr_konfirmasi'=>$arr_konfirmasi,
				'total'=>$total,
			)
		);
	}

	public function ubah_status(){
		$id_transaksi = $this->input->post('id_transaksi');
		$data = array(
			'status'=>$this->input->post('status')
		);
		$this->Transaksi_model->updateTransaksi($id_transaksi,$data);
		$this->session->set_flashdata('msg_success','Status transaksi #'.$id_transaksi.' Berhasil diubah');
		redirect('admin/pemesanan/detail/'.$id_transaksi);
	}

	public function ubah_resi(){
		$id_transaksi = $this->input->post('id_transaksi');
		$data = array(
			'no_resi'=>$this->input->post('no_resi')
		);
		$this->Transaksi_model->updateTransaksi($id_transaksi,$data);
		$this->session->set_flashdata('msg_success','No Resi transaksi #'.$id_transaksi.' Berhasil diubah');
		redirect('admin/pemesanan/detail/'.$id_transaksi);
	}	

	public function hapus($id_transaksi){
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);
		foreach ($arr_transaksi_detail as $transaksi_detail) {
			$gambar = $transaksi_detail->gambar;
			unlink('./assets/uploads/orders/'.$gambar);
			// echo './assets/uploads/orders/'.$gambar;
		}
		$this->Transaksi_model->deleteTransaksi($id_transaksi);
		$this->session->set_flashdata('msg_success','Data transaksi beserta foto pelanggan telah dihapus');
		redirect('admin/pemesanan');
	}

	public function total_no_vou($id_transaksi){
		$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
		foreach ($arr_transaksi as $transaksi) {
			$ongkir = $transaksi->tarif;
		}
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);
		$sub_total=0;
		foreach ($arr_transaksi_detail as $transaksi_detail) {
			// menjumlah subtotal yang ada di transaksi detail berdasarkan id transaksi
			$sub_total += $transaksi_detail->sub_total;
		}
		$grand_total = $sub_total+$ongkir;
		return $total = array(
			'sub_total'=>$sub_total,
			'grand_total'=>$grand_total
			);
	}

	public function total_with_vou($id_transaksi){
		$arr_transaksi = $this->Transaksi_model->getTransaksiNoVou($id_transaksi);
		foreach ($arr_transaksi as $transaksi) {
			$ongkir = $transaksi->tarif;
			$id_voucher = $transaksi->id_voucher;
		}
		$arr_transaksi_detail = $this->Transaksi_Detail_model->getTransaksi_DetailByTran($id_transaksi);
		$sub_total=0;
		foreach ($arr_transaksi_detail as $transaksi_detail) {
			// menjumlah subtotal yang ada di transaksi detail berdasarkan id transaksi
			$sub_total += $transaksi_detail->sub_total;
		}
		// mengambil data voucher berdasarkan id
		$query_vou = $this->Voucher_model->cek_voucher(array('id_voucher'=>$id_voucher));
		$arr_vou = $query_vou->row_array();
		$persen_vou = $arr_vou['persen'];
		$potongan = $persen_vou/100*$sub_total;
		$grand_total = $sub_total-$potongan+$ongkir;

		// subtotal setelah mendapat potongan
		$sub_total_after = $sub_total-$potongan;
		// echo $potongan;
		return $total = array(
			'sub_total'=>$sub_total,
			'sub_total_after'=>$sub_total_after,
			'grand_total'=>$grand_total,
			'potongan'=>$potongan
			);
	}
}
