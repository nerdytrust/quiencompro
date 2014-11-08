<link rel="stylesheet" href="<?=base_url();?>js/redactor/redactor.css" />
<script src="<?=base_url();?>js/redactor/redactor.js"></script>
<div class="main" id="main">
	<div class="units-row first-main"  >
		<div class="unit-100">
			
			<div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
				México D.F. a <?=strftime('%A %d de %B de %Y', time())?>
			</div>
			
			
		</div>
	</div>
			
			<div class="units-row">
				
				<div class="unit-30">
					&nbsp;Opciones del Sistema
					<ul>
						<li><a href="<?=base_url()?>admin/facturas">Facturas</a></li>
						<li>Solicitudes</li>
						<li><a href="<?=base_url()?>admin">Notas</a></li>
						<hr>
						<li>Banners</li>
						<li>Usuarios</li>
					</ul>
				</div>
				<div class="unit-70">
					<div class="unit-100">
						<ul class="btn-control-list">
							<li></li>
						</ul>

					<?php if($data && $nota && is_array($data) )
					{
						$contenido_solicitud = $data[0];
					} else{
						$contenido_solicitud= "";
						echo '<span style="color:red;">Error al traer la información de la Nota o la nota referida no existe.</span>';
						redirect('admin');
					}?>
						
					</div>
					<?php if($data && $nota && is_array($data) )
					{
						$contenido_nota = $data[0];
					} else{
						$contenido_nota= "";
						echo '<span style="color:red;">Error al traer la información de la Nota o la nota referida no existe.</span>';
						redirect('admin');
					}?>

					<div class="unit-100">
						<?php
		                    $attr = array('id'=>'id_form_edita_solicitud','name'=>'form_edita_solicitud','method'=>'POST','autocomplete'=>'off','role'=>'form');
		                    echo form_open_multipart('admin/actualiza_solicitud', $attr);
	                	?>
							
							<fieldset class="ffact">
						        <legend>Información de la solicitud</legend>
							<input type="hidden" name="id-solicitud" value="<?=$contenido_solicitud['id']?>">
						    <label>
						    	Folio de la solicitud: 
						    	<input type="text" name="requestfolio" value="<?=$contenido_solicitud['request_folio']?>">
						    </label>
						    <label>
						    	Folio de la respuesta: 
						    	<input type="text" name="responsefolio" value="<?=$contenido_solicitud['response_folio']?>">
						    </label>
						    <label>
						    	Fecha de solicitud: 
						    	<input type="text" name="soldate" value="<?=substr($contenido_solicitud['request_date'],0,10)?>" placeholder="YYYY-MM-DD">
						    </label>
						    <label>
						    	Fecha de respuesta:  
						    	<input type="text" name="resdate" value="<?=substr($contenido_solicitud['response_date'],0,10)?>" placeholder="YYYY-MM-DD">
						    </label>
						   

						</fieldset>


						<fieldset>
						    	<label>
							    	Documento de la solicitud (pdf): 
							    	<input type="file" id="file1" name="file1" data-tools="upload" data-url="<?=base_url()?>admin/upload_pdf_factura">
							    	<input type="text" readonly="readonly" id="soldocument" name="soldocument" value="<?=$contenido_solicitud['request_document']?>">
						    	</label>
						</fieldset>

						<fieldset>
						    	<label>
							    	Documento de la respuesta (pdf): 
							    	<input type="file" id="file2" name="file2" data-tools="upload" data-url="<?=base_url()?>admin/upload_pdf_factura">
							    	<input type="text" readonly="readonly" id="resdocument" name="resdocument" value="<?=$contenido_solicitud['response_document']?>">
						    	</label>
						</fieldset>


					    </br>
					        <input id="envia_solicitud_nueva" type="submit" class="btn" value="Enviar" />
					        
					        <a type="button" class="btn btn-small btn-outline" href="admin">Cancelar</a>

					    </p>
						<?php echo form_close(); ?>
						
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
$(function()
{
    $('#content').redactor(
    {
    	imageUpload:'<?=base_url()?>admin/upload_image_content',
    	minHeight: 500,
    	toolbarFixed: true,
    	toolbarFixedTopOffset: 80,
    	focus: true,
        buttonSource: true

    });

    $('#file').on('success.tools.upload', function(json)
    {
    	$("#featured_image").val(json.filelink);
    	$("#f_image").attr("src",json.filelink);
    });

});
</script>