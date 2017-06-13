<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Actividad_Rastreo');
		$this->load->library('session');
	}

	public function index()
	{	

		$data['informacion'] = $this -> Actividad_Rastreo -> obtenerINFO();
		$this->load->view('layouts/header');
		$this->load->view('actividad/principal', $data);
	}

	public function login()
	{
		if($this->session->has_userdata('autenticado')!=null)  
			redirect(base_url().'actividad/');
		$this->load->view('layouts/header');
		$this->load->view('actividad/iniciarSesion');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'actividad/');
	}

	public function iniciarSesion()
	{
		if($this->session->has_userdata('autenticado')!=null)  
			redirect(base_url().'actividad/');
		$this -> load -> model ('Logueo');
		$this -> form_validation -> set_rules('nusuario','usuario','required');
		$this -> form_validation -> set_rules('npassword','password','required');
		if ($this -> form_validation -> run() == false) {
			$this->load->view('layouts/header');
			$this->load->view('actividad/iniciarSesion');
		} 
		else 
		{
			if($this -> Logueo -> validarLogueo($this -> input -> post('nusuario'),$this -> input -> post('npassword')))
			{
				$this->session->set_userdata("autenticado", "activo");
				redirect(base_url().'actividad/listaVisitantes');
			}
			else
			{
				$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
				redirect(base_url().'actividad/login','refresh');
			}
		}
	}

	public function listaVisitantes()
	{
		if($this->session->has_userdata('autenticado')==null)  
			redirect(base_url().'actividad/login');
		$data['listado'] = $this -> Actividad_Rastreo -> getAll();
		$this->load->view('layouts/header');
		$this->load->view('actividad/listaVisitantes', $data);
	}

}