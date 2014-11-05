<div class="main">

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
					<li><a type="button" class="btn btn" href="admin/nueva_nota">Nuevo</a></li>
					<li><button class="btn btn">Editar</button></li>
					
					<li>
						<form action="">
						    <div>
						        <input type="text" name="go" placeholder="Búsqueda" />
						        <span class="btn-append">
						            <button class="btn">Ir</button>
						        </span>
						    </div>
						</form>
					</li>
				</ul>
				
			</div>
			<div class="unit-100">
				<table class="table-hovered">
				    <tr>
				        <td>Nota #1</td><td>Redacción</td><td>2014/05/01</td><td><a type="button" class="btn btn-red" href="admin/eliminar/1">Eliminar</a></td>
				    </tr>
				    <tr>
				        <td>Nota #2</td><td>Redacción</td><td>2014/05/01</td><td><a type="button" class="btn btn-red" href="admin/eliminar/2">Eliminar</a></td>
				    </tr>
				    <tr>
				        <td>Nota #3</td><td>Redacción</td><td>2014/05/01</td><td><a type="button" class="btn btn-red" href="admin/eliminar/3">Eliminar</a></td>
				    </tr>
				    <tr>
				        <td>Nota #4</td><td>Redacción</td><td>2014/05/01</td><td><a type="button" class="btn btn-red" href="admin/eliminar/4">Eliminar</a></td>
				    </tr>
				</table>

				<ul class="pagination">
					<li><a href="#">&larr;</a></li>
				    <li><a href="#">1</a></li>
				    <li><span>2</span></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">&rarr;</a></li>
				</ul>
			</div>

		</div>

	</div>


</div>