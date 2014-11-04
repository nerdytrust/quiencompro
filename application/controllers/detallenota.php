<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetalleNota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

	public function index()
	{
		$notaid = ($this->input->get('nota')==null) ? 0 : $this->input->get('nota');
		if($notaid == 0 || !is_numeric($notaid))
				header('Location:'.base_url(),true);

		$header = array('titlepage' => '¿ Quién Compró ?');
		$body = array(
				'nota' => $this->Quien_model->get_detalle_nota($notaid)
			);

		if(count($body['nota'])<1)
			header('Location:'.base_url(),true);

		$this->load->view('header',$header);
		$this->load->view('detalle-nota',$body);
		$this->load->view('footer');

	}
}
