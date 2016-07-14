<?php 

/**
* 
*/
class OrnamenBawah_model extends CI_Model
{
	public $table='ornamen_bawah';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_ornamen_bawah($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getOrnamenBawah(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getOrnamenBawahById($id_ornamen_bawah){
		$this->db->where('id_ornamen_bawah',$id_ornamen_bawah);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function insertOrnamenBawah($data){
		$this->db->insert($this->table,$data);
	}
	public function updateOrnamenBawah($id_ornamen_bawah,$data){
		$this->db->where('id_ornamen_bawah',$id_ornamen_bawah);
		$this->db->update($this->table,$data);
	}
	public function deleteOrnamenBawah($id_ornamen_bawah){
		$this->db->delete($this->table,array('id_ornamen_bawah'=>$id_ornamen_bawah));
	}
}
 ?>