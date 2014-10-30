<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetalleFacturas extends CI_Controller {

	public function index()
	{
		$this->load->view('facturas');
	}
}
