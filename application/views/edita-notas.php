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
				<li><a href="<?=base_url()?>admin/solicitudes">Solicitudes</a></li>
				<li>Notas</li>
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
		                    $attr = array('id'=>'id_form_edita_nota','name'=>'form_edita_nota','method'=>'POST','autocomplete'=>'off','role'=>'form');
		                    echo form_open_multipart('admin/actualiza_nota', $attr);
	                	?>
	                	
						 <fieldset>	
					        <legend> Autor </legend>
					  		  <select name="usuarios">    
								<option value="Select" selected="selected">Seleccione</option>
								<option value="Israel">Israel Piña</option>
							    <option value="Elideth">Elidet Soto</option>
						        <option value="Isaac">Isaac Caporal</option>
						        <option value="Miriam">Miriam Vizcarra</option>
							    <option value="Lazaro">Lazaro Gonzalez</option>
							  </select>				
						</fieldset>

						    <fieldset>
						          <legend> Titulo </legend>
								  <input type="text" name="title-note" class="width-50" value="<?php echo $contenido_nota['title']; ?>" />
					        </fieldset>

							<fieldset>
								<legend>Meta data</legend>
								Tags
								<input type="text" name="tags-note" class="width-100" value="<?php echo $contenido_nota['tags']; ?>"  />
								<label>
									Descripción
									<textarea name="desc-note" id="" cols="30" rows="3"><?php echo $contenido_nota['description']; ?>
									</textarea>
								</label>
							</fieldset>
							<fieldset>
								<legend>Contenido</legend>
								<label>
									<textarea name="content-note" id="content"><?php echo $contenido_nota['content']; ?>
									</textarea>
								</label>
							</fieldset>

							<fieldset>
						    	<label>
							    	Imagen destacada: 
							    	<input type="file" id="file" name="file" data-tools="upload" data-url="<?=base_url()?>admin/upload_image_content">
							    	<input type="hidden" id="featured_image" name="feat-img-note" value="<?=($contenido_nota['featured_image']=='')?'images/1x1.png':$contenido_nota['featured_image']?>">
						    	</label>
						    	<img id="f_image" src="<?=($contenido_nota['featured_image']=='')?'images/1x1.png':$contenido_nota['featured_image']?>" alt="featured image">
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
						    	<input type="hidden" name="id-note" value="<?php echo $nota; ?>" />
							<p>
							</br>
						        <input id="envia_nota_edita" type="submit" class="btn" value="Enviar" />
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