<?php
/**
* Modelo creado para manejar infoemacion de la tabla <<dispositivos>> para poder insertar y atualizar.
* contiene la funcion encargada de obtener informacion de la conexion de los usuarios a la aplicacion.
*/
class Actividad_Rastreo extends CI_Model
{	
    public function __construct()
    {
		$this->load->helper('url');
		$this->load->library('user_agent');
	}

	public function getAll()
	{
		$query = $this -> db -> get('dispositivos');
		return $query -> result();
	}

	#funcion encargada de obtener informacion del visitante de la aplicacion
	public function obtenerINFO()
	{
		$informacion = array('ip' => $this->input->ip_address(), 
			'plataforma' => $this->agent->platform(),
			'dispositivo' => $this->agent->mobile() ? "Mobil: ".$this->agent->mobile() : "Desktop-Laptop",
			'navegador' => $this->agent->browser()
		);
		$this->insertaINFO($informacion);
		return $informacion;
	} 

	#La siguiente funcion insertarINFO insertara un nuevo registro a la bd en caso de no estar registrada la IP
	#en caso de existir la ip se actualizara el registro con nuevos datos recolectados y se sumara una visita 
	#al campo visitas. Esto pensando en guardar la INFO del ultimo dispositivo, SO y navegador que accedio a la app.
	public function insertaINFO($data)
	{
		$data['fecha'] = date('Y-m-d');
		$this -> db -> where('ip', $data['ip']);
		$query= $this -> db -> get('dispositivos');

		if ($query->num_rows()==1) {
			$info = $query->row();
			$data['visitas'] = $info->visitas + 1;
			$this -> db ->update('dispositivos', $data);
		} else {
			$data['visitas'] = 1;
			$this -> db ->insert('dispositivos', $data);
		}
	}


}
?>