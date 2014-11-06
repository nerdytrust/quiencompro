<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

	public function index()
	{
		//print_r($this->Quien_model->get_nota_principal());die;

		$nota_principal = $this->Quien_model->get_nota_principal();
		$nota_principal = $nota_principal[0];

		$banner_der = ($this->Quien_model->get_banner_der()==null)?null:$this->Quien_model->get_banner_der();
		if(is_array($banner_der))
			$banner_der=$banner_der[0];

		$header = array('titlepage' => '¿ Quién Compró ?');
		$body = array(
			'nota_principal' => $nota_principal,
			'notas_recientes'=> $this->Quien_model->get_notas_recientes(),
			'facturas_recientes'=>$this->Quien_model->get_facturas_recientes(),
			'banner_der' => $banner_der,
			'facturas_monto' => $this->Quien_model->get_facturas_monto(),
			'facturas_beneficiados' => $this->Quien_model->get_facturas_beneficiados(),
			);

		$this->load->view('header',$header);
		$this->load->view('home',$body);
		$this->load->view('footer');
	}
}
