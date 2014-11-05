<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('quien_model', 'quien');
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
	}
	
	public function index()
	{
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

	public function verificar(){
		//$this->output->enable_profiler(TRUE);
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


}
