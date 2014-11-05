<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('quien_model', 'quien');
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
	}

	public function index(){
		if($this->session->userdata('session') === TRUE ){
			$nivel=$this->session->userdata('level');
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$data_notas = $this->quien->get_lista_notas();
			$this->load->view('header',$data);
			$this->load->view('admin-notas', $data_notas);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}
	}
	

	public function editarnota($id_nota)
	{
		$this->output->enable_profiler(TRUE);
		$data = array('titlepage' => '¿ Quién Compró ?' );
		$id_nota = $this->input->get( "id_nota" );
		$nota_data = $this->quien->get_detalle_nota($id_nota);
		$this->load->view('header',$data);
		$this->load->view('edita-notas', $nota_data);
		$this->load->view('footer');
	}

	public function nueva_nota()
	{
		$this->output->enable_profiler(TRUE);
		$data = array('titlepage' => '¿ Quién Compró ?' );
		$this->load->view('header',$data);
		$this->load->view('nueva-nota');
		$this->load->view('footer');
	}

}
