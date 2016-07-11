<?php 

/**
* 
*/
class About_model extends CI_Model
{
	public $table='about';

	function __construct()
	{
		
	}

	public function getAbout(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function updateAbout($id,$data){
		$this->db->where('id_about',$id);
		$this->db->update($this->table,$data);
	}
}
 ?>