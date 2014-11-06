<link rel="stylesheet" href="<?=base_url();?>js/redactor/redactor.css" />
<script src="<?=base_url();?>js/redactor/redactor.js"></script>
<div class="main" id="main">
	<div class="units-row first-main"  >
		<div class="unit-100">
			
			<div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
				México D.F. a <?=strftime('%A %d de %B de %Y', time())?>
			</div>
			
			<div style="display: inline-block;padding-top: 1px;">
				<form action="<?=base_url()?>busqueda">
					<input type="text" name="txt" class="input-on-black"  placeholder="Criterio de Búsqueda" />
					<span class="btn-append">
					<button class="btn btn-white btn-outline" style="margin-right:5px;">Buscar</button>
					</span>
					<form>
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
					<?php if($data && is_array($data) )
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
							
							<label>
								Name
								<input type="text" name="title-note" class="width-50" value="<?php echo $contenido_nota['title']; ?>" />
							</label>
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
						    	<input type="file" name="feat-img-note" value="<?php echo $contenido_nota['featured_image']; ?>">
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
			imageUpload:'',
			fileUpload:'',
			minHeight: 500,
			toolbarFixed: true,
			toolbarFixedTopOffset: 80,
		}
		);
		});
		</script>