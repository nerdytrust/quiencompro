<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Quien_model');
	}

	public function index()
	{
		$header = array('titlepage' => '¿ Quién Compró ?');
		$facturas = $this->Quien_model->get_total_facturas();
		$facturas = $facturas[0];

		$body = array(
			'lista_facturas' => $this->Quien_model->get_lista_facturas(0),
			'total_facturas' => $facturas['total_facturas'],
			'monto_facturas' => $facturas['monto_total'],
			);

		$this->load->view('header',$header);
		$this->load->view('facturas',$body);
		$this->load->view('footer');
	}

	public function detallefactura()
		{
			//$facturaid = ($this->input->get('factura')==null) ? 0 : $this->input->get('factura');
			$facturaid;
			if ($this->uri->segment(3) === FALSE)
			{
			    $facturaid = 0;
			}
			else
			{
			    $facturaid = $this->uri->segment(3);
			}

			if($facturaid == 0 || !is_numeric($facturaid))
					header('Location:'.base_url(),true);

			$header = array('titlepage' => '¿ Quién Compró ?');
			$body = array(
					'factura' => $this->Quien_model->get_detalle_factura($facturaid)
				);

			if(count($body['factura'])<1)
				header('Location:'.base_url(),true);

			$this->load->view('header',$header);

			$this->load->view('detalle-factura',$body);
			$this->load->view('footer');
		}

	public function infinity()
	{
		$offset = ($this->input->post('offset')==null) ? 0 : $this->input->post('offset');
		$offset += 10;
		$facturas = $this->Quien_model->get_lista_facturas($offset);

		foreach ($facturas as $key => $value) {
			echo '
				<li><a href="'.base_url().'facturas/detallefactura/'.$value['id'].'">
							<div>
								<div class="unit-100">
									<img src="'.$value['image'].'" width="80" alt="Tipo de gasto">
									<h3 style="padding:1em;">'.$value['detail'].'</h3>
									<div class="units-row">
										<div class="unit-40">
											<ul class="lista-4">
												<li><span>Camara:</span> '.$value['camara'].'</li>
												<li><span>Legislatura:</span> '.$value['legislatura'].'</li>
											</ul>
										</div>
										<div class="unit-30">
											<ul class="lista-4">
												<li><span>'.$value['responsable'].'</span></li>
												<li><span>Monto:</span> '.money_format('%i',$value['amount']).'</li>
											</ul>
										</div>
										<div class="unit-30">
											<ul class="lista-4">
												<li><span>Fecha:</span> '.$value['date'].'</li>
												<li><span>'.$value['emisor_alias'].'</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
			';
		}

	}
}
