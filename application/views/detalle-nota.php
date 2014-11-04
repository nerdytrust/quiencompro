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
			<?php $nota = $nota[0]?>
			<div class="units-row">
				<div class="unit-100">
					<div>
						<img src="<?=$nota['featured_image']?>" alt="<?=$nota['title']?>" width="100%" >
						<div class="imgholder-container unit-65">
							<div class="imgholder">
								<?=$nota['title']?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="units-row">
				<div class="unit-100">
					<img src="images/icons/user.png" width="60" alt="">
					<div style="display: inline-block;padding-top:0.5em;">
						<br/><?=$nota['seudonimo']?>  <?=$nota['created_date']?><br/>
						<a href="https://twitter.com/<?=$nota['tweeter']?>">Seguir en Twitter &nbsp;<img src="images/icons/twitter-256.png" width="20" alt=""></a>
					</div>
					<div class="item-body">
							<?=$nota['description']?>
							<br><br><br>
							<?=$nota['content']?>
					</div>
				</div>
			</div>
		</div>