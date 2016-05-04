<?php 

/**
* 
*/
class Galeri_model extends CI_Model
{
	public $table='galeri';

	function __construct()
	{
		
	}

	public function getGaleri(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function insertGaleri($data){
		$this->db->insert($this->table,$data);
	}
}
 ?>