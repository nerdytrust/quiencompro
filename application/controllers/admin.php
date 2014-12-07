<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('quien_model', 'quien');
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
		$this->load->helper('number');

	}

	public function index(){
		//$this->output->enable_profiler(TRUE);
		if($this->session->userdata('session') === TRUE ){
			$nivel=$this->session->userdata('level');
			$user_id=$this->session->userdata('id');
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$data_notas = array(
				'data_sinpublicar' => $this->quien->get_lista_notas_admin($user_id,$nivel,0, 0),
				'data_publicada' => $this->quien->get_lista_notas_admin($user_id,$nivel,0, 1));
			$this->load->view('header-admin',$data);
			$this->load->view('admin-notas', $data_notas);
			$this->load->view('footer');
		}
		else{
			redirect('home/login');	
		}
	}

	public function facturas()
	{
		//$this->output->enable_profiler(TRUE);
		if($this->session->userdata('session') === TRUE ){
			$nivel=$this->session->userdata('level');
			$user_id=$this->session->userdata('id');
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$data_facturas = array(
				'data_completo' => $this->quien->get_lista_facturas_admin($user_id,$nivel,0,1),
				'data_incompleto' => $this->quien->get_lista_facturas_admin($user_id,$nivel,0,0));

			//print_r($data_facturas);die;
			$this->load->view('header-admin',$data);
			$this->load->view('admin-facturas', $data_facturas);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}
	}

	public function solicitudes()
	{
		//$this->output->enable_profiler(TRUE);
		if($this->session->userdata('session') === TRUE ){
			$nivel=$this->session->userdata('level');
			$user_id=$this->session->userdata('id');
			$data = array('titlepage' => '¿ Quién Compró ?' );

			$data_solicitudes = array('data' => $this->quien->get_lista_solicitudes_admin($user_id,$nivel) 	);
			$this->load->view('header-admin',$data);
			$this->load->view('admin-solicitudes', $data_solicitudes);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}
	}
	

	public function editar_nota()
	{
		if($this->session->userdata('session') === TRUE ){
			//$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$id_nota = $this->input->get( "id_nota" );
			$nota_data = array('data' => $this->quien->get_detalle_nota($id_nota), 'nota' => $id_nota,'usuarios' => $this->quien->get_usuarios() );
			//print_r($nota_data);die;
			$this->load->view('header-admin',$data);
			$this->load->view('edita-notas', $nota_data);
			$this->load->view('footer');
		} else {
			redirect('login');	
		}

	}
	public function editar_solicitud()
	{
		if($this->session->userdata('session') === TRUE ){
			//$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );

			$id_solicitud = $this->input->get( "id_solicitud" );
			$solicitud_data = array('data' => $this->quien->get_detalle_solicitud($id_solicitud), 'nota' => $id_solicitud );
			$this->load->view('header-admin',$data);
			$this->load->view('edita-solicitudes', $solicitud_data);
			$this->load->view('footer');
		} else {
			redirect('login');	
		}

	}




	public function nueva_nota(){
		if($this->session->userdata('session') === TRUE ){
			//$this->output->enable_profiler(TRUE);
			$data  = array('titlepage' => '¿ Quién Compró ?' );

			$data2 = array('usuarios' => $this->quien->get_usuarios());


			$this->load->view('header-admin',$data);
			$this->load->view('nueva-nota',$data2);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}

	}

	public function nueva_factura()
	{
		if($this->session->userdata('session') === TRUE ){
			//$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );


			$catalogos = array(
				'ct_legislatura' => $this->quien->get_legislaturas(),
				'ct_camara' => $this->quien->get_camaras(),
				'ct_responsable' => $this->quien->get_responsables(),
				'ct_tipo' => $this->quien->get_tipos(),
				'ct_solicitud' => $this->quien->get_lista_solicitudes_admin(),
			);


			$this->load->view('header-admin',$data);
			$this->load->view('nueva-factura',$catalogos);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}
	}


	public function editar_factura(){

		if($this->session->userdata('session') === TRUE ){
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$id_factura = $this->input->get( "id_factura" );
			$catalogos = array(
					'ct_legislatura' => $this->quien->get_legislaturas(),
					'ct_camara' => $this->quien->get_camaras(),
					'ct_responsable' => $this->quien->get_responsables(),
					'ct_tipo' => $this->quien->get_tipos(),
					'ct_solicitud' => $this->quien->get_lista_solicitudes_admin(),
				);
			$factura_data = array('data' => $this->quien->get_detalle_factura($id_factura), 'catalogos' => $catalogos , 'factura' => $id_factura );

				$this->load->view('header-admin',$data);
				$this->load->view('edita-facturas',$factura_data);
				$this->load->view('footer');
			} else {
				redirect('login');
			}
		}

	public function nueva_solicitud()
	{
		if($this->session->userdata('session') === TRUE ){
			//$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );

			$this->load->view('header-admin',$data);
			$this->load->view('nueva-solicitud');
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}

	}

	public function guarda_nota(){
		$this->form_validation->set_rules('title-note','Título Nota','trim|required|xss_clean');
		$this->form_validation->set_rules('tags-note','Tags','trim|required|xss_clean');
		$this->form_validation->set_rules('desc-note','Descripción','trim|required|xss_clean');
		$this->form_validation->set_rules('content-note','Contenido','trim|required');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {
				//$data['autor-note']			=	$this->session->userdata('id');
				$data['autor-note']			=	$this->input->post('usuario');
				$data['title-note']			=	$this->input->post('title-note');
				$data['tags-note']			=	$this->input->post('tags-note');
				$data['desc-note']			=	$this->input->post('desc-note');
				$data['content-note']		=	$this->input->post('content-note');
				$data['vip-note']			=	$this->input->post('vip-note');
				$data['feat-note']			=	$this->input->post('feat-note');
				$data['published-note']		=	$this->input->post('published-note');
				$data['feat-img-note']		=	$this->input->post('feat-img-note');

	            //$data 						= 	$this->security->xss_clean($data);  
	            
	            $ins_note_check = $this->quien->save_nueva_nota($data);

	            if ( $ins_note_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "No se han insertado los datos correctamente";
				}
		}
	}

	public function guarda_factura(){

		$this->form_validation->set_rules('folio','Folio','trim|required|xss_clean');
		$this->form_validation->set_rules('fecha','Fecha','trim|required|xss_clean');
		$this->form_validation->set_rules('monto','Monto','trim|required|xss_clean');
		$this->form_validation->set_rules('descripcion','Descripcion','trim|required|xss_clean');
		$this->form_validation->set_rules('razonsocial','Razon Social','trim|required|xss_clean');
		$this->form_validation->set_rules('rfc','RFC','trim|required|xss_clean');
		$this->form_validation->set_rules('alias','Alias','trim|required|xss_clean');
		$this->form_validation->set_rules('direccion1','Direccion 1','trim|required|xss_clean');
		//$this->form_validation->set_rules('document','Archivo PDF','trim|required|xss_clean');
		

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {
				$data['solicitud']			=	$this->input->post('solicitud');
				$data['camara']			    =	$this->input->post('camara');
				$data['legislatura']		=	$this->input->post('legislatura');
				$data['responsable']		=	$this->input->post('responsable');
				$data['tipo']				=	$this->input->post('tipos');
				$data['folio']				=	$this->input->post('folio');
				$data['fecha']				=	$this->input->post('fecha');
				$data['monto']				=	$this->input->post('monto');
				$data['descripcion']		=	$this->input->post('descripcion');
				$data['razonsocial']		=	$this->input->post('razonsocial');
				$data['rfc']				=	$this->input->post('rfc');
				$data['document']			=	$this->input->post('document');

				$data['alias']				=	$this->input->post('alias');
				$data['direccion1']			=	$this->input->post('direccion1');
				$data['direccion2']			=	$this->input->post('direccion1');

	            $data 						= 	$this->security->xss_clean($data);  
	            
	            $ins_note_check = $this->quien->save_nueva_factura($data);

	            if ( $ins_note_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "NO se han insertado los datos correctamente";
				}
		}
	}

	public function guarda_solicitud()
	{

		$this->form_validation->set_rules('requestfolio' ,'Folio de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('responsefolio','Folio de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('soldate','Fecha de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('resdate','Fecha de Respuesta','trim|required|xss_clean');
		$this->form_validation->set_rules('soldocument','Documento de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('resdocument','Documento de Respuesta','trim|required|xss_clean');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {
				$data['requestfolio']		=	$this->input->post('requestfolio');
				$data['responsefolio']		=	$this->input->post('responsefolio');
				$data['soldate']			=	$this->input->post('soldate');
				$data['resdate']			=	$this->input->post('resdate');
				$data['soldocument']		=	$this->input->post('soldocument');
				$data['resdocument']		=	$this->input->post('resdocument');

	            $data 						= 	$this->security->xss_clean($data);  
	            
	            $ins_note_check = $this->quien->save_nueva_solicitud($data);

	            if ( $ins_note_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "No se han insertado los datos correctamente";
				}
		}


	}


	public function habilita_nota(){
		$id_nota = $this->input->get( "id_nota" );
		$activa_data = $this->quien->habilita_nota($id_nota);
		echo $activa_data;
	}

	public function desactiva_nota(){
		$id_nota = $this->input->get( "id_nota" );
		$desactiva_data = $this->quien->desactiva_nota($id_nota);
		echo $desactiva_data;
	}

	public function elimina_nota(){
		$id_nota = $this->input->get( "id_nota" );
		$elimina_data = $this->quien->elimina_nota($id_nota);
		echo $elimina_data;
	}
	public function elimina_factura(){
		$id_factura = $this->input->get( "id_factura" );
		$elimina_data = $this->quien->elimina_factura($id_factura);
		echo $elimina_data;
	}
	public function elimina_solicitud(){
		$id_solicitud = $this->input->get( "id_solicitud" );
		$elimina_data = $this->quien->elimina_solicitud($id_solicitud);
		echo $elimina_data;
	}

	public function actualiza_nota(){
		$this->form_validation->set_rules('title-note','Título Nota','trim|required|xss_clean');
		$this->form_validation->set_rules('tags-note','Tags','trim|required|xss_clean');
		$this->form_validation->set_rules('desc-note','Descripción','trim|required|xss_clean');
		$this->form_validation->set_rules('content-note','Contenido','trim|required');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {
				$data['autor-note']			=	$this->input->post('usuario');
				$data['id-note']			=	$this->input->post('id-note');
				$data['title-note']			=	$this->input->post('title-note');
				$data['tags-note']			=	$this->input->post('tags-note');
				$data['desc-note']			=	$this->input->post('desc-note');
				$data['content-note']		=	$this->input->post('content-note');
				$data['vip-note']			=	$this->input->post('vip-note');
				$data['feat-note']			=	$this->input->post('feat-note');
				$data['published-note']		=	$this->input->post('published-note');
				$data['feat-img-note']		=	$this->input->post('feat-img-note');

	            //$data 						= 	$this->security->xss_clean($data);  
	            
	            $update_note_check = $this->quien->actualiza_nota($data);

	            if ( $update_note_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "No se han insertado los datos correctamente";
				}
		}
	}


	public function actualiza_factura(){

		$this->form_validation->set_rules('folio','Folio','trim|required|xss_clean');
		$this->form_validation->set_rules('fecha','Fecha','trim|required|xss_clean');
		$this->form_validation->set_rules('monto','Monto','trim|required|xss_clean');
		$this->form_validation->set_rules('descripcion','Descripcion','trim|required|xss_clean');
		$this->form_validation->set_rules('razonsocial','Razon Social','trim|required|xss_clean');
		$this->form_validation->set_rules('rfc','RFC','trim|required|xss_clean');
		$this->form_validation->set_rules('alias','Alias','trim|required|xss_clean');
		$this->form_validation->set_rules('direccion1','Direccion 1','trim|required|xss_clean');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {

				$data['id']				    =	$this->input->post('id_factura');	
				$data['solicitud']			=	$this->input->post('solicitud');
				$data['camara']			    =	$this->input->post('camara');
				$data['legislatura']		=	$this->input->post('legislatura');
				$data['responsable']		=	$this->input->post('responsable');
				$data['tipo']				=	$this->input->post('tipos');
				$data['folio']				=	$this->input->post('folio');
				$data['fecha']				=	$this->input->post('fecha');
				$data['monto']				=	$this->input->post('monto');
				$data['descripcion']		=	$this->input->post('descripcion');
				$data['razonsocial']		=	$this->input->post('razonsocial');
				$data['rfc']				=	$this->input->post('rfc');
				$data['alias']				=	$this->input->post('alias');
				$data['direccion1']			=	$this->input->post('direccion1');
				$data['direccion2']			=	$this->input->post('direccion2');

	            $data 						= 	$this->security->xss_clean($data);  
	            
	            $update_fact_check = $this->quien->actualiza_factura($data);

	            if ( $update_fact_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "NO se han insertado los datos correctamente";
	            }

			}
		}
	

		public function actualiza_solicitud(){

		$this->form_validation->set_rules('requestfolio' ,'Folio de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('responsefolio','Folio de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('soldate','Fecha de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('resdate','Fecha de Respuesta','trim|required|xss_clean');
		$this->form_validation->set_rules('soldocument','Documento de Solicitud','trim|required|xss_clean');
		$this->form_validation->set_rules('resdocument','Documento de Respuesta','trim|required|xss_clean');

				$data['id-solicitud']		=	$this->input->post('id-solicitud');
				$data['requestfolio']		=	$this->input->post('requestfolio');
				$data['responsefolio']		=	$this->input->post('responsefolio');
				$data['soldate']			=	$this->input->post('soldate');
				$data['resdate']			=	$this->input->post('resdate');
				$data['soldocument']		=	$this->input->post('soldocument');
				$data['resdocument']		=	$this->input->post('resdocument');

	            $data 						= 	$this->security->xss_clean($data);  
	            
	            $update_note_check = $this->quien->actualiza_solicitud($data);

	            if ( $update_note_check != FALSE ){

	            	echo "exito";
	            }else {
	            	echo "No se han insertado los datos correctamente";
				}
		}


	public function upload_pdf_factura()
	{
		$dir = 'invoices/';
 
		$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
		if ($_FILES['file']['type'] == 'application/pdf')		
		{
		    $filename = $dir.$_FILES['file']['name'];
		    move_uploaded_file($_FILES['file']['tmp_name'], $filename);
		    $array = array(
		        'filelink' => substr($_FILES['file']['name'],0,-4)
		    );
		    echo stripslashes(json_encode( $array ) );
		}
	}

	public function upload_image_content()
	{ 
		$dir = 'images/content/';
 
		$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
		 
		if ($_FILES['file']['type'] == 'image/png'
		|| $_FILES['file']['type'] == 'image/jpg'
		|| $_FILES['file']['type'] == 'image/gif'
		|| $_FILES['file']['type'] == 'image/jpeg'
		|| $_FILES['file']['type'] == 'image/pjpeg')
		{
		    // setting file's mysterious name
		    $ext = 'png';
			if($_FILES['file']['type'] == 'image/jpg')$ext = 'jpg';
			if($_FILES['file']['type'] == 'image/gif')$ext = 'gif';
			if($_FILES['file']['type'] == 'image/jpeg')$ext = 'jpeg';
			if($_FILES['file']['type'] == 'image/pjpeg')$ext = 'pjpeg';


		    $filename = md5(date('YmdHis')).'.'.$ext;
		    $file = $dir.$filename;
		 
		    // copying
		    move_uploaded_file($_FILES['file']['tmp_name'], $file);
		 
		    // displaying file
		    $array = array(
		        'filelink' => $dir.$filename
		    );
		 
		    echo stripslashes(json_encode($array));
		}
	
	}

}
