<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busqueda extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

	public function index()
	{
		$txt = $this->input->get('txt');
		$header = array('titlepage' => '¿ Quién Compró ?');
		$result = $this->Quien_model->search($txt);
		$amount = 0;

		foreach ($result[0] as $key => $value) {
			$amount+=$value->amount;
		}



		$body = array(
				'search_invoice' => $result[0],
				'search_content' => $result[1],
				'amount' => $amount,
				'txt' => $txt,
				'num_invoice'=>count($result[0]),
				'num_content'=>count($result[1]) 
			);

		print_r($body);

		//die;

		$this->load->view('header',$header);
		$this->load->view('busqueda',$body);
		$this->load->view('footer');

	}
}
