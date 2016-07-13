<?php 

/**
* 
*/
class Transaksi_Detail_model extends CI_Model
{
	public $table='transaksi_detail';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_transaksi_detail($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getTransaksi_Detail(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTransaksi_DetailByTran($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertTransaksi_Detail($data){
		$this->db->insert($this->table,$data);
	}
	public function updateTransaksi_Detail($id_transaksi_detail,$data){
		$this->db->where('id_transaksi_detail',$id_transaksi_detail);
		$this->db->update($this->table,$data);
	}
	public function deleteTransaksi_Detail($id_transaksi_detail){
		$this->db->delete($this->table,array('id_transaksi_detail'=>$id_transaksi_detail));
	}
}
 ?>