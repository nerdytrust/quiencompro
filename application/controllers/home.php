<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
		$this->load->model('quien_model', 'quien');
	}


		public function login()
	{
		$this->load->helper('form');
		$data = array('titlepage' => '¿ Quién Compró ?' );
		if($this->session->userdata('session') != TRUE ){
		$this->load->view('header',$data);
		$this->load->view('login');
		$this->load->view('footer');
		}
		else
		{
		 	redirect('admin');
		}

	}

	public function verificar_login(){
		//$this->output->enable_profiler(TRUE);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user-email','Usuario','trim|required|xss_clean');
		$this->form_validation->set_rules('user-password','Contraseña','trim|required|xss_clean');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors('<span class="error">','</span>');
		} else {
				$data['user']		=	$this->input->post('user-email');
				$data['pass']		=	$this->input->post('user-password');
	            $data 				= 	$this->security->xss_clean($data);  
	            $login_check = $this->quien->check_login($data);

	            if ( $login_check != FALSE ){
	            	$this->session->set_userdata('session', TRUE);
	            	$this->session->set_userdata('usuario', $data['user']);

	            	if (is_array($login_check))
	            		foreach ($login_check as $login_element) {
	            			$this->session->set_userdata('id', $login_element->id);
	            			$this->session->set_userdata('level', $login_element->level);
							$this->session->set_userdata('seudonimo', $login_element->seudonimo);
							$this->session->set_userdata('e-mail', $login_element->username);
	            		}
	            	redirect('admin');
	            } else {
	            	redirect('login');
	            }
		}
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
