<?php if(! defined('BASEPATH')) exit('No tienes permiso para acceder a este archivo');

	class Quien_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database("default");
			$this->load->helper('file');
		}

	    public function get_nota_principal(){
	    	$this->db->select("id, author, title, description, content, modify_date, vip, featured, published, featured_image");
 		    $this->db->where('featured', 1);
 		    $this->db->where('published', 1);
	        $this->db->order_by("modify_date", "desc");
	        $this->db->limit(1);
	        $sql = $this->db->get("content");
	        return $sql->result_array();
	    }

	   	public function get_notas_recientes(){
	    	$this->db->select("c.seudonimo, c.tweeter,a.id, a.author, a.title, a.description, a.content, a.modify_date, a.vip, a.featured, a.published, a.featured_image");
 		    $this->db->from("content AS a");
 		    $this->db->join('usuarios AS c', 'a.author = c.id ');
 		    $this->db->where('a.featured', 0);
 		    $this->db->where('a.published', 1);
 		    $this->db->order_by("a.modify_date", "desc");
 		    $this->db->limit(3);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	   	public function get_facturas_recientes(){
	    	$this->db->select("a.id,a.id_camara, a.modify_date, a.detail, a.amount, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b', 'a.id_camara = b.id ');
 		    $this->db->order_by("a.modify_date", "desc");
 		    $this->db->limit(10);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function get_facturas_monto(){
	    	$this->db->select("a.id,a.id_camara, a.modify_date, a.detail, a.amount, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b', 'a.id_camara = b.id ');
 		    $this->db->order_by("a.amount", "desc");
 		    $this->db->limit(5);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }
	    
	    // proveedores más beneficiados
	   	public function get_facturas_beneficiados(){ 
	    	$this->db->select("a.id,a.id_camara, a.emisor_name, SUM(a.amount) AS total, a.emisor_rfc, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b', 'a.id_camara = b.id ');
 		    $this->db->group_by("a.emisor_name");
 		    $this->db->order_by("total", "desc");
 		    $this->db->limit(5);	
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	   	public function get_banner_der(){ 
	    	$this->db->select("image");
 		    $this->db->where("activo", 1);
 		    $this->db->where('fecha_pub <=', date('Y-m-d'));
			$this->db->where('fecha_baja >=', date('Y-m-d'));
	        $sql = $this->db->get("banner_der");
	        return $sql->result_array();
	    }

	    public function get_detalle_nota($id_nota){
	    	$this->db->select("b.seudonimo, b.tweeter, a.title, a.description,a.featured_image, a.alias, a.content, a.created_date, a.tags, a.published, a.vip, a.featured");
	    	$this->db->from("content AS a");
			$this->db->join('usuarios AS b', 'a.author = b.id ');
 		    $this->db->where("published", 1);
 		    $this->db->where("a.id", $id_nota);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }
	    public function get_detalle_solicitud($id_solicitud)
	    {
	    	$this->db->select('id,request_folio,request_document,response_folio,response_date,response_document,request_date');
			$this->db->from("sol_gastos");
			$this->db->where("id", $id_solicitud);
			return $this->db->get()->result_array();
	    }

	    public function get_detalle_factura($id_factura){
	    	$this->db->select("b.name AS legislatura, a.date AS fecha_factura, c.name AS tipo_gasto, 
	    		d.name AS camara, e.name AS responsable, a.folio, a.date, a.amount, a.detail, 
	    		a.emisor_name , a.emisor_rfc,a.emisor_alias, a.emisor_address1, a.emisor_address2, 
	    		a.document, f.response_document AS solicitud,
				a.id_sol, a.id_responsable,a.id_tipo
	    		");
	    	$this->db->from("gastos AS a");
			$this->db->join('legislaturas AS b', 'a.id_legislatura = b.id ');
			$this->db->join('tipo_gastos AS c', 'a.id_tipo = c.id ');
			$this->db->join('camaras AS d', 'a.id_camara = d.id ');
			$this->db->join('responsable_gastos AS e', 'a.id_responsable = e.id ');
			$this->db->join('sol_gastos AS f', 'a.id_sol = f.id ');
 		    //$this->db->where("published", 1);
 		    $this->db->where("a.id", $id_factura);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function get_lista_notas($ini_pagina = 0){
	    	$this->db->select("id, title, description, featured_image,modify_date");
 		    $this->db->where('published', 1);
 		    $this->db->order_by("modify_date", "desc");
 		    $this->db->limit(10, $ini_pagina);
	        $sql = $this->db->get("content");
	        return $sql->result_array();
	    }

	    public function get_total_notas(){
	    	$this->db->select("COUNT(1) AS total_notas");
 		    $this->db->where('published', 1);
	        $sql = $this->db->get("content");
	        return $sql->result_array();
	    }

	    public function get_lista_facturas($ini_pagina){
	    	$this->db->select("a.id,b.name AS legislatura, a.date AS fecha_factura, c.name AS tipo_gasto, d.name AS camara, e.name AS responsable, a.folio, a.date, a.amount, a.detail, a.emisor_rfc,a.emisor_alias, a.document, f.response_document AS solicitud");
	    	$this->db->from("gastos AS a");
			$this->db->join('legislaturas AS b',' a.id_legislatura = b.id ');
			$this->db->join('tipo_gastos AS c',' a.id_tipo = c.id ');
			$this->db->join('camaras AS d', 'a.id_camara = d.id ');
			$this->db->join('responsable_gastos AS e',' a.id_responsable = e.id ');
			$this->db->join('sol_gastos AS f', 'a.id_sol = f.id ');
 		    $this->db->limit(10, $ini_pagina);
 		    $sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function get_total_facturas(){
	    	$this->db->select("COUNT(1) AS total_facturas, SUM(amount) AS monto_total");
	    	$this->db->from("gastos");
	    	$sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function search($match=''){
	    	
			$result = array();
			$this->db->select("b.name AS legislatura, a.date AS fecha_factura, c.name AS tipo_gasto, d.name AS camara, e.name AS responsable, a.folio, a.date, a.amount, a.detail, a.emisor_rfc, a.emisor_alias,a.document, f.response_document AS solicitud");
	    	$this->db->from("gastos AS a");
			$this->db->join('legislaturas AS b',' a.id_legislatura = b.id ');
			$this->db->join('tipo_gastos AS c',' a.id_tipo = c.id ');
			$this->db->join('camaras AS d', 'a.id_camara = d.id ');
			$this->db->join('responsable_gastos AS e',' a.id_responsable = e.id ');
			$this->db->join('sol_gastos AS f', 'a.id_sol = f.id ');
			$this->db->where("MATCH(detail,emisor_name,emisor_alias,emisor_alias) AGAINST ('".$match."' IN BOOLEAN MODE) ", NULL, FALSE);
			$this->db->limit(50);
	        $query_invoice = $this->db->get();
	        
	        array_push($result, $query_invoice->result());
	        
	        $this->db->select("a.id, a.title, a.description,a.featured_image");
	        $this->db->from("content AS a");
	        $this->db->where("MATCH(title,description) AGAINST ('".$match."' IN BOOLEAN MODE) ", NULL, FALSE);
	        $this->db->limit(50);
	        $query_content = $this->db->get();
	        array_push($result, $query_content->result());

	        return $result;

		}

	    //Salvar nueva nota
	    //Recibe un arrelo con los datos a insertar desde el form
		public function save_nueva_nota($data){
            $this->db->set('author', $data['autor-note'] ); //traer desde los datos de la ssesion del usuario
            $this->db->set('title', $data['title-note']);
            $this->db->set('description', $data['desc-note']);
            $this->db->set('alias', $data['title-note']);
            $this->db->set('content', $data['content-note']);
            $this->db->set('created_date', date('Y-m-d H:i:s'));
            $this->db->set('modify_date',  date('Y-m-d H:i:s'));
            $this->db->set('vip', $data['vip-note']);
            $this->db->set('featured', $data['feat-note']);
            $this->db->set('featured_image', $data['feat-img-note']);
            $this->db->set('published', $data['published-note']);
            $this->db->set('tags', $data['tags-note']);
            $this->db->insert('content');

            if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}	

		public function save_nueva_factura($data){

			$this->db->set('id_camara', $data['camara'] ); //traer desde los datos de la ssesion del usuario
            $this->db->set('id_legislatura', $data['legislatura']);
            $this->db->set('id_responsable', $data['responsable']);
            $this->db->set('id_tipo', $data['tipo']);
            $this->db->set('folio', $data['folio']);
            $this->db->set('date', $data['fecha']);
            $this->db->set('amount',  $data['monto']);
            $this->db->set('detail', $data['descripcion']);
            $this->db->set('emisor_name', $data['alias']);
            $this->db->set('emisor_alias', $data['razonsocial']);
            $this->db->set('emisor_rfc', $data['rfc']);
            $this->db->set('emisor_address1', $data['direccion1']);
            $this->db->set('emisor_address2', $data['direccion2']);
            $this->db->set('document', $data['document']);
            $this->db->set('id_sol', $data['solicitud']);

            $this->db->insert('gastos');

            if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;

		}



		public function save_nueva_solicitud($data){

			$this->db->set('request_folio', 	$data['requestfolio'] ); //traer desde los datos de la ssesion del usuario
            $this->db->set('request_document',  $data['soldocument']);
            $this->db->set('response_folio', 	$data['responsefolio']);
            $this->db->set('response_date', 	$data['resdate']);
            $this->db->set('response_document', $data['resdocument']);
            $this->db->set('request_date', 		$data['soldate']);
            

            $this->db->insert('sol_gastos');

            if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}



		public function actualiza_nota($data){
			$data2 = array(
               'title' => $data['title-note'],
               'description' => $data['desc-note'],
               'alias' => $data['title-note'],
               'content' => $data['content-note'],
               'vip' => $data['vip-note'],
               'featured' => $data['feat-note'],
               'featured_image'=>$data['feat-img-note'],
               'published' => $data['published-note'],
               'tags' => $data['tags-note'],
               'modify_date'=> date('Y-m-d H:i:s')
            );

			$this->db->where('id', $data['id-note']);
			$this->db->update('content', $data2); 

			if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}


		public function actualiza_factura($data){

			$data2 = array(
			   'id_sol' 			=> $data['solicitud'],
               'id_camara' 			=> $data['camara'],
               'id_legislatura' 	=> $data['legislatura'],
               'id_responsable' 	=> $data['responsable'],
               'detail' 			=> $data['descripcion'],
               'id_tipo' 			=> $data['tipo'],
               'folio' 				=> $data['folio'],
               'amount'				=> $data['monto'],
               'emisor_name' 		=> $data['razonsocial'],
               'emisor_rfc' 		=> $data['rfc'],
               'emisor_alias'		=> $data['alias'],
               'emisor_address1' 	=> $data['direccion1'],
               'emisor_address2' 	=> $data['direccion2']
            );

			$this->db->where('id', $data['id']);
			$this->db->update('gastos', $data2); 

			if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}
		


		public function actualiza_solicitud($data){

			//print_r($data);die;

			$data2 = array(
               'request_folio' 		=> $data['requestfolio'],
               'response_folio' 	=> $data['responsefolio'],
               'request_date' 		=> $data['soldate'],
               'response_date' 		=> $data['resdate'],
               'request_document' 	=> $data['soldocument'],
               'response_document' 	=> $data['resdocument']
            );

			$this->db->where('id', $data['id-solicitud']);
			$this->db->update('sol_gastos', $data2); 



			if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}



		public function check_login($data){	
			$this->db->select('id, username, password, seudonimo, tweeter, level');
			$this->db->where('password', "'{$data['pass']}'", FALSE);
			$this->db->where('username', "'{$data['user']}'", FALSE);
			$this->db->where('active',1);
			$login = $this->db->get('usuarios');
			if ($login->num_rows() > 0)
			return $login->result();
			else return FALSE;
			$login->free_result();
		}

		public function get_lista_notas_admin($user, $level, $ini_pagina = 0){
	    	$this->db->select("id, title, description, featured_image, modify_date");
 		    if ($level != 1) {
 		    	$this->db->where('author', $user);
 		    }
 		    $this->db->order_by("modify_date", "desc");
 		    $this->db->limit(50, $ini_pagina);
	        $sql = $this->db->get("content");
	        return $sql->result_array();
	    }

	    public function get_lista_facturas_admin($user, $level, $ini_pagina = 0){
	    	$this->db->select("a.id,b.name AS legislatura, a.date AS fecha_factura, c.name AS tipo_gasto, d.name AS camara, e.name AS responsable, a.folio, a.date, a.amount, a.detail, a.emisor_rfc,a.emisor_alias, a.document, f.response_document AS solicitud");
	    	$this->db->from("gastos AS a");
			$this->db->join('legislaturas AS b',' a.id_legislatura = b.id ');
			$this->db->join('tipo_gastos AS c',' a.id_tipo = c.id ');
			$this->db->join('camaras AS d', 'a.id_camara = d.id ');
			$this->db->join('responsable_gastos AS e',' a.id_responsable = e.id ');
			$this->db->join('sol_gastos AS f', 'a.id_sol = f.id ');
			$this->db->order_by("a.date ", "desc");
	        $this->db->limit(50, $ini_pagina);
 		    $sql = $this->db->get();
	        return $sql->result_array();
	    }

		public function elimina_nota($id_nota){
			$this->db->where('id', $id_nota);
			$eliminado = $this->db->delete('content'); 
			echo $this->db->affected_rows();
		}
		public function elimina_factura($id_factura){
			$this->db->where('id', $id_factura);
			$eliminado = $this->db->delete('gastos'); 
			echo $this->db->affected_rows();
		}
		public function elimina_solicitud($id_solicitud){
			$this->db->where('id', $id_solicitud);
			$eliminado = $this->db->delete('sol_gastos'); 
			echo $this->db->affected_rows();
		}


		public function get_legislaturas(){	
			$this->db->select('id,name');
			$this->db->from("legislaturas");
			$this->db->where('active',1);
			$this->db->order_by("id", "desc");
			return $this->db->get()->result_array();
		}
		public function get_camaras(){	
			$this->db->select('id,name');
			$this->db->from("camaras");
			$this->db->where('active',1);
			return $this->db->get()->result_array();
		}
		public function get_responsables(){	
			$this->db->select('id,name');
			$this->db->from("responsable_gastos");
			$this->db->where('active',1);
			return $this->db->get()->result_array();
		}
		public function get_tipos(){	
			$this->db->select('id,name');
			$this->db->from("tipo_gastos");
			$this->db->where('active',1);
			return $this->db->get()->result_array();
		}
		public function get_lista_solicitudes_admin(){	
			$this->db->select('id,request_folio,request_document,response_folio,response_date,response_document,request_date');
			$this->db->from("sol_gastos");
			$this->db->order_by("id", "desc");
			$this->db->limit(20);
			return $this->db->get()->result_array();
		}


	    // Aun no se como voy a ctualizar en base al tiempo los archivos de cache necearios.:(
	    public function write_file_data($seccion = 'uno', $data_array){
	    	$data = $data_array;
			if ( ! write_file('./principal/'.$seccion.'.php', $data))
			{
			     echo 'No se pudo crear el archivo';
			     return FALSE;
			}
			else
			{
			     return TRUE;
			}
	    }
	} 
?>