<div class="main">
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
			
			<div class="unit-100">
				<div class="large-8 columns large-centered" style="padding-left:2em;">
					<br>
					<h1 class="title">Detalle de la compra</h1>
					<hr>
					<span>
					<br>
					<span style="font-size:6em;">LXII</span>
					Legislatura<br>
					</span>
					<br/>
					Se presenta la información del gasto reportado el <span>05-06-2014</span>
				</div>
			</div>
			<hr>
			<div class="units-row">
				<div class="unit-centered unit-70">
					
					<div class="unit-centered unit-50">
						<h3>Gastos de alimentos</h3>
					</div>
					<br>
					<form class="forms">
						<div class="unit-50">
							<label>Camara
								<input readonly="readonly" type="text" class="width-90" value="Diputados">
							</label>
							<label>Responsable del gasto
								<input readonly="readonly" type="text" class="width-90" value="Comisiones Especiales">
							</label>
							<label>Folio
								<input readonly="readonly" type="text" class="width-90" value="">
							</label>
							<label>Fecha
								<input readonly="readonly" type="text"  class="width-90" value="">
							</label>
							<label>Monto
								<input readonly="readonly" type="text"  class="width-90" value="">
							</label>
						</div>
						<div class="unit-50">
							<label>Descripción
								<input readonly="readonly" type="text"  class="width-90" value="">
							</label>
							<label>Razón social de emisor
								<input readonly="readonly" type="text"  class="width-90" value="">
							</label>
							<label>Documento de la factura
								<div>
									<input readonly="readonly" type="text"  class="width-90" value="">
								</div>
								<div>
									<a href="" target="_blank" class="button postfix">Descargar</a>
								</div>
							</label>
						</div>
						
					</form>
				</div>
			</div>
		</div>