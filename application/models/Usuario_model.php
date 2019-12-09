<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function validar($email,$password)
	{
		$this->db->select('idusuario,email,password,estado');
		$this->db->from('usuario');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get();
	}
	public function listarusuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where("estado = 1 OR estado = 2 OR estado = 3");
		return $this->db->get();
	}
	public function agregarusuario($data)
	{
		$this->db->insert('usuario',$data);
	}
		public function agregarusuariorecuperarid($data)//para ajax
	{
		$this->db->insert('usuario',$data);
	 	return $this->db->insert_id();
	}
	public function recuperarusuario($idusuario)//para ajax
	{
		$this->db->select('idusuario,nombres,primer_apellido,segundo_apellido,email,estado');
		$this->db->from('usuario');
		$this->db->where('idusuario',$idusuario);
		return $this->db->get();
	}
	public function modificarbdusuario($idusuario,$data)//para ajax
	{
		$this->db->where('idusuario',$idusuario);
		$this->db->update('usuario',$data);
	}
	public function eliminarusuario($idusuario,$data)//para ajax
	{
		$this->db->where('idusuario',$idusuario);
		$this->db->update('usuario',$data);
	}
	/**************/
	public function recuperarusuariopassword($idusuario)
	{
		$this->db->select("password");
 		$this->db->where("idusuario",$idusuario);
  		$resultado = $this->db->get("usuario");
  		return $resultado->row();
	}
}
