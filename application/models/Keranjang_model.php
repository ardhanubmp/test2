<?php 

/**
* 
*/
class Keranjang_model extends CI_Model
{
	public $table='keranjang';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_keranjang($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getKeranjang(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getKeranjangByIdUser($id_user){
		$this->db->where('id_user',$id_user);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getKeranjangById($id_keranjang){
		$this->db->where('id_keranjang',$id_keranjang);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertKeranjang($data){
		$this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function updateKeranjang($id_keranjang,$data){
		$this->db->where('id_keranjang',$id_keranjang);
		$this->db->update($this->table,$data);
	}
	public function deleteKeranjang($id_keranjang){
		$this->db->delete($this->table,array('id_keranjang'=>$id_keranjang));
	}
	public function deleteKeranjangByIdUser($id_user){
		$this->db->delete($this->table,array('id_user'=>$id_user));
	}
}
 ?>