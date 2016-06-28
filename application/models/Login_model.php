<?php 

/**
* 
*/
class About_model extends CI_Model
{
	public $table='admin';

	function __construct()
	{
		parent::__construct();
	}

	public function getAdmin($username,$password){
		$this->db->select('id,username,password');
		$this->db->from($this->table);
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
}
 ?>