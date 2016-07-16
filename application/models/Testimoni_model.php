<?php 

/**
* 
*/
class Testimoni_model extends CI_Model
{
	public $table='testimoni';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_testimoni($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getTestimoni(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getTestimoniById($id_user){
		$this->db->where('id_user',$id_user);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function insertTestimoni($data){
		$this->db->insert($this->table,$data);
	}
	public function updateTestimoni($id_user,$data){
		$this->db->where('id_user',$id_user);
		$this->db->update($this->table,$data);
	}
	public function deleteTestimoni($id_testimoni){
		$this->db->delete($this->table,array('id_testimoni'=>$id_testimoni));
	}
}
 ?>