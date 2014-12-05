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
					<li><a type="button" class="btn btn" href="admin/nueva_factura">Nuevo</a></li>					
				</ul>
				
			</div>

			<div class="unit-100">

			<table class="table-hovered">


				<center><h2> FACTURAS INCOMPLETAS</h2></center>

				    <?php foreach ($data_incompleto as $data_factura) { ?>

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
				        	<a value="<?php echo base_url(); ?>admin/elimina_factura?id_factura=<?php echo $data_factura['id']; ?>" class="btn btn-red elimina-factura">
				        		Eliminar
				        	</a>
				        </td>
				    </tr>
				    <?php } ?>

				</table> 

				<table class="table-hovered">

				<center><h2> FACTURAS COMPLETAS</h2></center>
				    <?php foreach ($data_completo as $data_factura) { ?>

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
				        	<a value="<?php echo base_url(); ?>admin/elimina_factura?id_factura=<?php echo $data_factura['id']; ?>" class="btn btn-red elimina-factura">
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