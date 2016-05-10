<?php 

/**
* 
*/
class Harga_model extends CI_Model
{
	public $table='harga';

	function __construct()
	{
		
	}

	public function getHarga(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function updateHarga($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
}
 ?>