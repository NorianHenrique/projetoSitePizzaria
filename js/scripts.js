$(function(){
   $('nav.menu-mobile').click(function(){
	   
	var listarMenu = $('nav.menu-mobile ul');

	//if(listarMenu.is(':hidden') == true){
		//listarMenu.fadeIn();
	//}else{
		// listarMenu.fadeOut();
	//}
	listarMenu.slideToggle();
	
   })

   
	if($('target').length > 0){
		//O elemento existe, portanto precisamos dar o scroll em algum elemento.
		var elemento = '#'+$('target').attr('target');

		var divScroll = $(elemento).offset().top;

		$('html,body').animate({scrollTop:divScroll},2000);
	}


	
})