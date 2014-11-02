<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetalleNota extends CI_Controller {

	public function index()
	{
		$data = array('titlepage' => '¿ Quién Compró ?' );

		$this->load->view('header',$data);
		$this->load->view('detalle-nota');
		$this->load->view('footer');
	}
}
