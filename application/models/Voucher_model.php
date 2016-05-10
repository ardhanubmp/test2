<?php 

/**
* 
*/
class Voucher_model extends CI_Model
{
	public $table='voucher';

	function __construct()
	{
		
	}

	public function getVoucher(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function addVoucher($data){
		$this->db->insert($this->table,$data);
	}

	public function deleteVoucher($id){
		$this->db->where('id',$id);	
		$this->db->delete($this->table);
	}

	public function updateVoucher($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}

	public function ubahStatus($id,$status){
		$this->db->set('status',$status);
		$this->db->where('id',$id);
		$this->db->update($this->table);
	}

}
 ?>