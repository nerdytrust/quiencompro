<?php if(! defined('BASEPATH')) exit('No tienes permiso para acceder a este archivo');

	class Quien_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database("default");
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
	    	$this->db->select("a.id_camara, a.modify_date, a.detail, a.amount, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b, a.id_camara = b.id ');
 		    $this->db->order_by("a.modify_date", "desc");
 		    $this->db->limit(5);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }

	    public function get_facturas_monto(){
	    	$this->db->select("a.id_camara, a.modify_date, a.detail, a.amount, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b, a.id_camara = b.id ');
 		    $this->db->order_by("a.amount", "desc");
 		    $this->db->limit(5);
	        $sql = $this->db->get();
	        return $sql->result_array();
	    }
	    
	    // proveedores más beneficiados
	   	public function get_facturas_beneficiados(){ 
	    	$this->db->select("a.id_camara, a.emisor_name, SUM(a.amount) AS total, a.emisor_rfc, b.name");
 		    $this->db->from("gastos AS a");
			$this->db->join('camaras AS b, a.id_camara = b.id ');
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

	    

		public function check_login($data){
			$tabla1 =$this->db->dbprefix('usuarios_admin');
			$tabla2= $this->db->dbprefix('perfiles');
			
			$this->db->select('usuario, pass, tipo, jurado, '.$tabla2.'.id_perfil,'.$tabla2.'.perfil,'.$tabla2.'.operacion');
			$this->db->from($tabla1);
			$this->db->join($tabla2, $tabla1.'.id_perfil = '.$tabla2.'.id_perfil');
			$this->db->where('pass', "AES_ENCRYPT('{$data['pass']}','{$this->key_hash}')", FALSE);
			$this->db->where('usuario', "'{$data['user']}'", FALSE);
			$login = $this->db->get();
			if ($login->num_rows() > 0)
			return $login->result();
			else return FALSE;
			$login->free_result();
		}

		public function eliminar_registro($data,$tabla){
			$eliminar = 1;
			$datos_act = array(
               'eliminado' => $eliminar
            );

			$this->db->where('folio', $data);
			$this->db->update($this->db->dbprefix('postulado_'.$tabla), $datos_act); 
			if ($this->db->affected_rows() > 0){
				return TRUE;
			}
        	else{
        		return FALSE;
        	} 
			
		}

		public function checar_registro($folio,$tabla,$checado){
			$datos_act = array(
               'finalista' => $checado
            );
			$this->db->where('folio', $folio);
			$this->db->update($this->db->dbprefix('postulado_'.$tabla), $datos_act); 
			if ($this->db->affected_rows() > 0){
				return TRUE;
			}
        	else{
        		return FALSE;
        	} 
			
		}
		
		public function vota_registro($folio,$tabla,$checado){

 		$vota= $this->session->userdata('jurado').',';	

		if ($checado==1) {
			  $this->db->set("vota", "CONCAT(vota,'$vota')",FALSE);
         } else {
              $this->db->set("vota","REPLACE(vota, '$vota', '')",FALSE);
		}


			$this->db->where('folio', $folio);
			$this->db->update($this->db->dbprefix('postulado_'.$tabla)); 
			
			if ($this->db->affected_rows() > 0){
				return TRUE;
			}
        	else{
        		return FALSE;
        	} 
			
		}
		

		public function coger_registro_unico($folio=FALSE,$tabla)	{
		if ($folio === FALSE)	{ 
				$query = $this->db->get($this->db->dbprefix($tabla));
				return $query->result_array();
		   }	
			    
			    if ($tabla=='postulado_alumnos') {
	  			    $this->db->select('categoria_participacion,folio, motivos_postulacion, difusion_convocatoria,otro_modo_convocatoria AS otro_modo,carrera_nominado, ocupacion_nominado, cv_nominado, descripcion_participacion_proyectos AS descripcion_participacion_nominado , cualidades_nominado, impacto_trabajos AS  impacto_trabajos_nominado');
  			    } else if ($tabla=='postulado_egresados') {
	  			    $this->db->select('folio, motivos_postulacion, difusion_convocatoria,otro_modo_convocatoria AS otro_modo,carrera_nominado, ocupacion_nominado, cv_nominado,  descripcion_participacion_proyectos AS descripcion_participacion_nominado , cualidades_nominado, impacto_trabajos AS  impacto_trabajos_nominado');
  			    } else {
			    	$this->db->select('*');
  			    }

				$this->db->select("DATE_FORMAT(FROM_UNIXTIME(fecha),GET_FORMAT(DATE,'EUR')) AS Fecha", FALSE);
				$this->db->select("AES_DECRYPT(nombre_nominador,'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5') AS nombre_nominador", FALSE);
				$this->db->select("AES_DECRYPT(email_nominador,'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5') AS email_nominador", FALSE);
				$this->db->select("AES_DECRYPT(nombre_nominado,'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5') AS nombre_nominado", FALSE);
				$this->db->select("AES_DECRYPT(email_nominado,'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5') AS email_nominado", FALSE);
				$this->db->select("AES_DECRYPT(telefono_nominado,'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5') AS telefono_nominado", FALSE);
				$this->db->select("AES_DECRYPT(domicilio_nominado,'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5') AS domicilio_nominado", FALSE);
				$query = $this->db->get_where($this->db->dbprefix($tabla), array('folio' => $folio));		
				return $query->row_array();
	    }
		
		public function archivo_registro_unico($unico, $folio,$tabla)	{

		  	if ($unico === FALSE)	{ 
				$query = $this->db->get_where($this->db->dbprefix($tabla), array('folio' => $folio));		
				return $query->result_array();
		   	} else {
				$query = $this->db->get_where($this->db->dbprefix($tabla), array('folio' => $folio));		
				return $query->row_array();
			}	
	    }

		public function total_archivos($folio,$tabla){
			$this->db->where('folio', $folio);
            $total = $this->db->count_all_results($this->db->dbprefix('archivos_'.$tabla));
            return $total;
		}

		public function guardar_archivo($data,$tabla){

			if ($this->total_archivos($data['folio'],$tabla)<1) { 
				$this->db->set('uid', 'UUID()', FALSE);
	            $this->db->set('folio', $data['folio']);
	            $this->db->set('fecha', 'UNIX_TIMESTAMP(NOW())', FALSE);
	            $this->db->set('archivo', $data['archivo_nominado']['file_name']);
	            $this->db->insert($this->db->dbprefix('archivos_'.$tabla));
	            
	            if ($this->db->affected_rows() > 0) return TRUE;
				else return FALSE;
				
			} else 
			{

	            $this->db->set('folio', $data['folio']);
	            $this->db->set('fecha', 'UNIX_TIMESTAMP(NOW())', FALSE);
	            $this->db->set('archivo', $data['archivo_nominado']['file_name']);
	            $this->db->where('folio', $data['folio']);
	            $this->db->update($this->db->dbprefix('archivos_'.$tabla));
	            
	            if ($this->db->affected_rows() > 0) return TRUE;
				else return FALSE;
				
			}

		}

		public function guardar_postulado($data,$tabla){
            	$this->db->set('nombre_nominador', "AES_ENCRYPT('{$data['nombre_nominador']}','{$this->key_hash}')", FALSE);
			
       		if (isset($data['categoria_participacion'])) { 
	            $this->db->set('categoria_participacion', $data['categoria_participacion']);

       		}	
       		
            $this->db->set('motivos_postulacion', $data['motivos_postulacion']);

            $this->db->set('difusion_convocatoria', $data['difusion_convocatoria']);
            $this->db->set('otro_modo_convocatoria', $data['otro_modo']);
            $this->db->set('nombre_nominado', "AES_ENCRYPT('{$data['nombre_nominado']}','{$this->key_hash}')", FALSE);
            $this->db->set('email_nominado', "AES_ENCRYPT('{$data['email_nominado']}','{$this->key_hash}')", FALSE);
            $this->db->set('telefono_nominado', "AES_ENCRYPT('{$data['telefono_nominado']}','{$this->key_hash}')", FALSE);
            $this->db->set('domicilio_nominado', "AES_ENCRYPT('{$data['domicilio_nominado']}','{$this->key_hash}')", FALSE);
            $this->db->set('carrera_nominado', $data['carrera_nominado']);
            $this->db->set('ocupacion_nominado', $data['ocupacion_nominado']);
            $this->db->set('cv_nominado', $data['cv_nominado']);
            $this->db->set('descripcion_participacion_proyectos', $data['descripcion_participacion_nominado']);
            $this->db->set('cualidades_nominado', $data['cualidades_nominado']);
            $this->db->set('impacto_trabajos', $data['impacto_trabajos_nominado']);

            $this->db->set('fecha', 'UNIX_TIMESTAMP(NOW())', FALSE);
			$this->db->set('uid', 'UUID()', FALSE);
            $this->db->set('folio', $data['folio']);
            $this->db->set('ip', $data['ip']);
            $this->db->set('navegador', $data['navegador']);

            $this->db->insert($this->db->dbprefix('postulado_'.$tabla));

            if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}		




		public function guardar_proyecto($data,$tabla){
			$this->db->set('uid', 'UUID()', FALSE);
            $this->db->set('folio', $data['folio']);
            $this->db->set('fecha', 'UNIX_TIMESTAMP(NOW())', FALSE);
            $this->db->set('nombre_proyecto', $data['nombre_proyecto']);
            $this->db->set('lugar_proyecto', $data['lugar_proyecto']);
            $this->db->set('fecha_proyecto', $data['fecha_duracion_proyecto']);
            $this->db->set('mision_general_proyecto', $data['mision_objetivo_proyecto']);
            $this->db->set('actividades_servicios_proyecto', $data['actividades_servicios_proyecto']);
            if (isset($data['actividades_especificas_proyecto'])) { 
	            $this->db->set('actividades_especificas_proyecto', $data['actividades_especificas_proyecto']);
            }	
            $this->db->set('zona_geografica_proyecto', $data['zona_geografica_proyecto']);
            $this->db->set('poblacion_beneficiada_proyecto', $data['poblacion_beneficiada_proyecto']);
            $this->db->set('resultados_obtenidos_proyecto', $data['resultados_obtenidos_proyecto']);
            $this->db->set('financiamiento_proyecto', $data['financiamiento_proyecto']);
            $this->db->set('estructura_operativa_proyecto', $data['estructura_proyecto']);
            $this->db->set('costos_servicios_proyecto', $data['costos_servicios_proyecto']);
            $this->db->insert($this->db->dbprefix('proyectos_'.$tabla));
            if ($this->db->affected_rows() > 0) return TRUE;
			else return FALSE;
		}	


	} 

		
?>