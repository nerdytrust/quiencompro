$(function(){

	$("#id_form_nueva_nota").submit(function(){
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

	$('.elimina-nota').click(function(){
	    var r = confirm("¿Realmente desea eliminar este registro?");
	    if (r == true) {
	    		$.get($(this).attr('value'), function(data){
					if(data == 1){
						data = "Registro Eliminado.";
						alert(data);
						window.location.reload();
					}
					else
					{
						alert("No se  ha podido eliminar el registro: "+data);
						window.location.reload();
					}
				});
				
	    } 
	
	});


});