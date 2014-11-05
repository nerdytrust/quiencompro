$(function(){

	$("#envia_nota_nueva").click(function(){
		//$('#foo').css('display','block');
		//var spinner = new Spinner(opts).spin(target);
		$(this).ajaxSubmit({
			success: function(data){
				if(data != true){
					alert(data);
					$('#messages').html(data);
					$('#messages').hide().slideDown("slow");
					$("#messages").delay(3500).slideUp(800, function(){
					$("#messages").html("");
						//spinner.stop();
						//$('#foo').css('display','none');
					});
				}else{
					alert("Datos guardados!");
					//spinner.stop();
					//$('#foo').css('display','none');
					window.location.href = 'proyectos';
				}
			} 
		});
		return false;
	});
});