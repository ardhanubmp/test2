<?php 

/**
* 
*/
class Faq_model extends CI_Model
{
	public $table='faq';

	function __construct()
	{
		
	}

	public function getFaq(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function editFaq($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
}
 ?>