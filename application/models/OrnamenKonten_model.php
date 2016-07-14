<?php 

/**
* 
*/
class OrnamenKonten_model extends CI_Model
{
	public $table='ornamen_konten';

	function __construct()
	{
		parent::__construct();
	}

	public function cek_ornamen_konten($data){
		$query = $this->db->get_where($this->table,$data);
		return $query;
	}
	public function getOrnamenKonten(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getOrnamenKontenById($id_ornamen_konten){
		$this->db->where('id_ornamen_konten',$id_ornamen_konten);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function insertOrnamenKonten($data){
		$this->db->insert($this->table,$data);
	}
	public function updateOrnamenKonten($id_ornamen_konten,$data){
		$this->db->where('id_ornamen_konten',$id_ornamen_konten);
		$this->db->update($this->table,$data);
	}
	public function deleteOrnamenKonten($id_ornamen_konten){
		$this->db->delete($this->table,array('id_ornamen_konten'=>$id_ornamen_konten));
	}
}
 ?>