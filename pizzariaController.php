<?php
	

	class pizzariaController
	{
		
		public function index(){
			$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
			$slug = explode('/',$url)[0];

			if(file_exists('views/'.$slug.'.php')){
				include('views/'.$slug.'.php');
				//print_r($_SESSION['carrinho']);
				$this->validarCarrinho();
			}else{
				die('Não existe a página que você procura!');
			}

		}

		public function validarCarrinho(){
			if(isset($_GET['addCart'])){
				$idProduto = (int)$_GET['addCart'];
				if(isset($_SESSION['carrinho']) == false){
					$_SESSION['carrinho'] = array();
				}
	
				if(isset($_SESSION['carrinho'][$idProduto]) == false){
					$_SESSION['carrinho'][$idProduto] = 1;
				}else{
					$_SESSION['carrinho'][$idProduto]++;
				}
				echo '<script>alert("A pizza foi adicionado ao carrinho!")</script>';
				\Painel::redirect(INCLUDE_PATH);
				
			}
		}
		
	}

?>