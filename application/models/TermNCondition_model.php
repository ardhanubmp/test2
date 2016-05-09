<?php 

/**
* 
*/
class TermNCondition_model extends CI_Model
{
	public $table='termcondition';

	function __construct()
	{
		
	}

	public function getTermNCondition(){
		$query=$this->db->get($this->table);
		return $query->result();
	}

	public function updateTermNCondition($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
}
 ?>