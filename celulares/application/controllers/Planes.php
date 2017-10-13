<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planes extends CI_Controller
{
    /*http://midominio.com/controlador/metodo/parametro*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function listar()
    {
        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('plan/headerTablaPlanes');
        $this->load->view('plan/listar',$data);
        $this->load->view('plan/footerTabla');
    }

    public function nuevo()
    {
        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('plan/nuevo',$data);
    }

    public function guardar()
    {
        $this->load->model('plan');
        $this->load->model('rel_plan_datos');

        $plan=$this->input->post('plan[]');

        //Envio el array plan sin el id y me lo devuelve con id para despues guardarlo
        $plan=$this->plan->guardar($plan);
        $this->rel_plan_datos->guardar($plan);

        $this->listar();
    }

    public function editar()
    {
        $this->load->model('plan');
        $data['planes']=$this->plan->listar();

        $this->load->model('datos');
        $data['datos']=$this->datos->listar();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('plan/headerTablaplanes');
        $this->load->view('plan/editar',$data);
        $this->load->view('plan/footerTabla');
    }

    public function actualizar()
    {
        $this->load->model('plan');
        $this->load->model('rel_plan_datos');
        $grilla=$this->input->post('grilla[]');

        $i=0;
        foreach($grilla as $plan)
        {
            if($plan['modificado']==1)
            {
                $planes[$i]["id"] = $plan["id"];
                $planes[$i]["nombre"] = $plan["nombre"];
                $planes[$i]["adicional"] = $plan["adicional"];
                $planes[$i]["minutos"] = $plan["minutos"];
                $i++;
            }
        }

        $this->plan->actualizar($planes);
        //$this->rel_plan_datos->actualizar($planes);
        $this->listar();
    }

}
