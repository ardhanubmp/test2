<?php 

/**
* 
*/
class Banner_promo_model extends CI_Model
{
	public $table='banner_promo';

	function __construct()
	{
		
	}

	public function getBannerPromo(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function editBannerPromo($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
}
 ?>