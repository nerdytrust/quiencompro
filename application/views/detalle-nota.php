<div class="main">
	<!--<div class="units-row first-main"  >
		
		<div class="unit-100">
			
			<div class="hiddenmobile" style="display: inline-block;float: left;padding-top: 5px">
				México D.F. a <?=strftime('%A %d de %B de %Y', time())?>
			</div>
			
			<div style="display: inline-block;padding-top: 3px;">
				<form action="<?=base_url()?>busqueda">
					<input type="text" name="txt" class="input-on-black"  placeholder="Criterio de Búsqueda" />
					<span class="btn-append">
					<button class="btn btn-white btn-outline" style="margin-right:5px;">Buscar</button>
					</span>
				</form>
					</div>
		</div>
		
	</div>-->
	
<script type="text/javascript">stLight.options({publisher: "c07e8302-bfe7-4f88-9ffb-d2ebc2fa3b21", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "c07e8302-bfe7-4f88-9ffb-d2ebc2fa3b21", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["googleplus", "facebook", "twitter", "linkedin"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
	
			<?php $nota = $nota[0]?>
			<div class="units-row">
				<div class="unit-100" style="text-align:center;">
					<div>
						<img src="<?=$nota['featured_image']?>" alt="<?=$nota['title']?>" class="imagedetallenota">
						<div class="imgholder-container unit-100">
							<div class="imgholder">
								<?=$nota['title']?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="units-row">
				<div class="unit-100"  style="padding: 1em;">
					<img src="images/icons/user.png" width="60" alt="">
					<div style="display: inline-block;padding-top:0.5em;">
						<br/><?=$nota['seudonimo']?>  <?=$nota['created_date']?><br/>
						<a target="_blank" href="https://twitter.com/<?=$nota['tweeter']?>">Seguir en Twitter &nbsp;<img src="images/icons/twitter-256.png" width="20" alt=""></a>
					</div>
					<div class="item-body">
							<?=$nota['description']?>
							<br><br><br>
							<?=$nota['content']?>
					</div>
				</div>
			</div>
		</div>

		<