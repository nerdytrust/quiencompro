<div class="main">

	<div class="units-row first-main"  >
	    <div class="unit-100">
	    
	        <div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
	                    México D.F. a <?=strftime('%A %d de %B de %Y', time())?> 
	        </div>
	      
	    </div>
	</div>

	
	<div class="units-row">
	
		<div class="unit-30 admin_menu">
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
					<li><a type="button" class="btn btn" href="admin/nueva_nota">Nuevo</a></li>					
				</ul>
				
			</div>

			<div class="unit-100">
				<table class="table-hovered">
					<center><h2>NOTAS SIN PUBLICAR</h2></center>
				    	<?php foreach ($data_sinpublicar as $data_note) { ?>
						    <tr>
						        <td>
						        	<?php echo $data_note['id'];?> 
						        </td>
						        <td>
						        	<a style="cursor:pointer;" href="<?php echo base_url(); ?>admin/editar_nota?id_nota=<?php echo $data_note['id']; ?>">
						        		<?php echo $data_note['title'];?>
						        	</a>
						        </td>
						        <td>
						        	<?php echo $data_note['modify_date'];?>
						        </td>
						        <td>
						        	<a value="<?php echo base_url(); ?>admin/elimina_nota?id_nota=<?php echo $data_note['id']; ?>" class="btn btn-green elimina-nota">
						        		Habilitar
						        	</a>
						        	<a value="<?php echo base_url(); ?>admin/elimina_nota?id_nota=<?php echo $data_note['id']; ?>" class="btn btn-red elimina-nota">
				        				Eliminar
				        			</a>
						        	
						        </td>
						    </tr>
				    	<?php } ?>

				</table>
				<table class="table-hovered">
					<center><h2>NOTAS PUBLICADAS</h2></center>

				    <?php foreach ($data_publicada as $data_note) { ?>
				    <tr>
				        <td>
				        	<?php echo $data_note['id'];?> 
				        </td>
				        <td>
				        	<a style="cursor:pointer;" href="<?php echo base_url(); ?>admin/editar_nota?id_nota=<?php echo $data_note['id']; ?>">
				        		<?php echo $data_note['title'];?>
				        	</a>
				        </td>
				        <td>
				        	<?php echo $data_note['modify_date'];?>
				        </td>
				        <td>
				        	<a value="<?php echo base_url(); ?>admin/elimina_nota?id_nota=<?php echo $data_note['id']; ?>" class="btn btn-red elimina-nota">
				        		Deshabilitar 
				        	</a>
				        </td>
				    </tr>
				    <?php } ?>

				</table>

				<!--
				<ul class="pagination">
					<li><a href="#">&larr;</a></li>
				    <li><a href="#">1</a></li>
				    <li><span>2</span></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">&rarr;</a></li>
				</ul>
				-->
			</div>

		</div>

	</div>


</div>