<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{	
	/*http://midominio.com/controlador/metodo/parametro*/
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
		$this->load->view('usuario/headerTablaUsuarios');
		$this->load->view('usuario/verUsuarios',$data);
		$this->load->view('usuario/footerTablaUsuarios');
	}

    public function nuevoUsuario()
    {
        $this->load->model('sector');
        $data['sectores']=$this->sector->listar();

        $this->load->model('linea');
        $data['lineas']=$this->linea->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('usuario/nuevoUsuario',$data);
    }
	
	public function editarUsuarios()
	{			
		$this->load->model('usuario');
		$data['usuarios']=$this->usuario->listar();		
		
		$this->load->model('sector');
		$data['sectores']=$this->sector->listar();
		
		$this->load->model('linea');
		$data['lineas']=$this->linea->listar();
		
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('usuario/headerTablaUsuarios');
		$this->load->view('usuario/editarUsuarios',$data);
		$this->load->view('usuario/footerTablaUsuarios');
	}

	public function actualizarUsuarios()
	{
		$this->load->model('usuario');
		$grilla=$this->input->post('grilla[]');  				
		
		$i=0;
		foreach($grilla as $usuario)
		{
		    if($usuario['modificado']==1)
            {
                $usuarios[$i]["idUsuario"] = $usuario["id"];
                $usuarios[$i]["nombre"] = $usuario["nombre"];
                $usuarios[$i]["apellido"] = $usuario["apellido"];
                $usuarios[$i]["idSector"] = $usuario["sector"];
                $usuarios[$i]["idLinea"] = $usuario["numero"];
                $usuarios[$i]["correoLaboral"] = $usuario["correoLaboral"];
                $usuarios[$i]["correoLaboral2"] = $usuario["correoLaboral2"];
                $usuarios[$i]["claveCorreo2"] = $usuario["claveCorreo2"];
                $usuarios[$i]["claveCorreo2"] = $usuario["claveCorreo2"];
                $usuarios[$i]["estado"] = $usuario["estado"];
                $i++;
            }
		}
		
		$this->usuario->actualizar($usuarios);				
		$this->verUsuarios();
	}

    public function guardarUsuario()
    {
        $this->load->model('usuario');
        $usuario=$this->input->post('usuario[]');
        $this->usuario->guardar($usuario);
        $this->verUsuarios();
    }
}
