<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rss extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}


	public function RSS()
	{
		
		$header = array('titlepage' => '¿ Quién Compró ?'
			,'nota' => $this->Quien_model->get_rss());
		$body = array(
				'nota' => $this->Quien_model->get_rss()
			);

		if(count($body['nota'])<1)
			header('Location:'.base_url(),true);

		
		$this->load->view('rss', $body);
		
	}
}