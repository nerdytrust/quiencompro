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
	    	$this->db->select("id, author, title, description, content, modify_date, vip, featured, published, featured_image");
 		    $this->db->where('featured', 0);
 		    $this->db->where('published', 1);
 		    $this->db->order_by("modify_date", "desc");
 		    $this->db->limit(3);
	        $sql = $this->db->get("content");
	        return $sql->result_array();
	    }

	   	public function get_facturas_recientes(){
	    	$this->db->select("a.id,a.id_camara, a.modify_date, a.detail, a.amount, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b', 'a.id_camara = b.id ');
 		    $this->db->order_by("a.modify_date", "desc");
 		    $this->db->limit(6);
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
	    	$this->db->select("b.seudonimo, b.tweeter, a.title, a.description, a.alias, a.content, a.created_date");
	    	$this->db->from("content AS a");
			$this->db->join('usuarios AS b', 'a.author = b.id ');
 		    $this->db->where("published", 1);
 		    $this->db->where("a.id", $id_nota);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function get_detalle_factura($id_factura){
	    	$this->db->select("b.name AS legislatura, a.date AS fecha_factura, c.name AS tipo_gasto, d.name AS camara, e.name AS responsable, a.folio, a.date, a.amount, a.detail, a.emisor_rfc, a.document, f.response_document AS solicitud");
	    	$this->db->from("gastos AS a");
			$this->db->join('legislaturas AS b', 'a.id_legislatura = b.id ');
			$this->db->join('tipo_gastos AS c', 'a.id_tipo = c.id ');
			$this->db->join('camaras AS d', 'a.id_camara = d.id ');
			$this->db->join('responsable_gastos AS e', 'a.id_responsable = e.id ');
			$this->db->join('sol_gastos AS f', 'a.id_sol = f.id ');
 		    $this->db->where("published", 1);
 		    $this->db->where("a.id", $id_nota);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function get_lista_notas($ini_pagina){
	    	$this->db->select("id, title, description, featured_image");
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
	    	$this->db->select("b.name AS legislatura, a.date AS fecha_factura, c.name AS tipo_gasto, d.name AS camara, e.name AS responsable, a.folio, a.date, a.amount, a.detail, a.emisor_rfc, a.document, f.response_document AS solicitud");
	    	$this->db->from("gastos AS a");
			$this->db->join('legislaturas AS b',' a.id_legislatura = b.id ');
			$this->db->join('tipo_gastos AS c',' a.id_tipo = c.id ');
			$this->db->join('camaras AS d', 'a.id_camara = d.id ');
			$this->db->join('responsable_gastos AS e',' a.id_responsable = e.id ');
			$this->db->join('sol_gastos AS f', 'a.id_sol = f.id ');
 		    $this->db->limit(10, $ini_pagina);
	        return $sql->result_array();
	    }

	    public function get_total_facturas(){
	    	$this->db->select("COUNT(1) AS total_facturas, SUM(amount) AS monto_total");
	    	$this->db->from("gastos");
	        return $sql->result_array();
	    }

	    public function search($match=''){
	    	
			$result = array();
			$this->db->where("MATCH(detail,emisor_name,emisor_alias) AGAINST ('".$match."' IN BOOLEAN MODE) ", NULL, FALSE);
	        $query_invoice = $this->db->get('gastos');
	        
	        array_push($result, $query_invoice->result());
	        
	        $this->db->where("MATCH(title,description) AGAINST ('".$match."' IN BOOLEAN MODE) ", NULL, FALSE);
	        $query_content = $this->db->get('content');

	        array_push($result, $query_content->result());

	        return $result;

		}

	    //Salvar nueva nota
	    //Recibe un arrelo con los datos a insertardesde el form
		public function save_nueva_nota($data){
            //$this->db->set('author', ); //traer desde los datos de la ssesion del usuario
            $this->db->set('title', $data['title']);
            $this->db->set('description', $data['description']);
            $this->db->set('alias', $data['alias']);
            $this->db->set('content', $data['content']);
            $this->db->set('created_date', time());
            $this->db->set('modify_date', time());
            $this->db->set('vip', $data['vip']);
            $this->db->set('featured', $data['featured']);
            $this->db->set('featured_image', $data['featured_image']);
            $this->db->set('published', $data['published']);
            $this->db->set('tags', $data['tags']);
            $this->db->insert('content');
            if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}	

		public function check_login($data){	
			$this->db->select('username, password, seudonimo, tweeter, level');
			$this->db->where('password', "'{$data['pass']}'", FALSE);
			$this->db->where('username', "'{$data['user']}'", FALSE);
			$this->db->where('active',1);
			$login = $this->db->get('usuarios');
			if ($login->num_rows() > 0)
			return $login->result();
			else return FALSE;
			$login->free_result();
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