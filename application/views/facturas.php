<div class="main">
	<div class="units-row first-main"  >
		<div class="unit-100">
			
			<div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
				México D.F. a <?=strftime('%A %d de %B de %Y', time())?>
			</div>
			
			<div style="display: inline-block;padding-top: 1px;">
				<form action="<?=base_url()?>busqueda">
					<input type="text" name="txt" class="input-on-black buscador"  placeholder="Criterio de Búsqueda" />
					<span class="btn-append">
					<button class="btn btn-white btn-outline" style="margin-right:5px;">Buscar</button>
					</span>
				</form>
			</div>
		</div>
	</div>
<div>
				
				<h2><span>Lista de Facturas:</span></h2>
			</div>
			<div class="units-row">
				<!-- Columna Izquierda -->
				<div class="unit-100">
					<span class="bignumber-1"><?=$total_facturas?></span>
					<h3>Registros de FACTURAS</h3>
					<br><h3 style="padding-left:5px;color:forestgreen;"><?=money_format('%i',$monto_facturas )?></h3>
					<hr>
					<ul class="lista-3">

					<div id="container" data-tools="infinity-scroll" data-url="<?=base_url()?>facturas/infinity">

						<?php foreach ($lista_facturas as $key => $value): ?>
						<li><a href="<?=base_url()?>facturas/detallefactura/<?=$value['id']?>">
							<div>
								<div class="unit-100">
									
									<img src="<?=$value['image']?>" width="80" alt="Tipo de gasto">
									<h3 style="padding:1em;"><?=$value['detail']?></h3>
							
									<div class="units-row">
										
										<div class="unit-40">
											<ul class="lista-4" >
												<li><span> Camara:</span> <?=$value['camara']?></li>
												<li><span> Legislatura:</span> <?=$value['legislatura']?></li>
											</ul>
											
										</div>

										<div class="unit-30">
											<ul class="lista-4">
												<li><span><?=$value['responsable']?></span></li>
												<li><span> Monto:</span> <?=money_format('%i',$value['amount'])?></li>
											</ul>
											
										</div>

										<div class="unit-30">
											<ul class="lista-4">
												<li><span> Fecha:</span> <?=$value['date']?></li>
												<li><span><?=$value['emisor_alias']?></span></li>												
											</ul>
										</div>


									</div>
								</div>
							</div>
						</a>
					</li>

					<?php endforeach ?>

					</div>

				</ul>
			</div>
			
		</div>
		
	</div>