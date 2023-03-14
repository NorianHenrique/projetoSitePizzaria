<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require('vendor/autoload.php');
	
	$autoload = function($class){
	$class = str_replace('\\','/',$class);
	if(file_exists('classes/'.$class.'.php'))
	
	  if($class == "Email"){
		require_once __DIR__ .("classes/phpmailer/PHPMailer.php");
	   }
		include('classes/'.$class.'.php');
	
	};
		
							
	spl_autoload_register($autoload);					
	
	
						
    
	define('INCLUDE_PATH','http://localhost/Projeto%20Pizzaria/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');

	//Conectar com banco de dados!
	define("HOST","localhost");                   
	define("USER","root");
	define("PASSWORD","");
	define("DATABASE","pizarria");

   
	////define("USER","nadsis92_root");
	//define("PASSWORD","Maximumcoop45@");
	//define("DATABASE","nadsis92_nadsistemas");



	//Constantes para o painel de controle
	define("NOME_EMPRESA","NADSistemas");

	//Funções do painel
	function pegaCargo($indice){
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		/*<i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}

	function recoverPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
		}
	}
?>