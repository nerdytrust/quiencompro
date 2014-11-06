<link rel="stylesheet" href="<?=base_url();?>js/redactor/redactor.css" />
<script src="<?=base_url();?>js/redactor/redactor.js"></script>

<div class="main" id="main">

	<div class="units-row first-main"  >
	    <div class="unit-100">
	    
	        <div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
	                    México D.F. a <?=strftime('%A %d de %B de %Y', time())?> 
	        </div>
	      
	        <div style="display: inline-block;padding-top: 1px;">    
	                <input type="text" name="go" class="input-on-black"  placeholder="Búsqueda" />
	                <span class="btn-append">
	                    <button class="btn btn-white btn-outline" style="margin-right:5px;">Go</button>
	                </span>
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
                    $attr = array('id'=>'id_form_nueva_nota','name'=>'form_nueva_nota','method'=>'POST','autocomplete'=>'off','role'=>'form');
                    echo form_open_multipart('admin/guarda_nota', $attr);
                ?>
				    <label>
				        Name
				        <input type="text" name="title-note" class="width-50" />
				    </label>
				    <fieldset>
				        <legend>Meta data</legend>
				            Tags
				            <input type="text" name="tags-note" class="width-100" />
				        <label>
				            Descripción
				            <textarea name="desc-note" id="" cols="30" rows="3">
				            </textarea>
				        </label>
				    </fieldset>
				    <fieldset>
				        <legend>Contenido</legend>
				        <label>
				            <textarea name="content-note" id="content">				            	
				            </textarea>
				        </label>
				    </fieldset>
				    <fieldset>
				    	<label>
					    	Imagen destacada: 
					    	<input type="file" name="file" data-tools="upload" data-url="<?=base_url()?>admin/upload_image_content">
				    	</label>
				    </fieldset>
				    <label>
				    	Nota destacada: 
				    	<input type="checkbox" name="feat-note" value="1">
				    </label>
				    <label>
				    	Publicar:
				    	<input type="checkbox" name="published-note" value="1">
				    </label>
				    <label>
				    	Nota VIP: 
				    	<input type="checkbox" name="vip-note" value="1">
				    </label>
				    
				    <p>
				    </br>
				        <input id="envia_nota_nueva" type="submit" class="btn" value="Enviar" />
				        
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
});
</script>