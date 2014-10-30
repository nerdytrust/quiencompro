<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array('titlepage' => '¿ Quién Compró ?' );

		$this->load->view('header',$data);
		$this->load->view('home');
		$this->load->view('footer');
	}
}
