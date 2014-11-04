<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

	public function index()
	{
		$header = array('titlepage' => '¿ Quién Compró ?');
		$body = array(
			'lista_notas' =>  $this->Quien_model->get_lista_notas(0),
			'total_notas' => $this->Quien_model->get_total_notas()[0]['total_notas'],
			);

		$this->load->view('header',$header);
		$this->load->view('notas',$body);
		$this->load->view('footer');
	}


	public function infinity()
	{
		$offset = ($this->input->post('offset')==null) ? 0 : $this->input->post('offset');
		$offset += 10;
		$notas = $this->Quien_model->get_lista_notas($offset);
		foreach ($notas as $key => $value) {
			echo '
			<li>
							<div class="unit-100">
								<div>
									<div style="display: inline-block;vertical-align: top;">
										<img src="images/icons/user.png" width="45" alt="">
									</div>
									<div style="display: inline-block;">
										Redacción  '.$value['modify_date'].'<br/>
										<a href="https://twitter.com/QuienCompro">Seguir en Twitter &nbsp;<img src="images/icons/twitter-256.png" width="20" alt=""></a>
									</div>
								</div>
								<a href="'.base_url().'detallenota?nota='.$value['id'].'">
									<h3 style="padding:1em;">'.$value['title'].'</h3>
									<div class="units-row">
										<div class="unit-60">
											<span style="color:#333;font-size:1.2em;">
											'.$value['description'].'
											</span>
										</div>
										<div class="unit-40">
											<img src="'.$value['featured_image'].'" alt="'.$value['title'].'">
										</div>
									</div>
								</a>
							</div>
							
						</li>
			';
		}

	}
}
