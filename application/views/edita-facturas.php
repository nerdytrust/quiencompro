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
				<li>Facturas</li>
				<li>Notas</li>
				<li>Banners</li>
				<hr>
				<li>Usuarios</li>
			</ul>	

		</div>

		<div class="unit-70">
			<div class="unit-100">

				<ul class="btn-control-list">
					<li></li>
				</ul>
				
			</div>

			<div class="unit-100">

			 <?php
	            $attr = array('id'=>'id_form_edita_factura','name'=>'form_edita_factura','method'=>'POST','autocomplete'=>'off','role'=>'form');
	            echo form_open_multipart('admin/actualiza_factura', $attr);
	        ?>
				
				
                <fieldset>
				        <legend>Catalogos</legend>

                	<label>
				        Camara
				        <select name="camara" id="camara">
				        	<?php foreach ($catalogos['ct_camara'] as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>
				    <label>
				        Legislatura
				        <select name="legislatura" id="legislatura">
				        	<?php foreach ($catalogos['ct_legislatura'] as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>

				    <label>
				        Responsable
				        <select name="responsable" id="responsable">
				        	<?php foreach ($catalogos['ct_responsable'] as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>

				    <label>
				        Tipo de gasto
				        <select name="tipos" id="tipos">
				        	<?php foreach ($catalogos['ct_tipo'] as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>
				
				</fieldset>
				<?php if($data && $factura && is_array($data) )
					{
						$contenido_fact = $data[0];
					} else{
						redirect('admin/facturas');
					}?>

				<fieldset class="ffact">
				        <legend>Información de la factura</legend>

				    <label>
				    	Folio: 
				    	<input type="text" name="folio" value="<?php echo $contenido_fact['folio']; ?>">
				    </label>
				    <label>
				    	Fecha: 
				    	<input type="text" name="fecha" value="<?php echo $contenido_fact['date']; ?>">
				    </label>
				    <label>
				    	Monto: 
				    	<input type="text" name="monto" value="<?php echo $contenido_fact['amount']; ?>" >
				    </label>
				    <label>
				    	Descripción: 
				    	<input type="text" name="descripcion" value="<?php echo $contenido_fact['detail']; ?>" >
				    </label>
				    <label>
				    	Razón social de emisor: 
				    	<input type="text" name="razonsocial" value="<?php echo $contenido_fact['emisor_name']; ?>" >
				    </label>
				    <label>
				    	RFC del emisor: 
				    	<input type="text" name="rfc" value="<?php echo $contenido_fact['emisor_rfc']; ?>" >
				    </label>
				    <input type="hidden" id="id_factura" name="id_factura" value="<?php echo $factura; ?>">
				</fieldset>

				<fieldset>
				    	<label>
					    	Documento de la factura (pdf): 
					    	<input type="file" id="file" name="file" data-tools="upload" data-url="<?=base_url()?>admin/upload_pdf_factura">
					    	<input type="hidden" id="document" name="document" value="">
				    	</label>
				</fieldset>

				<fieldset class="ffact">
				        <legend>Complemento</legend>
						<label>
					    	Alias del emisor: 
					    	<input type="text" name="alias" value="<?php echo $contenido_fact['emisor_alias']; ?>" >
					    </label>
					    <label>
					    	Direccion 1: 
					    	<input type="text" name="direccion1" value="<?php echo $contenido_fact['emisor_address1']; ?>" >
					    </label>
					    <label>
					    	Direccion 2: 
					    	<input type="text" name="direccion2" value="<?php echo $contenido_fact['emisor_address2']; ?>" >
					    </label>
				</fieldset>

			    </br>
			        <input type="submit" class="btn" value="Enviar" />
			        
			        <a type="button" class="btn btn-small btn-outline" href="admin">Cancelar</a>

			    
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
    	$('.tools-droparea').css('background','#15B551');
    	$("#document").val(json.filelink);
    });
   

});
</script>