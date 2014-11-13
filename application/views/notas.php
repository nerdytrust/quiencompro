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
					<form>
					</div>
				</div>
			</div>
			<div>
				
				<span><h2>Lista de Notas:</h2></span>
			</div>
			<div class="units-row">
				<!-- Columna Izquierda -->
				<div class="unit-100">
					<span class="bignumber-1"><?=$total_notas?></span>
					<h3>Registros en NOTAS</h3>
					<hr>
					<ul class="lista-3">
						
					<div id="container" data-tools="infinity-scroll" data-url="<?=base_url()?>notas/infinity">

						<?php foreach ($lista_notas as $key => $value): ?>
							<li>
							<div class="units-row">
									<div>
										<div class="unit-60">
										<a href="<?=base_url()?>detallenota?nota=<?=$value['id']?>">
											<h3><?=$value['title']?></h3><br>
										</a>
												<!--
												<div style="display: inline-block;vertical-align: top;">
													<img src="images/icons/user.png" width="45" alt="">
												</div>
												<div style="display: inline-block;">
													Redacción  <?=$value['modify_date']?><br/>
													<a href="https://twitter.com/QuienCompro">Seguir en Twitter &nbsp;<img src="images/icons/twitter-256.png" width="20" alt=""></a>
												</div>

												-->
												<div style="display:block;">
												<img src="images/icons/user.png" width="45" alt=""> &nbsp;&nbsp;
													Redacción  <?=$value['modify_date']?><br/><br/>
												</div>
										<a href="<?=base_url()?>detallenota?nota=<?=$value['id']?>">
											<span style="color:#333;font-size:1.2em;">
											<?=$value['description']?>
											</span>
										</a>
										</div>
										<div class="unit-35">
										<a href="<?=base_url()?>detallenota?nota=<?=$value['id']?>">
											<!--<img class="hiddenmobile" src="http://lorempixel.com/280/120/technics/" alt="">
											<img class="hiddendesktop" src="http://lorempixel.com/240/280/technics/" alt="">-->
											<img src="<?=$value['featured_image']?>" alt="<?=$value['title']?>">
										</a>
										</div>
									</div>
							</div>
						</li>
						<?php endforeach ?>

						</div>

						
					</ul>
				</div>
				
			</div>
		
			
		</div>
		