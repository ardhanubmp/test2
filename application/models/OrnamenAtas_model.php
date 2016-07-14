<?php 

/**
* 
*/
class OrnamenAtas_model extends CI_Model
{
	public $table='ornamen_atas';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_ornamen_atas($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getOrnamenAtas(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getOrnamenAtasById($id_ornamen_atas){
		$this->db->where('id_ornamen_atas',$id_ornamen_atas);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function insertOrnamenAtas($data){
		$this->db->insert($this->table,$data);
	}
	public function updateOrnamenAtas($id_ornamen_atas,$data){
		$this->db->where('id_ornamen_atas',$id_ornamen_atas);
		$this->db->update($this->table,$data);
	}
	public function deleteOrnamenAtas($id_ornamen_atas){
		$this->db->delete($this->table,array('id_ornamen_atas'=>$id_ornamen_atas));
	}
}
 ?>