<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetalleFactura extends CI_Controller {

	public function index()
	{
		$data = array('titlepage' => '¿ Quién Compró ?' );

		$this->load->view('header',$data);
		$this->load->view('detalle-factura');
		$this->load->view('footer');
	}
}
