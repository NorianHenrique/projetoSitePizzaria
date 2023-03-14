$(function(){
	
   var atual = -1;
   var maximo = $('.diferencial').lenght - 1;
   var timer;
   var animationDelay = 1

   executarAnimacao();

   function executarAnimacao(){
	$('.diferencial').hide();
	timer = setInterval(logicaAnimacao,animationDelay*1000);

	function logicaAnimacao(){
		atual++
		if(atual > maximo){
			 clearInterval(timer)
			 return false
		}

		$('.diferencial').eq(atual).fadeIn();
	}
   }

})