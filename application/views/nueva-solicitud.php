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
				
			</div>

			<div class="unit-100">

				 <?php
                    $attr = array('id'=>'id_form_nueva_solicitud','name'=>'form_nueva_solicitud','method'=>'POST','autocomplete'=>'off','role'=>'form');
                    echo form_open_multipart('admin/guarda_solicitud', $attr);
                ?>
				
				
				<fieldset class="ffact">
				        <legend>Información de la solicitud</legend>

				    <label>
				    	Folio de la solicitud: 
				    	<input type="text" name="requestfolio" value="">
				    </label>
				    <label>
				    	Folio de la respuesta: 
				    	<input type="text" name="responsefolio" value="" >
				    </label>
				    <label>
				    	Fecha de solicitud: 
				    	<input type="text" name="soldate" value="" placeholder="YYYY-MM-DD">
				    </label>
				    <label>
				    	Fecha de respuesta:  
				    	<input type="text" name="resdate" value="" placeholder="YYYY-MM-DD">
				    </label>
				   

				</fieldset>


				<fieldset>
				    	<label>
					    	Documento de la solicitud (pdf): 
					    	<input type="file" id="file1" name="file1" data-tools="upload" data-url="<?=base_url()?>admin/upload_pdf_factura">
					    	<input type="hidden" id="soldocument" name="soldocument" value="">
				    	</label>
				</fieldset>

				<fieldset>
				    	<label>
					    	Documento de la respuesta (pdf): 
					    	<input type="file" id="file2" name="file2" data-tools="upload" data-url="<?=base_url()?>admin/upload_pdf_factura">
					    	<input type="hidden" id="resdocument" name="resdocument" value="">
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

    $('#file1').on('success.tools.upload', function(json)
    {
    	$('.tools-droparea')[0].style.background="#15B551";
    	$("#soldocument").val(json.filelink);
    });
    $('#file2').on('success.tools.upload', function(json)
    {
    	$('.tools-droparea')[1].style.background="#15B551";
    	$("#resdocument").val(json.filelink);
    });
   

});
</script>