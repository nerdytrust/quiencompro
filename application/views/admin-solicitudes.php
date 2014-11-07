<div class="main">

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
					<li><a type="button" class="btn btn" href="admin/nueva_solicitud">Nuevo</a></li>					
				</ul>
				
			</div>

			<div class="unit-100">
				<table class="table-hovered">

				    <?php foreach ($data as $data_solicitud) { ?>

				    <tr>
				        <td>
				        	<?php echo $data_solicitud['id'];?> 
				        </td>
				        <td>
				        	<a style="cursor:pointer;" href="<?php echo base_url(); ?>admin/editar_solicitud?id_solicitud=<?php echo $data_solicitud['id']; ?>">
				        		<span style="color:#A01599;"><?php echo $data_solicitud['request_folio'];?></span>
				        	</a>
				        </td>
				        <td>
				        	<?php echo $data_solicitud['request_document'];?>
				        </td>
				        <td>
				        	<a value="<?php echo base_url(); ?>admin/elimina_solicitud?id_solicitud=<?php echo $data_solicitud['id']; ?>" class="btn btn-red elimina-solicitud">
				        		Eliminar
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