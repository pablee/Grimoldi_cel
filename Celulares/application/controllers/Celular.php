<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Celular extends CI_Controller 
{	
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function verUsuarios()
	{
		$this->load->model('usuario');
		$data['usuarios']=$this->usuario->listar();		
		
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('headerTablaUsuarios');
		$this->load->view('verUsuarios',$data);
		$this->load->view('footerTablaUsuarios');
	}
	
	
	public function editarUsuarios()
	{	
		$this->load->helper('url');
		$this->load->model('usuario');
		$data['usuarios']=$this->usuario->listar();		
		
		$this->load->model('sector');
		$data['sectores']=$this->sector->listar();
		
		$this->load->model('linea');
		$data['lineas']=$this->linea->listar();
		
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('headerTablaUsuarios');
		$this->load->view('editarUsuarios',$data);
		$this->load->view('footerTablaUsuarios');
	}
	
	
	public function actualizarUsuarios()
	{
		$this->load->model('usuario');
		$grilla=$this->input->post('grilla[]');  				
		
		$i=0;
		foreach($grilla as $usuario)
		{
		$usuarios[$i]["idUsuario"]=$usuario["id"];  	
		$usuarios[$i]["nombre"]=$usuario["nombre"];  
		$usuarios[$i]["apellido"]=$usuario["apellido"];
		$usuarios[$i]["idSector"]=$usuario["sector"];  
		$usuarios[$i]["idLinea"]=$usuario["numero"];  
		$usuarios[$i]["correoLaboral"]=$usuario["correoLaboral"]; 
		$usuarios[$i]["correoLaboral2"]=$usuario["correoLaboral2"];
		$usuarios[$i]["claveCorreo2"]=$usuario["claveCorreo2"];	
		$i++;
		}
		
		$this->usuario->actualizar($usuarios);				
		$this->verUsuarios();			
		
	}
	
	

	
}
