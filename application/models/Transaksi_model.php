<?php 

/**
* 
*/
class Transaksi_model extends CI_Model
{
	public $table='transaksi';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_transaksi($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getTransaksi(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksi_by_id($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksi_all(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('voucher','voucher.id_voucher = transaksi.id_voucher');
		$this->db->join('kota','kota.id_kota = transaksi.id_kota');
		$query = $this->db->get();
		return $query->result();
	}
	public function getTransaksi_no_v(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('kota','kota.id_kota = transaksi.id_kota');
		$query = $this->db->get();
		return $query->result();		
	}
	public function insertTransaksi($data){
		$this->db->insert($this->table,$data);
	}
	public function updateTransaksi($id_transaksi,$data){
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->update($this->table,$data);
	}
	public function deleteTransaksi($id_transaksi){
		$this->db->delete($this->table,array('id_transaksi'=>$id_transaksi));
	}
}
 ?>