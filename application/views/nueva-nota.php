<link rel="stylesheet" href="<?=base_url();?>js/redactor/redactor.css" />
<script src="<?=base_url();?>js/redactor/redactor.js"></script>

<div class="main" id="main">

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
					<li></li>
				</ul>
				
			</div>

			<div class="unit-100">

				<form method="post" action="" class="forms">
				    <label>
				        Name
				        <input type="text" name="user-name" class="width-50" />
				    </label>
				    <fieldset>
				        <legend>Meta data</legend>
				            Tags
				            <input type="text" name="tags" class="width-100" />
				        <label>
				            Descripción
				            <textarea name="" id="" cols="30" rows="3">
				            </textarea>
				        </label>
				    </fieldset>
				    <fieldset>
				        <legend>Contenido</legend>
				        <label>
				            <textarea name="content" id="content">				            	
				            </textarea>
				        </label>
				    </fieldset>
				    <p>
				        <input type="submit" class="btn" value="Enviar" />
				        <button class="btn btn-small btn-outline">Cancelar</button>

				    </p>
				</form>

				
			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
$(function()
{
    $('#content').redactor(
    {
    	imageUpload:'',
    	fileUpload:'',
    	minHeight: 500,
    	toolbarFixed: true,
    	toolbarFixedTopOffset: 80,
    }
    );
});
</script>