<?php 

/**
* 
*/
class Hto_model extends CI_Model
{
	public $table='how_to_order';

	function __construct()
	{
		
	}

	public function getHto(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function editHto($id,$data){
		$this->db->where('id_how_to_order',$id);
		$this->db->update($this->table,$data);
	}
}
 ?>