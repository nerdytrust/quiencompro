<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

		public function detallenota()
	{

		//$notaid = ($this->input->get('nota')==null) ? 0 : $this->input->get('nota');
		$notaid;
			if ($this->uri->segment(3) === FALSE)
			{
			    $notaid = 0;
			}
			else
			{
			    $notaid = $this->uri->segment(3);
			}

		if($notaid == 0 || !is_numeric($notaid))
				header('Location:'.base_url(),true);

		$header = array('titlepage' => '¿ Quién Compró ?'
			,'nota' => $this->Quien_model->get_detalle_nota($notaid));
		$body = array(
				'nota' => $this->Quien_model->get_detalle_nota($notaid)
			);

		if(count($body['nota'])<1)
			header('Location:'.base_url(),true);

		$this->load->view('header',$header);
		$this->load->view('detalle-nota',$body);
		$this->load->view('footer');

	}
	public function rss()
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
	public function lista_autores_nota()
	{

		//$notaid = ($this->input->get('nota')==null) ? 0 : $this->input->get('nota');
		$author;
			if ($this->uri->segment(3) === FALSE)
			{
			    $author = 2;
			}
			else
			{
			    $author = $this->uri->segment(3);
			}
			//echo $author; die;

		if($author == 0 || !is_numeric($author))
				header('Location:'.base_url(),true);

		$header = array('titlepage' => '¿ Quién Compró ?'
			,'nota' => $this->Quien_model->get_lista_autores(0,$author));
		$lista_notas=$this->Quien_model->get_lista_autores(0, $author);


		$body = array(

			'lista_notas' =>  $lista_notas, 
			'total_notas' => count($lista_notas)
			);
//print_r($body) ; die;
		if(count($body['total_notas'])<1)
			header('Location:'.base_url(),true);

		$this->load->view('header',$header);
		$this->load->view('notas',$body);
		$this->load->view('footer');

	}
	

	public function index()
	{
		$header = array('titlepage' => '¿ Quién Compró ?');
		$notas =$this->Quien_model->get_total_notas();
		$notas = $notas[0];

		$body = array(
			'lista_notas' =>  $this->Quien_model->get_lista_notas(0),
			'total_notas' => $notas['total_notas'],
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
								<a href="'.base_url().'notas/detallenota/'.$value['id'].'">
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
