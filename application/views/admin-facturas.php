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
					<li><a type="button" class="btn btn" href="admin/nueva_factura">Nuevo</a></li>					
				</ul>
				
			</div>

			<div class="unit-100">
				<table class="table-hovered">

				    <?php foreach ($data as $data_factura) { ?>

				    <tr>
				        <td>
				        	<?php echo $data_factura['id'];?> 
				        </td>
				        <td>
				        	<a style="cursor:pointer;" href="<?php echo base_url(); ?>admin/editar_factura?id_factura=<?php echo $data_factura['id']; ?>">
				        		<?php echo $data_factura['detail'];?><br>
				        		<span style="color:#A01599;"><?php echo $data_factura['emisor_alias'];?></span>
				        	</a>
				        </td>
				        <td>
				        	<?php echo substr($data_factura['date'],0,10);?>
				        </td>
				        <td>
				        	<a value="<?php echo base_url(); ?>admin/elimina_factura?id_factura=<?php echo $data_factura['id']; ?>" class="btn btn-red elimina-nota">
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