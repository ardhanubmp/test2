<?php 

/**
* 
*/
class Penduduk_model extends CI_Model
{
	public $table='penduduk';

	function __construct()
	{
		parent::__construct();
	}

	
	public function getPendudukKK(){
		$this->db->where('status',1);
		$query = $this->db->get($this->table);
		return $query->result();
	}	
	public function getPendudukKKbynomerkk($nomerkk){
		$this->db->where('nomerkk',$nomerkk);
		$query = $this->db->get($this->table);
		return $query->result();
	}	
	public function getPendudukKKbyId($id){
		$this->db->where('id',$id);
		$query = $this->db->get($this->table);
		return $query->result();
	}	
	
	public function insertPenduduk($data){
		$this->db->insert($this->table,$data);
	}
	public function updatePenduduk($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function deletePenduduk($id){
		$this->db->delete($this->table,array('id'=>$id));
	}
	public function deletePendudukbyKK($nomerkk){
		$this->db->delete($this->table,array('nomerkk'=>$nomerkk));
	}
	public function checkPenduduk($data){
		$query = $this->db->get_where($this->table, $data);
		return $query;
	}
}
 ?>