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
});