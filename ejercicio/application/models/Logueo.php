<?php 
/**
* 
*/
class Logueo extends CI_Model
{
	
	public function validarLogueo($user,$pass)
	{
		$pass = sha1($pass);
		$this->db->where('usuario',$user);
		$this->db->where('password',$pass);
		$query = $this->db->get('usuarios');

		if($query->num_rows()==1)
			return TRUE;
		else
			return FALSE;
	}
}