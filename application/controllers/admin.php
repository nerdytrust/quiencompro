<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data = array('titlepage' => '¿ Quién Compró ?' );

		$this->load->view('header',$data);
		$this->load->view('admin-notas');
		$this->load->view('footer');
	}

	public function editarnota()
	{
		$data = array('titlepage' => '¿ Quién Compró ?' );
		
		$this->load->view('header',$data);
		$this->load->view('edita-notas');
		$this->load->view('footer');
	}

}
