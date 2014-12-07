$(function(){

	$("#id_form_nueva_nota,#id_form_nueva_factura,#id_form_nueva_solicitud").submit(function(){
		$(this).ajaxSubmit({
			success: function(data){
				if(data != "exito"){
					alert(data);
				}else{
					alert("Datos guardados!");
					window.location.href = 'admin';
				}
			} 
		});
		return false;
	});

	$("#id_form_edita_nota,#id_form_edita_factura,#id_form_edita_solicitud").submit(function(){
		$(this).ajaxSubmit({
			success: function(data){
				if(data != "exito"){
					alert(data);
				}else{
					alert("Datos actualizados!");
					window.location.href = 'admin';
				}
			} 
		});
		return false;
	});

	$('.elimina-nota,.elimina-factura,.elimina-solicitud').click(function(){
	    var r = confirm("¿Realmente desea realizar esta acción?");
	    if (r == true) {
	    		$.get($(this).attr('value'), function(data){
					if(data == 1){
						//data = "Registro Eliminado.";
						//alert(data);
						window.location.reload();
					}
					else
					{
						alert("No se  ha podido realizar esta acción: "+data);
						window.location.reload();
					}
				});
				
	    } 
	
	});


});