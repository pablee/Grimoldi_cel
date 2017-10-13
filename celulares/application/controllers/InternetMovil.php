<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InternetMovil extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function listar()
    {
        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('datos/headerTabla');
        $this->load->view('datos/listar',$data);
        $this->load->view('datos/footerTabla');
    }

    public function nuevo()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('datos/nuevo');
    }

    public function guardar()
    {
        $this->load->model('datos');
        $datos=$this->input->post('datos[]');
        $this->datos->guardar($datos);

        $this->listar();
    }

    public function editar()
    {
        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('datos/headerTabla');
        $this->load->view('datos/editar',$data);
        $this->load->view('datos/footerTabla');
    }

    public function actualizar()
    {
        $this->load->model('datos');
        $this->load->model('rel_datos_datos');
        $grilla=$this->input->post('grilla[]');

        $i=0;
        foreach($grilla as $datos)
        {
            if($datos['modificado']==1)
            {
                $datoses[$i]["id"] = $datos["id"];
                $datoses[$i]["gb"] = $datos["gb"];
                $i++;
            }
        }

        $this->datos->actualizar($datos);
        $this->listar();
    }

}