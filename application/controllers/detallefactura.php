<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetalleFactura extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

	public function index()
	{
		$facturaid = ($this->input->get('factura')==null) ? 0 : $this->input->get('factura');
		if($facturaid == 0 || !is_numeric($facturaid))
				header('Location:'.base_url(),true);

		$header = array('titlepage' => '¿ Quién Compró ?');
		$body = array(
				'factura' => $this->Quien_model->get_detalle_factura($facturaid)
			);

		if(count($body['factura'])<1)
			header('Location:'.base_url(),true);

		$this->load->view('header',$header);

		$this->load->view('detalle-factura',$body);
		$this->load->view('footer');
	}
}
