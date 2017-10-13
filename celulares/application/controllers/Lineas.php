<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lineas extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function listar()
    {
        $this->load->model('linea');
        $data['lineas']=$this->linea->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('linea/headerTablaLineas');
        $this->load->view('linea/listar',$data);
        $this->load->view('linea/footerTabla');
    }

    public function nuevo()
    {
        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('linea/nuevo',$data);
    }

    public function guardar()
    {
        $this->load->model('linea');
        $this->load->model('rel_plan_datos');

        $linea=$this->input->post('linea[]');

        //Envio el array linea sin el idPlanDatos y me lo devuelve con id para despues guardarlo en la linea
        $linea=$this->rel_plan_datos->guardar($linea);
        $this->linea->guardar($linea);

        $this->listar();
    }

    public function editar()
    {
        $this->load->model('linea');
        $data['lineas']=$this->linea->listar();

        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('linea/headerTablaLineas');
        $this->load->view('linea/editar',$data);
        $this->load->view('linea/footerTabla');
    }

    public function actualizar()
    {
        $this->load->model('linea');
        $this->load->model('rel_plan_datos');
        $grilla=$this->input->post('grilla[]');

        $i=0;
        foreach($grilla as $linea)
        {
            if($linea['modificado']==1)
            {
                $lineas[$i]["id"]=$linea["id"];
                $lineas[$i]["numero"]=$linea["numero"];
                $lineas[$i]["estado"]=$linea["estado"];
                $lineas[$i]["estadoFecha"]=$linea["estadoFecha"];
                $lineas[$i]["idPlanDatos"]=$linea["idPlanDatos"];
                $lineas[$i]["idPlan"]=$linea["idPlan"];
                $lineas[$i]["idDatos"]=$linea["idDatos"];
                $lineas[$i]["observaciones"]=$linea["observaciones"];
                $i++;
            }
        }

        $lineas=$this->rel_plan_datos->actualizar($lineas);
        $this->linea->actualizar($lineas);
        $this->listar();
    }

}
