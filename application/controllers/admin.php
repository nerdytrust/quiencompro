<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('quien_model', 'quien');
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
	}

	public function index(){
		$this->output->enable_profiler(TRUE);
		if($this->session->userdata('session') === TRUE ){
			$nivel=$this->session->userdata('level');
			$user_id=$this->session->userdata('id');
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$data_notas = array('data' => $this->quien->get_lista_notas_admin($user_id,$nivel) 	);
			$this->load->view('header',$data);
			$this->load->view('admin-notas', $data_notas);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}
	}

	public function facturas()
	{
		$this->output->enable_profiler(TRUE);
		if($this->session->userdata('session') === TRUE ){
			$nivel=$this->session->userdata('level');
			$user_id=$this->session->userdata('id');
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$data_facturas = array('data' => $this->quien->get_lista_facturas_admin($user_id,$nivel) 	);
			$this->load->view('header',$data);
			$this->load->view('admin-facturas', $data_facturas);
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}
	}
	

	public function editar_nota()
	{
		if($this->session->userdata('session') === TRUE ){
			$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$id_nota = $this->input->get( "id_nota" );
			$nota_data = array('data' => $this->quien->get_detalle_nota($id_nota), 'nota' => $id_nota );
			$this->load->view('header',$data);
			$this->load->view('edita-notas', $nota_data);
			$this->load->view('footer');
		} else {
			redirect('login');	
		}

	}

	public function nueva_nota(){
		if($this->session->userdata('session') === TRUE ){
			$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );
			$this->load->view('header',$data);
			$this->load->view('nueva-nota');
			$this->load->view('footer');
		}
		else{
			redirect('login');	
		}

	}

	public function nueva_factura()
	{
		if($this->session->userdata('session') === TRUE ){
			$this->output->enable_profiler(TRUE);
			$data = array('titlepage' => '¿ Quién Compró ?' );


			$catalogos = array(
				'ct_legislatura' => $this->quien->get_legislaturas(),
				'ct_camara' => $this->quien->get_camaras(),
				'ct_responsable' => $this->quien->get_responsables(),
				'ct_tipo' => $this->quien->get_tipos(),
			);


			$this->load->view('header',$data);
			$this->load->view('nueva-factura',$catalogos);
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
		$this->form_validation->set_rules('content-note','Contenido','trim|required|xss_clean');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {
				$data['autor-note']			=	$this->session->userdata('id');
				$data['title-note']			=	$this->input->post('title-note');
				$data['tags-note']			=	$this->input->post('tags-note');
				$data['desc-note']			=	$this->input->post('desc-note');
				$data['content-note']		=	$this->input->post('content-note');
				$data['vip-note']			=	$this->input->post('vip-note');
				$data['feat-note']			=	$this->input->post('feat-note');
				$data['published-note']		=	$this->input->post('published-note');
				$data['feat-img-note']		=	$this->input->post('feat-img-note');

	            $data 						= 	$this->security->xss_clean($data);  
	            
	            $ins_note_check = $this->quien->save_nueva_nota($data);

	            if ( $ins_note_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "No se han insertado los datos correctamente";
				}
		}
	}

	public function elimina_nota(){
		$id_nota = $this->input->get( "id_nota" );
		$elimina_data = $this->quien->elimina_nota($id_nota);
		echo $elimina_data;
	}

	public function actualiza_nota(){
		$this->form_validation->set_rules('title-note','Título Nota','trim|required|xss_clean');
		$this->form_validation->set_rules('tags-note','Tags','trim|required|xss_clean');
		$this->form_validation->set_rules('desc-note','Descripción','trim|required|xss_clean');
		$this->form_validation->set_rules('content-note','Contenido','trim|required|xss_clean');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors();
		}else {
				$data['id-note']			=	$this->input->post('id-note');
				$data['title-note']			=	$this->input->post('title-note');
				$data['tags-note']			=	$this->input->post('tags-note');
				$data['desc-note']			=	$this->input->post('desc-note');
				$data['content-note']		=	$this->input->post('content-note');
				$data['vip-note']			=	$this->input->post('vip-note');
				$data['feat-note']			=	$this->input->post('feat-note');
				$data['published-note']		=	$this->input->post('published-note');
				$data['feat-img-note']		=	$this->input->post('feat-img-note');

	            $data 						= 	$this->security->xss_clean($data);  
	            
	            $update_note_check = $this->quien->actualiza_nota($data);

	            if ( $update_note_check != FALSE ){
	            	echo "exito";
	            }else {
	            	echo "No se han insertado los datos correctamente";
				}
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
		        'filelink' => $_FILES['file']['name']
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
