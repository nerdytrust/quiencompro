<div class="main">
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	<div class="units-row first-main"  >
		<div class="unit-100">
			
			<div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
				México D.F. a <?=strftime('%A %d de %B de %Y', time())?>
			</div>
			
			<div style="display: inline-block;padding-top: 3px;">
				<form action="<?=base_url()?>busqueda">
					<input type="text" name="txt" class="input-on-black buscador"  placeholder="Criterio de Búsqueda" />
					<span class="btn-append">
						<button class="btn btn-white btn-outline" style="margin-right:5px;">Buscar</button>
					</span>
				</form>
			</div>
		</div>
	</div>
			<?php $factura = $factura[0];?>
			<div class="unit-100">
				<div class="large-8 columns large-centered" style="padding-left:2em;">
					<br>
					<h1 class="title">Detalle de la compra</h1>
					<hr>
						<span>
							<br>
								<span style="font-size:6em;"><?=$factura['legislatura']?>
								</span>
								Legislatura
							<br/>
						</span>
					<br/>
					Se presenta la información del gasto reportado el <span><?=substr($factura['fecha_factura'],0,10)?></span>
				</div>
			</div>
			<hr>

			<div class="units-row">
				<div class="unit-centered unit-70">
					
					<div class="unit-centered unit-45">
						<img src="<?=$factura['image']?>" width="80" alt="Tipo de gasto">
						<h3><?=$factura['tipo_gasto']?></h3>
					</div>
					<br>
					<form class="forms">
						<div class="unit-40">
							<label>Camara
								<input readonly="readonly" type="text" class="width-90" value="<?=$factura['camara']?>">
							</label>
							<label>Responsable del gasto
								<input readonly="readonly" type="text" class="width-90" value="<?=$factura['responsable']?>">
							</label>
							<label>Folio
								<input readonly="readonly" type="text" class="width-90" value="<?=$factura['folio']?>">
							</label>
							<label>Fecha
								<input readonly="readonly" type="text"  class="width-90" value="<?=substr($factura['date'],0,10)?>">
							</label>
							<label>Monto
								<input readonly="readonly" type="text"  class="width-90" value="<?=money_format('%i',$factura['amount'])?>">
							</label>
						</div>
						<div class="unit-40">
							<label>Descripción
								<input readonly="readonly" type="text"  class="width-90" value="<?=$factura['detail']?>">
							</label>
							<label>Razón social de emisor
								<input readonly="readonly" type="text"  class="width-90" value="<?=$factura['emisor_alias']?>">
							</label>
							<label>RFC del emisor
								<input readonly="readonly" type="text"  class="width-90" value="<?=$factura['emisor_rfc']?>">
							</label>
							<label>Documento de la factura
								
									<input readonly="readonly" type="text"  class="width-90" value="<?=$factura['document']?>">
							</label>

							<div style="text-align:center; width:90%;">
								<br/>
								<a href="<?=base_url()?>invoices/<?=$factura['document']?>.pdf" target="_blank" class="button postfix" style="font-weight:bold;font-size:2em">Descargar</a>
							</div>
					
						</div>
						
					</form>
				</div>
			</div>

	<br>
	<br>
	<br>
	<center>
		<div class="fb-comments" data-href="<?=base_url()?>facturas/detallefactura/<?=$factura['id']?>" data-numposts="5" data-colorscheme="light"></div>		
	</center>
	<br>
	<br>
	<br>
</div>