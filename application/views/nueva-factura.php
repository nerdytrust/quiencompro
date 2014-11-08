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
				<li><a href="<?=base_url()?>admin/solicitudes">Solicitudes</a></li>
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
				
			</div>

			<div class="unit-100">

				 <?php
                    $attr = array('id'=>'id_form_nueva_factura','name'=>'form_nueva_factura','method'=>'POST','autocomplete'=>'off','role'=>'form');
                    echo form_open_multipart('admin/guarda_factura', $attr);
                ?>
				
				
                <fieldset>
				        <legend>Catalogos</legend>


				    <label>
				        Solicitud
				        <select name="solicitud" id="solicitud">
				        	<?php foreach ($ct_solicitud as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['request_folio']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>

                	<label>
				        Camara
				        <select name="camara" id="camara">
				        	<?php foreach ($ct_camara as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>
				    <label>
				        Legislatura
				        <select name="legislatura" id="legislatura">
				        	<?php foreach ($ct_legislatura as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>

				    <label>
				        Responsable
				        <select name="responsable" id="responsable">
				        	<?php foreach ($ct_responsable as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>

				    <label>
				        Tipo de gasto
				        <select name="tipos" id="tipos">
				        	<?php foreach ($ct_tipo as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['name']?></option>
				        	<?php endforeach ?>
				        </select>
				    </label>
				
				</fieldset>


				<fieldset class="ffact">
				        <legend>Información de la factura</legend>

				    <label>
				    	Folio: 
				    	<input type="text" name="folio" value="">
				    </label>
				    <label>
				    	Fecha: 
				    	<input type="text" name="fecha" value="" placeholder="YYYY-MM-DD">
				    </label>
				    <label>
				    	Monto: 
				    	<input type="text" name="monto" value="" placeholder="Cantidades sin ','">
				    </label>
				    <label>
				    	Descripción: 
				    	<input type="text" name="descripcion" value="" >
				    </label>
				    <label>
				    	Razón social de emisor: 
				    	<input type="text" name="razonsocial" value="" >
				    </label>
				    <label>
				    	RFC del emisor: 
				    	<input type="text" name="rfc" value="" >
				    </label>

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
					    	<input type="text" name="alias" value="" >
					    </label>
					    <label>
					    	Direccion 1: 
					    	<input type="text" name="direccion1" value="" >
					    </label>
					    <label>
					    	Direccion 2: 
					    	<input type="text" name="direccion2" value="" >
					    </label>
				</fieldset>

			    </br>
			        <input id="envia_factura_nueva" type="submit" class="btn" value="Enviar" />
			        
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
    $('#file').on('success.tools.upload', function(json)
    {
    	$('.tools-droparea').css('background','#15B551');
    	$("#document").val(json.filelink);
    });
   

});
</script>