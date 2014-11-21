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
		
		<span><h2>Resultados de la búsqueda:</h2><h3>"<?=$txt?>"</h3></span>

	</div>


	<div class="units-row">
		<!-- Columna Izquierda -->
    	<div class="unit-65">
    		<span class="bignumber-1"><?=$num_invoice?></span>
    		<h3>Resultados de búsqueda en FACTURAS</h3>
    		<br><h4 style="padding-left:5px;color:#ACDF47;"><?=money_format('%i',$amount)?></h4>
    		<hr>

			<ul class="lista-3">

			<?php
				foreach ($search_invoice as $key => $value) {
			?>
				<li><a href="<?=base_url()?>facturas/detallefactura/<?=$value->id?>">
					<div>
						<div class="unit-100">
							<img src="images/icons/glyphicons_037_coins.png" alt="">
							<?=$value->detail?>
							<div class="units-row">
								<div class="unit-50">
									<ul class="lista-4">
										<li><span>Camara:</span> <?=$value->camara?></li>
										<li><span>Legislatura:</span> <?=$value->legislatura?></li>
										<li><span><?=$value->responsable?></span></li>
									</ul>
								</div>
								<div class="unit-50">
									<ul class="lista-4">
										<li><span>Monto:</span> <?=money_format('%i',$value->amount)?></li>
										<li><span>Fecha:</span> <?=substr($value->date,0,10)?></li>
										<li><span><?=$value->emisor_alias?></span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					</a>
				</li>
			<?php
				}
			?>			

    		</ul>

    	</div>

    	<div class="unit-35">
    		<span class="bignumber-2"><?=$num_content?></span>
    			<h3>Resultados de búsqueda en NOTAS</h3>
    		<hr>
    		<ul class="lista-5">
			
				<?php
				foreach ($search_content as $key => $value) {
				?>

				<li><a href="<?=base_url()?>notas/detallenota/<?=$value->id?>">
					<div>
						<div class="unit-100">
							<!--<img class="hiddenmobile" width="100%" src="http://lorempixel.com/220/80/technics/" alt="">-->
							<img class="hiddenmobile thumb" src="<?=$value->featured_image?>" alt="<?=$value->title?>" style="height: 8em;width: 90%;">
							<h3><?=$value->title?></h3>
							<div class="units-row">
								<?=$value->description?>	
							</div>
						</div>
					</div>
					</a>
				</li>
				<?php
				}
				?>

			</ul>
    	</div>


    </div>



</div>