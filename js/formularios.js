$(function(){
	

	$("form.ajax-form").submit(function(){
		var form = $(this);
		$.ajax({
			beforeSend:function(){
				$('.sucesso').fadeIn();
				setTimeout(function(){
					$('.sucesso').fadeOut();
				},3000)
			},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){
				//Tudo certo vamos melhorar a interface!
				$('.overlay-loading').fadeOut();
				$('.sucesso').fadeIn();
				setTimeout(function(){
					$('.sucesso').fadeOut();
				},3000)
			}else{
				//Algo deu errado.
				$('.overlay-loading').fadeOut();
			}
		});
		return false;
	})

})